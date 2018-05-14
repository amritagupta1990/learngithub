(function (){
 'use strict';
  angular.module('testApp')
  .factory('WebServices', ['$http', 'constants', 
  	function ($http, constants){
  		return {
  			httpPost: function(endUrl, data, success, error){
  				return $http.post(constants.API_URL + endUrl, data).then(success, error);
  			}
  		}
  	}]);
  })();