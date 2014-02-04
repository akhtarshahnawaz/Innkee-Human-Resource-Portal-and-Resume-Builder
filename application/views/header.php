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
                    <li class="active"><a href="<?php echo site_url('panel/index/index');?>">Home</a></li>
                    <li class="active"><a href="<?php echo site_url('panel/index/searchJobs');?>">Search Jobs</a></li>
                    <li class="active"><a href="<?php echo site_url('panel/index/generateResume');?>">Generate Resume</a></li>

                </ul>
                <a href="<?php echo site_url('index/logout'); ?>" class="btn btn-mini btn-warning pull-right">Logout</a>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>
