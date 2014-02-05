<div class=" well">

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
            <th>Email</th>
            <th>Phone</th>
            <th>Designation</th>
            <th>Industry</th>
            <th>Function</th>
            <th></th>
        </tr>
        <?php foreach($data as $key=>$value):?>
        <tr>
            <td><?php echo $key+1; ?></td>
            <td><?php echo $value['name']; ?></td>
            <td><?php echo $value['email']; ?></td>
            <td><?php echo $value['phone']; ?></td>
            <td><?php echo $value['currentDesignation']; ?></td>
            <td><?php echo $value['currentIndustry']; ?></td>
            <td><?php echo $value['currentFunctionalArea']; ?></td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-success btn-mini" href="<?php echo site_url('admin/index/viewApplicant/'.$value['fkey_login'])?>">View</a>
                    <a class="btn btn-info btn-mini" href="<?php echo site_url('admin/index/sendMail/'.$value['fkey_login'])?>">Send Mail</a>

                    <?php if($value['loginStatus']==0):?>
                    <a class="btn btn-mini btn-warning" href="<?php echo site_url('admin/index/unStopAccess/'.$value['loginKey'])?>">Provoke Access</a>
                    <?php elseif($value['loginStatus']>0):?>
                    <a class="btn btn-mini btn-danger" href="<?php echo site_url('admin/index/stopAccess/'.$value['loginKey'])?>">Revoke Access</a>
                    <?php endif; ?>
                </div>

            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <!-- PAGINATION START-->
    <div class="pagination">
        <?php
        if(isset($totalEntries)){
            $totalPages=$totalEntries/$this->config->item('maxPageSize');
        }
        ?>
        <ul>
            <?php if(($page-1)>=0):?>
            <li><a href="<?php echo site_url('admin/index/jobSeekers').'/'.($page-1);?>">Prev</a></li>
            <?php endif; ?>
            <?php for($i=0;$i<$totalPages;$i++):?>
            <li <?php if($i==$page){ echo 'class="disabled"';}?> ><a href="<?php echo site_url('admin/index/jobSeekers').'/'.$i;?>"><?php echo $i+1 ?></a></li>
            <?php endfor; ?>
            <?php if(($page+1)<$totalPages):?>

            <li><a href="<?php echo site_url('admin/index/jobSeekers').'/'.($page+1);?>">Next</a></li>
            <?php endif; ?>

        </ul>
    </div>
    <!-- PAGINATION END-->


</div>
<?php
loadAsset(array('jquery-1.7.1.min.js'=>'script','jquery-ui.css'=>'style','jquery-ui.js'=>'script'));
loadBootstrap('script.min');
?>