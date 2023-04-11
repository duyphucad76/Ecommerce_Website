<section id="header">
    <a href="index.php" aria-label="Logo"><img src="./Assets/images/logo.png" class="logo" alt="" /></a>
    <div>
        <ul id="navbar">
            <li>
                <a <?php if (!isset($_GET['action'])) {
                        echo 'class="active"';
                    } ?> href="index.php" aria-label="navbar">Home</a>
            </li>
            <li><a <?php if (isset($_GET['action'])) {
                        if ($_GET['action'] == 'product')
                            echo 'class="active"';
                    } ?> href="index.php?action=product" aria-label="navbar">Shop</a></li>
            <li><a href="index.php?action=pages&act=blog" aria-label="navbar">Blog</a></li>
            <li><a href="index.php?action=pages&act=about" aria-label="navbar">About</a></li>
            <li><a href="index.php?action=pages&act=contact" aria-label="navbar">Contact</a></li>
            <?php
            if (isset($_SESSION['user'])) {
                $user = new user();
                $result = $user->checkUserEmail($_SESSION['user']['email']);
                $username = $result['username'];
                echo '
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . $username . '</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="index.php?action=user&act=information">Information</a>
                        <a class="dropdown-item" href="index.php?action=wishlist">Wishlist</a>
                        <a class="dropdown-item" href="index.php?action=forgetps&act=resetpw">Change Password</a>
                        <a class="dropdown-item" href="index.php?action=user&act=logout">Log Out</a>
                    </div>
                </li>';
            } else {
            ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-user"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="index.php?action=user&act=view_login">Login</a>
                        <a class="dropdown-item" href="index.php?action=user&act=view_register">Register</a>
                    </div>
                </li>
            <?php } ?>
            <li>
                <a <?php if (isset($_GET['action'])) {
                        if ($_GET['action']  == 'cart')
                            echo 'class="active"';
                    } ?> href="index.php?action=cart" aria-label="navbar"><i class="fa-solid fa-bag-shopping"></i><sup><?php if (isset($_SESSION['cart'])) echo count($_SESSION['cart']) ?></sup></a>
            </li>
        </ul>
    </div>
</section>