<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #4A00E0, #8E2DE2);
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 900px;
            padding: 20px;
            display: flex;
            gap: 30px;
            justify-content: center;
        }

        .form-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #4A00E0;
        }

        .form-container p {
            font-size: 1.1em;
            color: #4A00E0;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #4A00E0;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #8E2DE2;
        }

        .logout-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        }

        .logout-container p {
            font-size: 1.2em;
            color: #333;
        }

        .logout-container button {
            width: auto;
            padding: 8px 16px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
            <div class="form-container">
                <h2>Register</h2>
                <form action="/register" method="POST">
                    @csrf
                    <input name="name" type="text" placeholder="Name" required>
                    <input name="email" type="text" placeholder="Email" required>
                    <input name="password" type="password" placeholder="Password" required>
                    <button>Register</button>
                </form>
            </div>

            <div class="form-container">
                <h2>Login</h2>
                <form action="/login" method="POST">
                    @csrf
                    <input name="loginname" type="text" placeholder="Username" required>
                    <input name="loginpassword" type="password" placeholder="Password" required>
                    <button>Login</button>

                     <!-- Tampilkan pesan error jika ada -->
                     @if ($errors->has('loginError'))
                     <p style="color: red; margin-top: 10px;">{{ $errors->first('loginError') }}</p>
                 @endif
                </form>
            </div>
    </div>
</body>
</html>
