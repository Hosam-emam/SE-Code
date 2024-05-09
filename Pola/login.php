
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles.login.css">
    <link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/css/intlTelInput.css" />

    <script src="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

    <title>Phone Verification</title>

</head>

<body>

    <div class="wrapper">
        <div class="logo">
            <img src="truecaller.png" alt="">
        </div>
        <div class="text-center mt-4 name">
            Verification
        </div>
        <form class="p-3 mt-3" method="POST" action="User.php">
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input name="name" type="text" id="name" placeholder="write the name" required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input name="password" type="password" id="password" placeholder="write the password" required>
            </div>
            <button class="btn mt-3" type="submit" name="submit"> LogIn </button>
        </form>
        <?php
    require_once 'User.php';
    $user = new User();
    $enter_name = $_POST['name'];
    $enter_password = $_POST['password'];
    $user->Login($enter_name,$enter_password);
    
?>
    </div>

    <!-- <script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
        separateDialCode: true,
    });
    </script> -->

</body>

</html>
