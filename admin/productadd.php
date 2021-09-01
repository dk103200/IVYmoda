<?php
include "header.php";
include "slider.php";
include "class/product_class.php";

$product = new product;
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $insert_product = $product ->insert_product($_POST, $_FILES);
}
?>

<div class="admin-right container">
            <div class="admin-right-add-product">
                <h1>Thêm sản phẩm</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Tên sản phẩm <span style="color: red;">*</span></label>
                    <input name="product_name" require type="text">
                    <label for="">Danh mục <span style="color: red;">*</span></label>
                    <select name="category_id" id="">
                        <option value="">-- Chọn  --</option>
                        <?php  
                        $show_category = $product->show_category();
                        if ($show_category){
                            while($result = $show_category->fetch_assoc()){
                            ?>
                            <option value="<?php echo $result['category_id']?>"><?php echo $result['category_name']?></option>
                            <?php
                            }
                        }
                            ?>
                    </select>

                    <label for="">Loại sản phẩm <span style="color: red;">*</span></label>
                    <select name="brand_id" id="">
                        <option value="">-- Chọn --</option>
                        <?php  
                        $show_brand = $product->show_brand();
                        if ($show_brand){
                            while($result = $show_brand->fetch_assoc()){
                            ?>
                            <option value="<?php echo $result['brand_id']?>"><?php echo $result['brand_name']?></option>
                            <?php
                            }
                        }
                            ?>
                    </select>
                    <label for="">Giá sản phẩm <span style="color: red;">*</span></label>
                    <input name="product_price" require type="text">
                    <label for="">Giá khuyến mãi <span style="color: red;">*</span></label>
                    <input name="product_price_new" type="text">
                    <label require for="">Mô tả sản phẩm<span style="color: red;">*</span></label>
                    <textarea require name="product_desc" id="" cols="30" rows="10"></textarea>
                    <label for="">Ảnh sản phẩm <span style="color: red;">*</span></label>
                    <input multiple name="product_img[]" type="file">
                    <button type="submit">Thêm</button>
                </form>
            </div>
        </div>
    </section>
</body>

</html>