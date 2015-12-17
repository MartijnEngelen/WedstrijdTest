//wedstrijdFatory.js
(function () {
	'use strict';

	// Definitie van de wedstrijdFactory
	angular.module('wedstrijdPlatform')
		.factory('wedstrijdFactory', wedstrijdFactory);
		
	wedstrijdFactory.$inject = ['$http', 'GLOBALS']; 

	// Implementatie van wedstrijdFactory
	function wedstrijdFactory($http, GLOBALS) {
		var factory = {};


		factory.insertUser = function (email, ww) {
            return $http({
                method: 'POST',
                url: GLOBALS.insertUser,
				data: '{"email": "' + email + '", "wachtwoord": "' + ww + '"}' //dit nu nog in de api opvangen
            });
        }
		
		factory.getEmailExists = function (email) {
            return $http({
                method: 'GET',
                url: GLOBALS.getUserExists + "email=" + email
            });
        }
		
	
		factory.getUserByEmail = function (email, ww) {
            return $http({
                method: 'POST',
                url: GLOBALS.getUserByEmailUrl,
				data: '{"email": "' + email + '", "wachtwoord": "' + ww + '"}' 
            });
        }
		
		return factory;
	}
})();
