var app = angular.module("products", ["ngRoute"]);

app.config(function($routeProvider, $locationProvider){

    $routeProvider
        .when("/:id", {
            templateUrl: "/views/product.tpl.php"
        });


    $locationProvider.html5Mode(true);

});


app.controller('productsController', function($scope, $http){


    $scope.getInfoByProductId = function(id) {
        $http({
            method: "GET",
            url: "http://mvc/products/getProduct",
            params: {id: id}
        }).then(function(result){
            $scope.productId = result.data.id;
            $scope.productName = result.data.name;
            $scope.productPrice = result.data.price;
        })
    };

    $scope.saveProduct = function() {
        // TODO: Дома - попробовать реализовать сохранение и удаление
    }


});

