<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in | Product Archive</title>
    <?php include APP_DIR . 'views/products/styles.php'; ?>
</head>
<body>
    <main class="login-page">
        <section class="login-frame">
            <a class="brand" href="<?= site_url('login'); ?>">product<span>/</span>archive</a>
            <p class="eyebrow" style="margin-top: 78px;">Private workspace</p>
            <h1>Make room for good things.</h1>
            <p class="login-note">Sign in to curate the products in your archive.</p>
            <?php if (!empty($error)): ?><div class="error"><?= htmlspecialchars($error); ?></div><?php endif; ?>
            <form class="form" method="post" action="<?= site_url('login'); ?>">
                <div class="field"><label for="username">Username</label><input id="username" name="username" type="text" autocomplete="username" required></div>
                <div class="field"><label for="password">Password</label><input id="password" name="password" type="password" autocomplete="current-password" required><label style="display:flex;align-items:center;gap:8px;margin-top:12px;font:13px Arial,sans-serif;letter-spacing:0;text-transform:none;cursor:pointer;"><input id="show-password" type="checkbox" style="width:auto;padding:0;accent-color:var(--accent);"> Show password</label></div>
                <button class="button" type="submit">Enter archive</button>
            </form>
        </section>
    </main>
    <script>
        document.getElementById('show-password').addEventListener('change', function () {
            document.getElementById('password').type = this.checked ? 'text' : 'password';
        });
    </script>
</body>
</html>