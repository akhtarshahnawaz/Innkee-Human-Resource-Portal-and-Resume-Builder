<div class="span8 well">

    <?php
    $ci=& get_instance();
    $ci->load->library('session');
    $type=$ci->session->userdata('type');
    ?>
    <!-- Form Start-->

    <?php   $this->load->helper('form');
    $attributes = array('class' => 'form-horizontal ');
    if(!empty($data)){
        $submitTo='panel/data/editExperience';
        $buttonName='Update';
    }else{
        $submitTo='panel/data/addExperience';
        $buttonName='Add';
    }
    echo form_open($submitTo, $attributes); ?>

    <?php if($type=='jobSeeker'):?>
    <div class="control-group">
        <label class="control-label" for="inputExperienceType">Experience Type</label>
        <div class="controls">
            <select name="inputExperienceType" class="input-medium" id="inputExperienceType"  lastSelected="<?php if(!empty($data)){ echo $data['type'];}?>" >
                <option <?php if(isset($type) && $type=="job"){ echo "selected";}?> value="job">Job</option>
                <option <?php if(isset($type) && $type=="training"){ echo "selected";}?> value="training">Training</option>
            </select>
        </div>
    </div>
    <?php elseif($type=='intern'): ?>
    <input type="hidden" name="inputExperienceType" value="training">
    <?php endif; ?>
    <input type="hidden" name="inputPkey" value='<?php if(!empty($data)){ echo $data['pkey'];}?>'>

    <div class="control-group">
        <label class="control-label" for="inputCompany">Company</label>
        <div class="controls">
            <input type="text" name="inputCompany" value="<?php if(!empty($data)){ echo $data['company'];}?>" id="inputCompany" placeholder="Company Name">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputFrom">From</label>
        <div class="controls">
            <input type="text" name="inputFrom" value="<?php if(!empty($data)){ echo $data['from'];}?>" id="inputFrom" placeholder="From">
        </div>
    </div>


    <div class="control-group">
        <label class="control-label" for="inputTill">Till</label>
        <div class="controls">
            <input type="text" name="inputTill" value="<?php if(!empty($data)){ echo $data['to'];}?>" id="inputTill" placeholder="Till">
            <input type="checkbox" <?php if(!empty($data) && $data['to']==null){ echo 'checked';}?> name="inputWorking" id="inputWorking"> Still Working

        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputDesignation">Designation</label>
        <div class="controls">
            <input type="text" name="inputDesignation" value="<?php if(!empty($data)){ echo $data['designation'];}?>" id="inputDesignation" placeholder="Designation">
        </div>
    </div>


    <div class="control-group">
        <label class="control-label" for="inputFunction">Functional Area</label>
        <div class="controls">
            <select name="inputFunction" class="input-large" id="inputFunction"  lastSelected="<?php if(!empty($data)){ echo $data['function'];}?>" >

                <option value="null" >Select</option>
                <option value="Accounts / Finance / Tax / CS / Audit" >Accounts / Finance / Tax / CS / Audit</option>
                <option value="Agent" >Agent</option>
                <option value="Analytics &amp; Business Intelligence" >Analytics &amp; Business Intelligence</option>
                <option value="Architecture / Interior Design" >Architecture / Interior Design</option>
                <option value="Banking / Insurance" >Banking / Insurance</option>
                <option value="Content / Journalism" >Content / Journalism</option>
                <option value="Corporate Planning / Consulting" >Corporate Planning / Consulting</option>
                <option value="Engineering Design / R&amp;D">Engineering Design / R&amp;D</option>
                <option value="Export / Import / Merchandising" >Export / Import / Merchandising</option>
                <option value="Fashion / Garments / Merchandising" >Fashion / Garments / Merchandising</option>
                <option value="Guards / Security Services" >Guards / Security Services</option>
                <option value="Hotels / Restaurants" >Hotels / Restaurants</option>
                <option value="HR / Administration / IR" >HR / Administration / IR</option>
                <option value="IT Software - Client Server" >IT Software - Client Server</option>
                <option value="IT Software - Mainframe" >IT Software - Mainframe</option>
                <option value="IT Software - Middleware" >IT Software - Middleware</option>
                <option value="IT Software - Mobile" >IT Software - Mobile</option>
                <option value="IT Software - Other" >IT Software - Other</option>
                <option value="IT Software - System Programming" >IT Software - System Programming</option>
                <option value="IT Software - Telecom Software" >IT Software - Telecom Software</option>
                <option value="IT Software - Application Programming / Maintenance" >IT Software - Application Programming / Maintenance</option>
                <option value="IT Software - DBA / Datawarehousing" >IT Software - DBA / Datawarehousing</option>
                <option value="IT Software - E-Commerce / Internet Technologies" >IT Software - E-Commerce / Internet Technologies</option>
                <option value="IT Software - Embedded /EDA /VLSI /ASIC /Chip Des." >IT Software - Embedded /EDA /VLSI /ASIC /Chip Des.</option>
                <option value="IT Software - ERP / CRM" >IT Software - ERP / CRM</option>
                <option value="IT Software - Network Administration / Security" >IT Software - Network Administration / Security</option>
                <option value="IT Software - QA &amp; Testing" >IT Software - QA &amp; Testing</option>
                <option value="IT Software - Systems / EDP / MIS" >IT Software - Systems / EDP / MIS</option>
                <option value="IT- Hardware / Telecom / Technical Staff / Support" >IT- Hardware / Telecom / Technical Staff / Support</option>
                <option value="ITES / BPO / KPO / Customer Service / Operations" >ITES / BPO / KPO / Customer Service / Operations</option>
                <option value="Legal" >Legal</option>
                <option value="Marketing / Advertising / MR / PR" >Marketing / Advertising / MR / PR</option>
                <option value="Packaging" >Packaging</option>
                <option value="Pharma / Biotech / Healthcare / Medical / R&amp;D" >Pharma / Biotech / Healthcare / Medical / R&amp;D</option>
                <option value="Production / Maintenance / Quality" >Production / Maintenance / Quality</option>
                <option value="Purchase / Logistics / Supply Chain" >Purchase / Logistics / Supply Chain</option>
                <option value="Sales / BD" >Sales / BD</option>
                <option value="Secretary / Front Office / Data Entry" >Secretary / Front Office / Data Entry</option>
                <option value="Self Employed / Consultants" >Self Employed / Consultants</option>
                <option value="Shipping" >Shipping</option>
                <option value="Site Engineering / Project Management" >Site Engineering / Project Management</option>
                <option value="Teaching / Education" >Teaching / Education</option>
                <option value="Ticketing / Travel / Airlines" >Ticketing / Travel / Airlines</option>
                <option value="Top Management" >Top Management</option>
                <option value="TV / Films / Production" >TV / Films / Production</option>
                <option value="Web / Graphic Design / Visualiser" >Web / Graphic Design / Visualiser</option>
                <option value="Other" >Other</option>
            </select>
        </div>
    </div>


    <div class="control-group">
        <div class="controls">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button  type="submit"  class="btn btn-primary"><?php echo $buttonName; ?></button>
        </div>
    </div>

</div>

</div>
</form>


<!-- Modal End-->


</div>
</div>




<?php
loadAsset(array('jquery-1.7.1.min.js'=>'script','jquery-ui.css'=>'style','jquery-ui.js'=>'script'));
loadBootstrap('script.min');
?>

<script type="text/javascript">


    $('#inputFrom').attr('readonly', true);
    $('#inputTill').attr('readonly', true);


    $( "#inputFrom" ).datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+0",
        numberOfMonths: 1,
        onClose: function( selectedDate ) {
            $( "#inputTill" ).datepicker( "option", "minDate", selectedDate );
        }

    });
    $( "#inputTill" ).datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+0",
        numberOfMonths: 1,
        onClose: function( selectedDate ) {
            $( "#inputFrom" ).datepicker( "option", "maxDate", selectedDate );
        }
    });


</script>


<script type="text/javascript">

    var functions =$('#inputFunction').attr('lastSelected');
    var functionItems=$('#inputFunction').children('option[value="'+functions+'"]');
    functionItems.attr('selected','selected');

</script>