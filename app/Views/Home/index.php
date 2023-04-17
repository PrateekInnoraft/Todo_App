<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/css/style.css">
    <script>
    function myFunction() {
    var x = document.getElementById("Password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    }
    </script>
</head>
<body>
    <!-- Header Section -->
    <div class="header">
        <img src="/images/PTA_logo.jpeg" alt="logo">
    </div>
    <!-- Creating a form for login -->
        <div class="card1">
            <form method="post" action="/Home/create">
                <div>
                    <div>
                        <div class="flexbox">
                            <!-- Input for username -->
                            <h2>Email</h2>
                            <input name="Email" id="Email" type="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div>
                        <div class="flexbox">
                            <!-- Input for password -->
                            <h2>Password</h2>
                            <input name="Password" id="Password" type="password" placeholder="Password" required>
                        </div>
                        <div class="flexbox">
                        <input type="checkbox" onclick="myFunction()" >Show Password
                        </div>
                    </div>
                    <div class="flexbox">
                        <!-- Login submit type -->
                        <input type="submit" name="Login" value="Login">
                    </div>
                    <div class="flexbox">
                        <!-- Forgot Password -->
                        <a href="/FP/index">Forgot Password ?</a>
                    </div>
                    <div class="flexbox">
                        <!-- Registration Link -->
                        New User ? <a href="/Signup/new">Register Here</a>
                    </div>
                </div>
            </form>
        </div>
</body>
</html>