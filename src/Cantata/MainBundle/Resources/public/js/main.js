angular.module("Cantata").controller("MainController",function($scope,$resource,$log){
    var api = $resource("/api/:param",{},{
       getList: {method: "GET",isArray: true,cache: false},
       rm: {method: "POST",isArray: false},
       change: {method: "POST",isArray: false}
    });
    $scope.checkboxes = new Array();
    
    api.getList({param: "temp"},function(d){
       $log.info(d);
       $scope.items = d;
    });
    $scope.rm = function(item){
        $log.info(item);
        var ar = new Array();
        ar[item.id] = true;
        api.rm({param: "removes"},ar,function(d){
           $log.info(d); 
        });
    };
    $scope.change = function(item,type){
        if(type === 1){
            var ar = new Array();
            ar[item.id] = true;
            api.change({param: "changes"},ar,function(d){
               $log.info(d); 
            });
        }
        if(type === 0){
            api.change({param: "changes"},item,function(d){
                $log.info(d);
            });
        }
    };
    $scope.rmChosen = function(){
        api.rm({param: "removes"},$scope.checkboxes,function(d){
           $log.info(d); 
        });
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
        });
    };
    $scope.$watch('checkAll',function(d){
        angular.forEach($scope.items, function(item) {
            if (angular.isDefined(item.id)) {
                $scope.checkboxes[item.id] = d;
            }
        });
    },true);
});