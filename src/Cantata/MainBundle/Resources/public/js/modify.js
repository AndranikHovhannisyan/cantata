angular.module("Cantata").controller("ModifyController",function($scope,$resource,$log,$timeout){
    var api = $resource("/api/:param",{},{
       save: {method: 'POST',isArray: false,params: {param: "modifies"}},
       getProducts: {method: 'GET',isArray: true,params: {param: "product"}}
    });
    $scope.New = {
        id: null,
        code: null,
        cost: null,
        p_cost: null
    };
    $scope.modify = {};
    
    $scope.modifyFilter = function(single){
        if(!angular.isDefined($scope.modify.code) && !angular.isDefined($scope.modify.name))
            return true;
        if(!angular.isDefined($scope.modify.name))
            if(angular.lowercase(single.code).indexOf(angular.lowercase($scope.modify.code)) !== -1)
                return true;
        if(!angular.isDefined($scope.modify.code))
            if(angular.lowercase(single.name).indexOf(angular.lowercase($scope.modify.name)) !== -1)
                return true;
        if(angular.lowercase(single.name).indexOf(angular.lowercase($scope.modify.name)) !== -1 &&
            angular.lowercase(single.code).indexOf(angular.lowercase($scope.modify.code)) !== -1)
            return true;
        return false;
    };
    $scope.$watch("send",function(d){
        api.getProducts({},function(data){
            $scope.products = data;
        });
    },false);
});