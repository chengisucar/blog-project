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
                <a href="/" class="brand-logo brand-text">Blog Project</a>
                <ul id="nav-mobile" class="right hide-on-small-and-down">
                    <li><a href="/app/add.php" class="btn brand z-depth-0">Add User</a></li>
                </ul>
            </div>
        </nav>

        <h4 class="center grey-text">404 NOT FOUND</h4>
        <div class="container ">
            <div class="row">

                <div class="col-12">
                    <?= isset($message) ? $message : '' ?>
                </div>

            </div>
        </div>

        <footer class="section">
            <div class="center grey-text">&copy; Copyright 2022 Blog Project</div>
        </footer>

    </body>
</html>