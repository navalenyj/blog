<html>
<?php
session_start();
if (isset($_SESSION['user'])) {
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
                    <form action="App/auth/register.php" method="post" enctype="multipart/form-data">
                        <div class="title text-center">
                            Регистрация
                        </div>
                        <div class="mt-1">
                            <div class="label mb-1">
                                Логин
                            </div>
                            <input type="text" name="login">
                        </div>
                        <div class="mt-1">
                            <div class="label mb-1">
                                Пароль
                            </div>
                            <input type="password" name="password">
                        </div>
                        <div class="mt-1">
                            <div class="label mb-1">
                                Еще раз
                            </div>
                            <input type="password" name="password_confirm">
                        </div>
                        <div class="mt-1">
                            <div class="label mb-1">
                                Аватар
                            </div>
                            <input type="file" name="avatar">
                        </div>
                        <div class="mt-1">
                            <div class="label mb-1">
                                Email
                            </div>
                            <input type="email" name="email">
                        </div>
                        <div class="mt-1">
                            <div class="label mb-1">
                                Имя
                            </div>
                            <input type="text" name="name">
                        </div>
                        <div class="mt-1">
                            <div class="label mb-1">
                                Фамилия
                            </div>
                            <input type="text" name="lastname">
                        </div>
                        <a class="prompt" href="entrance.php">У вас уже есть аккаунт. Войдите</a>
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
                        <div class="mt-1">
                            <div class="row justify-center">
                                <button>Создать аккаунт</button>
                            </div>

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
