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


    <p class="lead" align="center">Generate Resume</p>
        <?php   $this->load->helper('form');
        $attributes = array('class' => 'form-horizontal ');
        echo form_open('panel/index/generateResume/true', $attributes); ?>


                <input type="text" class="input-block-level" name="inputObjective"  id="inputObjective" placeholder="Objective of Resume">



                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-block btn-info">Generate Resume</button>

        </form>
        </br>



</div>
</div>



<?php

loadBootstrap('style.responsive.min');
loadAsset(array('jquery-1.7.1.min.js'=>'script'));
loadBootstrap('script.min');
?>