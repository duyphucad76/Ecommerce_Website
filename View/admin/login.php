<section class="container mt-3 mb-3">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 py-3 px-5 rounded text-center" style="background-color: #CBE4DE;">
            <h1 class="font-weight-bold text-secondary">Login</h1>
            <img src="./Assets_login/images/forgetps.png" alt="Login" width="80%">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <form action="index.php?action=admin&act=login" method="post">
                        <div class="form-group text-left">
                            <label for="email" class="text-uppercase">Email</label>
                            <input id="email" type="text" class="form-control" name="email" placeholder="example@email.com">
                            <label for="password" class="text-uppercase mt-3">Password</label>
                            <input id="password" type="password" class="form-control" name="password" placeholder="Enter your password">
                        </div>
                        <a href="index.php?action=user&act=forgetps" class="text-body">Forgot password?</a><br>
                        <button type="submit" name="login" class="normal" style="color: white; background-color: #4E6E81">Login</button>
                    </form>
                </div>
            </div>

        </div>
</section>