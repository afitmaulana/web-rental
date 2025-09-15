
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #1a1a2e;
            color: #e0e0e0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #16213e;
            padding: 2.5rem;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .login-container h1 {
            margin-bottom: 2rem;
            color: #00c6ff;
        }
        .login-container input {
            width: 100%;
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 5px;
            border: 1px solid #0f3460;
            background-color: #1a1a2e;
            color: #e0e0e0;
            box-sizing: border-box;
        }
        .login-container button {
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: 5px;
            background: linear-gradient(120deg, #00c6ff, #007bff);
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }
        .login-container button:hover {
            opacity: 0.9;
        }
        .error-message {
            color: #e94560;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Admin Login</h1>
        <?php if (session()->getFlashdata('error')): ?>
            <p class="error-message"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>
        <form action="<?= site_url('/admin/login') ?>" method="post">
            <?= csrf_field() ?>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>