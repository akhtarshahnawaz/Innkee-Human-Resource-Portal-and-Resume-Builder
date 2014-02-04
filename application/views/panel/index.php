<div class="span8">
<?php
$ci=& get_instance();
$ci->load->library('session');
$type=$ci->session->userdata('type');

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


<!--Personal Information-->

<h3>Personal Details</h3>
<?php if($data['dob']==null && $data['fatherName']==null && $data['motherName']==null):?>
<table class="table table-bordered">
    <tr><td>
        <p class="text-center"> <a class="btn btn-small " href="<?php echo site_url('panel/index/personalInfo'); ?>">Add Personal Information</a></p>
        <p class="text-error text-center">You haven't updated your Personal Information. Please Update your Personal Information</p>
    </td></tr>
</table>
    <?php else: ?>
<img src="<?php if(!empty($data)){if($data['photo']!=null){ echo base_url().'uploads/'.$data['photo']; }else{ linkAsset('images/avatar.jpg'); }} ?>" width="95px" height="195px">
</br>
<a class="btn btn-mini btn-primary" id="inputImage"  href="<?php echo site_url('panel/index/personalInfo');?>"><i class="icon-camera icon-white"></i> Change Photo</a>
</br>
</br>

    <table class="table table-bordered table-condensed table-striped">
        <tbody>

            <?php if($data['name']!=null):?>
    <tr>
        <th>Name</th>
        <td><?php echo $data['name']; ?></td>
    </tr>
        <?php endif; ?>


    <?php if($data['dob']!=null):?>
    <tr>
        <th>DOB</th>
        <td><?php echo $data['dob']; ?></td>
    </tr>
        <?php endif; ?>


    <?php if($data['fatherName']!=null):?>
    <tr>
        <th>Father Name</th>
        <td><?php echo $data['fatherName']; ?></td>
    </tr>
        <?php endif; ?>

    <?php if($data['motherName']!=null):?>
    <tr>
        <th>Mother Name</th>
        <td><?php echo $data['motherName']; ?></td>
    </tr>
        <?php endif; ?>
    <?php endif;?>
</tbody>
</table>

<!--Contact Information-->

<h3>Contact Details</h3>
<?php if($data['phone']==null && $data['nationality']==null && $data['location']==null):?>
<table class="table table-bordered">
    <tr><td>
        <p class="text-center"> <a class="btn btn-small " href="<?php echo site_url('panel/index/contactInfo'); ?>">Add Contact Information</a></p>
        <p class="text-error text-center">You haven't updated your Contact Information. Please Update your Contact Information</p>
    </td></tr>
</table>
    <?php else: ?>

    <table class="table table-bordered table-condensed table-striped">
        <tbody>
            <?php if($data['email']!=null):?>
    <tr>
        <th>Email</th>
        <td><?php echo $data['email']; ?></td>
    </tr>
        <?php endif; ?>


    <?php if($data['phone']!=null):?>
    <tr>
        <th>Phone</th>
        <td><?php echo $data['phone']; ?></td>
    </tr>
        <?php endif; ?>


    <?php if($data['location']!=null):?>
    <tr>
        <th>Address</th>
        <td><?php echo $data['location']; ?></td>
    </tr>
        <?php endif; ?>

    <?php if($data['nationality']!=null):?>
    <tr>
        <th>Nationality</th>
        <td><?php echo $data['nationality']; ?></td>
    </tr>
        <?php endif; ?>
    <?php endif;?>
</tbody>
</table>


<!--Professional Information-->
<?php if($type=='jobSeeker'):?>

<h3>Professional Details</h3>
    <?php if($data['experience']=='null' && $data['currentIndustry']=='null' && $data['currentFunctionalArea']=='null' && $data['currentAcquiredSkills']==null):?>
    <table class="table table-bordered">
        <tr><td>
            <p class="text-center"> <a class="btn btn-small " href="<?php echo site_url('panel/index/professionalInfo'); ?>">AddProfessional Details</a></p>
            <p class="text-error text-center">You haven't updated your Professional Details. Please Update your Professional Details</p>
        </td></tr>
    </table>
        <?php else: ?>

    <table class="table table-bordered table-condensed table-striped">
        <tbody>

             <?php

        if(!empty($data) && $data['experience']!='null'){
            $totalExperience=explode('$-$',$data['experience']);
        }
        ?>

        <?php if($data['experience']!='null'):?>
        <tr>
            <th>Experience</th>
            <td><?php 
                if(isset($totalExperience[0])){
                    echo $totalExperience[0].' Years ';
                    }
                if(isset($totalExperience[1])){ 
                    echo $totalExperience[1].' Months'; 
                    }
                ?></td>
        </tr>
            <?php endif; ?>


        <?php if($data['currentCompany']!='null'):?>
        <tr>
            <th>Company</th>
            <td><?php echo $data['currentCompany']; ?></td>
        </tr>
            <?php endif; ?>

        <?php if($data['currentDesignation']!=null):?>
        <tr>
            <th>Designation</th>
            <td><?php echo $data['currentDesignation']; ?></td>
        </tr>
            <?php endif; ?>




        <?php if($data['currentIndustry']!='null'):?>
        <tr>
            <th>Industry</th>
            <td><?php echo $data['currentIndustry']; ?></td>
        </tr>
            <?php endif; ?>


        <?php if($data['currentFunctionalArea']!='null'):?>
        <tr>
            <th>Functional Area</th>
            <td><?php echo $data['currentFunctionalArea']; ?></td>
        </tr>
            <?php endif; ?>

        <?php if($data['currentCTC']!='null'):?>
        <tr>
            <th>Current CTC (Rs/Month)</th>
            <td><?php echo $data['currentCTC']; ?></td>
        </tr>
            <?php endif; ?>




        <?php endif;?>
</tbody>
</table>

    <?php endif; ?>

<!-- Education-->
<?php if(empty($education)):?>
<h3>Education Details</h3>
<table class="table table-bordered">
    <tr><td>
        <p class="text-center"> <a class="btn btn-small " href="<?php echo site_url('panel/index/education'); ?>">Add Education Details</a></p>
        <p class="text-error text-center">You haven't added details about your Education. Please Update your Education Details</p>
    </td></tr>
</table>
    <?php else: ?>
<h3>Education Details</h3>
<table class="table table-bordered table-condensed table-striped">
    <thead>
    <tr>
        <th>Education Type</th>
        <th>Course Name</th>
        <th>Branch</th>
        <th>From</th>
        <th>Till</th>
        <th>College/University/Board/Institute</th>
        <th>Percentage</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($education as $row):?>
    <tr>
        <td><?php
            if($row['type']=='highSchool'){ echo "High School"; }
            elseif($row['type']=='intermediate'){ echo 'Intermediate';}
            elseif($row['type']=='certification'){ echo 'Certification';}
            elseif($row['type']=='diploma'){ echo 'Diploma';}
            elseif($row['type']=='graduation'){ echo 'Graduation';}
            elseif($row['type']=='postGraduation'){ echo 'Post Graduation';}
            elseif($row['type']=='doctorate'){ echo 'Doctorate';}

            ?>
        </td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['branch'];?></td>
        <td><?php if($row['from']!=null){echo $row['from'];}else{echo '-';}?></td>
        <td><?php if($row['to']!=null){echo $row['to'];}else{echo '-';}?></td>
        <td><?php echo $row['institute'];?></td>
        <td><?php echo $row['percentage'];?></td>

    </tr>
        <?php endforeach;?>
    </tbody>
</table>

    <?php endif; ?>

<!-- Experience-->
<?php if(empty($experience)):?>
    <?php if($data['experience']!='null' && $data['experience']>0):?>
    <h3>Experience</h3>
    <table class="table table-bordered">
        <tr><td>
            <p class="text-center"> <a class="btn btn-small " href="<?php echo site_url('panel/index/experience'); ?>">Add Experience</a></p>
            <p class="text-error text-center">You haven't added details about your previous Jobs and Trainings. Please Update your Career History</p>
        </td></tr>
    </table>
        <?php endif; ?>
    <?php else: ?>
<h3>Experience</h3>
<table class="table table-bordered table-condensed table-striped">
    <thead>
    <tr>
        <th>Experience Type</th>
        <th>Company</th>
        <th>From</th>
        <th>Till</th>
        <th>Designation</th>
        <th>Function</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($experience as $row):?>
    <tr>
        <td><?php if($row['type']=='training'){ echo "Training"; }elseif($row['type']=='job'){ echo 'Job';}?></td>
        <td><?php echo $row['company'];?></td>
        <td><?php if($row['to']!=null){echo dateToString($row['from']);}else{echo '-';}?></td>
        <td><?php if($row['to']!=null){echo dateToString($row['to']);}else{echo '-';}?></td>
        <td><?php echo $row['designation'];?></td>
        <td><?php if($row['function']!="null"){echo $row['function'];}?></td>
    </tr>
        <?php endforeach;?>
    </tbody>
</table>

    <?php endif; ?>


<!--Skills and Expertise-->

<h3>Skills and Expertise</h3>
<?php if($data['languages']==null && $data['hobbies']==null && $data['computerSkills']==null && $data['skills']==null && $data['foInterest']==null):?>
<table class="table table-bordered">
    <tr><td>
        <p class="text-center"> <a class="btn btn-small " href="<?php echo site_url('panel/index/skills'); ?>">Add Skills and Expertise</a></p>
        <p class="text-error text-center">You haven't updated your Skills and Expertise Details. Please Update your Skills and Expertise Details</p>
    </td></tr>
</table>
    <?php else: ?>

    <table class="table table-bordered table-condensed table-striped">
        <tbody>
            <?php if($data['languages']!=null):?>
    <tr>
        <th>Languages</th>
        <td><?php echo $data['languages']; ?></td>
    </tr>
        <?php endif; ?>


    <?php if($data['hobbies']!=null):?>
    <tr>
        <th>Hobbies</th>
        <td><?php echo $data['hobbies']; ?></td>
    </tr>
        <?php endif; ?>


    <?php if($data['computerSkills']!=null):?>
    <tr>
        <th>Computer Skills</th>
        <td><?php echo $data['computerSkills']; ?></td>
    </tr>
        <?php endif; ?>

    <?php if($data['skills']!=null):?>
    <tr>
        <th>Skills</th>
        <td><?php echo $data['skills']; ?></td>
    </tr>
        <?php endif; ?>

    <?php if($data['foInterest']!=null):?>
    <tr>
        <th>Interests</th>
        <td><?php echo $data['foInterest']; ?></td>
    </tr>
        <?php endif; ?>
    <?php endif;?>
</tbody>
</table>

<!--Resume-->

<h3>Resume</h3>

<?php if($data['resume']==null):?>
<table class="table table-bordered">
    <tr><td>
        <p class="text-center"> <a class="btn btn-small " href="<?php echo site_url('panel/index/resume'); ?>">Upload Resume</a></p>
        <p class="text-error text-center">You haven't uploaded Resume. Please Upload your resume</p>
    </td></tr>
</table>
    <?php else: ?>

    <table class="table table-bordered table-condensed table-striped">
        <tbody>
    <tr>
        <th>Resume</th>
        <td><a target="_blank" href="<?php echo base_url('').'/uploads/'.$data['resume']; ?>" >Download</a></td>
    </tr>

    <?php endif;?>
</tbody>
</table>



<!--END-->
</div>
</div>


<?php
loadBootstrap('script.min');
?>