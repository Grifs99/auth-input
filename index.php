<?php 
session_start();
include ('src/Autoload.php');
$db = new Database();
$app = new App();
?>
<!doctype html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>auth-input</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">Brand</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">

                            <li><a href="?p=register">Register</a></li>
                            <li><a href="?p=viewData">View data</a></li>
                            <li><a href="?p=addData">Add data</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <?php if(isset($_SESSION['SESS_USERNAME'])): ?>
                            <li><a><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $_SESSION['SESS_USERNAME']; ?></a></li>
                            <li><a href="?p=logout">Logout</a> </li>
                            <?php else: ?>
                            <li><a href="?p=login">Login</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
            <div class="row">
                <div class="col-sm-12 space">
                    <?php if(isset($_GET['p'])) { include('incl/'.$_GET['p'].'.php'); } ?>
                </div>
            </div>
        </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>