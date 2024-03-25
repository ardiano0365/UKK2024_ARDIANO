<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        form {
            border: 3px solid #f1f1f1;
            max-width: 400px;
            width: 100%;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .imgcontainer {
            text-align: center;
            margin-bottom: 12px;
        }

        img.logo {
            width: 125px;
            margin-bottom: 20px;
        }

        .container {
            padding: 16px;
        }

        input[type=text], input[type=password] {
            width: calc(100% - 16px);
            padding: 12px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button, .register-btn {
            background-color: #04AA6D;
            color: white;
            padding: 10px; 
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            box-sizing: border-box;
            border-radius: 8px;
            font-size: 14px; 
        }

        button:hover, .register-btn:hover {
            opacity: 0.8;
        }

        .cancelbtn {
            width: 100%;
            padding: 10px;
            background-color: #f44336;
        }

        span.psw {
            float: right;
            padding-top: 16px;
            display: block;
            text-align: right;
        }

        .register-container {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        .register-btn {
            background-color: #2196F3;
            color: white;
            padding: 10px; 
            border: none;
            cursor: pointer;
            width: 100%;
            box-sizing: border-box;
            border-radius: 8px;
            font-size: 14px; 
        }

        .register-btn:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>

<form action="proses_login.php" method="post">
    <div class="imgcontainer">
        <img src="logo/logologin.png" alt="Logo" class="logo">
    </div>

    <h2>FORM LOGIN</h2>

    <div class="container">
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit">Login</button>
    </div>

    <div class="register-container">
        <p>Belum punya akun? <button type="button" class="register-btn" onclick="location.href='register.php'">Daftar</button></p>
    </div>
</form>

</body>
</html>