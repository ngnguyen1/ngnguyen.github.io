'use strict';

angular
    .module('webArchApp', [
        'ngCookies',
        'ngResource',
        'ngSanitize',
        'ngRoute',
        'ui.router',
        'ngAnimate',
        'ui.bootstrap',
        'dx'
    ])
    .config(function ($stateProvider,$urlRouterProvider) {
        // For any unmatched url, send to /route1
        $urlRouterProvider.otherwise("/main");

        $stateProvider
            .state('main', {
                url: "/main",
                templateUrl: "views/main.html",
                controller: "MainCtrl",
                abstract: true

            })
            .state('main.dashboard1', {
                url: "",
                templateUrl: 'views/state/dashboard1.html',
                controller: 'dashboardCtrl'
            })
            .state('main.route2', {
                url: "/route2",
                templateUrl: 'views/state/route2.html'
            })
    });
