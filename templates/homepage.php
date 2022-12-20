<!DOCTYPE html>
<html>
    <head>
        <title>Blog Project</title>
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <style type="text/css">
            .brand{
                background: #56a1c7 !important;
            }
            .brand-text{
                color: #56a1c7 !important;
            }
            form .breadcrumb{
                max-width: 460px;
                margin: 20px auto;
                padding: 20px;
            }
        </style>
    </head>
    <body class="grey lighten-4">

        <nav class="white z-depth-0">
            <div class="container">
                <a href="/index.php" class="brand-logo brand-text">Blog Project</a>
                <ul id="nav-mobile" class="right hide-on-small-and-down">
                    <li><a href="/app/add.php" class="btn brand z-depth-0">Add an Article</a></li>
                </ul>
            </div>
        </nav>

        <h4 class="center grey-text">Users</h4>
        <div class="container ">
            <div class="row">

                <?php foreach($users as $user): ?>

                    <div class="col s6 md6">
                        <div class="card z-depth-6">
                            <div class="card-content center">
                                <h2><?= $user['id']; ?></h2>
                                <h4><?= $user['name'] ?></h4>
                                <ul>
                                    <?php foreach(explode(' ', $user['hobbies']) as $hobby) :?>
                                        <li><?php echo $hobby ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="card-action right-align">
                                <a href="app/detailpage.php?id=<?= $user['id']?>" class="brand-text">more info</a>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>

        <footer class="section">
            <div class="center grey-text">&copy; Copyright 2022 Blog Project</div>
        </footer>

    </body>
</html>