<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS only -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- JS, Popper.js, and jQuery -->
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.min.js">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title>ajax lesson</title>
</head>
<body>
    <div class="container">
         <div class="col-md-12">
           <h3>  insert dữ liệu </h3>
        <form method="POST" id="insert_data_hoten">
           <label >họ và tên</label>
            <input type="text" class="form-control" id="hovaten" placeholder="điền họ tên">
             <label >số phone </label>
              <input type="text" class="form-control" id="sophone" placeholder="điền số phone">
             <label >địa chỉ </label>
             <input type="text" class="form-control" id="diachi" placeholder="điền địa chỉ">
            <label >email</label>
             <input type="text" class="form-control" id="email" placeholder="điền email">
            <label >ghi chứ</label>
             <input type="text" class="form-control" id="ghichu" placeholder="điền ghi chú">
             <br>
            <input type="button" name="insert_data" id="button_insert" value="insert" class="btn btn-success">
        </form>
         <h3>LOAG DỮ LIỆU BẰNG AJAX</h3>
         <div id="load_data"></div>
         </div>
         

    </div>
    <script type="text/javascript">
    $(document).ready(function() {
        function fetch_data() {
            $.ajax({
                     url: "ajax_action.php",
                     method: "POST",
                     success: function (data) {
                         $('#load_data').html(data);
                     }
                         
                 });
        }
        fetch_data();
        //xoa du lieu
        $(document).on('click','.del_data',function(){
         var id = $(this).data('id_xoa');
         $.ajax({
                     url: "ajax_action.php",
                     method: "POST",
                     data: {iddl1:id},
                     success: function (data) {
                         alert('xoá thanh cong nha');
                        fetch_data();
                     }
                 });
     });
        //edit du lieu
     function edit_data(id,text,column_name) {
        
        $.ajax({
                     url: "ajax_action.php",
                     method: "POST",
                     data: {id:id,text:text,column_name},
                     success: function (data) {
                         alert('edit thanh cong nha');
                         fetch_data();
                     }
                 });
     }
     $(document).on('blur','.hovaten',function(){
  
    var id = $(this).data('id1');
    var text = $(this).text();
    edit_data(id,text,"hovaten");
     });

   //insert du lieu
    $('#button_insert').on('click',function () {
             var hovaten = $('#hovaten').val();
             var sophone = $('#sophone').val();
             var diachi = $('#diachi').val();
             var email = $('#email').val();
             var ghichu = $('#ghichu').val();
             if ( hovaten == '' || sophone =='' || diachi == '' || email== '' || ghichu == '' ) {
                 alert('khong được bỏ trống nha');
             }
             else{
                 $.ajax({
                     url: "ajax_action.php",
                     method: "POST",
                     data: {hovaten:hovaten,sophone:sophone,diachi:diachi,email:email,ghichu:ghichu},
                     success: function (data) {
                         alert('insert thanh cong nha');
                         $('#insert_data_hoten')[0].reset();
                         fetch_data();
                     }
                 });
             }
      });
    });
    </script>
</body>
</html>