<div class="span8 well">

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

    <?php if(!$highSchool):?>
    <a href="<?php echo site_url('panel/data/addEducation/highSchool')?>" class="btn btn-success btn-mini"><i class="icon-plus"></i> High School</a>
    <?php endif; ?>
    <?php if(!$intermediate):?>
    <a href="<?php echo site_url('panel/data/addEducation/intermediate')?>" class="btn btn-success btn-mini"><i class="icon-plus"></i>  Intermediate</a>
    <?php endif; ?>
    <a href="<?php echo site_url('panel/data/addEducation/graduation')?>" class="btn btn-success btn-mini"><i class="icon-plus"></i>  Graduation</a>
    <a href="<?php echo site_url('panel/data/addEducation/postGraduation')?>" class="btn btn-success btn-mini"><i class="icon-plus"></i>  Post Graduation</a>
    <a href="<?php echo site_url('panel/data/addEducation/doctorate')?>" class="btn btn-success btn-mini"><i class="icon-plus"></i> Doctorate</a>
        <a href="<?php echo site_url('panel/data/addEducation/diploma')?>" class="btn btn-success btn-mini"><i class="icon-plus"></i>  Diploma</a>
    <a href="<?php echo site_url('panel/data/addEducation/certification')?>" class="btn btn-success btn-mini"><i class="icon-plus"></i>  Certificate</a>
    </br>
    </br>

    <?php if(!empty($data)): ?>
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
            <th></th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($data as $row):?>
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
            <td><?php  if($row['from']!=null){echo $row['from'];}else{echo '-';} ?></td>
            <td><?php if($row['to']!=null){echo $row['to'];}else{echo '-';}?></td>
            <td><?php echo $row['institute'];?></td>
            <td><?php echo $row['percentage'];?></td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-mini btn-primary" href="<?php echo site_url('panel/data/editEducation').'/'.$row['type'].'/'.$row['pkey'];?>">Edit</a>
                    <button class="btn btn-mini btn-primary" data-toggle="dropdown">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <!-- dropdown menu links -->
                        <li> <a href="<?php echo site_url('panel/data/removeEducation').'/'.$row['pkey'];?>"><i class="icon-remove-sign"></i> Remove</a></li>
                    </ul>
                </div>
            </td>

        </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <?php else:?>
    <?php endif; ?>
</div>
</div>

<?php
loadAsset(array('jquery-1.7.1.min.js'=>'script','jquery-ui.css'=>'style','jquery-ui.js'=>'script'));
loadBootstrap('script.min');
?>