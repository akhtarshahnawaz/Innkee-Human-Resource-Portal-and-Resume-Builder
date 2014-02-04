<div class="">
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


<?php if(isset($data)):?>
    <?php if(!empty($data)):?>


    <div class="well">
        <h2 align="center">My Jobs</h2>

        <table class="table table-condensed table-striped table-bordered">
            <tr>
                <th></th>
                <th>Job Title</th>
                <th>Industry</th>
                <th>Closing Date</th>
                <th></th>
            </tr>
            <?php foreach($data as $key=>$value):?>
            <tr>
                <td><?php echo $key+1; ?></td>
                <td><?php echo $value['title']; ?></td>
                <td><?php echo $value['industry']; ?></td>
                <td><?php echo dateToString($value['closingDate']); ?></td>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-success btn-danger btn-mini"  href="<?php echo site_url('admin/job/applicants/'.$value['pkey'])?>">Applicants</a>
                        <a class="btn btn-mini btn-primary" href="<?php echo site_url('admin/job/updateJob/'.$value['pkey'])?>">Edit</a>
                        <a class="btn btn-mini btn-danger"  href="<?php echo site_url('admin/job/deleteJob/'.$value['pkey'])?>">Delete</a>
                    </div>
                </td>
            </tr>
            <?php
        endforeach; ?>
        </table>
    </div>
        <?php else: ?>
    <div class="well">
        <p class="text-error" align="center">You haven't posted any job till now</p>
        <p align="center"><a class="btn btn-success" href="<?php echo site_url('admin/job/addJob')?>">Post a Job Now</a> </p>

    </div>
        <?php endif; ?>

    <?php endif; ?>
</div>
<?php
loadAsset(array('jquery-1.7.1.min.js'=>'script'));
loadBootstrap('script.min');
?>
