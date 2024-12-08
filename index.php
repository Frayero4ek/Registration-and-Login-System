<?php
require_once __DIR__ . '/src/helpers.php';

checkGuest();
?>

<!DOCTYPE html>
<html lang="uk" data-theme="dark">
<?php include_once __DIR__ . '/components/head.php'?>
<body>

<form class="card" action="src/actions/login.php" method="post">
    <h2>Вхід</h2>

    <?php if(hasMessage('error')): ?>
        <div class="notice error"><?php echo getMessage('error') ?></div>
    <?php endif; ?>

    <label for="email">
        Ім'я:
        <input
            type="text"
            id="email"
            name="email"
            placeholder="ivan@ukr.net"
            value="<?php echo old('email') ?>"
            <?php echo validationErrorAttr('email'); ?>
        >
        <?php if(hasValidationError('email')): ?>
            <small><?php echo validationErrorMessage('email'); ?></small>
        <?php endif; ?>
    </label>

    <label for="password">
        Пароль:
        <input
            type="password"
            id="password"
            name="password"
            placeholder="******"
        >
    </label>

    <button
        type="submit"
        id="submit"
    >Продовжити</button>
</form>

<p>У мене ще немає <a href="/register.php">акаунта</a></p>

<?php include_once __DIR__ . '/components/scripts.php' ?>
</body>
</html>