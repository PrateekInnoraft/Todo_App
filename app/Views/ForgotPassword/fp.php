<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
    <form method="post" action="/FP/sendotp">
        <div>
            <h2>Email</h2>
            <input name="Email" id="Email" type="email" placeholder="Email" required>
        </div>
        <div>
        <input type="submit" name="SendOTP" value="Send OTP">
        </div>
    </form>
</body>
</html>