<?php
$ci=& get_instance();
$ci->load->library('session');
$admin=$ci->session->userdata('adminLoggedIn');
$employer=$ci->session->userdata('employerLoggedIn');
?>


<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="<?php echo site_url('');?>"><img src="<?php linkAsset('images/logo.png'); ?>"  width="120px" height="50px"/></a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <?php if($employer):?>
                        <li class="active"><a href="<?php echo site_url('admin/index/index');?>">Home</a></li>
                        <li class="active"><a href="<?php echo site_url('admin/job/addJob');?>">Post a Job</a></li>
                        <li class="active"><a href="<?php echo site_url('admin/job/index');?>">My Jobs</a></li>
                    <?php elseif($admin): ?>
                        <li class="active"><a href="<?php echo site_url('admin/index/index');?>">Home</a></li>
                        <li class="active"><a href="<?php echo site_url('admin/job/addJob');?>">Post a Job</a></li>
                        <li class="active"><a href="<?php echo site_url('admin/job/index');?>">My Jobs</a></li>
                        <li class="active"><a href="<?php echo site_url('admin/index/interns');?>">Interns</a></li>
                        <li class="active"><a href="<?php echo site_url('admin/index/jobSeekers');?>">JobSeekers</a></li>
                        <li class="active"><a href="<?php echo site_url('admin/index/employers');?>">Employers</a></li>
                        <li class="active"><a href="<?php echo site_url('admin/users/index');?>">Users</a></li>
                    <?php endif; ?>
                </ul>
                <a href="<?php echo site_url('index/logout'); ?>" class="btn btn-mini btn-warning pull-right">Logout</a>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>
