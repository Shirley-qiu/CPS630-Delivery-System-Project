var app = angular.module('myApp', ['ngRoute']);
app.config(function($routeProvider){
    $routeProvider
    .when("/", {templateUrl : "maintain.php"})
    .when("/users", {templateUrl : "users.php"})
    .when("/cars", {templateUrl : "cars.php"})
    .otherwise({redirectTo: '/'})
    });
