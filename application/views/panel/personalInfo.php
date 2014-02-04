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



    <div class="pull-left">
        <?php   $this->load->helper('form');
        $attributes = array('class' => 'form-horizontal ');
        echo form_open('panel/index/personalInfo', $attributes); ?>

        <div class="control-group">
            <label class="control-label" for="inputFullName">Full Name</label>
            <div class="controls">
                <input type="text" name="inputFullName" value="<?php if(!empty($data)){ echo $data['name'];}?>" id="inputFullName" placeholder="Full Name">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="inputDOB">Date of Birth</label>
            <div class="controls">
                <input type="text" name="inputDOB" value="<?php if(!empty($data)){ echo $data['dob'];}?>" id="inputDOB" placeholder="Date of Birth">
            </div>
        </div>


        <div class="control-group">
            <label class="control-label" for="inputFatherName">Father Name</label>
            <div class="controls">
                <input type="text" name="inputFatherName" value="<?php if(!empty($data)){ echo $data['fatherName'];}?>" id="inputFatherName" placeholder="Father Name">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="inputMotherName">Mother Name</label>
            <div class="controls">
                <input type="text" name="inputMotherName" value="<?php if(!empty($data)){ echo $data['motherName'];}?>" id="inputMotherName" placeholder="Mother Name">
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-info">Update</button>
            </div>
        </div>
        </form>
    </div>
    <div class="pull-right well span2">
        <div><img src="<?php if(!empty($data)){if($data['photo']!=null){ echo base_url().'uploads/'.$data['photo']; }else{ linkAsset('images/avatar.jpg'); }} ?>" id="image" width="160px" height="160px"> </div>
        </br>
        <p align="center" ><a class="btn btn-mini btn-primary" href="#" id="inputImage"  action="<?php echo site_url('panel/index/uploadImage');?>"><i class="icon-camera icon-white"></i> Change</a></p>
    </div>

</div>
</div>


<?php
loadBootstrap('style');
loadAsset(array('jquery-1.7.1.min.js'=>'script','jquery-ui.css'=>'style','jquery-ui.js'=>'script','ajaxupload.js'=>'script'));
loadBootstrap('script.min');
?>

<script type="text/javascript">

    $('#inputDOB').attr('readonly', true);

    $( "#inputDOB" ).datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+0",
        numberOfMonths: 1
    });



</script>

<script type="text/javascript">

    //Ajax Image Upload
    $(document).ready(function(){

        //var thumb = $('#message');

        new AjaxUpload('inputImage', {
            action: $('#inputImage').attr('action'),
            name: 'inputImage',
            onSubmit: function(file, extension) {
                //$('#image').attr('src','none');
                // $('#inputImage').value('Saving');

            },
            onComplete: function(file,response) {
                $('#image').attr('src',response);
            }
        });
    });

</script>
