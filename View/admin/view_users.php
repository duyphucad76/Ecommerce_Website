<table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Password</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $user = new user();
            $result = $user->getAllUsers();
            while ($set = $result->fetch()) {
            ?>
                <tr>
                    <td><?php echo $set['id'] ?></td>
                    <td><?php echo $set['name'] ?></td>
                    <td><?php echo $set['password'] ?></td>
                    <td><?php echo $set['email'] ?></td>
                    <td><?php echo $set['address'] ?></td>
                    <td><?php echo $set['phone'] ?></td>
                    <td><a href="index.php?action=admin&act=update_user&id=<?php echo $set['id'] ?>">Update</a></td>
                    <td><a href="index.php?action=admin&act=delete_user&id=<?php echo $set['id'] ?>">Delete</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>