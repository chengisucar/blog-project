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

    <h3 class="blue-text center">USER DETAILS</h3>
    <div class="container left-align">
        <?php if($details): ?>
            <h2><?php echo htmlspecialchars($details['id']) ?></h2>
            <p>Name: <?php echo htmlspecialchars($details['name'])?></p>
            <p>Creation Date: <?php echo htmlspecialchars($details['created_at'])?></p>
            <ul>Hobbies:
                <?php foreach(explode(' ', $details['hobbies']) as $detail) :?>
                    <li><?php echo $detail ?></li>
                <?php endforeach ?>
            </ul>
            <form action="/app/detailpage.php" method="POST">
                <input type="hidden" name="id_to_delete" value="<?php echo $details['id']?>">
                <input type="submit" name="delete" value="DELETE" class="btn red z-depth-0">
            </form>

        <?php else : ?>
            <h4>No such record!</h4>
        <?php endif ?>
    </div>

    <footer class="section">
        <div class="center grey-text">&copy; Copyright 2022 Blog Project</div>
    </footer>

    </body>
</html>