var app = angular.module('app', []);

app.controller('CodeHero', function($scope, $locale) {
    var APIKey = '913c48c50c075b9e22ff915546abae98';
	$(document).ready(function(){
        $.getJSON('https://gateway.marvel.com:443/v1/public/characters?apikey='+APIKey, function(data) {
            $scope.characters = data;
        });
    });
});
