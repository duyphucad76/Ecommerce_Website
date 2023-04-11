<div class="container pt-5 pb-5">
    <h2>Create an account</h2>
    <form action="index.php?action=user&act=register" method="post">
        <div class="row">
            <div class="col-5">
                <label for="name" class="d-block">Your Name</label>
                <input type="text" class="d-block mb-2 pb-1 pt-1 w-100 pl-4 rounded-pill" name="name" required>
                <span class="msg-error text-danger"><?php echo isset($err['name']) ? $err['name'] : '' ?></span>

                <label for="address" class="d-block">Address</label>
                <input type="text" class="d-block mb-2 pb-1 w-100 pl-2 pl-4 pt-1 rounded-pill" name="address" required>
                <span class="msg-error text-danger"><?php echo isset($err['address']) ? $err['address'] : '' ?></span>

                <label for="Email" class="d-block">Email</label>
                <input type="text" class="d-block mb-2 pb-1 w-100 pl-2 pl-4 pt-1 rounded-pill" name="email" required>
                <span class="msg-error text-danger"><?php echo isset($err['email']) ? $err['email'] : '' ?></span>

                <label for="telNo" class="d-block">Mobile Number</label>
                <input type="text" class="d-block mb-2 pb-1 w-100 pl-2 pl-4 pt-1 rounded-pill" name="mobile_number" required>
                <span class="msg-error text-danger"><?php echo isset($err['phone']) ? $err['phone'] : '' ?></span>

                <label for="password" class="d-block">Password</label>
                <input type="password" class="d-block mb-2 pb-1 w-100 pl-2 pl-4 pt-1 rounded-pill" name="password" required>
                <span class="msg-error text-danger"><?php echo isset($err['pass']) ? $err['pass'] : '' ?></span>

                <label for="conf_pass" class="d-block">Confirm Password</label>
                <input type="password" class="d-block mb-2 pb-1 w-100 pl-2 pl-4 pt-1 rounded-pill" name="conf_pass" required>
                <span class="msg-error text-danger"><?php echo isset($err['pass_conf']) ? $err['pass_conf'] : '' ?></span>
                <button type="submit" name="register" class="normal mt-3" style="background-color: #088178; color: white;">Register</button>
            </div>
            <div class="col-7"><img class="rounded" src="./assets_login/images/signup.jfif" alt="Signup" width="100%"></div>
        </div>
    </form>
</div>