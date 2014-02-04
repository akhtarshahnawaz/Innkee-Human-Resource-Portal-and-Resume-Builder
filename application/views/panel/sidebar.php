<?php
$ci=& get_instance();
$ci->load->library('session');
$type=$ci->session->userdata('type');
?>
<div class="container">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><a href="<?php echo site_url('panel/index/personalInfo'); ?>"><i class="icon-chevron-right"></i> Personal Information</a></li>
            <li><a href="<?php echo site_url('panel/index/contactInfo'); ?>"><i class="icon-chevron-right"></i> Contact Information</a></li>
            <?php if($type=="jobSeeker"):?>
            <li><a href="<?php echo site_url('panel/index/professionalInfo'); ?>"><i class="icon-chevron-right"></i> Current Profession</a></li>
            <?php endif; ?>
            <li><a href="<?php echo site_url('panel/index/education'); ?>"><i class="icon-chevron-right"></i> Educational Qualifications</a></li>
            <li><a href="<?php echo site_url('panel/index/skills'); ?>"><i class="icon-chevron-right"></i> Skills and Expertise</a></li>
            <li><a href="<?php echo site_url('panel/index/experience'); ?>"><i class="icon-chevron-right"></i> Experience</a></li>
            <li><a href="<?php echo site_url('panel/index/resume'); ?>"><i class="icon-chevron-right"></i> Resume</a></li>
        </ul>
    </div>