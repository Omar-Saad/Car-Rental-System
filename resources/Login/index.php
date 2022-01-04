<?php
include '../partials/header.php';
?>
    <div>
        <form id="login_form" class="form_login" method="POST" action="../../includes/login.inc.php"
              onsubmit="return validateLogin()">
            <h2>LOGIN</h2>
            <div class="error" id="error"><?php include '../partials/login.validate.php' ?></div>
            <div>
                <label for="email">Email</label>
                <input type="email" id="login_email" name="email" placeholder="Email">
            </div>
            <br/>
            <div>
                <label for="password">Password</label>
                <input type="password" id="login_password" name="password" placeholder="Password">
                <br/>
            </div>

            <div>
                <button type="submit" name="submit">Login</button>
            </div>
            <br/>
            <div>
                <p>Don't have an account ? <a href="register.php">REGISTER</a></p>
            </div>

            <div>
                <input type="checkbox" id="is_admin" name="is_admin" value=1>
                <label for="is_admin"> I am an Admin</label>

            </div>
        </form>
    </div>

<?php
include '../partials/footer.php';
?>