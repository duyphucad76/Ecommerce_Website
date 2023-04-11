<div class="row col-md-4 col-md-offset-4">
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $pro = new product();
        $result = $pro->getProductById($id);
    }
    ?>
    <form action="index.php?action=admin&act=update_product" method="post" enctype="multipart/form-data">
        <table class="table" style="border: 0px;">

            <tr>
                <td>Product Id</td>
                <td> <input type="text" class="form-control" name="id" value="<?php echo $id ?>" readonly /></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" class="form-control" name="name" value="<?php echo $result['name'] ?>" maxlength="100px"></td>
            </tr>
            <tr>
                <td>Brand</td>
                <td><input type="text" class="form-control" name="brand" value="<?php echo $result['brand'] ?>" maxlength="100px"></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="text" class="form-control" name="price" value="<?php echo $result['price'] ?>"></td>
            </tr>
            <tr>
                <td>Rating</td>
                <td><input type="text" class="form-control" name="rating" value="<?php echo $result['rating'] ?>"></td>
            </tr>
            <tr>
                <td>Discount</td>
                <td><input type="text" class="form-control" name="discount" value="<?php echo $result['discount'] ?>"></td>
            </tr>
            <tr>
                <td>Image</td>
                <td>

                    <label><img width="50px" height="50px" src=""></label>
                    Chọn file để upload:
                    <input type="file" name="image" id="fileupload">

                </td>
            </tr>
            <tr>
                <td>Detail</td>
                <td><input type="text" class="form-control" name="detail" value="<?php echo $result['detail'] ?>">
                </td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td><input type="text" class="form-control" name="quantity" value="<?php echo $result['quantity'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="update" class="normal" style="background-color: #088178; color: white;"> Update</button>

                </td>
            </tr>

        </table>
    </form>
</div>