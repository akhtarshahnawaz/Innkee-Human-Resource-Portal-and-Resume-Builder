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
            <h2 align="center">Applicants for your Job</h2>

            <table class="table table-condensed table-striped table-bordered">
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Current CTC (per Annum)</th>
                    <th>Current Company</th>
                    <th></th>
                </tr>
                <?php foreach($data as $key=>$value):?>
                <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><?php echo $value['name']; ?></td>
                    <td><?php echo $value['currentCTC']; ?></td>
                    <td><?php echo $value['currentCompany']; ?></td>
                    <td>
                        <div class="btn-group">
                            <a  class="btn btn-success btn-mini" href="<?php echo site_url('admin/index/viewApplicant/'.$value['fkey_login'])?>">View</a>
                            <a class="btn btn-info btn-mini" href="<?php echo site_url('admin/index/sendMail/'.$value['fkey_login'])?>">Send Message</a>

                        </div>
                    </td>
                </tr>
                <?php
            endforeach; ?>
            </table>
        </div>
        <?php else: ?>
        <div class="well">
            <p class="text-error" align="center">Sorry..No One applied for your Job..</p>

        </div>
        <?php endif; ?>

    <?php endif; ?>
</div>
<?php
loadAsset(array('jquery-1.7.1.min.js'=>'script'));
loadBootstrap('script.min');
?>
