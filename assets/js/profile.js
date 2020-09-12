var profile = angular.module('profile', []);

profile.controller("profileController", function($scope, $http, $window){

    $scope.saveProfileData = function() {
        id = angular.element("#userId").val();
        login = angular.element("#login").val();
        email = angular.element("#email").val();

        $http({
            method: "POST",
            url: "http://mvc/profile/updateProfile",
            data: $.param({id: id, login: login, email: email}),
            headers: {"Content-Type": 'application/x-www-form-urlencoded'}
        }).then(function(result){
            // TODO
            console.log(result);
        })
    };


    $scope.updatePassword = function() {
        id = angular.element("#userId").val();

        $http({
            method: "POST",
            url: "http://mvc/profile/updatePassword",
            data: $.param({id: id, newpass: $scope.newpass, repeatpass: $scope.repeatpass}),
            headers: {"Content-Type": 'application/x-www-form-urlencoded'}
        }).then(function(result){
            // TODO
            console.log(result);
        })
    }

});