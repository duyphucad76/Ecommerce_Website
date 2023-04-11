<div class="row col-md-4 col-md-offset-4">
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $cate = new category();
        $result = $cate->getCategoryById($id);
    }
    ?>
    <form action="index.php?action=admin&act=update_category" method="post" enctype="multipart/form-data">
        <table class="table" style="border: 0px;">

            <tr>
                <td>Category Id</td>
                <td> <input type="text" class="form-control" name="id" value="<?php echo $id ?>" readonly /></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" class="form-control" name="name" value="<?php echo $result['name'] ?>" maxlength="100px"></td>
            </tr>
            <tr>
                <td><button type="submit" name="update" class="normal" style="background-color: #088178; color: white;">Submit</button></td>
            </tr>
        </table>
    </form>
</div>