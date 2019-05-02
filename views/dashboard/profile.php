<?php 
    include_once("views/layout/header.php");
 ?>

 <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.8/angular-material.min.css">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" type="text/css" rel="stylesheet">

 <style type="text/css">
  .name_user{
    color: white;
    position: absolute;
    top:30px;
    left: 200px;
  }
 </style>
<!-- Content -->
<section id="content"  ng-app="myApp" ng-controller="myController">
	<div class="container">
  	<div id="profile-page" class="section">
    		<div id="profile-page-header" class="card" style="background: url('public/images/gallary/23.png'); background-size: 100% 250px">
          <h4 class="name_user"  > {{user.name}}</h4>
      		<a class="modal-trigger" href="#modal1"><figure class="card-profile-image">
        			<img src="public/images/<?= $_SESSION['user']['image']?>" alt="profile image" class="circle responsive-img gradient-45deg-light-blue-cyan gradient-shadow" id="profile" style="width: 110px !important;height: 110px !important">
      		</figure></a>
      		<div class="card-content" >
        			<div class="row pt-2">
          			<div class="col s12 m1 right-align">
            				<a class="btn-floating activator waves-effect waves-light rec accent-2 right"><i class="material-icons">perm_identity</i></a>
          			</div>
        			</div>
      		</div>
      		<div class="card-reveal">
      			<p>
        			<span class="card-title grey-text text-darken-4">Thông tin chi tiết
          				<i class="material-icons right">close</i>
        			</span>
        			<span>
          				<i class="material-icons cyan-text text-darken-2">perm_identity</i>
                  <?php 
                    if($_SESSION['user']['role_id'] == 1){
                      echo "Quản lí";
                    }else{
                      echo "Nhân viên";
                    }
                   ?>
          			</span>
      			</p>
		        <p><i class="material-icons cyan-text text-darken-2">perm_phone_msg</i>{{user.phone_number}}</p>
		        <p><i class="material-icons cyan-text text-darken-2">email</i>{{user.email}}</p>
        		<p><i class="material-icons cyan-text text-darken-2">cake</i><?= $_SESSION['user']['dob']?></p>
        		<p><i class="material-icons cyan-text text-darken-2">date_range</i><?= $_SESSION['user']['joined_date']?></p>
           
      		</div>
    		</div>
    		 <div id="profile-page-content" class="row">
            <div id="profile-page-sidebar" class="col s12 m4">
              <div class="card cyan">
                <div class="card-content white-text">
                  <span class="card-title">Giới thiệu</span>
                  <p>{{user.name}} là một lập trình viên xuất sắc của FLASH SOFT. Với kĩ năng giỏi cũng như định hướng tốt cùng với 5 năm kinh nghiệm, {{user.name}} xứng đáng là một leader của team </p>
                </div>
              </div>
            </div>
            <div id="profile-page-sidebar" class="col s12 m8">
              <div class="card deep-orange">
                <div class="card-content">
                  <div class="col m5">
                    <a class="white-text waves-effect waves-light" ng-click="openDialog(<?= $_SESSION['user']['id']?>)">
                      <i class="material-icons">border_color</i>Thay đổi thông tin cá nhân
                    </a>
                  </div>
                  <div class="col m4">
                    <a class="white-text waves-effect waves-light" href="#UpdateStatus">
                      <i class="material-icons">date_range</i>Xem lịch làm việc
                    </a>
                  </div>
                </div>
              </div>
              <div id="AddPhotos" class="tab-content col s12  grey lighten-4">
                <div class="row">
                  <div class="col s2">
                    <img src="public/images/<?= $_SESSION['user']['image']?>" alt="" class="circle z-depth-2 responsive-img activator gradient-45deg-light-blue-cyan" style="width: 100px !important;height: 100px !important">
                  </div>
                  <div class="input-field col s10">
                    <textarea id="textarea" row="2" class="materialize-textarea"></textarea>
                    <label for="textarea" class="">Bạn đang nghĩ gì ?</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m6 share-icons">
                    <a href="#">
                      <i class="material-icons grey-text text-darken-1">camera_alt</i>
                    </a>
                    <a href="#">
                      <i class="material-icons grey-text text-darken-1">account_circle</i>
                    </a>
                    <a href="#">
                      <i class="material-icons grey-text text-darken-1">keyboard</i>
                      <a href="#">
                        <i class="material-icons grey-text text-darken-1">location_on</i>
                  </div>
                  <div class="col s12 m6 right-align">
                    <a class="waves-effect waves-light btn">
                      <i class="material-icons left">rate_review</i> Đăng</a>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
  <div id="modal1" class="modal">
    <div class="modal-content">
      <form action="?mod=user&act=avatar&id=<?= $_SESSION['user']['id']?>" method="post" enctype="multipart/form-data">
        <div class="input-field">
          <input type="file" name="avatar" id="input-file-now" class="dropify" >
        </div>
        <div class="input-field">
          <button class="btn waves-effect waves-light right submit" type="submit" name="submit" >Lưu
              <i class="material-icons right">send</i>
          </button>
        </div>
      </form>
    </div>
  </div>
</section>

<!-- End Content -->


 <?php 
    include_once("views/layout/footer.php");
?>


<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-animate.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-aria.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-messages.min.js"></script>
  <script src="public/js/angular-material.js"></script>

<script type="text/javascript" src="public/js/page-profile.js"></script>
<script type="text/javascript" src="https://pixinvent.com/materialize-material-design-admin-template/vendors/sparkline/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script type="text/javascript" src="public/js/form-file-upload.js"></script>
<script type="text/javascript">
  var app = angular.module('myApp', ['ngMaterial']);
  app.controller('myController', function($scope, $http, $mdDialog, $rootScope, $mdToast){
    $scope.user = {
      id : '<?= $_SESSION['user']['id']?>',
      name : '<?= $_SESSION['user']['name']?>',
      code : '<?= $_SESSION['user']['code']?>',
      email : '<?= $_SESSION['user']['email']?>',
      password : '<?= $_SESSION['user']['password']?>',
      role_id : <?= $_SESSION['user']['role_id']?>,
      phone_number : '<?= $_SESSION['user']['phone_number']?>',
      address: '<?= $_SESSION['user']['address']?>',
      dob : new Date('<?= $_SESSION['user']['dob']?>'),
      joined_date : new Date('<?= $_SESSION['user']['joined_date']?>')
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
    $scope.openDialog = function(id){
      $mdDialog.show({
          controller: DialogController,
          templateUrl: 'views/layout/dialog/addDialog.html',
          parent: angular.element(document.body),
          locals: {
         user: $scope.user
      },
          clickOutsideToClose:true
      });
    
      function DialogController($scope, $mdDialog, $http, $rootScope, user) {
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

          $http.get('?mod=user&act=list-role')
            .then(function(res){
              console.log(res.data)
              $scope.roles = res.data;
            })

          $scope.updateUser = function(){
                var postData = JSON.stringify($scope.user);
                $http({
                    url: '?mod=user&act=update',
                    method: "POST",
                    data : postData,
                    headers : {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function successCallback(response) {
                  console.log(response)
                  if(response.data === "true"){
                    $mdDialog.hide();
                    $rootScope.showToastTrue();

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
  });

  $(document).ready(function(){
    $('.modal').modal();
  })
</script>
