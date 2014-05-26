angular.module("Cantata").controller("ModifyController",function($scope,$resource,$log,$timeout){
    var api = $resource("/api/:param/:id",{},{
       save: {method: 'POST',isArray: false,params: {param: "modifies"}},
       deleteItem : {method: "DELETE",isArray: false,params: {param: "products"}},
       getProducts: {method: 'GET',isArray: true,params: {param: "product"}}
    });
    $scope.createNewObj = function(){
        $scope.New = {
            id: -1,
            code: null,
            name: null,
            cost: null,
            p_cost: null
        };
        return $scope.New;
    };
    $scope.createNewObj();
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
            $timeout(function(){
                angular.element(".nano-table ").nanoScroller();
            },1000);
        });
    },false);
    $scope.save = function(){
        if($scope.New.code === null ||
            $scope.New.cost === null ||
            $scope.New.name === null ||
            $scope.New.p_cost === null){
            $log.info($scope.New);
            return $log.warn("$scope.New object has null value");
        }
        api.save({},$scope.New,function(d){
           $scope.send = !$scope.send; 
           $scope.createNewObj();
        });
    };
    $scope.edit = function(p){
        $scope.New.id     = p.id;
        $scope.New.name   = p.name;
        $scope.New.code   = p.code;
        $scope.New.cost   = p.cost;
        $scope.New.p_cost = p.prime_cost;
    };
    $scope.deleteItem = function(id) {
        if(!angular.isDefined(id) || !angular.isNumber(id) ||  id === -1) {
            return;
        }
        api.deleteItem({id: id},function(d){
            $log.info(d);
            $scope.send = !$scope.send;
        });
    };
});