var frontendApp = angular.module('frontendApp', ['ngRoute', 'ngCookies']);

frontendApp.config(['$routeProvider', '$locationProvider',
  function($routeProvider, $locationProvider) {
    // $locationProvider.html5Mode(true);
    $locationProvider.hashPrefix('');

    $routeProvider.when('/', {
      templateUrl: 'templates/frontend/me.html',
      controller: 'FrontendController'
    });
    $routeProvider.when('/login', {
      templateUrl: 'templates/frontend/login.html',
      controller: 'FrontendController'
    });
    $routeProvider.when('/register', {
      templateUrl: 'templates/frontend/register.html',
      controller: 'FrontendController'
    });

    $routeProvider.otherwise('/');
  }
]);
