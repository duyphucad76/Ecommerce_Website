    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand" href="#">Admin</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?action=admin&act=view_products">Products <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=admin&act=view_categories">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=admin&act=new_product">New Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=admin&act=new_category">New Category</a>
                </li>
                <?php if ($_SESSION['admin']['role'] == 3) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=admin&act=view_orders">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=admin&act=view_order_details">Order_Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=admin&act=view_users">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=statistics">Statistics</a>
                    </li>
                <?php } ?>
            </ul>
            <ul class="navbar-nav mt-2 mt-lg-0">
                <li class="nav-item">
                    <a href="#" class="nav-link"><?php echo substr($_SESSION['admin']['email'], 0, strpos($_SESSION['admin']['email'], '@')) ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=admin&act=logout">Logout</a>
                </li>
            </ul>


        </div>
    </nav>