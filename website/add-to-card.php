<?php 
    include 'sqlHelper.php';
    if(isset($_POST['addtocart'])){
        if(isset($_POST['id'])){           
            $id=$_POST['id'];
            $sqlcart="select * from sp where ma_sp='$id'";
            $cart_query=mysqli_query($conn,$sqlcart);
            $row=mysqli_fetch_array($cart_query);
            /* $cart_query=$conn->query($sqlcart);
            $row=$cart_query->fetch_array(); */
            if($row){
                $product=array(
                    'id'=>$id,
                    'ten_sp'=>$row['ten_sp'],
                    'img'=>$row['img_sp'],
                    'price'=>$row['gia'],
                    'sl'=>"1"
                );
                if(isset($_SESSION['cart'])){
                    $found=false;
                    foreach($_SESSION['cart'] as &$item){
                        if($item['id']==$_POST['id']){
                            $item['sl']=intval($item['sl'])+1;
                            $found=true;
                            break;
                        }
                    }
                    if(!$found){
                       $_SESSION['cart'][]=$product;     
                    }
                }
                else{
                    $_SESSION['cart']=array($product);
                }
            }
        } 
        header('location:cart.php');
    }
?>