<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php
include 'sqlHelper.php';

$tensp = "";
$loai = "";
$tacgia = "";
$nxb="";
$gia = "";
$fileUpload = "";
$target_file = "";
$save="";
$sql_num = "select max(ma_sp) as ma_sp from sp";
$result = mysqli_query($conn, $sql_num);
if (mysqli_num_rows($result) > 0) 
          {
              // Sử dụng vòng lặp while để lặp kết quả
              while($row = mysqli_fetch_assoc($result)) {
                $n_file = $row["ma_sp"]; 
                $save=substr($n_file,2)+1;
                $save="SP".(string)$save;
               echo $save;
               echo $n_file=$save;
                
             }
           }
 // Hàm chuyển đổi chuỗi tiếng việt có dấu $str, trả về chuỗi không dấu

if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST["tensp"])) { $tensp = $_POST['tensp']; }    
  if(isset($_POST["subcategories"])) { $ms = $_POST['subcategories']; }
  if(isset($_POST["loai"])) { $parent = $_POST['loai']; }
  if(isset($_POST["gia"])) { $gia = $_POST['gia']; }

//upload ảnh
   if(isset($_FILES['fileUpload'])){
        //Thư mục bạn lưu file upload
        $target_dir = "./img_book/";
        //Đường dẫn lưu file trên server
        $target_file   = basename($_FILES["fileUpload"]["name"]);
        $allowUpload   = true;
        //Lấy phần mở rộng của file (txt, jpg, png,...)
        
        //Lấy meta
            
          
        if ($allowUpload) {
            //Lưu file vào thư mục được chỉ định trên server
            if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {            
                $new_target_file = pathinfo($target_file, PATHINFO_FILENAME);
        }
    }
  }
  echo $new_target_file ;
 
    /* $n_file = "./img_book/".$n_file;
    echo $n_file; */
//Code xử lý, insert dữ liệu vào table    
   $sql = "INSERT INTO sp (ma_sp, ten_sp,gia, img_sp, img_sp2, ms, parent)
    VALUES ('$save','$tensp','$gia' , '$new_target_file','$new_target_file','$parent','$ms')";
    mysqli_set_charset($conn, 'UTF8');
    if ($conn->query($sql) === TRUE) {
        echo "Thêm dữ liệu thành công";
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }



  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Thêm sản phẩm</title>
    <link href="css/up.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>

<body>

    <form class="form-horizontal" action="themsp.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>
                <div align="center">
                    <br>
                    THÔNG TIN SẢN PHẨM MỚI
                </div>
            </legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="product_name">Tên Sản Phẩm</label>
                <div class="col-md-4">
                    <input id="tensp" name="tensp" placeholder="Tên Sách" class="form-control input-md" required=""
                        type="text">

                </div>
            </div>
            <!--combobox-->
            <?php
    $sql_cb = "SELECT *  FROM menu where parent='0'";
           
          // Thực thi câu truy vấn và gán vào $result
          $result_cb = mysqli_query($conn, $sql_cb);
 ?>
            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="product_categorie">MỤC SẢN PHẨM</label>
                <div class="col-md-4">
                    <select id="loai" name="loai" class="form-control">
                        <?php
        if (mysqli_num_rows($result_cb) > 0) 
          {
              // Sử dụng vòng lặp while để lặp kết quả
            
                while($row = mysqli_fetch_assoc($result_cb)) {
                ?>
                        <option  value="<?php echo $row["MS"]; ?>"><?php echo $row["TEN_LOAI"]; ?></option>;

                        <?php  }}
                        ?>
                    </select>

                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="product_subcategorie">MỤC CON</label>
                <div class="col-md-4">
                    <select id="subcategories" name="subcategories" class="form-control">
                        <option  value="">Chọn mục con</option>
                    </select>
                </div>
            </div>

            <!-- Thêm mã JavaScript để gọi yêu cầu AJAX và cập nhật combobox con -->
            <script>
            $(document).ready(function() {
                // Khi giá trị của combobox cha thay đổi
                $('#loai').change(function() {
                    var parent_id = $('#loai option:selected').val();
                    // var parent_id = $(this).val(); // Lấy giá trị của combobox cha
                    $.ajax({
                        url: 'subcatalogi.php', // URL để gọi yêu cầu AJAX
                        type: 'GET',
                        data: {
                            'parent_id': parent_id
                        }, // Truyền giá trị của combobox cha vào yêu cầu AJAX
                        dataType: 'json',
                        success: function(subcategories) {
                            // Xóa tất cả các option hiện tại của combobox con
                            $('#subcategories').find('option').remove();

                            // Thêm các option mới vào combobox con dựa trên dữ liệu trả về
                            $.each(subcategories, function(index, subcategory) {
                                $('#subcategories').append($('<option>', {
                                    value: subcategory.MS,
                                     text: subcategory.TEN_LOAI
                                }));
                            });
                        }
                    });
                });
            });
            </script>
            <!-- Textarea -->
            <!-- text input -->


            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="percentage_discount">GIÁ</label>
                <div class="col-md-4">
                    <input id="gia" name="gia" placeholder="GIÁ" class="form-control input-md" required="" type="text">

                </div>
            </div>
            <!-- File Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="filebutton">ẢNH CHÍNH</label>
                <div class="col-md-4">
                    <div class="preview">
                        <img id="img-preview" src="./img.jpg" />
                        <input type="file" name="fileUpload" id="fileUpload" accept=".jpg, .png">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="filebutton"></label>
                <div class="col-md-4">
                    <button type="submit" value="Upload" id="singlebutton" name="submit" class="btn btn-primary">THÊM
                        SẢN PHẨM</button>

                </div>
            </div>
        </fieldset>
    </form>
</body>
<script src="./js/up.js"></script>

</html>