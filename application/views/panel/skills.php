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



    <?php   $this->load->helper('form');
    $attributes = array('class' => 'form-horizontal ');
    echo form_open('panel/index/skills', $attributes); ?>

    <div class="control-group">
        <label class="control-label" for="inputLanguages">Languages</label>
        <div class="controls">
            <input type="text" name="inputLanguages" value="<?php if(!empty($data)){ echo $data['languages'];}?>" id="inputLanguages" placeholder="Known Languages">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputHobbies">Hobbies</label>
        <div class="controls">
            <input type="text" name="inputHobbies" value="<?php if(!empty($data)){ echo $data['hobbies'];}?>" id="inputHobbies" placeholder="Hobbies">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputComputerSkills">Computer Skills</label>
        <div class="controls">
            <input type="text" name="inputComputerSkills" value="<?php if(!empty($data)){ echo $data['computerSkills'];}?>" id="inputComputerSkills" placeholder="Computer Skills">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputExtraSkills">Extra Skills</label>
        <div class="controls">
            <input type="text" name="inputExtraSkills" value="<?php if(!empty($data)){ echo $data['skills'];}?>" id="inputExtraSkills" placeholder="Extra Skills">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputInterest">Interest</label>
        <div class="controls">
            <input type="text" name="inputInterest" value="<?php if(!empty($data)){ echo $data['foInterest'];}?>" id="inputInterest" placeholder="Fields of Interest">
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-info">Update</button>
        </div>
    </div>
    </form>

</div>
</div>
