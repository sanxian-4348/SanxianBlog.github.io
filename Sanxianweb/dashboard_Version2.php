<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>網站後台</title>
    <style>
        body { background: #232526; color: #eee; font-family: 'Segoe UI', Arial, sans-serif; }
        .container { max-width: 480px; margin: 60px auto; background: #323232; border-radius: 16px; padding: 2em 2.5em; box-shadow: 0 2px 12px #0009;}
        h2 { text-align: center; }
        .actions { margin-top: 2em; display: flex; flex-direction: column; gap: 1em;}
        .actions a { text-decoration: none; color: #fff; background: #2193b0; padding: 0.8em 0; border-radius: 6px; text-align: center; font-weight: bold; transition: background 0.2s; }
        .actions a:hover { background: #6dd5ed; color: #232526;}
        .logout { background: #ff5e62 !important; }
        .logout:hover { background: #fff !important; color: #ff5e62 !important;}
        .note { color: #ff9966; margin-top: 1em; text-align: center;}
    </style>
</head>
<body>
    <div class="container">
        <h2>歡迎，<?php echo htmlspecialchars($username); ?></h2>
        <div class="note">
            您的權限：<?php echo $role === 'admin' ? '管理員（可修改網頁）' : '瀏覽者（僅可檢視）'; ?>
        </div>
        <div class="actions">
            <?php if ($role === 'admin'): ?>
                <a href="edit.php">進入網頁編輯頁面</a>
            <?php endif; ?>
            <a href="view.php">瀏覽網頁內容</a>
            <a href="login.php?logout=1" class="logout">登出</a>
        </div>
    </div>
</body>
</html>