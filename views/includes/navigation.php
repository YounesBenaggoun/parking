<?php

// echo $userId;

if (USER_ID)
{
    $user = new User(USER_ID);
}



?>
<div class="navbar navbar-inverse navbar-fixed-top headroom">
    <div class="container">
        <div class="navbar-header">
            <!-- Button for smallest screens -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand" href="<?= ROOT ?>"><img src="<?= ROOT ?>/public/images/logo.png" alt="Progressus HTML5 template"></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav pull-right">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>

                <?php
                if (USER_ID)
                {
                ?>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $user->getName() ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= ROOT ?>/parking/add">+ Ajouter un Parking</a></li>
                            <li><a href="<?= ROOT ?>/parking/list">Liste des Parking</a></li>
                        </ul>
                    </li>
                <?php
                }
                ?>


                <?php
                if (USER_ID)
                { ?>
                    <li><a class="btn" href="<?= ROOT ?>/user/logout">Déconection</a></li>

                <?php  }
                else
                { ?>
                    <li><a class="btn" href="<?= ROOT ?>/user/signin">Connect</a></li>

                <?php } ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>