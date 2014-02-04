<?php
$ci=& get_instance();
$ci->load->library('session');
$user=$ci->session->userdata('loggedIn');
$admin=$ci->session->userdata('adminLoggedIn');
$employer=$ci->session->userdata('employerLoggedIn');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>InnKee.com</title>
    <link rel="shortcut icon" href="<?php linkAsset('images/favicon.ico'); ?>" type="image/x-icon">
    <link rel="icon" href="<?php linkAsset('images/favicon.ico'); ?>" type="image/x-icon">

    <link href="<?php linkAsset('bootstrap/css/bootstrap.css')?>" rel="stylesheet">
    <link href="<?php linkAsset('styles/flat-ui.css')?>" rel="stylesheet">
    <link href="<?php linkAsset('styles/style.css')?>" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="span3">
            &nbsp;&nbsp;<a href="<?php echo site_url('');?>"> <img src="<?php linkAsset('images/logo.png'); ?>"  width="230px" height="140px"/></a>
        </div>
        <div class="span2 offset7">
            </br></br>

            <?php if(!$user && !$admin && !$employer):?>
            <a href="<?php echo site_url('index/login'); ?>" class="btn btn-large btn-block btn-danger">Login</a>
            <?php elseif($user):?>
            <div class="btn-group pull-right">
                <a href="<?php echo site_url('index/login'); ?>" class="btn btn-large btn-warning">View Profile</a>
                <a href="<?php echo site_url('index/logout'); ?>" class="btn btn-large btn-danger">Logout</a>
            </div>
            <?php elseif($admin || $employer):?>
            <div class="btn-group pull-right">
                <a href="<?php echo site_url('admin/index'); ?>" class="btn btn-large btn-warning">View Profile</a>
                <a href="<?php echo site_url('index/logout'); ?>" class="btn btn-large btn-danger">Logout</a>
            </div>
            <?php endif; ?>

        </div>
    </div>
    <div class="row">
        </br></br></br></br></br></br></br></br></br></br></br>
    </div>
    <div class="row">
        <div class="span3">
            &nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('index/register/jobSeeker'); ?>" class="btn btn-large btn-block btn-warning">I need a Job</a></br>
            &nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('index/register/employer'); ?>" class="btn btn-large btn-block btn-warning">I am an Employer</a></br>
            &nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('index/register/intern'); ?>" class="btn btn-large btn-block btn-warning">I have to do Internship</a>

        </div>


    </div>
    <div class="row">
        </br></br></br></br>
        </br></br>

    </div>
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