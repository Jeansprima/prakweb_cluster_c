<form action="" method="POST" action="<?= base_url('Home/index') ?>">
    <label for="">
        <input type="text" name="username" <?= set_value('username'); ?>>
        <?= form_error('username', '<small>', '</small>'); ?>
    </label>
    <label for="">
        <input type="password" name="password">
        <?= form_error('password', '<small>', '</small>'); ?>
    </label>
    <button type="submit" name="login">Login</button>
</form>