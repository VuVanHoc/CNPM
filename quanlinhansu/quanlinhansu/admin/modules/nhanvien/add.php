<?php
   $open="nhanvien";
   require_once __DIR__. "/../../autoload/autoload.php";

      
      $admin = $db->fetchAll("nhanvien");
      $data =
         [
           "name"         =>  postInput('name'),
           "birthday"     =>  postInput('birthday'),
           "email"        =>  postInput("email"),
           "address"      =>  postInput("address"),
           "phone"        =>  postInput("phone"),
           "password"     =>  postInput("password"),
           "address"      =>  postInput("address"),
           "congviec"      =>  postInput("congviec"),
           "gioitinh"        =>  postInput("gioitinh")

         ];

      if ($_SERVER["REQUEST_METHOD"] == "POST") 
      {

         

       $error = [];
        if (postInput('name') == '' )
        {
          $error['name'] = "Mời bạn nhập đầy đủ tên  nhân viên";
        }

        if (postInput('email') == '' )
        {
          $error['email'] = "Mời bạn nhập email";
        }
        else
        {
          $is_check=$db->fetchOne("admin","email='".$data['email']."'");
          if($is_check!=NULL)
          {
            $error['email']="Email đã tồn tại";
          }
        }

        if (postInput('phone') == '' )
        {
          $error['phone'] = "Mời bạn nhập số điện thoại";
        }
        if (postInput('birthday') == '' )
        {
          $error['birthday'] = "Mời bạn nhập ngày sinh";
        }

        if (postInput('password') == '' )
        {
          $error['password'] = "Mời bạn nhập mật khẩu";
        }

        if (postInput('address') == '' )
        {
          $error['address'] = "Mời bạn nhập địa chỉ";
        }

        if ($data['password'] != postInput("re_password"))
        {
          $error['password'] = "Mật khẩu không khớp";
        }




        

        //error trống có nghĩa ko có lỗi
        if (empty($error)) 
        {
          

          $id_insert = $db->insert("nhanvien",$data);
          if($id_insert)
          {
            
            $_SESSION['success'] = "Thêm mới thành công";
            redirectAdmin("nhanvien");
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
          <h7>Thêm mới nhân viên</h7>         
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
            <label for="exampleInputEmail1">Email</label>
            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="email@gmail.com" name="email" value="<?php echo $data['email']?>">
            <?php if (isset($error['email'])): ?>
              <p class="text-danger"> <?php echo $error['email']?></p>
            <?php endif?>
          </div>

         

          <div class="form-group">           
            <label for="exampleInputEmail1">Ngày sinh</label>
            <input class="form-control" id="exampleInputEmail1" type="date" aria-describedby="emailHelp" placeholder="02-10-1999" name="birthday" value="<?php echo $data['birthday']?>">
            <?php if (isset($error['birthday'])): ?>
              <p class="text-danger"> <?php echo $error['birthday']?></p>
            <?php endif?>
          </div>

          <div class="form-group">           
            <label for="exampleInputEmail1">Số điện thoại</label>
            <input class="form-control" id="exampleInputEmail1" type="number" aria-describedby="emailHelp" placeholder="0961314556" name="phone" value="<?php echo $data['phone']?>">
            <?php if (isset($error['phone'])): ?>
              <p class="text-danger"> <?php echo $error['phone']?></p>
            <?php endif?>
          </div>


          <div class="form-group">           
            <label for="exampleInputEmail1">Mật khẩu</label>
            <input class="form-control" id="exampleInputEmail1" type="password" aria-describedby="emailHelp" placeholder="******" name="password">
            <?php if (isset($error['password'])): ?>
              <p class="text-danger"> <?php echo $error['password']?></p>
            <?php endif?>
          </div>

          <div class="form-group">           
            <label for="exampleInputEmail1">Nhập lại mật khẩu</label>
            <input class="form-control" id="exampleInputEmail1" type="password" aria-describedby="emailHelp" placeholder="******" name="re_password" required="">
            <?php if (isset($error['re_password'])): ?>
              <p class="text-danger"> <?php echo $error['re_password']?></p>
            <?php endif?>
          </div>

          <div class="form-group">           
            <label for="exampleInputEmail1">Địa chỉ</label>
            <input class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Ha Nam" name="address" value="<?php echo $data['address']?>">
            <?php if (isset($error['address'])): ?>
              <p class="text-danger"> <?php echo $error['address']?></p>
            <?php endif?>
          </div>



           

          <div class="form-group">           
            <label for="exampleInputEmail1">Giới tính</label>
            <select class="form-control" name="gioitinh">
              <option value="Nam" <?php echo isset($data['gioitinh']) && $data['gioitinh'] =='Nam' ?"selected = 'selected'":'' ?>>Nam</option>
              <option value="Nữ
            " <?php echo isset($data['gioitinh']) && $data['gioitinh'] =='Nữ' ?"selected = 'selected'":'' ?>>Nữ</option>              
            </select>
            <?php if (isset($error['gioitinh'])): ?>
              <p class="text-danger"> <?php echo $error['gioitinh']?></p>
            <?php endif?>
          </div>  


          <div class="form-group">           
            <label for="exampleInputEmail1">Công Việc</label>
            <select class="form-control" name="congviec">
              <option value="Bảo Vệ" <?php echo isset($data['congviec']) && $data['congviec'] == 'Bảo Vệ' ?"selected = 'selected'":'' ?>>Bảo Vệ</option>
              <option value="Bán Hàng" <?php echo isset($data['congviec']) && $data['congviec'] =='Bán Hàng' ?"selected = 'selected'":'' ?>>Bán Hàng</option> 
              <option value="Xếp Kho" <?php echo isset($data['congviec']) && $data['congviec'] =='Xếp Kho '?"selected = 'selected'":'' ?>>Xếp Kho</option>              
            </select>
            <?php if (isset($error['congviec'])): ?>
              <p class="text-danger"> <?php echo $error['congviec']?></p>
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