<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }
        .login-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            position: relative;
            width: 400px;
        }
        .close-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            cursor: pointer;
            font-size: 20px;
        }
        .login-title {
            color: #b59148;
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
        }
        .input-label {
            color: #b59148;
            font-size: 18px;
            margin-bottom: 5px;
        }
        .input-field {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .login-button {
            background-color: #f5e7d3;
            color: #000;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-right: 10px;
        }
        .social-button {
            width: 48%;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
            border: 1px solid #000;
        }
        .facebook-button {
            background-color: #2867b2;
            color: #fff;
            border: none;
        }
        .google-button {
            background-color: #fff;
            color: #000;
            
        }
        .social-icon {
            margin-right: 8px;
        }
        .button-container{
            display: flex;
            justify-content: space-between;
            align-items: center;
            
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="close-btn">×</div>
        <h2 class="login-title">Login</h2>
        <div class="input-label">Username:</div>
        <input type="text" class="input-field" placeholder="">
        <div class="input-label">Password:</div>
        <input type="password" class="input-field" placeholder="">
        <button class="login-button">Login</button>
        <div class="button-container">
            <button class="social-button facebook-button">
                <i class="fab fa-facebook-f social-icon"></i>
                Facebook
            </button>
            <button class="social-button google-button">
                <i class="fab fa-google social-icon"></i>
                Google
            </button>
        </div>
    </div>
</body>
</html>