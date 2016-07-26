angular.module("mainApp").config(function($provide) {
    $provide.provider('MathService', function() {
        this.$get = function() {
            var factory = {};

            factory.multiply = function(a, b) {
                return a * b;
            }
            return factory;
        };
    });
});

angular.module("mainApp").value("defaultInput", 5);

angular.module("mainApp").factory('MathService', function() {
    var factory = {};

    factory.multiply = function(a, b) {
        return a * b;
    }
    return factory;
});

angular.module("mainApp").service('CalcService', function(MathService){
    this.square = function(a) {
        return MathService.multiply(a,a);
    }
});

angular.module("mainApp").controller('CalcController', function($scope, CalcService, defaultInput) {
    $scope.number = 5;
    $scope.result = CalcService.square($scope.number);

    $scope.square = function() {
        $scope.result = CalcService.square($scope.number);
    }
});