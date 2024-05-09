<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
   $_SESSION['phone'] = $_POST['phone'];
   
   // Redirect to a new page
   header("Location: index.verify.php");
   exit;
}
?>
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
        <form class="p-3 mt-3" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input name="phone" type="text" id="phone" placeholder="write the phone" required>
            </div>
            <button class="btn mt-3" type="submit" name="submit"> GET Verify CODE </button>
        </form>
    </div>

    <!-- <script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
        separateDialCode: true,
    });
    </script> -->

</body>

</html>