app.controller('OperatorCtrl', ['$rootScope', '$scope', '$http', '$modal', '$log', 'FileUploader', '$resource', function ($rootScope, $scope, $http, $modal, $log, FileUploader, $resource) {
$scope.myData = "hello";
alert(1);
}]);

//app.controller('OperatorCtrl', ['$rootScope', '$scope', '$http', '$modal', '$log', 'FileUploader','$stateParams ', '$resource', function ($rootScope, $scope, $http, $modal, $log, FileUploader, $resource,$stateParams) {
//alert(1);
//        $scope.OperatorListArr = [];
//        $scope.getOperatorlist = function () {
//            $http({
//                method: 'post',
//                url: baseURL + 'getoperatorlist',
//                data: 'data=',
//                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
//            }).success(function (jsondata) {
//                console.log(jsondata);
//                if (jsondata.type == 'SUCCESS') {
//                    $scope.OperatorListArr = jsondata.value;
//                } else {
//                    $scope.OperatorListArr = [];
//                }
//            });
//        };
//        $scope.getOperatorlist();
//
//        $scope.operatordata = {};
//        $scope.message = '';
//        $scope.Checkpassword = function (pass, confirmpass) {
//            var n = pass.localeCompare(confirmpass);
//            if (n !== 0) {
//                $scope.message = 'red';
//            } else {
//                $scope.message = '';
//            }
//        };
//        $scope.SaveUserDetail = function (usertype) {
//            $scope.valid_till = $('#datepicker').val();
//            $scope.operatordata.user_type = usertype;
//            $scope.operatordata.valid_till = $scope.valid_till;
//            $http({
//                method: 'post',
//                url: baseURL + 'add_user',
//                data: 'data=' + encodeURIComponent(angular.toJson($scope.operatordata)),
//                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
//            }).success(function (jsondata) {
//                console.log(jsondata);
//                if (jsondata.type == 'SUCCESS') {
//                    alert(jsondata.msg);
//                    $scope.operatordata = {};
//                } else {
//                    alert(jsondata.msg);
//                }
//            });
//        };
//
//        if ($stateParams.param) {
//            console.log($stateParams.param);
//        }

//    }]);

