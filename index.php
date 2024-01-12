<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            background: url('3books.jpeg') no-repeat center center fixed;
            background-size: cover;
        }

        #login-container {
            max-width: 300px;
            margin: 50px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #login-container input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        #login-container button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div id="login-container">
        <h1>Login</h1>
      
        <form id="login-form" action="giris.php" method="post" class="login">
            <label for="username">Kullanıcı Adı:</label>
            <input type="text" id="username" name="kullanici_adi" required>

            <label for="password">Şifre:</label>
            <input type="password" id="password" name="sifre" required>

            <button type="submit">Giriş Yap</button>
        </form>
    </div>
   
</body>

</html>
