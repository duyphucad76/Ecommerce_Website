<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4 col-md-offset-4 mt-3">
        <h3>New Product</h3>
        <form action="index.php?action=admin&act=new_product" method="post" enctype="multipart/form-data">
            <table class="table" style="border: 0px;">
                <tr>
                    <td>Name</td>
                    <td><input type="text" class="form-control" name="name" maxlength="100px" required></td>
                </tr>
                <tr>
                    <td>Brand</td>
                    <td><input type="text" class="form-control" name="brand" maxlength="100px" required></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="number" class="form-control" name="price" required><br>
                        <?php echo isset($error['price']) ? $error['price'] : '' ?>
                    </td>
                </tr>
                <tr>
                    <td>Rating</td>
                    <td><input type="number" class="form-control" name="rating" required></td>
                </tr>
                <tr>
                    <td>Discount</td>
                    <td><input type="number" class="form-control" name="discount" required></td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td>

                        <label for="fileupload"><img width="50px" height="50px" src=""></label>
                        Chọn file để upload:
                        <input type="file" name="image" id="fileupload" required>

                    </td>
                </tr>
                <tr>
                    <td>Detail</td>
                    <td><input type="text" class="form-control" name="detail">
                    </td>
                </tr>
                <tr>
                    <td>Quantity</td>
                    <td><input type="number" class="form-control" name="quantity" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" name="submit" class="normal" style="background-color: #088178; color: white;">Submit</button>
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>