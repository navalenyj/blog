<html>
<?php
session_start();
if ( isset($_SESSION['user'])){
    header('Location: createPost.php');
}
require_once 'includes/head.php'
?>
<body>

<div class="page">
    <?php
    require_once 'includes/header.php';
    ?>
    <div class="main">
        <div class="container">
            <div class="row justify-center">
                <div class="form-container">
                    <form action="App/auth/entrance.php" method="post">
                        <div class="title text-center">Вход</div>
                        <div class="mt-1">
                            <div class="label mb-1">Логин</div>
                            <input type="text" name="login">
                        </div>
                        <div class="mt-1">
                            <div class="label mb-1">Пароль</div>
                            <input type="password" name="password">
                        </div>
                        <a class="prompt" href="register.php">У вас еще нет аккаунта? Создайте его</a>

                        <div class="mt-1 mb-1 text-center">
                            <div class="msg-error">
                                <?php
                                if (isset($_SESSION['error'])) {
                                    echo $_SESSION['error'];
                                    unset($_SESSION['error']);
                                }
                                ?>
                            </div>
                        </div>
                        <div class="row justify-center">
                            <button class="mt-1">Войти</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <?php
    require_once 'includes/footer.php';
    ?>

</div>


</body>
</html>
