<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>網頁編輯（僅限管理員）</title>
    <style>
        body { background: #232526; color: #eee; font-family: 'Segoe UI', Arial, sans-serif; }
        .container { max-width: 480px; margin: 60px auto; background: #323232; border-radius: 16px; padding: 2em 2.5em; box-shadow: 0 2px 12px #0009;}
        h2 { text-align: center; }
        .note { color: #ff9966; margin-bottom: 1.5em; text-align: center;}
        .links { display: flex; gap: 1em; justify-content: center; margin-top: 1em; }
        a { color: #fff; text-decoration: none; background: #2193b0; padding: 0.5em 1em; border-radius: 6px;}
        a:hover { background: #6dd5ed; color: #232526;}
    </style>
</head>
<body>
    <div class="container">
        <h2>網頁編輯頁面</h2>
        <div class="note">只有管理員可以看到這頁面，可在這裡進行網站內容修改（範例）</div>
        <!-- 這裡可以放任何管理員的功能，例如修改文章、使用者管理等 -->
        <p>（此處可實作編輯功能）</p>
        <div class="links">
            <a href="admin.php">返回後台</a>
            <a href="index.html">Sanxain Blog</a>
        </div>
    </div>
</body>
</html>