<div id="character-modal" class="modal">
    <div class="content">
        <div class="header">
            {{selectedCharacter.name}}
            <span class="fas fa-times fa-lg right"
                  ng-click="closeModal()"></span>
        </div>
        <div class="main-content">
            <div class="image-description">
                <div class="description left"
                     style="background-image: url({{selectedCharacter.thumbnail.path + '.' + selectedCharacter.thumbnail.extension}})">
                    <span class="description-text"
                          ng-if="selectedCharacter.description">
                        {{selectedCharacter.description}}
                    </span>
                    
                </div>
            </div>
            <div class="additional-info left">
                <div table="tab-header">
                    <div class="tab roboto-light"
                         ng-class="selectedTab == 0 ? 'active' : ''"
                         ng-click="selectedTab = 0">Séries</div>
                    <div class="tab roboto-light"
                         ng-class="selectedTab == 1 ? 'active' : ''"
                         ng-click="selectedTab = 1">Eventos</div>
                    <div class="tab roboto-light"
                         ng-class="selectedTab == 2 ? 'active' : ''"
                         ng-click="selectedTab = 2">Quadrinhos</div>
                    <div class="tab roboto-light"
                         ng-class="selectedTab == 3 ? 'active' : ''"
                         ng-click="selectedTab = 3">Histórias</div>
                </div>
            </div>
            <div class="tab-info">
                <span ng-if="selectedTab == 0">
                    
                    <span ng-repeat="series in selectedCharacter.series.items">
                        {{series.name}}<br>
                    </span>
                    <span ng-if="selectedCharacter.series.available == 0">No available series.</span>
                </span>
                <span ng-if="selectedTab == 1">
                    <span ng-repeat="events in selectedCharacter.events.items">
                        {{events.name}}<br>
                    </span>
                    <span ng-if="selectedCharacter.events.available == 0">No available events.</span>
                </span>
                <span ng-if="selectedTab == 2">
                    <span ng-repeat="comics in selectedCharacter.comics.items">
                        {{comics.name}}<br>
                    </span>
                    <span ng-if="selectedCharacter.comics.available == 0">No available comics.</span>
                </span>
                <span ng-if="selectedTab == 3">
                    <span ng-repeat="stories in selectedCharacter.stories.items">
                        {{stories.name}}<br>
                    </span>
                    <span ng-if="selectedCharacter.stories.available == 0">No available stories.</span>
                </span>

            </div>
        </div>
    </div>
</div>
