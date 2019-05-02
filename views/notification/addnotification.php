<?php 
    include_once("views/layout/header.php");
 ?>
<section id="content" >
	<div id="breadcrumbs-wrapper">
        <!-- Search for small screen -->
        <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
          	<input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
        </div>
        <div class="container">
          	<div class="row">
            	<div class="col s10 m6 l6">
              		<h5 class="breadcrumbs-title">Thông báo</h5>
              		<ol class="breadcrumbs">
                		<li>
                			<a href="index.html">Trang chủ</a>
                		</li>
                		<li class="active">Thông báo</li>
              		</ol>
            	</div>
          	</div>
        </div>

    </div>
    <div class="container">
    	<form method="post" action="?mod=notification&act=store">
		    <div class="row">
		    	<div class="input-field">
		        	<label >Chủ đề</label>
		        	<input  name="title" type="text" >
		      	</div>
		      	<div class="input-field">
		        	<label >Nội dung</label>
		        	<textarea class="materialize-textarea" name="content"></textarea>
		      	</div>
		      	<div class="input-field">
		        	<button class="btn waves-effect waves-light right submit" type="submit" name="submit" ng-click="addEmployee()">Gửi
		          		<i class="material-icons right">send</i>
		        	</button>
		      	</div>
		    </div>
		    
		</form>


    </div>
</section>
  <?php 
    include_once("views/layout/footer.php");
?>