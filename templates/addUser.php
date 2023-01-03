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

        <section class="container grey-text">
            <h4 class="center">Add User Data</h4>
            <form class="white" action="add.php" method="POST">
                <label>Name</label>
                <input type="text" name="name" value='<?php echo $values['name']; ?>'>
                <div class="red-text"><?php echo $errors['name'] ?></div>
                <label>Email</label>
                <input type="text" name="email"value='<?php echo $values['email']; ?>'>
                <div class="red-text"><?php echo $errors['email']; ?></div>
                <label>Hobbies</label>
                <input type="text" name="hobbies" value='<?php echo $values['hobbies']; ?>'>
                <div class="red-text"><?php echo $errors['hobbies']; ?></div>
                <div class="center">
                    <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
                </div>
            </form>
        </section>

        <footer class="section">
            <div class="center grey-text">&copy; Copyright 2022 Blog Project</div>
        </footer>

    </body>

    </html>
