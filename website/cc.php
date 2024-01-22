
<?php
$errors = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra nếu tên tài khoản được gửi
    if (isset($_POST["name"])) {
        $name = validateInput($_POST["name"]);

        if (empty($name)) {
            $errors[] = "Vui lòng nhập họ và tên.";
        } elseif (strlen($name) < 3 || strlen($name) > 20) {
            $errors[] = "Tên  phải từ 3 đến 20 ký tự.";
        } elseif (!preg_match('/^[a-zA-Z]+$/', $name)) {
            $errors[] = "Tên  không được chứa số.";
        }
        
    } else {
        $errors[] = "Tên tài khoản không được gửi.";
    }


    if (isset($_POST["username"])) {
        $username = validateInput($_POST["username"]);

        if (empty($name)) {
            $errors[] = "Vui lòng nhập họ và tên1.";
        } elseif (strlen($username) < 3 || strlen($username) > 20) {
            $errors[] = "Tên tài khoản phải từ 3 đến 20 ký tự1.";
        } elseif (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
            $errors[] = "Tên tài khoản không được chứa ký tự đặc biệt1.";
        }
        else{
            $servername = "localhost";
$username = "zb5kf362_db";
$password = "@29052003";
$dbname = "zb5kf362_db";
            $conn=mysqli_connect($sever_name,$user_name,$password,$dbname);
            if(!$conn)
            {
                die("Kết Nối Thất Bạih". mysqli_connect_error());
            }
            $query = "SELECT * FROM account WHERE user_name = '$username'";
            $result = mysqli_query($conn, $query);
            
            if (mysqli_num_rows($result) > 0) {
                $errors[] = "Tài khoản đã tồn tại1.";
            }
        }
    } else {
        $errors[] = "Tên tài khoản không được gửi1.";
    }



    if (isset($_POST["password"])) {
        $password = validateInput($_POST["password"]);
    
        // Kiểm tra nếu mật khẩu rỗng
        if (empty($password)) {
            $errors[] = "Vui lòng nhập mật khẩu.";
        } elseif (strpos($password, ' ') !== false) {
            $errors[] = "Mật khẩu không được chứa khoảng trắng.";
        }
    } else {
        $errors[] = "Mật khẩu không được gửi.";
    }




    if (isset($_POST["confirm_password"])) {
        $confirm_password = validateInput($_POST["confirm_password"]);
    

        if (empty($confirm_password)) {
            $errors[] = "nhập lại mật khẩu trống.";
        } elseif (strpos($confirm_password, ' ') !== false) {
            $errors[] = "Mật khẩu không được chứa khoảng trắng.";
        }
        elseif ($password !== $confirm_password) {
            $errors[] = "Mật khẩu và nhập lại mật khẩu không khớp.";
        }
    } else {
        $errors[] = "Mật khẩu không được gửi.";
    }

    if (empty($errors)) {
            $loai = 1;
            $password = md5($password);
            $sql = "insert into account('name','user_name','password','loai_tk') VALUES ('$name','$username''$password','$loai')";
            if (mysqli_query($conn, $sql)) {
                
               
            } else {
                echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
            }

        mysqli_close($conn);
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}

function validateInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
