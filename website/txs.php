<?php include 'sqlHelper.php';
 include 'head.php';
    $sql_txs="select * from sp";
    $txs=mysqli_query($conn,$sql_txs);
    
?>

<body>


    <!-- ...:::: Start Breadcrumb Section:::... -->
    <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Wishlist Section:::... -->
    <div class="wishlist-section">
        <!-- Start Cart Table -->
        <div class="wishlish-table-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="table_page table-responsive">
                                <table>
                                    <!-- Start Wishlist Table Head -->
                                    <thead>
                                        <tr>
                                            <th class="product_ID">ID</th>
                                            <th class="product_thumb">Hình Ảnh</th>
                                            <th class="product_name" style="width:500px;">Sản Phẩm</th>
                                            <th class="product-price">Giá</th>
                                            <th class="product_remove">Xóa</th>
                                            <th class="product_addcart">Sửa</th>
                                        </tr>
                                    </thead> <!-- End Cart Table Head -->
                                    <tbody>
                                        <?php while($row_txs=mysqli_fetch_assoc($txs)){
                                            ?>
                                        <tr>
                                            <form method="POST" action="sua.php">
                                                <td class="product_ID"><span><?php echo $row_txs['ma_sp']?></span>
                                                <input type="hidden" name ="id" value="<?php echo $row_txs['ma_sp']?>">
                                                </td>
                                                <td class="product_thumb"><a href="product-details-default.html"><img
                                                            src="img_sp/<?php echo $row_txs['img_sp']?>.jpg" alt=""></a>
                                                </td>
                                                <td class="product_name"><input name="ten_sp" type="text"
                                                        value="<?php echo $row_txs['ten_sp']?>"></input>
                                                </td>
                                                <td class="product-price"><input name="gia" type="text"
                                                        value="<?php echo $row_txs['gia']?>"></td>
                                                <td class="product_remove"><a
                                                        href="xoa.php?id=<?php echo $row_txs['ma_sp']?>"><i
                                                            class="fa fa-trash-o"></i></a></td>
                                                <td class="product_addcart"><button type="submit" class="btn btn-md btn-golden"
                                                        data-bs-toggle="modal" data-bs-target="#modalAddcart">Sửa</button>
                                                </td>
                                            </form>


                                        </tr><?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Cart Table -->
    </div> <!-- ...:::: End Wishlist Section:::... -->

    <!-- Start Footer Section -->


    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
</body>