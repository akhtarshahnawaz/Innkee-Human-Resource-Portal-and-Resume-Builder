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



    <?php if($data['resume']!=null || $data['resume']!=''):?>

    <p>
        <a href="#updateResume"  role="button" data-toggle="modal" class="btn btn-small btn-primary pull-right">Update Resume</a>
    </p>
    </br>
    <hr/>
    <?php else: ?>
    <?php   $this->load->helper('form');
    $attributes = array('class' => 'form-horizontal well');
    echo  form_open_multipart('panel/index/resume', $attributes); ?>

    <div class="control-group">
        <label class="control-label" for="inputResume">Attach Resume</label>
        <div class="controls">
            <input type="hidden"  name="inputSelected" value="selected">
            <input type="file"  name="userfile" id="inputResume" placeholder="Select Resume">
            <button type="submit" class="btn btn-primary">Upload</button>
        </div>
    </div>
    </form>
    <?php endif; ?>

    <?php if($data['resume']!=null || $data['resume']!=''):?>
    <p class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Download your Resume: &nbsp;&nbsp;
        <a class="btn btn-mini btn-inverse" href="<?php echo base_url('').'/uploads/'.$data['resume']; ?>" target="_blank">Download Resume</a>
    </p>
    <?php endif; ?>


</div>
</div>

<?php if($data['resume']!=null || $data['resume']!=''):?>

<!-- Modal Start-->

<div id="updateResume" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Update Resume</h3>
    </div>
    <div class="modal-body">
        <?php   $this->load->helper('form');
        $attributes = array('class' => 'form-horizontal well');
        echo  form_open_multipart('panel/index/resume', $attributes); ?>


        <div class="control-group">
            <label class="control-label" for="inputResume2">Attach Resume</label>
            <div class="controls">
                <input type="hidden"  name="inputSelected" value="selected">
                <input type="file"  name="userfile" id="inputResume2" placeholder="Select Resume">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button  type="submit"  class="btn btn-primary">Upload</button>
    </div>
    </form>
</div>

<!-- Modal End-->

<?php

    endif;

loadBootstrap('style.responsive.min');
loadAsset(array('jquery-1.7.1.min.js'=>'script'));
loadBootstrap('script.min');
?>