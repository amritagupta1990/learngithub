(function () { //Calling a self invoking function for executing the angular app bootstrapping
	"use strict";
     var appMod = angular.module('testApp', ['ngRoute']);
     appMod.constant('constants',{
     	'API_URL': 'http://localhost/test/codec/index.php/'
     })
     .config(function ($routeProvider, $locationProvider){
     	$routeProvider
     	.when('/', {
     		'templateUrl' : "assets/angular/register/register.html",
     		'controller' : "registerCtrl"
     	})
     	.when('/login', {
     		'templateUrl' : "assets/angular/login/login.html",
     		'controller' : "loginCtrl"
     	});
     	// $locationProvider.html5Mode(true).hashPrefix('#');
     });     
})();