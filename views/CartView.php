<?php 
    $this->fileLayout= "LayoutTrangTrong.php";
?>
<div class="cart" style="margin: 20px;border:1px solid black;min-height:1400px">
          <form action="index.php?controller=cart&action=update" method="post">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr style="font-size:20px;text-align:center; background:#ccc">
                            <th class="image" style="width:12%;">Ảnh sản phẩm</th>
                            <th class="name">Tên sản phẩm</th>
                            <th class="price" style="background:none;border:none;">Giá bán lẻ</th>
                            <th class="quantity">Số lượng</th>
                            <th class="price" style="background:none;border:none;">Thành tiền</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($_SESSION['cart'] as $product):
                        ?>
                        <tr>
                            <td><img src="assets/upload/products/<?php echo $product["photo"]; ?>" style="width:100%;padding:8px;" class="img-responsive"></td>
                            <td style="width:480px;"><a style="color:#192a56; font-size:17px;text-decoration:none" href="index.php?controller=products&action=detail&id=<?php echo $product["id"];?>"><?php echo $product["name"]; ?></a></td>
                            <td style="font-size:16px"> <?php echo number_format($product["price"]-($product["price"]*$product["discount"])/100); ?> đ</td>
                            <td><input type="number" min="1" style="width:70px;border:1px solid #192a56; font-size:15px ;padding:4px" value="<?php echo $product["number"]; ?>" name="product<?php echo $product["id"]; ?>" required="Không thể để trống"></td>
                            <td style="font-size:17px"><p><b><?php echo number_format(($product["price"]-($product["price"]*$product["discount"])/100)*$product["number"]); ?>₫</b></p></td>
                            <td><a style="color:#192a56;font-size:20px" href="index.php?controller=cart&action=delete&id=<?php echo $product["id"]; ?>" data-id="2479395"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot >
                        <tr >
                            <td colspan="6"><a href="index.php?controller=cart&action=destroy" style="font-size:18px" class="btn pull-left">Xóa toàn bộ</a> 
                            <a href="index.php" style="float:right; margin:10px 10px" class="btn pull-right black">Tiếp tục mua hàng</a>
                            <input type="submit" style="float:right; margin:10px 10px" class="btn pull-right" value="Cập nhật"></td>
                        
                        </tr>
                    </tfoot>
                </table>
            </div>
          </form>
          <?php if($this->cartNumber() > 0): ?>
          <div class="total-cart" style="float:right; margin: 20px 40px; font-size:22px; font-weight:bold;"> Tổng tiền thanh toán:
            <?php echo number_format($this->cartTotal()); ?>₫ <br>
            <a href="index.php?controller=cart&action=checkout" style="float:right" class="btn black">Thanh toán</a> </div>
           <?php endif; ?>
        </div>