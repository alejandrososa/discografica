/**
 * Created by alejandro.sosa on 29/05/2016.
 */
var app = angular.module('discografica', [])
    .constant('API_URL', 'http://test.discografica.com/api/v1/')
    .constant('REST_ALBUM', 'album')
    .constant('REST_ARTIST', 'artista');

angular.element(document).ready(function () {
    angular.bootstrap(document, ['discografica']);
});