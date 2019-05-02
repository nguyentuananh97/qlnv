<?php 
    include_once("views/layout/header.php");
 ?>
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
              		<h5 class="breadcrumbs-title">Trang chủ</h5>
              		<ol class="breadcrumbs">
                		<li>
                			<a href="index.html">Trang chủ</a>
                		</li>
              		</ol>
            	</div>
          	</div>
        </div>

    </div>
    <!-- breadcrumbs end -->
    <div class="container">
    	<?php 
            date_default_timezone_set("Asia/Ho_Chi_Minh");
    		$date = date('Y-m-d');
    		$day =  explode("-",$date)[1]."-".explode("-",$date)[2];
    		$birthday = explode("-",$_SESSION['user']['dob'])[1]."-".explode("-",$_SESSION['user']['dob'])[2];
    		if($day == $birthday){
    			echo "<h5>FLASH SOFT chúc bạn một ngày sinh nhật vui vẻ. Chúc bạn luôn thành công trong cuộc sống</h5>";
    		}	
    	?>
    </div>
</section>
 <?php 
    include_once("views/layout/footer.php");
?>

<script type="text/javascript">
	
	
</script>