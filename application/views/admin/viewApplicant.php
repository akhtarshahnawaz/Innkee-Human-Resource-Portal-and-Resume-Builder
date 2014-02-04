<div class="span12">
<?php
$type=$data['type'];
?>

<table>
    <tr>
        <td><img src="<?php if(!empty($data)){if($data['photo']!=null){ echo base_url().'uploads/'.$data['photo']; }else{ linkAsset('images/avatar.jpg'); }} ?>" width="130px" height="240px">
        </td>
        <td>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </td>
        <td>
            <h1 class="text-info" style="margin: 0px; padding: 0px; letter-spacing: 8px;"><?php echo $data['name']; ?></h1>
            <?php if($data['location']!=null):?>
            <p class="lead"  style="margin: 0px; padding: 0px;">Add: <?php echo $data['location']; ?></p>
            <p class="lead"  style="margin: 0px; padding: 0px;">Phone: <?php echo $data['phone']; ?> E-Mail: <?php echo $data['email']; ?></p>

            <?php endif; ?>
        </td>
    </tr>
</table>
</br>
</br>

<!--Professional Information-->
<?php if($type=='jobSeeker'):?>

<strong><p class="lead text-info">Professional Details</p></strong>

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
            ?></td>    </tr>
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

    </tbody>
</table>

    <?php endif; ?>

<!-- Education-->
<?php if(!empty($education)):?>
<strong><p class="lead text-info">Education Details</p></strong>
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
<?php if(!empty($experience)):?>
<strong><p class="lead text-info">Experience</p></strong>
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
<?php if($data['languages']!=null || $data['hobbies']!=null || $data['computerSkills']!=null || $data['skills']!=null || $data['foInterest']!=null):?>

<strong><p class="lead text-info">Skills and Expertise</p></strong>

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
    </tbody>
</table>
    <?php endif; ?>


<!--Personal Information-->
<strong><p class="lead text-info">Personal Details</p></strong>


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
    </tbody>
</table>

<!--Contact Information-->
<?php if($data['email']!=null || $data['phone']!=null || $data['location']!=null || $data['nationality']!=null):?>
<strong><p class="lead text-info">Contact Details</p></strong>


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
    </tbody>
</table>
    <?php endif; ?>



<!--END-->
</div>
</div>


<?php
loadBootstrap('script.min');
?>