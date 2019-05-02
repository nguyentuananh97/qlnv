<!-- Header -->
<?php 
    include_once("views/layout/header.php");
 ?>
 <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.8/angular-material.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" type="text/css" rel="stylesheet">

<!-- Content -->
 <section ng-app="employeeApp" ng-controller="employeeController" id="content" >
	<!-- breadcrumbs start -->
    <div id="breadcrumbs-wrapper">
        <!-- Search for small screen -->
        <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
          	<input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
        </div>
        <div class="container">
          	<div class="row">
            	<div class="col s10 m6 l6">
              		<h5 class="breadcrumbs-title">Danh sách</h5>
              		<ol class="breadcrumbs">
                		<li>
                			<a href="index.html">Trang chủ</a>
                		</li>
                		<li>
                			<a href="#">Nhân viên</a>
                		</li>
                		<li class="active">Danh sách</li>
              		</ol>
            	</div>
            	<div class="col s2 m6 l6">
              		<a class="btn waves-effect waves-light gradient-45deg-light-blue-cyan gradient-shadow breadcrumbs-btn right" ng-click="openDialog(null, <?= $_SESSION['user']['role_id'] ?>)" style="border-radius: 50px" 
						<?php 
							if ($_SESSION['user']['role_id'] != 1) {
								echo "disabled";
							}
						?>
              		>
                		<span class="hide-on-small-onl">Thêm mới</span>
                		<!-- <i class="material-icons right">add</i> -->
              		</a>
            	</div>
          	</div>
        </div>
    </div>
    <!-- breadcrumbs end -->
    <!-- start container -->
    <div class="container" >
      	<div class="row" style="margin-top:20px">
      		<input class="col s2 m6 l11" type="text" name="name" ng-model="txtName" placeholder="Tìm kiếm...">
      		<button class="btn waves-effect waves-light gradient-45deg-purple-deep-orange gradient-shadow right" ng-click="search(txtName)" style="width: 30px;border-radius: 50%"><i class="material-icons" style="font-size: 25px;margin-left:-10px">search</i></button>
      		
	    	<div class="col-lg-12">
	 			<div class="panel panel-default">
	                <div class="panel-body">
	                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables" style="border-bottom: 1px solid 	#696969" >
				            <thead>
				                <tr>
				                    <th style="text-align: center;border-bottom:none">Code</th>
				                    <th style="text-align: center;border-bottom:none">Họ và tên</th>
				                    <th style="text-align: center;border-bottom:none">Email</th>
				                    <th style="text-align: center;border-bottom:none">Hoạt động</th>
				                </tr>
				            </thead>
				            <tbody>
				                <tr ng-repeat="employee in employees">
				                    <td style="width: 100px;text-align: center;">{{ employee.code }}</td>
						      		<td style="width: 175px;text-align: center;">{{ employee.name }}</td>
						     	 	<td  style="width: 175px;text-align: center;">{{ employee.email }}</td>
				                    <td style="width: 200px;text-align: center;" >
		        						<a href="#modal_detail" class="btn waves-effect waves-light gradient-45deg-green-teal gradient-shadow modal-trigger" style="width: 36px !important" 
		        						ng-click="detailEmployee(employee.id)"><i class="material-icons" style="margin-left: -10px">remove_red_eye</i></a>
		        						<a class="btn waves-effect waves-light gradient-45deg-amber-amber gradient-shadow" style="width: 36px" ng-click="openDialog(employee.id, <?= $_SESSION['user']['role_id'] ?>)"><i class="material-icons" style="margin-left: -10px">edit</i></a>

		        						<a  class="btn waves-effect waves-light gradient-45deg-red-pink gradient-shadow" ng-click="delUser(employee.id,ev, <?= $_SESSION['user']['role_id'] ?>)" style="width: 36px"><i class="material-icons"  style="margin-left: -10px">delete</i></a>
		        					</td>
				                </tr>
				            </tbody> 
	                    </table>
	                    <ul class="pagination right">
						    <li ng-class="{disabled : thisPage === 0}">
						    	<a href="#!" ng-click="thisPage !== 0 && goToPage(thisPage - 1)"><i class="material-icons">chevron_left</i></a>
						    </li>
						    <li ng-repeat="p in sizep" ng-class='{active : thisPage === $index}'>
						    	<a a href="#!" ng-click="goToPage($index)" ng-bind="$index + 1"></a>
						    </li>
						    <li class="waves-effect" ng-class="{disabled : thisPage === sizep.length - 1}">
						    	<a href="#!"  ng-click="thisPage !== sizep.length - 1 && goToPage(thisPage + 1)"><i class="material-icons">chevron_right</i></a>
						    </li>
						  </ul>
	                </div>
	            </div>
			</div>
		</div>
    </div>
    <!-- end container -->
    <!-- Modal Structure -->
	
	<div id="modal_detail" class="modal">
	    <div class="modal-content">
	      	<h5>Thông tin chi tiết</h5>
	      	<div class="row">
				<div class="col m4 l4 " align="center"><img src="public/images/{{person.image}}" style="width: 200px !important;height: 200px !important" class="circle"></div>
		 		<div class=" col m8 l8"> 
					<table class="table" >
						<tbody>
							<tr >
		                    	<td style="border: 0 !important">Mã nhân viên : </td>
		                    	<td style="border: 0 !important" >{{person.code}}</td>
		                    </tr>
		                    <tr>
		                        <td style="border: 0 !important">Họ và tên : </td>
		                        <td style="border: 0 !important">{{person.name}}</td>
		                  	</tr>
		                  	<tr>
		                    	<td style="border: 0 !important">Ngày sinh : </td>
		                    	<td style="border: 0 !important">{{person.dob}}</td>
		                  	</tr>
		                  	<tr>
		                    	<td style="border: 0 !important">Email : </td>
		                    	<td style="border: 0 !important"><a href=" {{person.email}} ">{{person.email}}</a></td>
		                  	</tr>
			                <tr>
		                    	<td style="border: 0 !important">Số điện thoại : </td>
		                    	<td style="border: 0 !important">{{person.phone_number}}</td>
		                    </tr>
		                    <tr>
		                    	<td style="border: 0 !important">Địa chỉ : </td>
		                    	<td style="border: 0 !important">{{person.address}}</td>
		                    </tr>
		                    <tr>
		                    	<td style="border: 0 !important">Tham gia từ : </td>
		                    	<td style="border: 0 !important">{{person.joined_date}}</td>
		                    </tr>
		                </tbody>
		            </table>  
		        </div>                
			</div>
	    </div>
	</div>
</section>
 


<!-- Footer -->
<?php 
    include_once("views/layout/footer.php");
?>
<!--data-->
<!-- material  -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-animate.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-aria.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-messages.min.js"></script>
  <script src="public/js/angular-material.js"></script>

<!--  -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script type="text/javascript" src="public/js/form-file-upload.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

<script type="text/javascript">
	var app = angular.module('employeeApp', ['ngMaterial']);
	app.config(function($mdDateLocaleProvider) {
	    $mdDateLocaleProvider.formatDate = function(date) {
	       return moment(date).format('DD/MM/YYYY');
	    };
	});
	app.controller('employeeController', function($scope, $http, $mdDialog, $rootScope, $mdToast){
	 	$scope.thisPage = 0;
	 	$scope.pageSize = 10;
	 	$scope.txtName = "";
	 	$scope.user = {
	 		id : null,
	 		name : '',
	 		code : '',
	 		email : '',
	 		password : '',
	 		role_id : 1,
	 		phone_number : '',
	 		address: '',
	 		dob : new Date(),
	 		joined_date : new Date(),
	 		image : ''
	 	}
	 	/**/
	 	$scope.detailEmployee = function(id){
	 		$http({
			    url: "?mod=user&act=detail&code="+id,
			    method: "GET"
			}).then(function successCallback(response) {
					console.log(response.data);
					$scope.person = response.data;
					var dob = new Date($scope.person.dob);
					var join = new Date($scope.person.joined_date);
					$scope.person.dob = dob.getDate()+"-"+(dob.getMonth()+1)+"-"+dob.getFullYear();
					$scope.person.joined_date = join.getDate()+"-"+(join.getMonth()+1)+"-"+join.getFullYear();
			    }, function errorCallback(response) {
			        $scope.error = response.statusText;
			});
	 	}
	 	$rootScope.showToastTrue = function() {
	        $mdToast.show (
              	$mdToast.simple()
              	.content('Thành công!')
              	.position('top right')                       
              	.hideDelay(2000)
           );
	    }
	    $rootScope.showToastFalse = function() {
	        $mdToast.show (
              	$mdToast.simple()
              	.content('Thất bại!')
              	.position('top right')                       
              	.hideDelay(2000)
           );
	    }
	    $rootScope.showToastRole = function() {
	        $mdToast.show (
              	$mdToast.simple()
              	.content('Bạn không thể thực hiện hành động này!')
              	.position('top right')                       
              	.hideDelay(2000)
           );
	    }
	 	$scope.openDialog = function(id,role_id){
	 		if(role_id == 1){
	 			$mdDialog.show({
	                controller: DialogController,
	                templateUrl: 'views/layout/dialog/addDialog.html',
	                parent: angular.element(document.body),
	                locals: {
			           user: $scope.user
			        },
	                clickOutsideToClose:true
	            });
	 		}else{
	 			$rootScope.showToastRole();
	 		}
	 		
            function DialogController($scope, $mdDialog, $http, $rootScope, user) {
            	if(id===null){
	            	$scope.user = user;
            	}else{
            		$http({
					    url: "?mod=user&act=detail&code="+id,
					    method: "GET"
					}).then(function successCallback(response) {
							$scope.user = response.data;
							$scope.user.dob = new Date(response.data.dob)
							$scope.user.joined_date = new Date(response.data.joined_date)
					    }, function errorCallback(response) {
					        $scope.error = response.statusText;
					});
            	}
            	$http.get('?mod=user&act=list-role')
            	.then(function(res){
            		console.log(res.data)
            		$scope.roles = res.data;
            	})
            	 
            	$scope.updateUser = function(){
			 		//var formData = { password: 'test pwd', email : 'test email' };
			 		var url = "?mod=user&act=";
			 		if($scope.user.id == null){
			 			url += "store";
			 		}else{
			 			url += "update";
			 		}
		            var postData = JSON.stringify($scope.user);
			 		$http({
					    url: url,
					    method: "POST",
					    data : postData,
					    headers : {'Content-Type': 'application/x-www-form-urlencoded'}
					}).then(function successCallback(response) {
						console.log(response)
						if(response.data === "true"){
							$mdDialog.hide();
							$rootScope.showToastTrue();
							$rootScope.load();
						}
					    }, function errorCallback(response) {
					        $scope.error = response.statusText;
					        $rootScope.showToastTrue();
					});
			 	}
		        $scope.closeDialog = function() {
		          $mdDialog.hide();
		        }
		      }
	 	}
	 	/*--- util ---*/
	 	
	 	/**/
	 	$rootScope.load = function(){
	 		$http({
			    url: "?mod=user&act=listuser&page=" + $scope.thisPage + "&pageSize="+$scope.pageSize + "&name="+$scope.txtName ,
			    method: "GET"
			}).then(function successCallback(response) {
			        $scope.employees = response.data.data;
			        $scope.sizep = response.data.size;
			    }, function errorCallback(response) {
			        $scope.error = response.statusText;
			});
	 	}
	 	$rootScope.load();
	 	$scope.goToPage = function(thisPage){
	 		$scope.thisPage = thisPage;
	 		$rootScope.load();
	 	}
	 	$scope.search = function(txtName){
 			$scope.txtName = txtName;
 			$rootScope.load();
	 	}
	 	$scope.delUser = function(id,ev,role_id){
	 		if(role_id == 1){
	 			var confirm = $mdDialog.confirm()
		          .title('Bạn có chắc chắn xóa không?')
		          .textContent('Mục này sẽ được xóa khỏi cơ sở dữ liệu')
		          .ariaLabel('Delete')
		          .targetEvent(ev)
		          .ok('Xác nhận')
		          .cancel('Hủy bỏ');

			    $mdDialog.show(confirm).then(function() {
				    $http({
					    url: "?mod=user&act=delete" ,
					    method: "POST",
					    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		    			data: $.param({
		    				id : id
		    			})
					}).then(function successCallback(response) {
						$rootScope.showToastTrue();
					    $rootScope.load();  
					});  
			    }, function() {
			      
			    }); 
	 		}else{
	 			$rootScope.showToastRole();
	 		}
	 	}
	 	
	 	
	});
	$(document).ready(function(){
		$('.modal').modal();
	})
	
	
</script>
