
<div class="">
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

<!--

<div class="well" style="margin-top: -30px;">
    <?php   $this->load->helper('form');
$attributes = array('class' => 'form-horizontal');
echo form_open('admin/index', $attributes); ?>
    <input name="searchType" value="advanced" type="hidden">

    <div class="input-append span11 offset2">
        <input type="text" name="searchKey" style="background-color: #A7D7A6; color: #234F22;"  id="" class="input-block-level " placeholder="Advanced Search Bar">
        <button class="btn btn-success" type="button">Search</button>
    </div>
    <div class="clearfix"></div>
    <div class="span11 offset2">
        <a class="text-warning" href="#">How to use it?</a>
    </div>


    </form>
</div>

-->

<div class="well">
    <div class="">
        <?php   $this->load->helper('form');
        $attributes = array('class' => 'form-horizontal','method'=>'get');
        echo form_open('admin/index', $attributes); ?>

        <p class="lead" align="center" style="margin: 0px;">Search Database</p>

        <input name="searchType" value="basic" type="hidden">


        <div class="controls controls-row">
            <label class="radio inline">
                <input type="radio" name="type" id="optionsRadios2" value="jobSeeker" checked="" <?php if(isset($_GET['type']) && $_GET['type']=='jobSeeker'){ echo 'checked="true"'; }?> >
                Job Seekers
            </label>
            <label class="radio inline">
                <input type="radio" name="type" id="optionsRadios1" value="intern" <?php if(isset($_GET['type']) && $_GET['type']=='intern'){ echo 'checked="true"'; }?> >
                Internship Seekers
            </label>
        </div>
        </br>

    <div class="controls controls-row">

        <input type="text" class="span4" name="name"  value="<?php if(isset($_GET['name'])){ echo $_GET['name']; }?>" placeholder="Name">
        <input type="email" class="span4" name="email"  value="<?php if(isset($_GET['email'])){ echo $_GET['email']; } ?>" placeholder="Email">
        <input type="text" class="span4" name="location"  value="<?php if(isset($_GET['location'])){ echo $_GET['location']; }?>" placeholder="Location">


    </div>
    </br>
        <div class="controls controls-row">
            <select name="inputYear" class="span4" id="inputYear" lastSelected="<?php if(isset($_GET['inputYear'])){ echo $_GET['inputYear']; }?>">
                <option value="null" selected="selected">Min. Experience (Years) </option>
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
            <select name="inputMonths" class="span4" id="inputMonths" lastSelected="<?php if(isset($_GET['inputMonths'])){ echo $_GET['inputMonths']; }?>">
                <option value="null" selected="selected"> Min. Experience (Months) </option>
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
            <input type="text" class="span4" name="inputCurrentCTC"  value="<?php if(isset($_GET['inputCurrentCTC'])){ echo $_GET['inputCurrentCTC']; }?>" id="inputCurrentCTC" placeholder="Max Current CTC/annum">

        </div>
        </br>

        <div class="controls controls-row">
            <select name="inputIndustry" class="span4" id="inputIndustry" lastSelected="<?php if(isset($_GET['inputIndustry'])){ echo $_GET['inputIndustry']; }?>">
                <option value="null" selected="selected">Select Industry</option>
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

            <select name="inputFunctionalArea" class="span4" id="inputFunctionalArea" lastSelected="<?php if(isset($_GET['inputFunctionalArea'])){ echo $_GET['inputFunctionalArea']; }?>">
                <option value="null" selected="true">Functional Area</option>
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
            <button type="submit" class="span4 btn btn-success pull-left"><i class="icon-search"></i> Search</button>

        </div>
        </form>
    </div>

</div>
<?php if(isset($data)):?>
    <?php if(!empty($data)):?>


    <div class="well">

        <table class="table table-condensed table-striped table-bordered">
            <tr>
                <th></th>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>

                <th></th>
            </tr>
            <?php foreach($data as $key=>$value):?>
            <tr>
                <td><?php echo $key+1; ?></td>
                <td><?php echo $value['name']; ?></td>
                <td><?php echo $value['phone']; ?></td>
                <td><?php echo $value['location']; ?></td>
                <td>
                    <div class="btn-group">
                        <a  class="btn btn-success btn-mini" href="<?php echo site_url('admin/index/viewApplicant/'.$value['fkey_login'])?>">View</a>
                        <a class="btn btn-info btn-mini" href="<?php echo site_url('admin/index/sendMail/'.$value['fkey_login'])?>">Send Message</a>

                        <?php if($this->session->userdata('adminLoggedIn')):?>
                            <?php if($value['loginStatus']==0):?>
                                <a class="btn btn-mini btn-warning" href="<?php echo site_url('admin/index/unStopAccess/'.$value['loginKey'])?>">Provoke Access</a>
                                <?php elseif($value['loginStatus']>0):?>
                                <a class="btn btn-mini btn-danger" href="<?php echo site_url('admin/index/stopAccess/'.$value['loginKey'])?>">Revoke Access</a>
                            <?php endif; ?>
                        <?php endif; ?>

                    </div>
                </td>
            </tr>
            <?php
        endforeach; ?>
        </table>

        <!-- Pagination Start-->
        <div class="pagination">
            <?php
            $rurl=$_SERVER['REQUEST_URI'];
            $rurl=explode('?',$rurl);
            $rurl=$rurl[1];
            if(isset($totalEntries)){
                $totalPages=$totalEntries/$this->config->item('maxPageSize');
            }
            ?>
            <ul>
                <?php if(($page-1)>=0):?>
                <li><a href="<?php echo site_url('admin/index/index').'/'.($page-1).'?'.$rurl;?>">Prev</a></li>
                <?php endif; ?>
                <?php for($i=0;$i<$totalPages;$i++):?>
                <li <?php if($i==$page){ echo 'class="disabled"';}?> ><a href="<?php echo site_url('admin/index/index').'/'.$i.'?'.$rurl;?>"><?php echo $i+1 ?></a></li>
                <?php endfor; ?>
                <?php if(($page+1)<$totalPages):?>

                <li><a href="<?php echo site_url('admin/index/index').'/'.($page+1).'?'.$rurl;?>">Next</a></li>
                <?php endif; ?>

            </ul>
        </div>
        <!-- PAGINATION END-->

    </div>
        <?php else: ?>
    <div class="well">
        <p class="text-error" align="center">Sorry..No Results Found..</p>
    </div>
        <?php endif; ?>

    <?php endif; ?>
</div>
<?php
loadAsset(array('jquery-1.7.1.min.js'=>'script','jquery-ui.css'=>'style','jquery-ui.js'=>'script'));
loadBootstrap('script.min');
?>


<script type="text/javascript">

    var expYears =$('#inputYear').attr('lastSelected');
    var expYearsItems=$('#inputYear').children('option[value="'+expYears+'"]');
    expYearsItems.attr('selected','selected');

    var expMonths =$('#inputMonths').attr('lastSelected');
    var expMonthsItems=$('#inputMonths').children('option[value="'+expMonths+'"]');
    expMonthsItems.attr('selected','selected');

    var industry =$('#inputIndustry').attr('lastSelected');
    var industryItems=$('#inputIndustry').children('option[value="'+industry+'"]');
    industryItems.attr('selected','selected');


    var functionalArea =$('#inputFunctionalArea').attr('lastSelected');
    var functionalAreaItems=$('#inputFunctionalArea').children('option[value="'+functionalArea+'"]');
    functionalAreaItems.attr('selected','selected');

</script>