angular.module("Cantata").controller("MainController",function($scope,$resource,$log){
    var api = $resource("/api/:param",{},{
       getList: {method: "GET",isArray: true,cache: false} 
    });
    $scope.checkboxes = new Array();
    
    
    api.getList({param: "temp"},function(d){
       $log.info(d);
       $scope.items = d;
    });
});