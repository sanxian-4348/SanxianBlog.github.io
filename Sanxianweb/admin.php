<?php
session_start();

$error = "";

// 明文密碼（僅用於學習用！正式環境請改用 hash！）
$users = [
    'admin' => [
        'password' => 'admin123',
        'role' => 'admin'
    ],
    'a001' => [
        'password' => 'a001pass',
        'role' => 'viewer'
    ],
    'a002' => [
        'password' => 'a002pass',
        'role' => 'viewer'
    ],
    'a003' => [
        'password' => 'a003pass',
        'role' => 'viewer'
    ],
    'a004' => [
        'password' => 'a004pass',
        'role' => 'viewer'
    ],
    'root' => [
        'password' => '0973369873',
        'role' => 'viewer'
    ],
];

// 登出功能
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: admin.php');
    exit;
}

// 表單送出處理
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    if (
        isset($users[$username]) &&
        $users[$username]['password'] === $password
    ) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $users[$username]['role'];
        header('Location: dashboard_Version2.php');
        exit;
    } else {
        $error = "帳號或密碼錯誤";
    }
}
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>登入系統</title>
    <style>
        body {
            background: #232526;
            color: #eee;
            font-family: 'Segoe UI', Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .login-box {
            background: #323232;
            padding: 2em 2.5em;
            border-radius: 16px;
            box-shadow: 0 2px 12px #0009;
            min-width: 340px;
        }
        .login-box h2 {
            text-align: center;
        }
        .login-box form {
            display: flex;
            flex-direction: column;
            gap: 1em;
        }
        .login-box input[type=text], .login-box input[type=password] {
            padding: 0.9em;
            border-radius: 6px;
            border: none;
            font-size: 1.1em;
            width: 100%;
            box-sizing: border-box;
        }
        .btn-group {
            display: flex;
            flex-direction: column;
            gap: 1em;
            margin-top: 1em;
        }
        .action-btn {
            padding: 0.9em;
            border-radius: 6px;
            border: none;
            background: #ff9966;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: background 0.2s;
            display: block;
            font-size: 1.08em;
        }
        .action-btn:hover {
            background: #ff5e62;
            color: #fff;
        }
        .error {
            color: #ff5e62;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>登入系統</h2>
        <?php if (!empty($error)) echo "<div class='error'>" . htmlspecialchars($error) . "</div>"; ?>
        <form method="post" autocomplete="off">
            <input type="text" name="username" placeholder="帳號" required autofocus>
            <input type="password" name="password" placeholder="密碼" required>
            <div class="btn-group">
                <button type="submit" class="action-btn">登入</button>
                <a href="index.html" class="action-btn">Sanxian Blog</a>
            </div>
        </form>
    </div>
</body>
</html>