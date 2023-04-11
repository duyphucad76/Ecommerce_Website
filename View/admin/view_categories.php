<table class="table">
        <thead>
            <tr>
                <th>Category Id</th>
                <th>Name</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $cat = new category();
            $result = $cat->getAllCategory();
            while ($set = $result->fetch()) {
            ?>
                <tr>
                    <td><?php echo $set['id'] ?></td>
                    <td><?php echo $set['name'] ?></td>
                    <td><a href="index.php?action=admin&act=update_category&id=<?php echo $set['id'] ?>">Update</a></td>
                    <td><a href="index.php?action=admin&act=delete_category&id=<?php echo $set['id'] ?>">Delete</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>