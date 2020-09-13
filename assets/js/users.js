var users = angular.module('users', []);

users.controller("usersController", function($scope, $http){

    $scope.getUserData = function(userId) {
        $http({
            method: "POST",
            url: location.protocol + "//" + location.host + "/users/getUserById",
            data: $.param({id: userId}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(result){
            $scope.userId = result.data.id;
            $scope.userLogin = result.data.login;
            $scope.userEmail = result.data.email;
            $scope.userFullName = result.data.fullName;
            $scope.userRole = result.data.role;
            // Настраиваем фокус userSelRole на списочный элемент $scope.userRole !!!
            let loc_val;
            for(var i=0; i<$scope.roles.length; i++) {
                loc_val = $scope.roles[i];
                if (loc_val.name === result.data.role) {
                    $scope.userSelRole = loc_val;
                    break;
                }
            }
            console.log($scope);
        })
    }

    $scope.getRoles = function() {
        $http({
            method: "POST",
            url: location.protocol + "//" + location.host + "/users/getUsersRoles",
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(result){
            $scope.roles = [];
            for(var i=0; i<result.data.length; i++) {
                $scope.roles.push(result.data[i]);
            }
        })
    }

    $scope.getRoles();

    $scope.updateUserData = function() {
        $http({
            method: "POST",
            url: "http://mvc/users/updateUserData",
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            data: $.param({id: $scope.userId, fullName: $scope.userFullName, login: $scope.userLogin, email: $scope.userEmail, role: $scope.newRole})
        }).then(function(result){
            //TODO: вывести результат
            console.log(result);
        });
    }

    $scope.deleteUser = function(userId) {
        $http({
            method: "POST",
            url: "http://mvc/users/deleteUser",
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            data: $.param({id: userId})
        }).then(function(result){
            //TODO: вывести результат
            console.log(result);
        });
    }

    $scope.addNewUser = function() {
        $http({
            method: "POST",
            url: "http://mvc/users/addNewUser",
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            data: $.param({fullName: $scope.newUser, login: $scope.newLogin, email: $scope.newEmail, password: $scope.newPassword, role: $scope.newRole})
        }).then(function(result){
            //TODO: вывести результат
            console.log(result);
        });
    }

})

users.directive('editUser', function(){
    return {
        templateUrl: "/views/edit-user-tpl.php",
        restrict: "E",
        replace: true,
        transclude: true,
        controller: "usersController",
        link: function(scope, element, attrs) {
            scope.showEditForm = function() {
                scope.isShowEditForm = true;
            };
        }
    }
})