<?php
include('db.php');
//chèn dữ liệu
if(isset ($_POST['hovaten']) ){
  $hovaten = $_POST['hovaten'];
  $sophone = $_POST['sophone'];
  $diachi = $_POST['diachi'];
  $email = $_POST['email'];
  $ghichu = $_POST['ghichu'];
  $result = mysqli_query ($con,"INSERT INTO  tbl_khachhang(hovaten,phone,email,address,ghichu) VALUES 
  ('$hovaten','$sophone','$email','$diachi','$ghichu')");

}
//delete
if(isset ($_POST['id']) ){
  $id = $_POST['hovaten'];
  
  $result = mysqli_query ($con,"DELETE FROM  tbl_khachhang WHERE khachhang_id='$id');
  ");

}
// if(isset($_POST['id'])){
//   $id = $_POST['id'];
 
//   $result = mysqli_query($con," DELETE from tbl_khachang where khachhang_id = '$id' ");
//  }
//edit du lieu
if(isset($_POST['id'])){
 $id = $_POST['id'];
 $text = $_POST['text'];
 $column_name = $_POST['column_name'];
 $result = mysqli_query($con,"UPDATE tbl_khachang SET $column_name = '$text' where khachhang_id='$id'");
}

//load dữ liệu
$output = '';
$sql_select = mysqli_query($con,"SELECT * FROM  tbl_khachhang ORDER BY khachhang_id DESC");
$output .='
<div class ="table table-responsive">
   <table class ="table table-bordered">
   <tr>
     <td>họ và tên</td>
     <td>số phone</td>
     <td>dia chi</td>
     <td>email</td>
     <td>ghi chú</td>
     <td>quản lí</td>
     
   </tr>

'; 
 if(mysqli_num_rows($sql_select)>0){
   while($rows = mysqli_fetch_array($sql_select)){
     $output .='
     <tr>
      <td class="hovaten" data-id1='.$rows['khachhang_id'].' contenteditable>'.$rows['hovaten'].'</td>
      <td >'.$rows['phone'].'</td>
      <td >'.$rows['address'].'</td>
      <td >'.$rows['email'].'</td>
      <td >'.$rows['ghichu'].'</td>
      <td ><button data-id_xoa='.$rows['khachhang_id'].' class="btn btn-sm btn-danger del_data" name="delete_data">xoá</button></td>
     </tr>
     ';
   }
    
 }


else{
  $output .='
  <tr>
  <td colspan="5">dũ liệu chưa có</td>
  </tr>
  ';

}


$output.='
</table>
</div>';
echo $output;
?>