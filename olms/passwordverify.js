/**
 * Created by dlipingu on 7/28/2017.
 */
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope) {

    $scope.myForm = {
        password: '',
        verifyPassword: ''
    };

    $scope.submit = function() {
        console.log('success');
    };

});