<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <style>
        * {
            font-family: 'Arial', sans-serif;
        }

        h1 {
            text-align: center;
            color: #3498db;
        }

        form {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        table {
            width: 100%;
        }

        td {
            padding: 8px;
            text-align: left;
        }

        input {
            padding: 12px;
            margin: 8px 0;
            width: calc(100% - 16px);
            box-sizing: border-box;
            background: #f8f8f8;
            border: 2px solid #ccc;
            outline-color: #3498db;
        }

        input[type="submit"] {
            background-color: #2196F3; 
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

        input[type="submit"]:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <h1>Halaman Registrasi</h1>
    <form action="proses_register.php" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td><input type="text" name="namalengkap" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Register"></td>
            </tr>
        </table>
    </form>
</body>
</html>
