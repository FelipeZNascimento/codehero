<!DOCTYPE html>
<html lang="pt" ng-app="app">
    <head>
        <title>Code Hero - Objective</title>
<!--        <link id="favicon" rel="icon" href="https://glitch.com/edit/favicon-app.ico" type="image/x-icon">-->
        <meta name="description" content="A cool thing made with Glitch">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.2/angular.min.js"></script>
        <script src="js/app.js"></script>
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,900">
        <link rel="stylesheet" href="css/main.css">        

    </head>
    <body ng-controller="CodeHero">
        <div id="content">
            <div class="main-content">
                <div id="page-header"
                     class="left">
                    <span id="busca-marvel" 
                          class="busca-marvel roboto-black left">Busca Marvel</span> 
                    <span id="teste-front-end" 
                          class="roboto-light left">Teste Front-End</span>
                    <span class="hide-on-mobile right">
                        Felipe Zanon
                    </span>
                </div>
                <div id="busca-personagem"
                     class="left">
                    <span class="titulo">
                        Nome do Personagem
                    </span>
                    <form>
                        <input type="text" 
                               class="left browser-default"
                               ng-model="searchCharacter"
                               ng-change="searchHero(searchCharacter)">
                    </form>
                </div>
                <div id="table-header" class="left">
                    <div class="characters left">Personagem</div>
                    <div class="series left hide-on-mobile">Séries</div>
                    <div class="events left hide-on-mobile">Eventos</div>
                </div>
                <div id="table-content" 
                     class="left"
                     ng-repeat="character in characters"
                     ng-click="openModal(character.id)">
                    <div class="characters left">
                        <img ng-src="{{character.thumbnail.path + '.' + character.thumbnail.extension}}">
                        <div class="characters-text">
                            {{character.name}}
                        </div>
                    </div>
                    <div class="series left hide-on-mobile">
                        <span ng-repeat="serie in character.series.items | limitTo:3" class="text">
                            {{serie.name}}<br>
                        </span>
                    </div>
                    <div class="events left hide-on-mobile">
                        <span ng-repeat="event in character.events.items | limitTo:3" class="text">
                            {{event.name}}<br>
                        </span>
                    </div>
                </div>
                <div id="loading"
                     ng-if="loading">
                    <div class="loading-img">
                        <img src="img/loading.gif" height="50px">
                    </div>
                </div>
            </div>
            <div id="pagination">
                <div id="page-selector"
                     ng-if="pageTotal > 0">
                    <i class="fas fa-caret-left fa-lg"
                       ng-click="changePage(selectedPage - 1)"
                       ng-class="selectedPage == 1 ? 'disabled' : ''"></i>
                    <div class="page-number"
                         ng-class="selectedPage == page ? 'active' : ''"
                         ng-repeat="page in pages track by $index"
                         ng-click="changePage(page)">{{page}}</div>
                    <i class="fas fa-caret-right fa-lg"
                       ng-click="changePage(selectedPage + 1)"
                       ng-class="selectedPage == pages.length ? 'disabled' : ''"></i>
                </div>
            </div>
            <?php include("character.php"); ?>
        </div>
    </body>
    <div id="footer"></div>
</html>
