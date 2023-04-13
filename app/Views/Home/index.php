<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <!-- Creating a form for login -->
    <form method="post" action="/Home/create">
        <div>
            <div>
                <div>
                    <!-- Input for username -->
                    <h2>Email</h2>
                    <input name="Email" id="Email" type="email" placeholder="Email" required>
                </div>
            </div>
            <div>
                <div>
                    <!-- Input for password -->
                    <h2>Password</h2>
                    <input name="Password" id="Password" type="password" placeholder="Password" required>
                </div>
            </div>
            <div>
                <!-- Login submit type -->
                <input type="submit" name="Login" value="Login">
            </div>
            <div>
                <a href="/FP/index">Forgot Password ?</a>
            </div>
            <div>
                <a href="/Signup/new">Sign Up</a>
            </div>
        </div>
    </form>
</body>
</html>