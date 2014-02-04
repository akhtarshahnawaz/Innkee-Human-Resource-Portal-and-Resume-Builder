<div class="container">
<div class="span11 well">
    <?php
    $ci=& get_instance();
    $ci->load->library('session');

    $admin=$ci->session->userdata('adminLoggedIn');
    $employer=$ci->session->userdata('employerLoggedIn');

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



    <?php   $this->load->helper('form');
    $attributes = array('class' => 'form-horizontal ');
    echo form_open('admin/index/sendMail', $attributes); ?>

    <input type="hidden" name="inputType" value="<?php if(!empty($type)){ echo $type;}?>">

    <?php if($admin):?>
    <input type="text" class="input-block-level" name="inputEmail" value="<?php if(!empty($email)){ echo $email;}?>" placeholder="To">
    </br></br>
    <?php elseif($employer): ?>
    <input type="hidden" name="inputEmail" value="<?php if(!empty($email)){ echo $email;}?>">
    <?php endif; ?>
    <input type="text" class="input-block-level" name="inputSubject" placeholder="Subject of Message">
    </br></br>
    <textarea class="input-block-level" rows="10" name="inputMessage"></textarea>


    </br></br>

            <button type="submit" class="btn btn-info btn-block">Send Message</button>
    </div>
    </form>

</div>
</div>
