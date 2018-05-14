(function (){
 'use strict';
  angular.module('testApp')
  .controller('registerCtrl', ['$scope', 'WebServices', function ($scope, WebServices){
  	$scope.addUser = function ($valid){
  		if($valid){
  			var user_data ={
  				'name' : $scope.name,
  				'email' : $scope.email,
  				'address': $scope.address
  			};
  			WebServices.httpPost('add_user_data', user_data, 
  			function (res){
  				console.log(res);
  			}, function (err){
  				console.log(err);
  			});
  		}
  	};
  }]);
})();