angular
    .module('app', ['ui.bootstrap', 'validation', 'validation.rule'])
    .config(['$validationProvider', function ($validationProvider) {
        $validationProvider.showSuccessMessage = false;
        $validationProvider.showErrorMessage = true;
        // $validationProvider.setValidMethod('submit');
    }])
    .controller('ctrl', ['$scope', '$http', '$injector', function ($scope, $http ,$injector) {

        var $validationProvider = $injector.get('$validation');

        $scope.countries =  ['Afghanistan', 'Åland Islands', 'Albania', 'Algeria', 'American Samoa', 'Andorra', 'Angola', 'Anguilla', 'Antigua and Barbuda', 'Argentina', 'Armenia', 'Aruba', 'Australia', 'Austria', 'Azerbaijan', 'Bangladesh', 'Barbados', 'Bahamas', 'Bahrain', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bermuda', 'Bhutan', 'Bolivia', 'Bosnia and Herzegovina', 'Botswana', 'Brazil', 'British Indian Ocean Territory', 'British Virgin Islands', 'Brunei Darussalam', 'Bulgaria', 'Burkina Faso', 'Burma', 'Burundi', 'Cambodia', 'Cameroon', 'Canada', 'Cape Verde', 'Cayman Islands', 'Central African Republic', 'Chad', 'Chile', 'China', 'Christmas Island', 'Cocos (Keeling) Islands', 'Colombia', 'Comoros', 'Congo-Brazzaville', 'Congo-Kinshasa', 'Cook Islands', 'Costa Rica', 'Croatia', 'Curaçao', 'Cyprus', 'Czech Republic', 'Denmark', 'Djibouti', 'Dominica', 'Dominican Republic', 'East Timor', 'Ecuador', 'El Salvador', 'Egypt', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Ethiopia', 'Falkland Islands', 'Faroe Islands', 'Federated States of Micronesia', 'Fiji', 'Finland', 'France', 'French Guiana', 'French Polynesia', 'French Southern Lands', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Gibraltar', 'Greece', 'Greenland', 'Grenada', 'Guadeloupe', 'Guam', 'Guatemala', 'Guernsey', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 'Heard and McDonald Islands', 'Honduras', 'Hong Kong', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iraq', 'Ireland', 'Isle of Man', 'Israel', 'Italy', 'Jamaica', 'Japan', 'Jersey', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Kuwait', 'Kyrgyzstan', 'Laos', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Macau', 'Macedonia', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Martinique', 'Mauritania', 'Mauritius', 'Mayotte', 'Mexico', 'Moldova', 'Monaco', 'Mongolia', 'Montenegro', 'Montserrat', 'Morocco', 'Mozambique', 'Namibia', 'Nauru', 'Nepal', 'Netherlands', 'New Caledonia', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'Niue', 'Norfolk Island', 'Northern Mariana Islands', 'Norway', 'Oman', 'Pakistan', 'Palau', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Pitcairn Islands', 'Poland', 'Portugal', 'Puerto Rico', 'Qatar', 'Réunion', 'Romania', 'Russia', 'Rwanda', 'Saint Barthélemy', 'Saint Helena', 'Saint Kitts and Nevis', 'Saint Lucia', 'Saint Martin', 'Saint Pierre and Miquelon', 'Saint Vincent', 'Samoa', 'San Marino', 'São Tomé and Príncipe', 'Saudi Arabia', 'Senegal', 'Serbia', 'Seychelles', 'Sierra Leone', 'Singapore', 'Sint Maarten', 'Slovakia', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa', 'South Georgia', 'South Korea', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname', 'Svalbard and Jan Mayen', 'Sweden', 'Swaziland', 'Switzerland', 'Syria', 'Taiwan', 'Tajikistan', 'Tanzania', 'Thailand', 'Togo', 'Tokelau', 'Tonga', 'Trinidad and Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Turks and Caicos Islands', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States', 'Uruguay', 'Uzbekistan', 'Vanuatu', 'Vatican City', 'Vietnam', 'Venezuela', 'Wallis and Futuna', 'Western Sahara', 'Yemen', 'Zambia', 'Zimbabwe'];

        $scope.provinces = ['AB', 'BC', 'MB', 'NB', 'NL', 'NT', 'NS', 'NU', 'ON', 'PE', 'QC', 'SK', 'YT'];

        $scope.unit_systems = ['Metric', 'Imperial'];

        $scope.cities = ["Acton", "Alliston", "Amhertsburg", "Ancaster", "Angus", "Aurora", "Arthur", "Aylmer", "Ayr", "Brampton", "Barrie", "Beamsville", "Beaverton", "Beeton", "Belleville", "Binbrook", "Blenheim", "Bobcaygeon", "Bolton", "Bowmanville", "Bradford", "Brantford", "Breslau", "Burlington", "Caledonia", "Cambridge", "Campbellford", "Campbellville", "Chatham", "Chepstow", "Clarksburg", "Cobourg", "Colborne", "Collingwood", "Concord", "Cookstown", "Dorchester", "Dresden", "Dundas", "Dunnville", "Elgin Mills", "Elmira", "Embro", "Erin", "Essex", "Etobicoke", "Exeter", "Fergus", "Fort Erie", "Georgetown", "Goderich", "Gormley", "Grand Valley", "Gravenhurst", "Grimsby", "Guelph", "Hagersville", "Halton Hills", "Hanover", "Hamilton", "Hensall", "Ingersol", "Inwood", "Jarvis", "Jordan", "Keswick", "King City", "Kingston", "Kingsville", "Kitchener", "Kleinburg", "Leamington", "Lindsay", "Listowel", "London", "Markham", "Midland", "Milton", "Mississauga", "Mitchell", "Mount Brydges", "Mount Forest", "Napanee", "North York", "New Dundee", "New Hamburg", "Newcastle", "Newmarket", "Niagara", "Oakville", "Orangeville", "Orillia", "Oshawa", "Owen Sound", "Paris", "Peterborough", "Plattsville", "Port Colborne", "Port Hope", "Port Perry", "Putnam", "Queensville", "Richmond Hill", "Ridgeway", "Rexdale", "Sarnia", "Scarborough", "Schomberg", "Simcoe", "Smithville", "St. Catherines", "ST. Clements", "St. David's", "St. George", "St. Jacob's", "St. Mary's", "St. Thomas", "Stoney Creek", "Stoufville", "Stratford", "Strathroy", "Tecumseh", "Thamesford", "Thornbury", "Thornhill", "Thornton", "Thorold", "Toronto", "Tilbury", "Tillsonburg", "Trenton", "Uxbridge", "Vaughan", "Vineland Station", "Wainfleet", "Walkerton", "Warsaw", "Waterford", "Waterloo", "Welland", "Wellesley", "Wheatley", "Whitby", "Windsor", "Woodbridge", "Woodstock", "Arnprior", "Bancroft", "Blind River", "Bracebridge", "Brockville", "Burks Falls", "Chapleau", "Cochrane", "Copper Cliff", "Cornwall", "Earlton", "Espanola", "Fenelon Falls", "Fort Frances", "Haliburton", "Hearst", "Huntsville", "Iroquois Falls", "Kapuskasing", "Kenora", "Kirkland Lake", "Marathon", "Nepean", "New Liskeard", "Nipigon", "North Bay", "Ottawa", "Parry Sound", "Pembroke", "Perth", "Prescott", "Refrew", "Sault Ste Marie", "Sioux Lookout", "Smith Falls", "Sudbury", "Thunder Bay", "Timmins", "Windchester", "Other"];

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

        $scope.removePiece = function (index){

            $scope.pieces.splice(index, 1);
            
            $scope.allowAddNew = true;
            
            //disable Remove button when only one form left
            if ($scope.pieces.length <= 1) {
                $scope.allowRemove = false;
            }
        };

        $scope.submit = function () {

            $validationProvider.validate($scope.myForm)
                .success(function () {
                    $scope.shipment['pieces'] = $scope.pieces;
                    var submission = angular.toJson({
                        "agentInfo":$scope.agent,
                        "destinationInfo":$scope.destination,
                        "shipmentInfo": $scope.shipment
                    });
                    $http({
                        url: "php/quote_generator.php",
                        method: "POST",
                        data: submission
                    }).then(function (response) {
                        console.log(response.data);
                        $scope.ajaxMessage = response.data;
                    });
                }).error(function () {
                    console.log("The form is incomplete");
                });
        }
    }]);