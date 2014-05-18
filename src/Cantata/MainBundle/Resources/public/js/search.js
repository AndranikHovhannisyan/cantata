angular.module("Cantata").controller("SearchController",function($scope,$resource,$log){
    $scope.search = function(e){
        if(e.keyCode === 13){
            location.href = "addProduct/"+$scope.srch;
        }
    };
});