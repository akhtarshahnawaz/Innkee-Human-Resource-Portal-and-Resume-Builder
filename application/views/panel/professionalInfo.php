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


    <?php

        if(!empty($data)){
            $experience=explode('$-$',$data['experience']);
        }
    ?>

    <?php   $this->load->helper('form');
    $attributes = array('class' => 'form-horizontal ');
    echo form_open('panel/index/professionalInfo', $attributes); ?>

    <div class="control-group">
        <label class="control-label" for="inputYear">Experience</label>
        <div class="controls">
            <select name="inputYear" class="input-small" id="inputYear"  lastSelected="<?php if(!empty($experience)){ echo $experience[0];}?>" >
                <option value="null" >Years</option>
                <option value="0">Fresher</option>
                <option value="1">1 Year</option>
                <option value="2">2 Year</option>
                <option value="3">3 Year</option>
                <option value="4">4 Year</option>
                <option value="5">5 Year</option>
                <option value="6">6 Year</option>
                <option value="7">7 Year</option>
                <option value="8">8 Year</option>
                <option value="9">9 Year</option>
                <option value="10">10 Year</option>
                <option value="11">11Year</option>
                <option value="12">12 Year</option>
                <option value="13">13 Year</option>
                <option value="14">14 Year</option>
                <option value="15">15 Year</option>
                <option value="16">16 Year</option>
                <option value="17">17 Year</option>
                <option value="18">18 Year</option>
                <option value="19">19 Year</option>
                <option value="20">20 Year</option>
                <option value="20+">20+ Year</option>
            </select>
            <select name="inputMonths" class="input-small" id="inputMonths"  lastSelected="<?php if(!empty($experience)){ echo $experience[1];}?>" >
                <option value="null" >Months</option>
                <option value="1">1 Month</option>
                <option value="2">2 Month</option>
                <option value="3">3 Month</option>
                <option value="4">4 Month</option>
                <option value="5">5 Month</option>
                <option value="6">6 Month</option>
                <option value="7">7 Month</option>
                <option value="8">8 Month</option>
                <option value="9">9 Month</option>
                <option value="10">10 Month</option>
                <option value="11">11 Month</option>
                <option value="12">12 Month</option>
            </select>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputCurrentCompany">Current Company</label>
        <div class="controls">
            <input type="text" name="inputCurrentCompany"  value="<?php if(!empty($data)){ echo $data['currentCompany'];}?>" id="inputCurrentCompany" placeholder="Current Company">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputDesignation">Designation</label>
        <div class="controls">
            <input type="text" name="inputDesignation"  value="<?php if(!empty($data)){ echo $data['currentDesignation'];}?>" id="inputDesignation" placeholder="Designation">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputIndustry">Current Industry</label>
        <div class="controls">
            <select name="inputIndustry" class="input-large" id="inputIndustry"  lastSelected="<?php if(!empty($data)){ echo $data['currentIndustry'];}?>" >

                <option value="null" >Select</option>
                <option value="Accounting/Finance" >Accounting/Finance</option>
                <option value="Advertising/PR/MR/Events" >Advertising/PR/MR/Events</option>
                <option value="Agriculture/Dairy" >Agriculture/Dairy</option>
                <option value="Animation" >Animation</option>
                <option value="Architecture/Interior Designing" >Architecture/Interior Designing</option>
                <option value="Auto/Auto Ancillary" >Auto/Auto Ancillary</option>
                <option value="Aviation / Aerospace Firms">Aviation / Aerospace Firms</option>
                <option value="Banking/Financial Services/Broking" >Banking/Financial Services/Broking</option>
                <option value="BPO/ITES" >BPO/ITES</option>
                <option value="Brewery / Distillery" >Brewery / Distillery</option>
                <option value="Ceramics /Sanitary ware" >Ceramics /Sanitary ware</option>
                <option value="Chemicals/PetroChemical/Plastic/Rubber" >Chemicals/PetroChemical/Plastic/Rubber</option>
                <option value="Construction/Engineering/Cement/Metals" >Construction/Engineering/Cement/Metals</option>
                <option value="Consumer Durables" >Consumer Durables</option>
                <option value="Courier/Transportation/Freight" >Courier/Transportation/Freight</option>
                <option value="Defence/Government" >Defence/Government</option>
                <option value="Education/Teaching/Training" >Education/Teaching/Training</option>
                <option value="Electricals / Switchgears" >Electricals / Switchgears</option>
                <option value="Export/Import" >Export/Import</option>
                <option value="Facility Management" >Facility Management</option>
                <option value="Fertilizers/Pesticides" >Fertilizers/Pesticides</option>
                <option value="FMCG/Foods/Beverage" >FMCG/Foods/Beverage</option>
                <option value="Food Processing" >Food Processing</option>
                <option value="Fresher/Trainee" >Fresher/Trainee</option>
                <option value="Gems &amp; Jewellery" >Gems &amp; Jewellery</option>
                <option value="Glass" >Glass</option>
                <option value="Heat Ventilation Air Conditioning" >Heat Ventilation Air Conditioning</option>
                <option value="Hotels/Restaurants/Airlines/Travel" >Hotels/Restaurants/Airlines/Travel</option>
                <option value="Industrial Products/Heavy Machinery" >Industrial Products/Heavy Machinery</option>
                <option value="Insurance" >Insurance</option>
                <option value="IT-Hardware &amp; Networking" >IT-Hardware &amp; Networking</option>
                <option value="IT-Software/Software Services" >IT-Software/Software Services</option>
                <option value="KPO / Research /Analytics" >KPO / Research /Analytics</option>
                <option value="Legal" >Legal</option>
                <option value="Media/Dotcom/Entertainment" >Media/Dotcom/Entertainment</option>
                <option value="Internet/Ecommerce" >Internet/Ecommerce</option>
                <option value="Medical/Healthcare/Hospital" >Medical/Healthcare/Hospital</option>
                <option value="Mining" >Mining</option>
                <option value="NGO/Social Services" >NGO/Social Services</option>
                <option value="Office Equipment/Automation" >Office Equipment/Automation</option>
                <option value="Oil and Gas/Power/Infrastructure/Energy" >Oil and Gas/Power/Infrastructure/Energy</option>
                <option value="Paper" >Paper</option>
                <option value="Pharma/Biotech/Clinical Research" >Pharma/Biotech/Clinical Research</option>
                <option value="Printing/Packaging" >Printing/Packaging</option>
                <option value="Publishing" >Publishing</option>
                <option value="Real Estate/Property" >Real Estate/Property</option>
                <option value="Recruitment" >Recruitment</option>
                <option value="Retail" >Retail</option>
                <option value="Security/Law Enforcement" >Security/Law Enforcement</option>
                <option value="Semiconductors/Electronics" >Semiconductors/Electronics</option>
                <option value="Shipping/Marine" >Shipping/Marine</option>
                <option value="Steel" >Steel</option>
                <option value="Strategy /Management Consulting Firms" >Strategy /Management Consulting Firms</option>
                <option value="Telcom/ISP" >Telcom/ISP</option>
                <option value="Textiles/Garments/Accessories" >Textiles/Garments/Accessories</option>
                <option value="Tyres" >Tyres</option>
                <option value="Water Treatment / Waste Management" >Water Treatment / Waste Management</option>
                <option value="Wellness/Fitness/Sports" >Wellness/Fitness/Sports</option>
                <option value="Other" >Other</option>

            </select>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputFunctionalArea">Functional Area</label>
        <div class="controls">
            <select name="inputFunctionalArea" class="input-large" id="inputFunctionalArea"  lastSelected="<?php if(!empty($data)){ echo $data['currentFunctionalArea'];}?>" >

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
        <label class="control-label" for="inputCurrentCTC">Current CTC</label>
        <div class="controls">
            <input type="text" name="inputCurrentCTC"  value="<?php if(!empty($data)){ echo $data['currentCTC'];}?>" id="inputCurrentCTC" placeholder="Current CTC/annum">
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

<?php
loadAsset(array('jquery-1.7.1.min.js'=>'script'));
?>

<script type="text/javascript">

    var year =$('#inputYear').attr('lastSelected');
    var yearItems=$('#inputYear').children('option[value="'+year+'"]');
    yearItems.attr('selected','selected');

    var months =$('#inputMonths').attr('lastSelected');
    var monthsItems=$('#inputMonths').children('option[value="'+months+'"]');
    monthsItems.attr('selected','selected');

    var experience =$('#inputExperience').attr('lastSelected');
    var experienceItems=$('#inputExperience').children('option[value="'+experience+'"]');
    experienceItems.attr('selected','selected');


    var functions =$('#inputFunctionalArea').attr('lastSelected');
    var functionItems=$('#inputFunctionalArea').children('option[value="'+functions+'"]');
    functionItems.attr('selected','selected');

    var industry =$('#inputIndustry').attr('lastSelected');
    var industryItems=$('#inputIndustry').children('option[value="'+industry+'"]');
    industryItems.attr('selected','selected');

</script>