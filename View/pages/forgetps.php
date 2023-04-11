<section class="container mt-3 mb-3">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 py-3 px-5 rounded text-center" style="background-color: #CBE4DE;">
            <p class="font-weight-bold">Password Reset</p>
            <img src="./Assets_login/images/forgetps.png" alt="Forget Password" width="80%">
            <form action="index.php?action=forgetps&act=forgetps" method="post">
                <div class="form-group">
                    <label for="email" class="text-uppercase">Enter Email Address To Send Reset Password Code</label>
                    <input id="email" type="text" class="form-control" name="email" placeholder="example@email.com">
                </div>
                <button type="submit" name="submit" class="normal" style="color: white; background-color: #4E6E81">Reset my password</button>
            </form>
        </div>
</section>