<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Super site</title>
    <meta name="description" content="ceci est un super site">
    <link rel="stylesheet" href=css/style.css> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    
</head>
<body>
    <div role="navigation" class="navbar navbar-default navbar-static-top" style="background-color: lightblue;">
      <div class="container">
        <div class="navbar-header">
          <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="/" class="navbar-brand" style="color: black; font-size:25px;">Mes Cours</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/">Home</a></li>
            <li class="active"><a href="http://www.phpzag.com">About</a></li>
            <li class="active"><a href="http://www.phpzag.com">Contact</a></li> 
          </ul>

          <ul class="nav navbar-nav navbar-right">
                    <!--<?php if (isset($_SESSION['user_id']) && $_SESSION['role'] === 'admin'): ?>
                        <li><a href="/dashboard">Dashboard</a></li>
                    <?php endif; ?>-->
                    <li><a href="/login">Login</a></li>
                    <li><a href="/s-inscrire">Register</a></li>
                    <li><a href="/logout">Logout</a></li>
                </ul>
         
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <!-- inclure la vue -->
     <?php include $this->view;?>
    <div class="container" style="min-height:500px;">
    <div class="insert-post-ads1" style="margin-top:20px;">
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>