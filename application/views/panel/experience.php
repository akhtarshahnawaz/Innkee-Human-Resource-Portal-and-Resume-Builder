<div class="span8 well">

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



    <a href="<?php echo site_url('panel/data/addExperience')?>"  class="btn btn-success btn-small pull-right"><?php if($type=='jobSeeker'){ echo "Add Experience";}elseif($type=="intern"){ echo "Add Training"; }?></a>
    </br>
    </br>
    </br>

    <?php if(!empty($data)): ?>
    <table class="table table-bordered table-condensed table-striped">
        <thead>
        <tr>
            <th>Experience Type</th>
            <th>Company</th>
            <th>From</th>
            <th>Till</th>
            <th>Designation</th>
            <th>Function</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($data as $row):?>
        <tr>
            <td><?php if($row['type']=='training'){ echo "Training"; }elseif($row['type']=='job'){ echo 'Job';}?></td>
            <td><?php echo $row['company'];?></td>
            <td><?php if($row['to']!=null){echo dateToString($row['from']);}else{echo '-';}?></td>
            <td><?php if($row['to']!=null){echo dateToString($row['to']);}else{echo '-';}?></td>
            <td><?php echo $row['designation'];?></td>
            <td><?php if($row['function']!="null"){echo $row['function'];}?></td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-mini btn-primary" href="<?php echo site_url('panel/data/editExperience').'/'.$row['type'].'/'.$row['pkey'];?>">Edit</a>
                    <button class="btn btn-mini btn-primary" data-toggle="dropdown">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <!-- dropdown menu links -->
                        <li> <a href="<?php echo site_url('panel/data/removeExperience').'/'.$row['pkey'];?>"><i class="icon-remove-sign"></i> Remove</a></li>
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