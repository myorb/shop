app.controller('VoucherController', function(dataFactory,$scope,$http){
 
  $scope.data = [];
  $scope.libraryTemp = {};
  $scope.totalvouchersTemp = {};

  $scope.totalvouchers = 0;
  $scope.pageChanged = function(newPage) {
    getResultsPage(newPage);
  };

  getResultsPage(1);
  function getResultsPage(pageNumber) {
        dataFactory.httpRequest('/vouchers?page='+pageNumber).then(function(data) {
          $scope.data = data.data;
          $scope.totalvouchers = data.total;
        });
  }

  $scope.searchDB = function(){
      if($scope.searchText.length >= 3){
          if($.isEmptyObject($scope.libraryTemp)){
              $scope.libraryTemp = $scope.data;
              $scope.totalvouchersTemp = $scope.totalvouchers;
              $scope.data = {};
          }
          getResultsPage(1);
      }else{
          if(! $.isEmptyObject($scope.libraryTemp)){
              $scope.data = $scope.libraryTemp ;
              $scope.totalvouchers = $scope.totalvouchersTemp;
              $scope.libraryTemp = {};
          }
      }
  }

  $scope.saveAdd = function(){
    dataFactory.httpRequest('vouchers','POST',{},$scope.form).then(function(data) {
      $scope.data.push(data);
      $(".modal").modal("hide");
    });
  }

  $scope.edit = function(id){
    dataFactory.httpRequest('vouchers/'+id+'/edit').then(function(data) {
    	console.log(data);
      	$scope.form = data;
    });
  }

  $scope.saveEdit = function(){
    dataFactory.httpRequest('vouchers/'+$scope.form.id,'PUT',{},$scope.form).then(function(data) {
      	$(".modal").modal("hide");
        $scope.data = apiModifyTable($scope.data,data.id,data);
    });
  }

  $scope.remove = function(item,index){
    var result = confirm("Are you sure delete this item?");
   	if (result) {
      dataFactory.httpRequest('vouchers/'+item.id,'DELETE').then(function(data) {
          $scope.data.splice(index,1);
      });
    }
  }
   
});