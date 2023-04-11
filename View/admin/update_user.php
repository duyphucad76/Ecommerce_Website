<div class="row col-md-4 col-md-offset-4">
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $user = new user();
        $result = $user->getUserById($id);
    }
    ?>
    <form action="index.php?action=admin&act=update_user" method="post" enctype="multipart/form-data">
        <table class="table" style="border: 0px;">
        <tr>
                <td>Id</td>
                <td> <input type="text" class="form-control" name="id" value="<?php echo $id ?>" readonly /></td>
            </tr>
            <tr>
                <td>Name</td>
                <td> <input type="text" class="form-control" name="name" value="<?php echo $result['name'] ?>"/></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" class="form-control" name="password" value="<?php echo $result['password'] ?>" maxlength="100px" readonly></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" class="form-control" name="email" value="<?php echo $result['email'] ?>">
                </td>
            </tr>
            <tr>
                <td>Address</td>
                <td> <input type="text" class="form-control" name="address" value="<?php echo $result['address'] ?>"/></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td> <input type="text" class="form-control" name="phone" value="<?php echo $result['phone'] ?>"/></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="update" class="normal" style="background-color: #088178; color: white;"> Update</button>

                </td>
            </tr>

        </table>
    </form>
</div>