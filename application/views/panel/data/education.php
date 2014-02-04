<div class="span8 well">
    <?php if(isset($type) && $type=="highSchool"): ?>
        <p class="lead text-info">High School Details</p>
    <?php elseif(isset($type) && $type=="intermediate"):?>
        <p class="lead text-info">Intermediate Details</p>
    <?php elseif(isset($type) && $type=="diploma"):?>
        <p class="lead text-info">Diploma Course</p>
    <?php elseif(isset($type) && $type=="certification"):?>
        <p class="lead text-info">Certification</p>
    <?php elseif(isset($type) && $type=="graduation"):?>
        <p class="lead text-info">Graduation Course</p>
    <?php elseif(isset($type) && $type=="postGraduation"):?>
        <p class="lead text-info">Post Graduation Course</p>
    <?php elseif(isset($type) && $type=="doctorate"):?>
        <p class="lead text-info">Doctorate Course</p>
    <?php endif; ?>

    <!-- Form Start-->
    <?php   $this->load->helper('form');
    $attributes = array('class' => 'form-horizontal ');
    if(!empty($data)){
        $submitTo='panel/data/editEducation';
        $buttonName='Update';
    }else{
        $submitTo='panel/data/addEducation';
        $buttonName='Add';
    }
    echo form_open($submitTo, $attributes); ?>

    <input type="hidden" name="inputPkey" value='<?php if(!empty($data)){ echo $data['pkey'];}?>'>
    <input type="hidden" name="inputCourseType" value="<?php if(isset($type)){ echo $type;}?>">

    <!--Course Name Start-->
    <?php if(isset($type) && $type=="highSchool"): ?>
        <input type="hidden" name="inputCourseName" value="-">
    <?php elseif(isset($type) && $type=="intermediate"):?>
        <input type="hidden" name="inputCourseName" value="-">
    <?php elseif(isset($type) && $type=="diploma"):?>
        <div class="control-group">
            <label class="control-label" for="inputCourseName">Course Name</label>
            <div class="controls">
                <input type="text" name="inputCourseName" value="<?php if(!empty($data)){ echo $data['name'];}?>" id="inputCourseName" placeholder="Like: Diploma in Engg.">
            </div>
        </div>
    <?php elseif(isset($type) && $type=="certification"):?>
        <div class="control-group">
            <label class="control-label" for="inputCourseName">Course Name</label>
            <div class="controls">
                <input type="text" name="inputCourseName" value="<?php if(!empty($data)){ echo $data['name'];}?>" id="inputCourseName" placeholder="Name of Certificate Course">
            </div>
        </div>
    <?php elseif(isset($type) && $type=="graduation"):?>
        <div class="control-group">
            <label class="control-label" for="inputCourseName">Course Name</label>
            <div class="controls">
                <input type="text" name="inputCourseName" value="<?php if(!empty($data)){ echo $data['name'];}?>" id="inputCourseName" placeholder="BTech, Bsc, Ba, BBA etc">
            </div>
        </div>
    <?php elseif(isset($type) && $type=="postGraduation"):?>
        <div class="control-group">
            <label class="control-label" for="inputCourseName">Course Name</label>
            <div class="controls">
                <input type="text" name="inputCourseName" value="<?php if(!empty($data)){ echo $data['name'];}?>" id="inputCourseName" placeholder="MTech, Msc, MBA etc">
            </div>
        </div>
    <?php elseif(isset($type) && $type=="doctorate"):?>
        <div class="control-group">
            <label class="control-label" for="inputCourseName">Course Name</label>
            <div class="controls">
                <input type="text" name="inputCourseName" value="<?php if(!empty($data)){ echo $data['name'];}?>" id="inputCourseName" placeholder="Phd, M.Phil etc">
            </div>
        </div>
    <?php endif; ?>

    <!--End Course Name-->
    <!--Start Branch-->
    <?php if(isset($type) && $type=="highSchool"): ?>
        <input type="hidden" name="inputBranch" value="-">
    <?php elseif(isset($type) && $type=="intermediate"):?>
        <div class="control-group">
            <label class="control-label" for="inputBranch">Branch</label>
            <div class="controls">
                <input type="text" name="inputBranch" value="<?php if(!empty($data)){ echo $data['branch'];}?>" id="inputBranch" placeholder="Science(PCM/PCB), Commerce, Arts">
            </div>
        </div>
    <?php elseif(isset($type) && $type=="diploma"):?>
        <div class="control-group">
            <label class="control-label" for="inputBranch">Branch</label>
            <div class="controls">
                <input type="text" name="inputBranch" value="<?php if(!empty($data)){ echo $data['branch'];}?>" id="inputBranch" placeholder="Mechanical, Civil, Arabic etc">
            </div>
        </div>
    <?php elseif(isset($type) && $type=="certification"):?>
        <div class="control-group">
            <label class="control-label" for="inputBranch">Branch</label>
            <div class="controls">
                <input type="text" name="inputBranch" value="<?php if(!empty($data)){ echo $data['branch'];}?>" id="inputBranch" placeholder="Mention if any">
            </div>
        </div>
    <?php elseif(isset($type) && $type=="graduation"):?>
        <div class="control-group">
            <label class="control-label" for="inputBranch">Branch</label>
            <div class="controls">
                <input type="text" name="inputBranch" value="<?php if(!empty($data)){ echo $data['branch'];}?>" id="inputBranch" placeholder="Mechanical, Eng Hon., Civil etc">
            </div>
        </div>
    <?php elseif(isset($type) && $type=="postGraduation"):?>
        <div class="control-group">
            <label class="control-label" for="inputBranch">Branch</label>
            <div class="controls">
                <input type="text" name="inputBranch" value="<?php if(!empty($data)){ echo $data['branch'];}?>" id="inputBranch" placeholder="Finance, Mechanics, Nanotechnology etc.">
            </div>
        </div>
    <?php elseif(isset($type) && $type=="doctorate"):?>
        <div class="control-group">
            <label class="control-label" for="inputBranch">Field</label>
            <div class="controls">
                <input type="text" name="inputBranch" value="<?php if(!empty($data)){ echo $data['branch'];}?>" id="inputBranch" placeholder="Mention if any">
            </div>
        </div>

    <?php endif; ?>
    <!--End Branch-->



    <div id="fieldAdd">

    </div>

    <div class="control-group">
        <label class="control-label" for="inputFrom">From</label>
        <div class="controls">
            <select name="inputFrom" class="input-medium" id="inputFrom"  lastSelected="<?php if(!empty($data)){ echo $data['from'];}?>" >
                <option value="1950">1950</option>
                <option value="1951">1951</option>
                <option value="1952">1952</option>
                <option value="1953">1953</option>
                <option value="1954">1954</option>
                <option value="1955">1955</option>
                <option value="1956">1956</option>
                <option value="1957">1957</option>
                <option value="1958">1958</option>
                <option value="1959">1959</option>
                <option value="1960">1960</option>
                <option value="1961">1961</option>
                <option value="1962">1962</option>
                <option value="1963">1963</option>
                <option value="1964">1964</option>
                <option value="1965">1965</option>
                <option value="1966">1966</option>
                <option value="1967">1967</option>
                <option value="1968">1968</option>
                <option value="1969">1969</option>
                <option value="1970">1970</option>
                <option value="1971">1971</option>
                <option value="1972">1972</option>
                <option value="1973">1973</option>
                <option value="1974">1974</option>
                <option value="1975">1975</option>
                <option value="1976">1976</option>
                <option value="1977">1977</option>
                <option value="1978">1978</option>
                <option value="1979">1979</option>
                <option value="1980">1980</option>
                <option value="1981">1981</option>
                <option value="1982">1982</option>
                <option value="1983">1983</option>
                <option value="1984">1984</option>
                <option value="1985">1985</option>
                <option value="1986">1986</option>
                <option value="1987">1987</option>
                <option value="1988">1988</option>
                <option value="1989">1989</option>
                <option value="1990">1990</option>
                <option value="1991">1991</option>
                <option value="1992">1992</option>
                <option value="1993">1993</option>
                <option value="1994">1994</option>
                <option value="1995">1995</option>
                <option value="1996">1996</option>
                <option value="1997">1997</option>
                <option value="1998">1998</option>
                <option value="1999">1999</option>
                <option value="2000">2000</option>
                <option value="2001">2001</option>
                <option value="2002">2002</option>
                <option value="2003">2003</option>
                <option value="2004">2004</option>
                <option value="2005">2005</option>
                <option value="2006">2006</option>
                <option value="2007">2007</option>
                <option value="2008">2008</option>
                <option value="2009">2009</option>
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
            </select>
        </div>
    </div>


    <div class="control-group">
        <label class="control-label" for="inputTill">Till</label>
        <div class="controls">
            <select name="inputTill" class="input-medium" id="inputTill"  lastSelected="<?php if(!empty($data)){ echo $data['to'];}?>" >
                <option value="1950">1950</option>
                <option value="1951">1951</option>
                <option value="1952">1952</option>
                <option value="1953">1953</option>
                <option value="1954">1954</option>
                <option value="1955">1955</option>
                <option value="1956">1956</option>
                <option value="1957">1957</option>
                <option value="1958">1958</option>
                <option value="1959">1959</option>
                <option value="1960">1960</option>
                <option value="1961">1961</option>
                <option value="1962">1962</option>
                <option value="1963">1963</option>
                <option value="1964">1964</option>
                <option value="1965">1965</option>
                <option value="1966">1966</option>
                <option value="1967">1967</option>
                <option value="1968">1968</option>
                <option value="1969">1969</option>
                <option value="1970">1970</option>
                <option value="1971">1971</option>
                <option value="1972">1972</option>
                <option value="1973">1973</option>
                <option value="1974">1974</option>
                <option value="1975">1975</option>
                <option value="1976">1976</option>
                <option value="1977">1977</option>
                <option value="1978">1978</option>
                <option value="1979">1979</option>
                <option value="1980">1980</option>
                <option value="1981">1981</option>
                <option value="1982">1982</option>
                <option value="1983">1983</option>
                <option value="1984">1984</option>
                <option value="1985">1985</option>
                <option value="1986">1986</option>
                <option value="1987">1987</option>
                <option value="1988">1988</option>
                <option value="1989">1989</option>
                <option value="1990">1990</option>
                <option value="1991">1991</option>
                <option value="1992">1992</option>
                <option value="1993">1993</option>
                <option value="1994">1994</option>
                <option value="1995">1995</option>
                <option value="1996">1996</option>
                <option value="1997">1997</option>
                <option value="1998">1998</option>
                <option value="1999">1999</option>
                <option value="2000">2000</option>
                <option value="2001">2001</option>
                <option value="2002">2002</option>
                <option value="2003">2003</option>
                <option value="2004">2004</option>
                <option value="2005">2005</option>
                <option value="2006">2006</option>
                <option value="2007">2007</option>
                <option value="2008">2008</option>
                <option value="2009">2009</option>
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
            </select>
            <input type="checkbox" <?php if(!empty($data) && $data['to']==null){ echo 'checked';}?> name="inputPersuing" id="inputPersuing"> Still Persuing
        </div>
    </div>

    <!--Start Institution-->
    <?php if(isset($type) && $type=="highSchool"): ?>
        <div class="control-group">
            <label class="control-label" for="inputInstitution">Board/University</label>
            <div class="controls">
                <input type="text" name="inputInstitution" value="<?php if(!empty($data)){ echo $data['institute'];}?>" id="inputInstitution" placeholder="Name of Board/University">
            </div>
        </div>
    <?php elseif(isset($type) && $type=="intermediate"):?>
        <div class="control-group">
            <label class="control-label" for="inputInstitution">Board/University</label>
            <div class="controls">
                <input type="text" name="inputInstitution" value="<?php if(!empty($data)){ echo $data['institute'];}?>" id="inputInstitution" placeholder="Name of Board/University">
            </div>
        </div>
    <?php elseif(isset($type) && $type=="diploma"):?>
        <div class="control-group">
            <label class="control-label" for="inputInstitution">College/Institution</label>
            <div class="controls">
                <input type="text" name="inputInstitution" value="<?php if(!empty($data)){ echo $data['institute'];}?>" id="inputInstitution" placeholder="Name of College/Institution">
            </div>
        </div>
    <?php elseif(isset($type) && $type=="certification"):?>
        <div class="control-group">
            <label class="control-label" for="inputInstitution">College/Institution</label>
            <div class="controls">
                <input type="text" name="inputInstitution" value="<?php if(!empty($data)){ echo $data['institute'];}?>" id="inputInstitution" placeholder="Name of College/Institution">
            </div>
        </div>
    <?php elseif(isset($type) && $type=="graduation"):?>
        <div class="control-group">
            <label class="control-label" for="inputInstitution">College/University</label>
            <div class="controls">
                <input type="text" name="inputInstitution" value="<?php if(!empty($data)){ echo $data['institute'];}?>" id="inputInstitution" placeholder="Name of College/University">
            </div>
        </div>
    <?php elseif(isset($type) && $type=="postGraduation"):?>
        <div class="control-group">
            <label class="control-label" for="inputInstitution">College/University</label>
            <div class="controls">
                <input type="text" name="inputInstitution" value="<?php if(!empty($data)){ echo $data['motherName'];}?>" id="inputInstitution" placeholder="Name of College/University">
            </div>
        </div>
    <?php elseif(isset($type) && $type=="doctorate"):?>
        <div class="control-group">
            <label class="control-label" for="inputInstitution">College/University</label>
            <div class="controls">
                <input type="text" name="inputInstitution" value="<?php if(!empty($data)){ echo $data['institute'];}?>" id="inputInstitution" placeholder="Name of College/University">
            </div>
        </div>
    <?php endif; ?>
    <!--End Institution-->


    <div class="control-group">
        <label class="control-label" for="inputPercentage">Percentage</label>
        <div class="controls">
            <input type="text" name="inputPercentage" value="<?php if(!empty($data)){ echo $data['percentage'];}?>" id="inputPercentage" placeholder="Percentage">
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <button  type="submit"  class="btn btn-primary"><?php echo $buttonName; ?></button>
        </div>
    </div>

    </form>

    <!-- Form end-->

</div>
</div>


<?php
loadAsset(array('jquery-1.7.1.min.js'=>'script','jquery-ui.css'=>'style','jquery-ui.js'=>'script'));
loadBootstrap('script.min');
?>

<script type="text/javascript">

    $('#inputPersuing').change(function(){
        var courseType=$(this).value();
        alert(courseType);
    });
</script>