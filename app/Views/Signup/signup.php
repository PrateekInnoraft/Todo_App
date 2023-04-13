<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="/js/new.js"></script>
</head>
<body>
    <!-- Creating a form for login -->
    <form method="post" action="/Signup/create">
        <div>
        <div>
                <div>
                    <!-- Input for username -->
                    <h2>Name</h2>
                    <input name="Name" id="Name" type="text" placeholder="Name" required>
                </div>
            </div>
            <div>
                <div>
                    <!-- Input for Email -->
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
                <div>
                    <!-- Input for password -->
                    <h2>Confirm Password</h2>
                    <input name="Confirm_Password" id="Confirm_Password" type="password" placeholder="Confirm Password" required>
                </div>
            </div>
            <div>
                <!-- Signup submit type -->
                <input type="submit" name="Signup" value="Signup">
            </div>
        </div>
    </form>
</body>
</html>
