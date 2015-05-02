<html>
    <head>
        <title>HMVC CI3 Bootstrap</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    </head>
    <body>

        <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">HMVC CI3 Bootstrap</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

          <ul class="nav navbar-nav">
              <li><a href="<?php echo base_url('login') ?>">Login</a></li>
              <li><a href="<?php echo base_url('register') ?>">Register</a></li>

              <?php
              if( is_logged() )
              {
              ?>
                  <li><a href="<?php echo base_url('logout') ?>">Logout</a></li>
                  <li><a href="<?php echo base_url('profile') ?>"><?php echo username_logged() ?></a></li>
              <?php
              }
              ?>
          </ul>

        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div class="container"><!--container-->
