	/*
		Controller Name : transactionCtrl

		Used in admin panel for showing payment transactions

	*/


	adminApp.controller('transactionCtrl', function($interval,$timeout, $http, $scope, $routeParams, $uibModal, $log){
		// shows loader each time controller is loaded 
		$scope.showLoader	= true;

		$scope.tableList = function(){
			$timeout(function(){
			$('#setDataTable').DataTable({
		        dom: 'Bfrtip',
		        "lengthMenu": [ 10, 25, 50, 75, 100 ],
		        buttons: [
					          {
					             extend: 'collection',
					             text: 'Export',
					             buttons: [ 'pdfHtml5', 'csvHtml5', 'copyHtml5', 'excelHtml5' ]
					          }
		       	]
		    } );
			}, 200);


			$http.get( baseurl+'admin/get_transactions' ).success( function(response) {
				console.log('response', response);

				if ( response.status == 1 ) {

					$scope.Transactions = response.data;
					
					$timeout(function(){
						$scope.showLoader	= false;
					}, 500);

				} else {
					
					$scope.Transactions = {};
				}

			}).error( function(err) {

				console.log(err);
			});

		}

		if($routeParams.transactionId){
         
			$http.get( baseurl+'admin/get_transaction_details/'+$routeParams.transactionId ).success( function(response) {

				console.log( response );

				if ( response.status == 1 ) {

					$scope.Tutor = response.data;

					$timeout(function(){
						$scope.showLoader	= false;
					}, 200);
				} else {
					
					$scope.Tutor = {};
				}

			}).error( function(err) {

				console.log(err);
			});
    
    }


    /* Modal settings */
			$scope.open = function (size, parentSelector, mytemplateUrl, submitUrl, afterSave, editData) {
		    var parentElem = parentSelector ? 
		      angular.element($document[0].querySelector('.modal-demo ' + parentSelector)) : undefined;
		    	
		    	var modalInstance = $uibModal.open({
			      ariaLabelledBy: 'modal-title',
			      ariaDescribedBy: 'modal-body',
			      templateUrl: mytemplateUrl,
			      controller: 'ModalInstanceCtrl',
			      scope: $scope,
			      size: size,
			      appendTo: parentElem,
			      resolve: {
			        
			      }
		    	});


		    // set function where form will be submited in scope
		    $scope.submitUrl 	= submitUrl;
		    
		    if ( editData ) {

		    	$scope.formData = editData;
		    } else {

		    	$scope.formData = {};
		    }

		    modalInstance.result.then(function () {
		      
		      $log.info('Modal closed');
		    }, function () {
		      
		      $log.info('Modal dismissed');
		    });
		  };
		

	});


	adminApp.controller('ModalInstanceCtrl', function ($scope, $uibModalInstance, $http, $timeout) {
  
  $scope.ok = function () {
  	if ( $scope.submitUrl ) 
  	{
  		// console.log($scope.formData);
	  	alertify.dismissAll();
	  	$http.post( baseurl+'admin/'+$scope.submitUrl, $scope.formData ).success( function(response) {
	  		
	  		// console.log(response);
	  		if ( response.status == 1 ) {
	  			
	  			$timeout( function(){

	  				alertify.success(response.data);
    				$uibModalInstance.close();
	  			}, 500);
	  		} else {
	  			
	  			alertify.error(response.data);
	  		}

	  	}).error( function(err) {
	  		
	  		console.log(err);
	  	});

  	}


  };

  $scope.cancel = function () {
    $uibModalInstance.dismiss('cancel');
  };


});
