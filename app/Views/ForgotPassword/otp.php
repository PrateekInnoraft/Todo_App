<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter OTP</title>
</head>
<body>
<?php var_dump($_SESSION['OTP']); ?>
    <form method="post" action="/FP/checkOTP">
        <div>

            <h2>One Time Password</h2>
            <input name="OTP" id="OTP" type="text" placeholder="Enter OTP" required>
        </div>
        <div>
        <input type="submit"  value="Submit">
        </div>
    </form>
</body>
</html>