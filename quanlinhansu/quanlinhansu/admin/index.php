<?php 
	require_once __DIR__. "/autoload/autoload.php" ;

	$admin = $db->fetchAll("admin")
?>



<?php require_once __DIR__. "/layouts/header.php" ; ?>
                    <!-- Page Heading -->
                    <div class="row" style="background: #eceff2; padding-top: 50px;">
                        <div class="col-lg-12">
                            <h1 class="page-header" style="text-align:center;">
                                Chào mừng bạn đến với trang quản lí nhân sự
                            </h1>
                        <div>
                    <img  src="../SHOP/IMAGE/logoch.png" style="display: block; margin-left: auto;margin-right: auto; width: 20%;">     
                            
                        </div>
                    </div>
                    
                    <!-- /.row -->

<?php require_once __DIR__. "/layouts/footer.php" ; ?>