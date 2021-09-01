<?php
include "header.php";
include "slider.php";
include "class/brand_class.php";

$brand = new brand;

$brand_id = $_GET['brand_id'];

$get_brand = $brand-> get_brand($brand_id);

if ($get_brand){
    $resultB = $get_brand -> fetch_assoc();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $category_id = $_POST['category_id'];
    $brand_name = $_POST['brand_name'];
    $update_brand = $brand ->update_brand($brand_id, $category_id, $brand_name);
}
?>

<div class="admin-right">
            <div class="admin-right-add-category">
                <h1>Thêm Danh Mục</h1>
                <form action="" method="POST">
                    <select name="category_id">
                        <option value="#">-- Chọn danh mục --</option>
                        <?php  
                        $show_category = $brand->show_category();
                        if ($show_category){
                            while($result = $show_category->fetch_assoc()){
                            ?>
                            <option <?php if ($resultB['category_id'] == $result['category_id']) {echo "SELECTED";}?>
                            value="<?php echo $result['category_id']?>"><?php echo $result['category_name']?></option>
                            <?php
                            }
                        }
                            ?>
                        
                    </select>
                    <input require name="brand_name" type="text" placeholder="Nhập tên loại sản phẩm"
                    value="<?php echo $resultB['brand_name'] ?>">
                    <button type="submit">Sửa</button>
                </form>
            </div>
        </div>
    </section>
</body>

</html>