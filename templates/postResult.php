<!DOCTYPE html>
<html>
<head>
    <title>Blog Project</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
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
        pre {
            margin-top: 10px;
            margin-right: 30px;
            margin-bottom: 10px;
            margin-left: 50px;
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
<pre>
    <?= empty($exceptionMessage) ? "<br>{$successMessage}" : "{$errorMessage}<br><br>{$exceptionMessage}" ?>
</pre>
<footer class="section">
    <div class="center grey-text">&copy; Copyright 2022 Blog Project</div>
</footer>

</body>

</html>
