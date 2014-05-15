'use strict';

angular
    .module('probuxApp', [
        'ngCookies',
        'ngResource',
        'ngSanitize',
        'ngRoute',
        'ngAnimate',
        'ui.bootstrap',
        'ui.router'
    ])
    .config(function ($stateProvider, $urlRouterProvider) {
        $urlRouterProvider.otherwise("/main");

        $stateProvider
            .state('main', {
                url: "/main",
                templateUrl: "views/main.html",
                controller: 'MainCtrl',
                abstract: true
            })
            .state('main.home', {
                url: "",
                templateUrl: 'views/states/home.html',
                controller: 'homeCtrl'
            })
            .state('main.route2', {
                url: "/route2",
                templateUrl: 'views/state/route2.html'
            })
            .state('main.login', {
                url: "/login",
                templateUrl: 'views/states/login.html'
            })
    });
