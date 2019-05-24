<?php
   $open="bangluong";
   require_once __DIR__. "/../../autoload/autoload.php";

      
      $admin = $db->fetchAll("bangluong");
      $data =
         [
           "name"         =>  postInput('name'),
           "congviec"     =>  postInput('congviec'),
           "tonggiolam"        =>  postInput("tonggiolam"),
           "tienthuong"      =>  postInput("tienthuong"),
           "tienphat"        =>  postInput("tienphat"),
           "congmotgio"     =>  postInput("congmotgio"),
           
         ];

      if ($_SERVER["REQUEST_METHOD"] == "POST") 
      {

         

       $error = [];
        if (postInput('name') == '' )
        {
          $error['name'] = "Mời bạn nhập đầy đủ tên  nhân viên";
        }

        if (postInput('congviec') == '' )
        {
          $error['congviec'] = "Mời bạn nhập công việc cho nhân viên";
        }
        
        if (postInput('tonggiolam') == '' )
        {
          $error['tonggiolam'] = "Mời bạn nhập tổng số giờ làm của nhân viên";
        }
        if (postInput('tienthuong') == '' )
        {
          $error['tienthuong'] = "Mời bạn nhập số tiền thưởng";
        }

        if (postInput('tienphat') == '' )
        {
          $error['tienphat'] = "Mời bạn nhập số tiền phạt";
        }

        if (postInput('congmotgio') == '' )
        {
          $error['congmotgio'] = "Mời bạn nhập tiền công một giờ";
        }

        




        

        //error trống có nghĩa ko có lỗi
        if (empty($error)) 
        {
          

          $id_insert = $db->insert("bangluong",$data);
          if($id_insert)
          {
            
            $_SESSION['success'] = "Thêm mới thành công";
            redirectAdmin("bangluong");
          }
         else
         {
          $_SESSION['error'] = "Thêm mới thất bại";
         }

        }
    }
     
?>
<?php
   require_once __DIR__. "/../../layouts/header.php";
?>

            <!-- Page heading NOIDUNG -->
           <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        
        <div class="col-10">
          <h7>Thêm mới lương của nhân viên</h7>         
        </div>        
      </ol>
      <div class="clearfix"></div>
       <!-- thông báo lỗi -->
          <?php require_once __DIR__. "/../../../partials/notification.php";?>
          
          <!-- <div class="col-md-10"> chỉnh độ dài --> 
      <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
          
          <div class="form-group">           
            <label for="inputEmail3" class="col-sm-2 control-label">Họ và tên</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" id="inputEmail3" placeholder="Tên nhân viên" name="name" value="<?php echo $data['name']?>">
            <?php if (isset($error['name'])): ?>
              <p class="text-danger"> <?php echo $error['name']?></p>
            <?php endif?>
          </div>
          </div>

          <div class="form-group">           
            <label for="exampleInputEmail1">Công việc</label>
            <input class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="bán hàng" name="congviec" value="<?php echo $data['congviec']?>">
            <?php if (isset($error['congviec'])): ?>
              <p class="text-danger"> <?php echo $error['congviec']?></p>
            <?php endif?>
          </div>

          <div class="form-group">           
            <label for="exampleInputEmail1">Tổng số giờ làm (h)</label>
            <input class="form-control" id="exampleInputEmail1" type="number" aria-describedby="emailHelp" placeholder="500" name="tonggiolam" value="<?php echo $data['tonggiolam']?>">
            <?php if (isset($error['tonggiolam'])): ?>
              <p class="text-danger"> <?php echo $error['tonggiolam']?></p>
            <?php endif?>
          </div>

          <div class="form-group">           
            <label for="exampleInputEmail1">Số tiền thưởng (USD)</label>
            <input class="form-control" id="exampleInputEmail1" type="number" aria-describedby="emailHelp" placeholder="100" name="tienthuong" value="<?php echo $data['tienthuong']?>">
            <?php if (isset($error['tienthuong'])): ?>
              <p class="text-danger"> <?php echo $error['tienthuong']?></p>
            <?php endif?>
          </div>

          <div class="form-group">           
            <label for="exampleInputEmail1">Số tiền phạt (USD)</label>
            <input class="form-control" id="exampleInputEmail1" type="number" aria-describedby="emailHelp" placeholder="100" name="tienphat" value="<?php echo $data['tienphat']?>">
            <?php if (isset($error['tienphat'])): ?>
              <p class="text-danger"> <?php echo $error['tienphat']?></p>
            <?php endif?>
          </div>

          <div class="form-group">           
            <label for="exampleInputEmail1">Công một giờ (USD)</label>
            <input class="form-control" id="exampleInputEmail1" type="number" aria-describedby="emailHelp" placeholder="2" name="congmotgio" value="<?php echo $data['congmotgio']?>">
            <?php if (isset($error['congmotgio'])): ?>
              <p class="text-danger"> <?php echo $error['congmotgio']?></p>
            <?php endif?>
          </div>


         

          

                  

          </div>



          <!-- <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">giá sản phẩm</label>
            <div class="col-sm-3">
              <input type="number" class="form-control" id="inputEmail3" placeholder="10%" name="sale" value="0">
          </div> -->

          
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-success">Lưu</button>
            </div>
          </div>
          
        </form>
      </div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
         
  <?php
   require_once __DIR__. "/../../layouts/footer.php";
?>