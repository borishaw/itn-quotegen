angular.module('app', ['ui.bootstrap', 'validation', 'validation.rule', 'ui.select', 'ngSanitize']);

angular.module('app').config(['$validationProvider', function ($validationProvider) {
    $validationProvider.showSuccessMessage = false;
    $validationProvider.showErrorMessage = true;
    // $validationProvider.setValidMethod('submit');
}]);