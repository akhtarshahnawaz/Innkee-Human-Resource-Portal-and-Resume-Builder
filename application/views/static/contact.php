<?php
$ci=& get_instance();
$ci->load->library('session');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact InnKee</title>
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
<div class="container">

    <div class="row">
        <div class="span8 well">
            <?php   $this->load->helper('form');
            $attributes = array('class' => 'form-horizontal ');
            echo form_open('messaging/contactForm', $attributes); ?>

            <?php
            $ci=& get_instance();
            $ci->load->library('session');

            if($ci->session->flashdata('notification')){
                $alertType = $ci->session->flashdata('alertType');
                $notification = $ci->session->flashdata('notification');
                $hasNotification=true;
            }else{
                $hasNotification=false;
            }

            if($hasNotification):

                ?>

                <div class="alert <?php echo $alertType;?>">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $notification?>
                </div>
                <?php endif; ?>


            <div class="control-group">
                <label class="control-label" for="inputName">Name</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" name="inputName"  id="inputName" placeholder="Full Name">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputEmail">Email</label>
                <div class="controls">
                    <input type="email" class="input-xlarge" name="inputEmail"  id="inputEmail" placeholder="Email">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputPhone">Phone</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" name="inputPhone"  id="inputPhone" placeholder="Phone">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputAddress">Address</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" name="inputAddress" id="inputAddress" placeholder="Address">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputMessage">Message</label>
                <div class="controls">
                    <textarea type="text" class="input-xlarge" name="inputMessage" id="inputMessage" placeholder=""></textarea>
                </div>
            </div>


            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn btn-large  btn-primary">Submit</button>
                </div>
            </div>
            </form>

        </div>

        <div class="span3 well">

            <address>
                <strong>InnKee</strong><br>
                S3A/4, Joga Bai Ext<br>
                Okhla, New Delhi- 110025<br>
                <abbr title="Phone">P:</abbr> (+91) 9810344604
            </address>

            <address>
                <strong>Email</strong><br>
                <a href="mailto:support@innkee.com">support@innkee.com</a>
            </address>
        </div>
    </div>
    <div class="row">
        </br></br></br></br></br></br>
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