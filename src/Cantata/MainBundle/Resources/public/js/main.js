angular.module("Cantata").controller("MainController",function($scope,$resource,$log,$timeout){
    var api = $resource("/api/:param",{},{
       getList: {method: "GET",isArray: true,cache: false},
       rm: {method: "POST",isArray: false},
       change: {method: "POST",isArray: false},
       getProList: {method: "GET",isArray: true,params: {param: "product"}},
       sendIds: {method: "POST",isArray:false,params: {param: "findprods"}}
    });
    $scope.checkboxes = new Array();
    $scope.getList = true;
    $scope.proSearch = {};
    api.getProList({},function(d){
        $log.info(d);
        $scope.productList = d;
    });
    $scope.$watch("getList",function(d){
        api.getList({param: "temp"},function(d){
            $log.info(d);
            $scope.items = d;
        });
    },false);
    $scope.rm = function(item){
        $log.info(item);
        var ar = new Array();
        ar[item.id] = true;
        api.rm({param: "removes"},ar,function(d){
           $log.info(d);
           $scope.getList = !$scope.getList;
        });
    };
    $scope.change = function(item,type){
        if(type === 1){
            var ar = new Array();
            ar[item.id] = true;
            api.change({param: "changes"},ar,function(d){
               $log.info(d); 
               $scope.getList = !$scope.getList;
            });
        }
        if(type === 0){
            api.change({param: "changes"},item,function(d){
                $log.info(d);
                $scope.getList = !$scope.getList;
            });
        }
    };
    $scope.rmChosen = function(){
        api.rm({param: "removes"},$scope.checkboxes,function(d){
           $log.info(d);
           $scope.getList = !$scope.getList;
        });
    };
    $scope.proFilter = function(singleItem) {
        if(!angular.isDefined($scope.proSearch.s))
            return true;
        if(singleItem.code.indexOf($scope.proSearch.s) !== -1)
            return true;
        return false;
    };
    $scope.reChosen = function(){
        var ar = new Array();
        angular.forEach($scope.items,function(v,k){
            if(v.type === 0) {
                if(angular.isDefined($scope.checkboxes[v.id]) && $scope.checkboxes[v.id]){
                    ar[v.id] = true;
                }
            }
        });
        $log.info(ar);
        api.change({param: "changes"},ar,function(d){
            $log.info(d);
            $scope.getList = !$scope.getList;
        });
    };
    $scope.findProd = function(id1,id2){
        $log.info(id1,id2);
        api.sendIds({},{prodId: id2,tempId: id1},function(){
            $scope.getList = !$scope.getList;
        });
        angular.element(".modal,.modal-backdrop").remove();
    };
    $scope.$watch('checkAll',function(d){
        angular.forEach($scope.items, function(item) {
            if (angular.isDefined(item.id)) {
                $scope.checkboxes[item.id] = d;
            }
        });
    },true);
});