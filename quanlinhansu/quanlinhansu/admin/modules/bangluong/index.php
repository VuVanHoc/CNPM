<?php
    $open = "giolam";
   require_once __DIR__. "/../../autoload/autoload.php";
   if (isset($_GET['page'])) 
   {
     $p = $_GET['page'];
   }
   else
   {
    $p=1;
   }
   $sql = "SELECT giolam.* FROM giolam ORDER BY ID DESC";
   $admin=$db->fetchJone('giolam
    ',$sql,$p,5 ,true);

   if (isset($admin['page'])) 
   {
     $sotrang = $admin['page'];
     unset($admin['page']);
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
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Danh sách </li>
      </ol>
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Lương nhân viên
        
          <div class="clearfix"></div>
          
          <!-- thông báo lỗi -->
          <?php require_once __DIR__. "/../../../partials/notification.php";?>

        <div class="card-body">
          <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Họ Và Tên</th>
                  <th>Công việc</th>
                  <th>Ngày làm</th>
                  <th>Giờ bắt đầu</th>
                  <th>Giờ nghỉ</th>
                  <th>Tổng giờ làm (h)</th>
                  <th>Lương mỗi giờ (đ)</th>
                  <th>Tiền lương (đ)</th>
                  <th>Khác</th>                
                </tr>
              </thead>
            
      
              <tbody> 
                <?php
                  $con = mysqli_connect('127.0.0.1', 'root', '', '_user');
                  mysqli_set_charset($con, 'UTF8');
                  $sql1 = "SELECT nv.name AS ten , nv.congviec AS cv , g.* FROM giolam g INNER JOIN nhanvien nv ON nv.id = g.id";
                  $query1 = mysqli_query($con, $sql1);
                  $num = mysqli_num_rows($query1);
                  if($num > 0)
                  {
                    while($row = mysqli_fetch_array($query1))
                      {    
                        $luong = $row['tonggiolam']*$row['luong'];
                        $luong =round($luong, 2);
                ?>        
                        <tr>
                          <td><?php echo $row['ten'];?></td>
                          <td><?php echo $row['cv'];?></td>
                          <td><?php echo $row['ngaylam'];?></td>
                          <td><?php echo $row['giolam'];?></td>
                          <td><?php echo $row['gionghi'];?></td>
                          <td><?php echo $row['tonggiolam'];?></td>
                          <td><?php echo $row['luong'];?></td>
                          <td><?php echo $luong;?></td>
                          <td><a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id']?>"><i class="fa fa-edit"></i> Sửa</a></td>                  
                       </tr>
              <?php 
                      }
                    }
                ?>
              </tbody>
            </table>

            <div class="pull-right">
             <nav aria-label="Page navigation">
            <ul class="pagination">
              <li>
                <a href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              
              <?php for ($i=1; $i <= $sotrang  ; $i++):?>
                <?php 
                if (isset($_GET['page'])) 
                {
                  $p =$_GET['page'];
                }
                else
              { 
                $p=1;
              }
              ?>
              <li class="<?php echo ($i==$p)? 'active':''?>">
                <a href="?page=<?php echo $i;?>"><?php echo $i;?>|</a>
              </li>
              <?php endfor; ?>
              <li>
                <a href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span></a>
              </li>
            </ul>
            </nav>
          </div>
          </div>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
         
<?php
   require_once __DIR__. "/../../layouts/footer.php";
?>