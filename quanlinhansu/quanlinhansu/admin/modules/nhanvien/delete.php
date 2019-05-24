<?php
  $open = "nhanvien";
   require_once __DIR__. "/../../autoload/autoload.php";


   $id = intval(getInput('id'));



   $DeleteAdmin = $db->fetchID("nhanvien",$id);
   if(empty($DeleteAdmin))
   {
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdmin("nhanvien");
   }
   // kiểm tra xem đã có admin chưa

   $num = $db->delete("nhanvien", $id);
   if($num>0)
   {
      $_SESSION['success'] = "Xóa thành công";
      redirectAdmin("nhanvien
        ");
   }

   else
   {
      $_SESSION['error'] = "Xóa thất bại";
      redirectAdmin("nhanvien");
    
   }
   
?>