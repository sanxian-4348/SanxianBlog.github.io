<?php
session_start();

// 假設的帳號與權限資料
$users = [
    'admin' => [
        'password' => 'admin123', // 建議正式環境用雜湊
        'role' => 'admin'         // 最高權限，可修改網頁
    ],
    'a001' => [
        'password' => 'a001pass',
        'role' => 'viewer'        // 只能瀏覽
    ],
    'a002' => [
        'password' => 'a002pass',
        'role' => 'viewer'
    ]
];

// 登出功能
if (isset($_GET['logout'])) {
    session_destroy();
    header('edit_Version2.php');
    exit;
}

// 表單送出處理
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    if (isset($users[$username]) && $users[$username]['password'] === $password) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $users[$username]['role'];
        header('dashboard_Version2.php');
        exit;
    } else {
        $error = "帳號或密碼錯誤";
    }
}
?>

<!-- 簡易登入畫面 -->
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>登入系統</title>
    <style>
        body { background: #232526; color: #eee; font-family: 'Segoe UI', Arial, sans-serif; display: flex; align-items: center; justify-content: center; height: 100vh; }
        .login-box { background: #323232; padding: 2em 2.5em; border-radius: 16px; box-shadow: 0 2px 12px #0009; min-width: 300px;}
        .login-box h2 { text-align: center; }
        .login-box form { display: flex; flex-direction: column; gap: 1em;}
        .login-box input[type=text], .login-box input[type=password] { padding: 0.7em; border-radius: 6px; border: none; }
        .login-box input[type=submit] { padding: 0.7em; border-radius: 6px; border: none; background: #ff9966; color: #fff; font-weight: bold; cursor: pointer; }
        .login-box input[type=submit]:hover { background: #ff5e62; }
        .error { color: #ff5e62; text-align: center; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>登入系統</h2>
        <?php if (!empty($error)) echo "<div class='error'>$error</div>"; ?>
        <form method="post" autocomplete="off">
            <input type="text" name="username" placeholder="帳號" required autofocus>
            <input type="password" name="password" placeholder="密碼" required>
            <input type="submit" value="登入">
        </form>
    </div>
</body>
</html>