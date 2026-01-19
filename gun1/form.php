<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .login-card {
            width: 100%;
            max-width: 360px;
            padding: 30px;
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.25);
            color: #fff;
        }

        .login-card h2 {
            text-align: center;
            margin-bottom: 25px;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            font-size: 14px;
            opacity: 0.9;
        }

        input {
            width: 100%;
            margin-top: 6px;
            padding: 12px 14px;
            border-radius: 10px;
            border: none;
            outline: none;
            font-size: 15px;
            background: rgba(255,255,255,0.2);
            color: #fff;
        }

        input::placeholder {
            color: rgba(255,255,255,0.7);
        }

        input:focus {
            background: rgba(255,255,255,0.3);
            box-shadow: 0 0 0 2px rgba(255,255,255,0.4);
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border-radius: 12px;
            border: none;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            color: #764ba2;
            background: #fff;
            transition: all 0.3s ease;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
        }

        .hint {
            text-align: center;
            margin-top: 15px;
            font-size: 13px;
            opacity: 0.8;
        }
    </style>
</head>
<body>

    <form class="login-card" method="post">
        <h2>Welcome Back</h2>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter username" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter password" required>
        </div>

        <button type="submit">Login</button>

        <div class="hint">
            Secure login system 🔐
        </div>
    </form>

</body>
</html>
