var app =  angular.module('main-App',['ngRoute','angularUtils.directives.dirPagination','ngMaterial', 'ngMessages']);

app.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
            when('/', {
                templateUrl: 'templates/home.html',
                controller: 'AdminController'
            }).
            when('/items', {
                templateUrl: 'templates/items.html',
                controller: 'ItemController'
            }).
            when('/products', {
                templateUrl: 'templates/products.html',
                controller: 'ProductController'
            }).
            when('/vouchers', {
                templateUrl: 'templates/vouchers.html',
                controller: 'VoucherController'
            });

}]);