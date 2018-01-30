var nblsApp = angular.module('nblsApp', ['ngRoute', 'ngCookies']);

nblsApp.config(['$routeProvider', '$locationProvider',
  function($routeProvider, $locationProvider) {
    // $locationProvider.html5Mode(true);
    $locationProvider.hashPrefix('');

    $routeProvider.when('/me', {
      templateUrl: 'templates/me.html',
      controller: 'UserController'
    });
    $routeProvider.when('/users', {
      templateUrl: 'templates/users/users.html',
      controller: 'UserController'
    });
    $routeProvider.when('/roles', {
      templateUrl: 'templates/users/roles.html',
      controller: 'RoleController'
    });

    $routeProvider.otherwise('/me');
  }
]);
