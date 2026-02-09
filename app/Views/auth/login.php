<h2>Вход</h2>

<?php if (!empty($error)): ?>
    <p style="color:red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="post" action="/login">
    <div>
        <label>Email:</label><br>
        <input type="email" name="email" required>
    </div>

    <div>
        <label>Пароль:</label><br>
        <input type="password" name="password" required>
    </div>

    <button type="submit">Войти</button>
</form>
