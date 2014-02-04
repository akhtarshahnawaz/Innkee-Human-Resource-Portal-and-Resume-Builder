<style type="text/css">

    body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
    }

    .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
        -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
        box-shadow: 0 1px 2px rgba(0,0,0,.05);
    }
    .form-signin .form-signin-heading,
    .form-signin .checkbox {
        margin-bottom: 10px;
    }
    .form-signin input[type="text"],
    .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
    }


</style>
<div class="container">

    <div class="">
        <?php   $this->load->helper('form');
        $attributes = array('class' => 'form-signin');
        echo form_open('index/register', $attributes); ?>
        <p align="center" style="margin: 10px; padding: 10px;"><a href="<?php echo site_url('');?>"><img src="<?php assetLink(array('logo.png'=>'image')); ?>"/></a></p>
        <p class="text-error"><?php if(isset($errors)){ echo $errors;}?></p>

        <input type="hidden" value="<?php echo $type; ?>" name="type">
        <input type="text" name="inputFullName" class="input-block-level"  value="<?php if(!empty($data)){echo $data['inputFullName'];}?>" id="inputFullName" placeholder="Full Name  (required)">
        <input type="text" class="input-block-level" name="inputEmail" value="<?php if(!empty($data)){echo $data['inputEmail'];}?>"  id="inputEmail" placeholder="E-Mail  (required)">

        <input type="password" class="input-block-level"  name="inputPassword" id="inputPassword" placeholder="Password">

        <input type="password" class="input-block-level"  name="inputRePassword" id="inputRePassword" placeholder="Re Enter Password">

        <?php if($type=='employer'):?>
            <input type="text" class="input-block-level"  name="inputJobTitle" id="inputJobTitle" placeholder="Job Title">
            <input type="text" class="input-block-level"  name="inputCompany" id="inputCompany" placeholder="Company">
        <?php endif; ?>

        <input type="text" class="input-block-level"  name="inputPhone" value="<?php if(!empty($data)){echo $data['inputPhone'];}?>"  id="inputPhone" placeholder="Phone (required)">

        <input type="text" class="input-block-level"  name="inputAddress" value="<?php if(!empty($data)){echo $data['inputAddress'];}?>"  id="inputAddress" placeholder="Address">

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-success btn-large btn-block">Register</button>
        </form>
    </div>

</div>
