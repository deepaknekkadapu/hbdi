<form id="loginform" method="post">
    Username: <input type="text" name="username" id="username" value="">

    Password: <input type="password" name="password" id="password" value="">

    <input type="submit" name="loginsub" id="loginsub" value="Login">
</form>

<script type="text/javascript">
    $(document).ready(function () {
        $('#loginform').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: 'loginclass.php',
                data: $(this).serialize(),
                success: function (data) {
                    if (data === 'Login') {
                        window.location = '../dashboard.php';
                    } else {
                        alert('Invalid Credentials');
                    }
                }
            });
        });
    });
</script>
