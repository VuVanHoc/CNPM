<?php
   $open="nhanvien";
   require_once __DIR__. "/../../autoload/autoload.php";

   $id = intval(getInput('id'));

   $Editadmin = $db->fetchID("nhanvien",$id);
   if(empty($Editadmin))
   {
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdmin("nhanvien");
   }

      /**
      * danh sách danh mục sản phẩm
      */
      $admin = $db->fetchAll("nhanvien");
     

      if ($_SERVER["REQUEST_METHOD"] == "POST") 
      {
         $data =
         [
           "name"         =>  postInput('name'),
           "birthday"     =>  postInput('birthday'),
           "email"        =>  postInput("email"),
           "address"      =>  postInput("address"),
           "phone"        =>  postInput("phone"),
           "password"     =>  postInput("password"),
           "address"      =>  postInput("address"),
           "gioitinh"        =>  postInput("gioitinh"),
            "congviec"        =>  postInput("congviec"),
           
         ];
         

       $error = [];
        if (postInput('name') == '' )
        {
          $error['name'] = "Mời bạn nhập đầy đủ tên nhân viên";
        }

        if (postInput('email') == '' )
        {
          $error['email'] = "Mời bạn nhập email";
        }
        else
        {
          if(postInput("email")!=$Editadmin['email'])
          {
          $is_check=$db->fetchOne("nhanvien","email='".$data['email']."'");
          if($is_check!=NULL)
          {
            $error['email']="Email đã tồn tại";
          }
        }
        }

        if (postInput('phone') == '' )
        {
          $error['phone'] = "Mời bạn nhập số điện thoại";
        }

        

        if (postInput('address') == '' )
        {
          $error['address'] = "Mời bạn nhập địa chỉ";
        }


        if(postInput('password')!=NULL&&postInput("re_password")!=NULL)
        {
          if(postInput('password')!=postInput('re_password'))
          {
            $error['password']="Mật khẩu thay đổi không khớp";
          }
          else
          {
            $data['password']=postInput("password");
          }
        }


        

        //error trống có nghĩa ko có lỗi
        if (empty($error)) 
        {
          
          $id_update = $db->update("nhanvien",$data,array("id"=>$id));
          if($id_update>0)
          {
            
            $_SESSION['success'] = "Cập nhật thành công";
            redirectAdmin("nhanvien");
          }
         else
         {
          $_SESSION['error'] = "Cập nhật thất bại";
          redirectAdmin("nhanvien");
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
          <h7>Sửa thông tin nhân viên</h7>         
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
            <input type="text" class="form-control" id="inputEmail3" placeholder="Tên admin" name="name" value="<?php echo $Editadmin['name']?>">
            <?php if (isset($error['name'])): ?>
              <p class="text-danger"> <?php echo $error['name']?></p>
            <?php endif?>
          </div>
          </div>

          

          <div class="form-group">           
            <label for="exampleInputEmail1">Email</label>
            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="a@gmail.com" name="email" value="<?php echo $Editadmin['email']?>">
            <?php if (isset($error['email'])): ?>
              <p class="text-danger"> <?php echo $error['email']?></p>
            <?php endif?>
          </div>

          <div class="form-group">           
            <label for="exampleInputEmail1">Ngày sinh</label>
            <input class="form-control" id="exampleInputEmail1" type="date" aria-describedby="emailHelp" placeholder="02-10-1999" name="birthday" value="<?php echo $Editadmin['birthday']?>">
            <?php if (isset($error['birthday'])): ?>
              <p class="text-danger"> <?php echo $error['birthday']?></p>
            <?php endif?>
          </div>

          <div class="form-group">           
            <label for="exampleInputEmail1">Phone</label>
            <input class="form-control" id="exampleInputEmail1" type="number" aria-describedby="emailHelp" placeholder="0354065353" name="phone" value="<?php echo $Editadmin['phone']?>">
            <?php if (isset($error['phone'])): ?>
              <p class="text-danger"> <?php echo $error['phone']?></p>
            <?php endif?>
          </div>


          <div class="form-group">           
            <label for="exampleInputEmail1">Password</label>
            <input class="form-control" id="exampleInputEmail1" type="password" aria-describedby="emailHelp" placeholder="******" name="password">
            <?php if (isset($error['password'])): ?>
              <p class="text-danger"> <?php echo $error['password']?></p>
            <?php endif?>
          </div>

          <div class="form-group">           
            <label for="exampleInputEmail1">ConfigPassword</label>
            <input class="form-control" id="exampleInputEmail1" type="password" aria-describedby="emailHelp" placeholder="******" name="re_password" >
            <?php if (isset($error['re_password'])): ?>
              <p class="text-danger"> <?php echo $error['re_password']?></p>
            <?php endif?>
          </div>

          <div class="form-group">           
            <label for="exampleInputEmail1">Address</label>
            <input class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Hà Nam" name="address" value="<?php echo $Editadmin['address']?>">
            <?php if (isset($error['address'])): ?>
              <p class="text-danger"> <?php echo $error['address']?></p>
            <?php endif?>
          </div>
 <div class="form-group">           
            <label for="exampleInputEmail1">Giới Tính</label>
            <select class="form-control" name="gioitinh">
              <option value="1" <?php echo isset($Editadmin['gioitinh']) && $Editadmin['gioitinh'] ==1 ?"selected = 'selected'":'' ?>>Nam</option>
              <option value="0" <?php echo isset($Editadmin['gioitinh']) && $Editadmin['gioitinh'] ==0 ?"selected = 'selected'":'' ?>>Nữ</option>              
            </select>
            <?php if (isset($error['gioitinh'])): ?>
              <p class="text-danger"> <?php echo $error['gioitinh']?></p>
            <?php endif?>
          </div>   

           <div class="form-group">           
            <label for="exampleInputEmail1">Công Việc</label>
            <select class="form-control" name="congviec">
              <option value="Bảo Vệ" <?php echo isset($Editadmin['congviec']) && $Editadmin['congviec'] == 'Bảo Vệ' ?"selected = 'selected'":'' ?>>Bảo vệ</option>
              <option value="Bán Hàng" <?php echo isset($Editadmin['congviec']) && $Editadmin['congviec'] =='Bán Hàng' ?"selected = 'selected'":'' ?>>Bán Hàng</option> 
               <option value="Xếp Kho" <?php echo isset($Editadmin['congviec']) && $Editadmin['congviec'] =="Xếp Kho" ?"selected = 'selected'":'' ?>>Xếp Kho</option>   

            </select>
            <?php if (isset($error['congviec'])): ?>
              <p class="text-danger"> <?php echo $error['congviec']?></p>
            <?php endif?>
          </div>                           

          </div>



        

          
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