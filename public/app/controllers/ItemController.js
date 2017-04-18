app.controller('AdminController', function($scope,$http){
 
  $scope.pools = [];
   
});

app.controller('ItemController', function(dataFactory,$scope,$http){

  $scope.data = [];
  $scope.libraryTemp = {};
  $scope.totalItemsTemp = {};

  $scope.totalItems = 0;
  $scope.pageChanged = function(newPage) {
    getResultsPage(newPage);
  };

  getAllResults();
  function getAllResults() {
    dataFactory.httpRequest('/card').then(function(data) {
      $scope.data = data.data;
      $scope.totalItems = data.total;
    });
  }

  $scope.remove = function(item,index){
    var result = confirm("Are you sure buy this item?");
   	if (result) {
      dataFactory.httpRequest('card/'+item.id,'DELETE').then(function(data) {
          $scope.data.splice(index,1);
      });
    }
  }

});