<header class="header">
    <div class="container">
        <div class="row align-center space-between">



            <a class="logo" href="index.php">Blog</a>


            <ul class="row">

                <li>
                    <a href="index.php">Главная</a>
                </li>
                <?php
                if ( isset($_SESSION['user'])){
                    ?>
                    <li>
                        <a href="createPost.php">Профиль</a>
                    </li>
                    <li>
                        <a href="App/auth/logout.php">Выход</a>
                    </li>
                    <?php
                }
                else{
                   ?>

                    <li>
                        <a href="entrance.php">Вход</a>
                    </li>
                    <li>
                        <a href="register.php">Регистрация</a>
                    </li>

                    <?php
                }
                ?>


            </ul>
        </div>
    </div>
</header>

