<?php
    require_once 'includes/dbh.inc.php';
    require_once "includes/class-nav.inc.php";
    require_once "includes/class-cluster.inc.php";
    $nav;
    $cluster = new Cluster();

    if(isset($_POST['nav__item'])){
        $nav = new Nav($_POST['nav__item']);
    }
    else{
        $nav = new Nav();
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Filip Kwiatkowski">
    <title>Gromady zwięrząt</title>
    <link rel="stylesheet" href="css/style12.css">
</head>
<body>
    <header class="header-wrap">
        <nav class="nav">
            <form action="" method="POST">
            <?php
                echo($nav->generateMenuItems());
            ?>
            </form>
        </nav>
        <div class="logo-wrap">
            <h2 class="logo">
            <?php
                echo($nav->getActiveClusterName());
            ?>
            </h2>
        </div>
    </header>
    <section class="block block-left">
        <?php
            echo($cluster->getClusterData($nav->getActiveClusterId()));
        ?>
    </section>
    <aside class="block block-right">
        <h2>
        <?php
            echo($nav->getActiveClusterName());
        ?>
        </h2>
        <ol>
            <?php
                echo($cluster->getClasterList($nav->getActiveClusterId()));
            ?>
        </ol>
        <img src="images/sroka.jpg" alt="Sroka zwyczajna">
    </aside>
    <footer class="footer">Stronę o kręgowcach przygotował: </footer>
</body>
</html>