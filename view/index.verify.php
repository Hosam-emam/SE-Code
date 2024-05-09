<?php
session_start();
$phone = $_SESSION['phone'];


$phone = $_SESSION['phone'];
    if (isset($_POST['submit'])) {
        $inputValue = $_POST['code'];
        $acceptedValues = array("1234", "5678", "0258");
        if (strlen($inputValue) === 4 && in_array($inputValue, $acceptedValues)) {
            header("Location:user.php");
            exit();
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles.verify.css">
</head>

<body>
    <div class="wrapper">
        <div class="logo">
            <img src="truecaller.png" alt="">
        </div>
        <div class="text-center mt-4 name">
            verification
        </div>
        <form class="p-3 mt-3" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input name="code" type="text" id="code" placeholder="write the code" required>
                <title>VERIFY</title>
            </div>
            <button class="btn mt-3" type="submit" name="submit"> Verify </button>
            <button class="btn mt-3" type="button" onclick="window.location.href = 'index.login.html';">
                resend </button>
        </form>
    </div>



</body>

</html>