<?php
$con = mysqli_connect('localhost','root','','ajax lesson');
if( mysqli_connect_errno()){
echo"failed connect  to database" .mysqli_connect_error();
}
else{
    echo"";
}
?>