var app = angular.module('app', []);

app.controller('CodeHero', function($scope, $locale) {
    var APIKey = '913c48c50c075b9e22ff915546abae98';
    var APIDomain = 'https://gateway.marvel.com:443/v1/public/characters';
    var initialPagination = [];
    var finalPagination = [];
    var modal = document.getElementById('character-modal');
    
    $scope.searchCharacter = '';
    $scope.pageTotal = 0;
    $scope.selectedPage = 1;
    $scope.selectedTab = 0;
	$(document).ready(function(){
        $scope.callMarvelAPI(0);
    });
    
    $scope.callMarvelAPI = function (offset, hero, id) {
        
        
        if (id) {
            APIUrl = APIDomain+'/'+id+'?apikey='+APIKey;
        } else {
            $scope.loading = true;
            var APIUrl = APIDomain+'?limit=3&offset='+offset+'&apikey='+APIKey;
            if (hero)
                APIUrl += '&nameStartsWith=' + hero;
        }
        
        $.getJSON(APIUrl, function(result) {
            if (id) {
                $scope.selectedCharacter = result.data.results[0];
            } else {
                if (offset == 0)
                    $scope.selectedPage = 1; //Returns to page 1 if search for hero is made
                $scope.pageTotal = 0;
                $scope.charactersTotal = result.data.total;
                $scope.pageTotal += Math.ceil($scope.charactersTotal / 3);

                var i = 1;
                initialPagination = [];
                finalPagination = [];

                while (i <= 5 && i < $scope.pageTotal) {
                    initialPagination.push(i);
                    finalPagination.push($scope.pageTotal - 5 + i);
                    i++;
                }
                if ($scope.selectedPage <= 3)
                    $scope.pages = initialPagination;

                $scope.characters = result.data.results;
                $scope.loading = false;
            }
            $scope.$apply();
        });
    }
    
    $scope.searchHero = function(hero) {
        if (hero.length > 2)
            $scope.callMarvelAPI(0, hero);
        else if (hero.length == 0)
            $scope.callMarvelAPI(0);
    }
    
    $scope.changePage = function (newPage) {
        if (newPage != $scope.selectedPage && newPage > 0 && newPage < $scope.pageTotal) {
            $scope.selectedPage = newPage;
            if ($scope.searchCharacter.length > 2)
                $scope.callMarvelAPI((newPage - 1) * 3, $scope.searchCharacter);
            else
                $scope.callMarvelAPI((newPage - 1) * 3);
        }
        
        if (newPage > 3 && newPage + 2 < $scope.pageTotal) {
            $scope.pages = [newPage - 2, newPage - 1, newPage, newPage + 1, newPage + 2];
        }
    }
    
    $scope.openModal = function (characterId) {
        modal.style.display = "block";
        $scope.callMarvelAPI(0, '', characterId);
    }
    $scope.closeModal = function () {
        modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal)
            $scope.closeModal();
    }

});
