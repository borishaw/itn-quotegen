angular.module('app').controller('ctrl', ['$scope', '$http', '$injector', 'defaultCountries', 'ontarioCities', function ($scope, $http, $injector, defaultCountries, ontarioCities) {

    var $validationProvider = $injector.get('$validation');

    $scope.countries = defaultCountries;
    $scope.provinces = ['AB', 'BC', 'MB', 'NB', 'NL', 'NT', 'NS', 'NU', 'ON', 'PE', 'QC', 'SK', 'YT'];
    $scope.unit_systems = ['Metric', 'Imperial'];
    $scope.cities = ontarioCities;

    var Piece = function () {
        this.length = 0;
        this.width = 0;
        this.height = 0;
        this.weight = 0;
    };

    $scope.agent = {};
    $scope.destination = {};
    $scope.shipment = {};
    $scope.unitSystem = '';
    $scope.pieces = [new Piece()];

    $scope.allowAddNew = true;
    $scope.allowRemove = false;

    $scope.addPiece = function () {
        $scope.pieces.push(new Piece());

        if ($scope.pieces.length >= 10) {
            $scope.allowAddNew = false;
        }

        if ($scope.pieces.length >= 1) {
            $scope.allowRemove = true;
        }
    };

    $scope.removePiece = function (index) {

        $scope.pieces.splice(index, 1);

        $scope.allowAddNew = true;

        //disable Remove button when only one form left
        if ($scope.pieces.length <= 1) {
            $scope.allowRemove = false;
        }
    };

    $scope.submit = function () {

        $scope.shipment['pieces'] = $scope.pieces;
        var submission = angular.toJson({
            "agentInfo": $scope.agent,
            "destinationInfo": $scope.destination,
            "shipmentInfo": $scope.shipment
        });
        $scope.ajaxMessage = "Sending...";
        $http({
            url: "php/quote_generator.php",
            method: "POST",
            data: submission
        }).then(function (response) {
            $scope.ajaxMessage = response.data;
        });
    }
}]);