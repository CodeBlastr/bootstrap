<?php
use Cake\Routing\Router;
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset(); ?>
    <title>
        <?= $this->fetch('title'); ?>
    </title>
    <?php
        // Meta
        echo $this->Html->meta('icon');
        echo $this->fetch('meta');

        // Styles
        echo $this->Less->less('styles.less', ['js' => ['env' => 'development']]);
        echo $this->fetch('css');

        // Sometime we'll want to send scripts to the top (rarely..)
        echo $this->fetch('scriptTop');
    ?>
</head>
<body>
    <header role="banner" class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button data-target=".bs-navbar-collapse" data-toggle="collapse" type="button" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= Router::url('/') ?>">CMS</a>
            </div>
            <nav role="navigation" class="collapse navbar-collapse bs-navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="#">Getting Started</a>
                    </li>
                    <li>
                        <a href="#">CSS</a>
                    </li>
                    <li>
                        <a href="#">Components</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <div id="content">

            <?= $this->Session->flash(); ?>

            <?= $this->fetch('content'); ?>
        </div>
        <footer class="navbar navbar-inverse navbar-fixed-bottom">
            <p class="navbar-text">proudly created by ÒCA a.k.a. elboletaire</p>
        </footer>
    </div>
    <?= $this->fetch('script'); ?>
</body>
</html>