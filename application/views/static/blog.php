<?php
$ci=& get_instance();
$ci->load->library('session');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>InnKee Blog</title>
    <link rel="shortcut icon" href="<?php linkAsset('images/favicon.ico'); ?>" type="image/x-icon">
    <link rel="icon" href="<?php linkAsset('images/favicon.ico'); ?>" type="image/x-icon">


    <link href="<?php linkAsset('bootstrap/css/bootstrap.css')?>" rel="stylesheet">
    <link href="<?php linkAsset('styles/flat-ui.css')?>" rel="stylesheet">
    <link href="<?php linkAsset('styles/style.css')?>" rel="stylesheet">


    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }
    </style>

</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="<?php echo site_url('');?>"><img src="<?php linkAsset('images/logo.png'); ?>" width="135px" height="50px" /></a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li><a href="<?php echo site_url('');?>">Home </a></li>
                    <li><a href="<?php echo site_url('index/index/about');?>">About </a></li>
                    <li><a href="<?php echo site_url('index/index/contact');?>">Contact</a></li>
                    <li><a href="<?php echo site_url('index/index/blog');?>">Blog </a></li>

                </ul>
                <div class="btn-group pull-right">
                    <a href="<?php echo site_url('index/login'); ?>" class="btn btn-large btn-warning"><?php if($ci->session->userdata('loggedIn')){echo "View Profile";}else{ echo "Login";}?></a>
                    <?php if($ci->session->userdata('loggedIn')):?>
                    <a href="<?php echo site_url('index/logout'); ?>" class="btn btn-large btn-danger">Logout</a>
                    <?php endif; ?>
                </div>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>
<div class="container-fluid">

     <div class="row-fluid">
        <div class="span12 well">
          <h2 align="center"></h2>
          <p></p>
      </div>
      </div>
        <div class="row">
         <div class="row">
            <ul class="footer-nav">
            <li><a href="<?php echo site_url('');?>">Home </a></li>
            <li><a href="<?php echo site_url('index/index/about');?>">About </a></li>
            <li><a href="<?php echo site_url('index/index/contact');?>">Contact</a></li>
            <li><a href="<?php echo site_url('index/index/press-release');?>">Press Release </a></li>
            <li><a href="<?php echo site_url('index/index/blog');?>">Blog </a></li>
            <li><a href="<?php echo site_url('index/index/career');?>">Career </a></li>


            </ul>
        </div>
</div>
</body>
</html>