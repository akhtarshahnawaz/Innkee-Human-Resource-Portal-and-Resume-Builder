<style type="text/css">

    body {
        padding-top: 100px;
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
        $goTo='';
        $buttonText='';
        if(isset($update) && $update==true){
            $goTo='admin/job/updateJob';
            $buttonText='Update Job';
        }else{
            $goTo='admin/job/addJob';
            $buttonText='Post Job';
        }
        echo form_open($goTo, $attributes);
?>

        <h2 align="center" class="text-success"><?php echo $buttonText;?></h2>

                <input type="hidden" name="pkey" value="<?php if(isset($data)){ echo $data['pkey']; }?>">
                <input type="text" name="title" class="input-block-level" value="<?php if(isset($data)){ echo $data['title']; }?>" id="title" placeholder="Job Title">
                <input type="text" name="closingDate" class="input-block-level" value="<?php if(isset($data)){ echo $data['closingDate']; }?>" id="inputClosingDate" placeholder="Closing Date">

                <select name="inputIndustry" class="input-block-level" id="inputIndustry"  lastSelected="<?php if(isset($data)){ echo $data['industry']; }?>" >
                    <option value="null" >Current Industry</option>
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


                <textarea name="details" class="input-block-level" id="details" placeholder="Job Details"><?php if(isset($data)){ echo $data['details']; }?></textarea>



        <button type="submit" class="btn btn-success btn-block"><?php echo $buttonText; ?></button>
        </form>
    </div>

</div>


<?php
loadAsset(array('jquery-1.7.1.min.js'=>'script','jquery-ui.css'=>'style','jquery-ui.js'=>'script'));
loadBootstrap('script.min');
?>

<script type="text/javascript">

    var industry =$('#inputIndustry').attr('lastSelected');
    var industryItems=$('#inputIndustry').children('option[value="'+industry+'"]');
    industryItems.attr('selected','selected');

</script>

<script type="text/javascript">

    $('#inputClosingDate').attr('readonly', true);

    $( "#inputClosingDate" ).datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+0",
        numberOfMonths: 1
    });



</script>