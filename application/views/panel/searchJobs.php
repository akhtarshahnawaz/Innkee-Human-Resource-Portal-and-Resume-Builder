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



    <?php if(isset($data)):?>
    <?php if(!empty($data)):?>



            <table class="table table-condensed table-striped table-bordered">
                <tr>
                    <th></th>
                    <th>Title</th>
                    <th>Industry</th>
                    <th>Closing Date</th>
                    <th>Details</th>

                    <th></th>
                </tr>
                <?php foreach($data as $key=>$row):?>
                <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['industry']; ?></td>
                    <td><?php echo dateToString($row['closingDate']); ?></td>
                    <td><?php echo $row['details']; ?></td>
                    <td>
                        <div class="btn-group">
                            <?php if(isset($row['applicationKey']) && $row['applicationKey']!=null):?>
                            <a  class="btn btn-danger btn-mini" href="<?php echo site_url('panel/index/unApplyJob/'.$row['jobKey'].'/'.$row['fkey_login_jobs'])?>">Un Apply</a>

                            <?php else:?>
                            <a  class="btn btn-success btn-mini" href="<?php echo site_url('panel/index/applyJob/'.$row['jobKey'].'/'.$row['fkey_login_jobs'])?>">Apply</a>

                            <?php endif; ?>

                        </div>
                    </td>
                </tr>
                <?php
            endforeach; ?>
            </table>
        <?php else: ?>
        <div class="well">
            <p class="text-error" align="center">Sorry..No Jobs Matching your profile has been found...</p>
        </div>
        <?php endif; ?>

    <?php endif; ?>

</div>
</div>

<?php
loadAsset(array('jquery-1.7.1.min.js'=>'script'));
?>

