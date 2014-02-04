<div class="row well">
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

    <table class="table table-condensed table-striped table-bordered">
        <tr>
            <th></th>
            <th>Name</th>
            <th>Job Title</th>
            <th>Company</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Location</th>

            <th></th>
        </tr>
        <?php foreach($data as $key=>$value):?>
        <tr>
            <td><?php echo $key+1; ?></td>
            <td><?php echo $value['name']; ?></td>
            <td><?php echo $value['job_title']; ?></td>
            <td><?php echo $value['company']; ?></td>
            <td><?php echo $value['email']; ?></td>
            <td><?php echo $value['phone']; ?></td>
            <td><?php echo $value['address']; ?></td>
            <td>                <a href="<?php echo site_url('admin/index/sendMail/'.$value['fkey_login_employer'])?>">Send Mail</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php
loadAsset(array('jquery-1.7.1.min.js'=>'script','jquery-ui.css'=>'style','jquery-ui.js'=>'script'));
loadBootstrap('script.min');
?>