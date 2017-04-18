

app.controller('ProductController', function(dataFactory,$scope,$http){

  $scope.data = [];
  $scope.libraryTemp = {};
  $scope.totalItemsTemp = {};

  $scope.totalItems = 0;
  $scope.pageChanged = function(newPage) {
    getResultsPage(newPage);
  };

  getResultsPage(1);
  function getResultsPage(pageNumber) {
        dataFactory.httpRequest('/products?page='+pageNumber).then(function(data) {
          $scope.data = data.data;
          $scope.totalItems = data.total;
        });
  }

  $scope.saveAdd = function(){
    dataFactory.httpRequest('products','POST',{},$scope.form).then(function(data) {
      $scope.data.push(data);
      $(".modal").modal("hide");
    });
  }

  $scope.edit = function(id){
    dataFactory.httpRequest('products/'+id+'/edit').then(function(data) {
    	console.log(data);
      	$scope.form = data;
    });
  }

  $scope.saveEdit = function(){
    dataFactory.httpRequest('products/'+$scope.form.id,'PUT',{},$scope.form).then(function(data) {
      	$(".modal").modal("hide");
        $scope.data = apiModifyTable($scope.data,data.id,data);
    });
  }

  $scope.remove = function(item,index){
    var result = confirm("Are you sure delete this item?");
   	if (result) {
      dataFactory.httpRequest('products/'+item.id,'DELETE').then(function(data) {
        $scope.data.splice(index,1);
        $scope.$apply();
      });
    }
  }

  $scope.voucherOpen = function(id){
    dataFactory.httpRequest('products/'+id+'/edit').then(function(data) {
      console.log(data);
      $scope.form = data;
    });
  }

  $scope.voucher = function(){
    $scope.form.product_id = $scope.form.id
    console.log($scope.form);
    dataFactory.httpRequest('pv','POST',{},$scope.form).then(function(data) {
      //$scope.data.push(data);
      $(".modal").modal("hide");
    });
  }

  $scope.buy = function(item,index){
      dataFactory.httpRequest('cards','POST',{},{id:item.id}).then(function(data) {
        console.log(data);
      });


  }
   
});