app.controller('AdminController', function($scope,$http){
 
  $scope.pools = [];
   
});

app.controller('ItemController', function(dataFactory,$scope,$http){

  $scope.data = [];

  getAllResults();
  function getAllResults() {
    dataFactory.httpRequest('cards').then(function(data) {
      console.log(data.data);
      $scope.data = data;
    });
  }

  $scope.pay = function(){
    dataFactory.httpRequest('cards/true','DELETE').then(function(data) {
        console.log(data);
        getAllResults();
      });
  }

  $scope.getTotal = function(){
    var total = 0;
    for(var i = 0; i < $scope.data.length; i++){
      var product = $scope.data[i];
      if(product.product_amount > 0){
        total = +total + +product.product_amount;
      }
    }
    return total;
  }

});