<?php
use Cake\Routing\Router;
require 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/iconfonts.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">

    <title>Welcome to Navsoft Training</title>
  </head>
  <body>
    <section class="main-content">
    <!-- left menu section start here -->
    <section class="leftmenu">
    <a href="javascript:void(0)" class="menuhomem"><i class="icon-add-plus-button"></i></a>
      <div class="leftpadd">
        <a href="javascript:void(0);" class="leftlogo"><img src="images/logo.png" alt=""></a>
        <div class="leftmain-link">
        <ul class="listofnav">
          <li>
            <a id="parent1" onclick="changeActive('parent1')" class="parent" href="<?php echo Router::url(['controller'=>'Dashboard','action'=>'index']) ?>"><i class="icon-home"></i> <span>Dashboard</span></a>
          </li>
          <li>
            <a href="javascript:void(0);" id="parent2" class="parent" onclick="changeActive('parent2')"><i class="icon-list-of-works"></i> <span>Employee Record</span></a>
            <ul class="subchildlink">
              <a class="" style="cursor:pointer;">
              <li onClick="javascipt:window.location.href='<?php echo Router::url(['controller'=>'EmpGeneralInfo','action'=>'index']) ?>' "  style="cursor:pointer;background-colour:#1B679F;">
              View Records</li>
            </a>
              <a class="activeclass">
                <li  onClick="javascipt:window.location.href='<?php echo Router::url(['controller'=>'AllRecordsSave','action'=>'index']) ?>' "  style="cursor:pointer;">Add new Records</li>
              </a>
            </ul>
          </li>
          <li>
            <a id="parent3" class="parent" onclick="changeActive('parent3');" href="javascript:void(0);"><i class="icon-file"></i> <span>Employee Attendance</span></a>
            <ul class="subchildlink">
            <?php 
            require 'dbconnect.php';
            $sql=mysqli_query($conn,"SELECT id FROM fileuploadrecord ORDER BY id DESC LIMIT 1");
            $max=0;
            foreach($sql as $test)
                {
                    $max=$test['id'];
                    
                }
            
            ?>
            <a><li  onClick="javascipt:window.location.href='<?php echo Router::url(['controller'=>'Attendancerecord','action'=>'index','id'=>$max]) ?>' "  style="cursor:pointer;">Attendance Records</li></a>
            <a><li  onClick="javascipt:window.location.href='<?php echo Router::url(['controller'=>'Fileuploadrecord','action'=>'index']) ?>' "  style="cursor:pointer;">File upload records</li></a>
            </ul>
          </li>
          <li>
            <a id="parent4" class="parent" onclick="changeActive('parent4');" href="javascript:void(0);"><i class="icon-file"></i> <span>Employee Leave Request</span></a>
            <ul class="subchildlink">
            <a><li  onClick="javascipt:window.location.href='<?php echo Router::url(['controller'=>'LeaveSetting','action'=>'index']) ?>' "  style="cursor:pointer;">View Leave Setting</li></a>             
              <a><li  onClick="javascipt:window.location.href='<?php echo Router::url(['controller'=>'ReqLeave','action'=>'index']) ?>' "  style="cursor:pointer;">Add Requested Leave </li></a>
              <a><li  onClick="javascipt:window.location.href='<?php echo Router::url(['controller'=>'NonReqLeave','action'=>'index']) ?>' "  style="cursor:pointer;">Add Non Requested Leave </li></a>
            
            
            </ul>
          </li>
          <li>
            <a id="parent5" onclick="changeActive('parent5')" class="parent" href="<?php echo Router::url(['controller'=>'Designation','action'=>'index']) ?>"><i class="icon-home"></i> <span>Employe Designation</span></a>
          </li>
          <li>
            <a id="parent6" onclick="changeActive('parent6')" class="parent" href="<?php echo Router::url(['controller'=>'Departmenttable','action'=>'index']) ?>"><i class="icon-home"></i> <span>Employe Department</span></a>
          </li>
          <li>
            <a id="parent7" class="parent" onclick="changeActive('parent7');" href="javascript:void(0);"><i class="icon-file"></i> <span>Settings</span></a>
            <ul class="subchildlink">
              <a><li  onClick="javascipt:window.location.href='<?php echo Router::url(['controller'=>'SetHoliday','action'=>'index']) ?>' "  style="cursor:pointer;">Holiday Setting</li></a>             
              <a><li  onClick="javascipt:window.location.href='<?php echo Router::url(['controller'=>'EmpGrp','action'=>'index']) ?>' "  style="cursor:pointer;">Employee group setting </li></a>
            
            
            
            </ul>
          </li>
        </ul>
      </div>
      </div>
    </section>
    <!-- left menu section end here -->

    <!-- right part section start here -->
    <section class="rightpart">
      <header class="header-resize">
      <div class="row">
        <div class="col-auto ml-auto align-middle">
         <a href="javascript:void(0)" class="usernameboxdiv ml-auto d-block">
          <span class="userpicbox mr-2"><img src="images/User.png" alt="Navsoft Training" title="Navsoft Training"></span>
          <span class="usernamed">Welcome <?php echo $username?></span>
        </a>
         <div id="drop">
        <div class="logouuserdiv">
          <div class="imagepic"><img src="images/User.png" alt="Navsoft Training" title="Navsoft Training"></div>
          <div class="spantext"><h5 class="mb-0"><?php echo $username?></h5><a href="javascript:void(0)"><?php echo $email?></a></div>
        </div>
        <div class="footerbottom">
          <a href="javascript:void" onClick="javascipt:window.location.href='<?php echo Router::url(['controller'=>'Users','action'=>'logout']) ?>' "><i class="icon-turn-off-1"></i> Logout</a>
        </div>
        </div>
        </div>
      </div>
    </header>
    
 <!-- body container start here__________________________________________________________________________________ -->
    <div class="bodytransition">
    <form method='post' id='form_data' enctype='multipart/form-data'>
      <div class="bodypart">
        <div class="row pageheadertop mb-3">
        <div class="col"><h2>Add Employee Records</h2></div>
        <div class="col-auto"><button type="button" onClick="javascipt:window.location.href='<?php echo Router::url(['controller'=>'EmpGeneralInfo','action'=>'index']) ?>' " class="btn outlineblue mr-2">Cancel</button> <button onClick="onclickFunction();" type="button" class="btn redbutton">Save</button></div>
      </div>

      <!-- tab start here  -->
      <ul id="myDIV" class="nav nav-tabs">
    <li class="a active"><a data-toggle="tab" href="#home">General Details</a></li>
    <li class="a"><a data-toggle="tab" href="#menu1">Contact Details</a></li>
    <li class="a"><a data-toggle="tab" href="#menu2">Academic Details</a></li>
    <li class="a"><a data-toggle="tab" href="#menu3">Skills Details</a></li>
    <li class="a"><a data-toggle="tab" href="#menu4">Experience Details</a></li>
  </ul>
  
<!-- ______________________________________GENERAL INFORMATION STARTS HERE________________________________________-->

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3 class="mb-3">Employee General Information</h3>
      <div class="row">
        <div class="col-sm-1 mb-2"><a id='replaceImg'  onclick="document.getElementById('getPhoto').click()" class="imageupload"><i class="icon-camera"></i></a></div>
        <input type='file' id="getPhoto"   style="display:none">
        <div class="col-sm-11  mb-2">
        <div class="row">
            <div class="col-sm-4">
              <div class="form-group addcustomcss">
              <label class="labelform">Employee Name</label>
                <input id="employeeName" name='employeeName' placeholder="Employee Name" class="form-control rounded-0" width="100%" required />
              </div>
    
            </div>
            <div class="col-sm-3 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Date of Birth</label>
            <input id="dob"    placeholder="Date of Birth" class="form-control rounded-0" width="100%" />
          </div>
        </div>
            <div class="col-sm-4">
              <div class="form-group addcustomcss">
              <label class="labelform">Sex</label>
                <select id='sex' class="form-control rounded-0">
                  <option>Sex</option>
                  <option>Male</option>
                  <option>Female</option>

                </select> 
              </div>
            </div>
        </div>
        </div>
        
        <div class="col-sm-4 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Nationality</label>
            <select name='nationality' id='nationality' class="form-control rounded-0">
              <option>Nationality</option>
              <?php
$content = file_get_contents("allCountries.json");

$result  = json_decode($content);


foreach($result as $temp)
{
    echo "<option>$temp->name</option>";
}

?>
            </select> 
          </div>
    
        </div>
        <div class="col-sm-4 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Location</label>
          <select name='location' id='location' class="form-control rounded-0">
              <option>Location</option>
              <?php
$content = file_get_contents("allStates.json");

$result  = json_decode($content);


foreach($result as $temp)
{
    echo "<option>$temp->name</option>";
}

?>
            </select>
           
          </div>
        </div>
   

        <div class="col-sm-4 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Blood Group</label>
            <select id="bloodGroup" class="form-control rounded-0">
              <option>Blood Group</option>
              <option>A+</option>
              <option>A-</option>
              <option>B+</option>
              <option>B-</option>
              <option>AB+</option>
              <option>AB-</option>
              <option>O+</option>
              <option>O-</option>

            </select> 
          </div>
        </div>
        <div class="col-sm-3 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Emergency Contact</label>
            <input id="emergencyContact" placeholder="Emergency Contact" class="form-control rounded-0" width="100%" />
          </div>
        </div>
        <div class="col-sm-3 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Date of joining</label>
            <input id="dateOfJoining" placeholder="Date of Joining" class="form-control rounded-0" width="100%" />
          </div>
        </div>
        <div class="col-sm-3 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Probation Completion Date</label>
            <input id="probationDate" placeholder="Probation Completion Date" class="form-control rounded-0" width="100%" /> 
          </div>
        </div>
       
      </div>
      <h3 class="my-3">KYC Informations</h3>
      <ul id="ref1" class="imageuploadlist p-0 m-0">
        <!-- <li><div class="imageuploadsect"><p class="m-0">Upload 1</p></div></li> -->
        <li id='empFileOpen'><div  onclick="document.getElementById('empGenFile').click()"  class="imageuploadsect imagoutlinebor"><a class="m-0"><i class="icon-add-plus-button"></i></a></div></li>
        <input type="file"  multiple="multiple" id="empGenFile" name="empGenFile[]" style='visibility: hidden;height:0px;width:0px;'> 
     <!-- <input name="empGenFile[]" type="file" id="empGenFile"/> -->
<li id="add_more"><div   class="imageuploadsect"><a class="m-0"><i class="icon-add-plus-button"></i></a></div></li>
      </ul>
    </div>

<!-- ______________________________________CONTACT INFORMATION STARTS HERE________________________________________-->
    <div id="menu1" class="tab-pane fade">
      <h3 class="mb-3">Employee Contact Information</h3>
      <div class="row">

        <div class="col-sm-4 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Phone Number</label>
             <input id="phoneNumber" placeholder="Employee Phone Number" class="form-control rounded-0" width="100%" /> 
          </div>
        </div>
        <div class="col-sm-4 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Office Email</label>
            <input type="text" id="officeEmail" placeholder="Office Email Address" class="form-control rounded-0" width="100%" /> 
          </div>
        </div>
        <div class="col-sm-4 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Personal Email</label>
            <input type="text" id="personalEmail"  placeholder="Personal Email Address" class="form-control rounded-0" width="100%" /> 
          </div>
        </div>
        <div class="col-sm-4 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Present Address</label>
            <input id="presentAddress" placeholder="Present Address" class="form-control rounded-0" width="100%" />
          </div>
        </div>
        <div class="col-sm-4 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Permanent Address</label>
            <input id="permanentAddress" placeholder="Permanent Address" class="form-control rounded-0" width="100%" />
          </div>
        </div>
        <div class="col-sm-4 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">PAN NO.</label>
            <input id="panNO" placeholder="Pan Number" class="form-control rounded-0" width="100%" />
          </div>
        </div>
        <div class="col-sm-3 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">PF NO.</label>
            <input id="pfNO" placeholder="PF No." class="form-control rounded-0" width="100%" />
          </div>
        </div>
        <div class="col-sm-3 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">ESIC NO.</label>
            <input id="esicNO" placeholder="ESIC No." class="form-control rounded-0" width="100%" />
          </div>
        </div>
        <div class="col-sm-3 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">UAN NO.</label>
            <input id="uanNO" placeholder="UAN No." class="form-control rounded-0" width="100%" />
          </div>
        </div>
        <div class="col-sm-3 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Aadhar NO.</label>
            <input id="aadharNO" placeholder="Aadhar No." class="form-control rounded-0" width="100%" />
          </div>
        </div>
      </div>
      <h3 class="my-3">Contact Informations</h3>
      <ul class="imageuploadlist p-0 m-0">
        
        <li id='empContOpen'><div  onclick="document.getElementById('empContFile').click()" class="imageuploadsect imagoutlinebor"><a  class="m-0"><i class="icon-add-plus-button"></i></a></div></li>
        <input type="file"  multiple="multiple" style='visibility: hidden;' id="empContFile" name="empContFile[]">
      </ul>
    </div>
    
<!-- ______________________________________________Academic STARTS HERE___________________________________________-->
    <div id="menu2" class="tab-pane fade">
     <h3 class="mb-3">Employee Academic Information</h3>
      <div class="row">

        <div class="col-sm-2 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Degree Name</label>
             <input name="degreeName[]" id="degreeName" placeholder="Degree Name" class="form-control rounded-0" width="100%" /> 
          </div>
        </div>
        <div class="col-sm-4 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Year of Passing</label>
            <input name="yearOfPassing[]" id="yearOfPassing" placeholder="Year of Passing" class="form-control rounded-0" width="100%" /> 
          </div>
        </div>
        <div class="col-sm-4 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Institution</label>
            <input name="institution[]" id="institution" placeholder="Institution" class="form-control rounded-0" width="100%" /> 
          </div>
        </div>
        <div class="col-sm-2 mb-2">
        <div class="form-group addcustomcss">
        <button id="addNewAcademic" type="button" class="btn rounded-circle" ><i class="icon-add-plus-button" style="color:blue"></i></button>
        </div>   
        </div>
      </div>
      
      <h3 id="initialAcademic" class="my-3">Academic Informations</h3>
      <ul class="imageuploadlist p-0 m-0">
        <li id='empAcademicOpen'><div  onclick="document.getElementById('empAcademicFile').click()"  class="imageuploadsect imagoutlinebor"><a  class="m-0"><i class="icon-add-plus-button"></i></a></div></li>
        <input type="file" style='visibility: hidden;' multiple="multiple" id="empAcademicFile" name="empAcademicFile[]" >
      </ul>
    </div>
    <!-- ______________________________________________SKILLS STARTS HERE___________________________________________-->
    <div id="menu3" class="tab-pane fade">
      <h3 class="mb-3">Employee Skills Information</h3>
      <div  class="row">

        <div class="col-sm-2 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Skill Name</label>
             <input name="skillName[]" id="skillName" placeholder="Skill Name" class="form-control rounded-0" width="100%" /> 
          </div>
        </div>
        <div class="col-sm-4 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Years of Experience</label>
            <input name="yearsOfExp[]" id="yearsOfExp" placeholder="Years of Experience" class="form-control rounded-0" width="100%" /> 
          </div>
        </div>
        <div class="col-sm-4 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Institution</label>
            <input name="expInstitution[]" id="expInstitution" placeholder="Institution" class="form-control rounded-0" width="100%" /> 
          </div>
        </div>
        <div class="col-sm-2 mb-2">
        <div class="form-group addcustomcss">
        <button id="addNewSkill" type="button" class="btn rounded-circle" ><i class="icon-add-plus-button" style="color:blue"></i></button>
        </div>   
        </div>
      </div>
      <h3 id="initialSkill" class="my-3">Skill Informations</h3>
      <ul class="imageuploadlist p-0 m-0">
        <li id="empSkillOpen"><div  onclick="document.getElementById('empSkillFile').click()" class="imageuploadsect imagoutlinebor"><a class="m-0"><i class="icon-add-plus-button"></i> </a></div></li>
        <input type="file"   multiple="multiple"  style='visibility: hidden;' id="empSkillFile" name="empSkillFile[]">
      </ul>
    </div>
    <!-- ______________________________________________Employee Experience STARTS HERE___________________________________________-->
    <div id="menu4" class="tab-pane fade">
      <h3 class="mb-3">Employee Experience Information</h3>
      <div class="row">

        <div class="col-sm-3 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Company Name</label>
             <input name="companyName[]" id="companyName" placeholder="Company Name" class="form-control rounded-0" width="100%" /> 
          </div>
        </div>
        <div class="col-sm-3 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Years of Experience</label>
            <input name="expYears[]" id="expYears" placeholder="Years of Experience" class="form-control rounded-0" width="100%" /> 
          </div>
        </div>
        <div class="col-sm-3 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Designation</label>
            <select name="designation[]"  id="designation" class="form-control rounded-0">
            <option>Designation</option>
            <?php
              $sql="SELECT * FROM designation";
              $res=mysqli_query($conn,$sql);
              foreach($res as $row)
              {
                echo "<option value=$row[id]>$row[designation]</option>";
              }

            ?>
                  
                </select>
          </div>
        </div>
        <div class="col-sm-2 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Department</label>
            <select name="department[]" id="department" class="form-control rounded-0">
                  <option>Department</option>
                  <?php
                  $sql1="SELECT * FROM departmenttable";
                    $res1=mysqli_query($conn,$sql1);
                    foreach($res1 as $row1)
                    {
                      echo "<option value=$row[id]>$row1[department]</option>";
                    }

                  ?>
                </select>
          </div>
        </div>
        <div class="col-sm-1 mb-2">
        <div class="form-group addcustomcss">
        <button id="addNewExp" type="button" class="btn rounded-circle" ><i class="icon-add-plus-button" style="color:blue"></i></button>
        </div>   
        </div>
      </div>
      <h3 id="initialExp" class="my-3">Skill Informations</h3>
      <ul class="imageuploadlist p-0 m-0">
     
        <li id="empExpOpen"><div onclick="document.getElementById('empExpFile').click()" class="imageuploadsect imagoutlinebor"><i class="icon-add-plus-button"></i></a></div></li>
        <input type="file" multiple="multiple"  style='visibility: hidden;' id="empExpFile" name="empExpFile">
      </ul>
    </div>
  </div>
      <!-- tab end here  -->

      </div>
      </form>
    </div>
    <!-- body container end here -->
    <footer><p>© 2019 All Right Reserved</p></footer>
    </section>
    <!-- right part section end here -->    
    </section>

    <div class="modal fade" id="successmessage" tabindex="-1" role="dialog" aria-labelledby="successmessage" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0 pb-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="icon-cancel-1"></i>
        </button>
      </div>
      <div class="modal-body text-center messagestatuspop">
        <div class="iconstatus redcolr mb-3"><i class="icon-error"></i></div>
        <h4 class="mb-3">Success</h4>
        
        <p class="mb-3">Successfully Updated</p>
        
      </div>
     
      <div class="modal-footer border-top-0 justify-content-center mb-3">
        <button type="button" onclick="javascipt:window.location.href='<?php echo Router::url(['controller'=>'EmpGeneralInfo','action'=>'index']) ?>' " class="btn bluebutton">Continue</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="errormessage" tabindex="-1" role="dialog" aria-labelledby="errormessage" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0 pb-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="icon-cancel-1"></i>
        </button>
      </div>
      <div class="modal-body text-center messagestatuspop">
        <div class="iconstatus redcolr mb-3"><i class="icon-error"></i></div>
        <h4 class="mb-3">Error</h4>
        <p class="mb-3">Something went wrong!</p>
      </div>
      <div class="modal-footer border-top-0 justify-content-center mb-3">
        <button  data-dismiss="modal" type="button" class="btn bluebutton">Continue</button>
      </div>
    </div>
  </div>
</div>
    
<!--  modal box  -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

 <script>
        $('#dateOfJoining').datepicker({
            uiLibrary: 'bootstrap4'
        });
        $('#probationDate').datepicker({
            uiLibrary: 'bootstrap4'
        });
       
        $('#dob').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>

  </body>
</html>
<script>
//initializing all array of files to be uploaded
var tempData = new Array();

//Function for selecting profile photo
function theFunction()
{
    document.getElementById('getPhoto').click();
}

//Form data initialization
var form_data = new FormData();


//Function to check email validation
function validateEmail(sEmail) {
  var reEmail = /^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!\.)){0,61}[a-zA-Z0-9]?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!$)){0,61}[a-zA-Z0-9]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/;

  if(!sEmail.match(reEmail)) {
    return false;
  }

  return true;

}
//Function to save all information to form data and saving finally to database
function onclickFunction(){
    var empName = document.getElementById('employeeName').value;
    var officeEmail = document.getElementById('officeEmail').value;
    var phoneNumber =  document.getElementById('phoneNumber').value;
    var dateOfJoining= document.getElementById('dateOfJoining').value;
    //validation check
    if(empName!='' && validateEmail(officeEmail) && phoneNumber!='' && dateOfJoining!='')
    {
    
    //General Info 
    for(var p = 0; p < tempData.length ; p++)
    {
     form_data.append('empGenFile[]', tempData[p][0]);
    }
    form_data.append('profilePhoto', $('#getPhoto').prop('files')[0]);
    form_data.append('employeeName', $('#employeeName').val());
    form_data.append('dob', $('#dob').val());
    form_data.append('sex', $('#sex').val());
    form_data.append('nationality', $('#nationality').val());
    form_data.append('location', $('#location').val());
  
    form_data.append('dateOfJoining', $('#dateOfJoining').val());
    if(document.getElementById('probationDate').value !='')
    form_data.append('probationDate', $('#probationDate').val());

    form_data.append('bloodGroup', $('#bloodGroup').val());
    form_data.append('emergencyContact', $('#emergencyContact').val());

    //Contact Details insertion
    form_data.append('phoneNumber', $('#phoneNumber').val());
    form_data.append('officeEmail', $('#officeEmail').val());
    form_data.append('personalEmail', $('#personalEmail').val());
    form_data.append('presentAddress', $('#presentAddress').val());
    form_data.append('permanentAddress', $('#permanentAddress').val());
    form_data.append('panNO', $('#panNO').val());
    form_data.append('pfNO', $('#pfNO').val());
    form_data.append('esicNO', $('#esicNO').val());
    form_data.append('uanNO', $('#uanNO').val());
    form_data.append('aadharNO', $('#aadharNO').val());
    var ins2 = document.getElementById('empContFile').files.length;
    for (var x = 0; x < ins2; x++) {
    form_data.append('empContFile[]', $('#empContFile').prop('files')[x]);
    }


    //Academic Details insertion
   
    for (var aca = 0; aca <academicX; aca++) {
      var ax = document.getElementsByName("degreeName[]")[aca].value;
      var ay = document.getElementsByName("yearOfPassing[]")[aca].value;
     var az = document.getElementsByName("institution[]")[aca].value;
     if(ax!='')
     form_data.append('degreeName[]',ax);
     if(ay!='')
    form_data.append('yearOfPassing[]', ay);
    if(az!='')
    form_data.append('institution[]', az);
    }
   
    var ins3 = document.getElementById('empContFile').files.length;
    for (var x = 0; x < ins3; x++) {
    form_data.append('empAcademicFile[]', $('#empAcademicFile').prop('files')[x]);
    }


    //Skill Details insertion
   
   
 

    for (var skl = 0; skl <skillX; skl++) {
      var tx = document.getElementsByName("skillName[]")[skl].value;
      var ty = document.getElementsByName("yearsOfExp[]")[skl].value;
     var tz = document.getElementsByName("expInstitution[]")[skl].value;
     if(tx!='')
       form_data.append('skillName[]', tx);
       if(ty!='')
       form_data.append('yearsOfExp[]', ty);
       if(tz!='')
       form_data.append('expInstitution[]', tz); 
    }
   
    

    var ins4 = document.getElementById('empSkillFile').files.length;
    for (var x = 0; x < ins4; x++) {
    form_data.append('empSkillFile[]', $('#empSkillFile').prop('files')[x]);
    }

    //Employee Experience insertion
    for (var exp = 0; exp <expX; exp++) {
      var ew = document.getElementsByName("companyName[]")[exp].value;
      var ex = document.getElementsByName("expYears[]")[exp].value;
     var ey = document.getElementsByName("designation[]")[exp].value;
     var ez = document.getElementsByName("department[]")[exp].value;
     if(ew!='')
       form_data.append('companyName[]', ew);
       if(ex!='')
       form_data.append('expYears[]', ex);
       if(ey!='')
       form_data.append('designation[]', ey);
       if(ez!='')
       form_data.append('department[]', ez); 
    }
   
     
    var ins5 = document.getElementById('empExpFile').files.length;
    for (var x = 0; x < ins5; x++) {
    form_data.append('empExpFile[]', $('#empExpFile').prop('files')[x]);
    }

//Finally calling ajax and sending all details saved in form_data to addAllRecords.php
    $.ajax({
        type: "POST",
        url: "addAllRecords.php",
        data:form_data,
        processData: false,
        contentType: false,
        success: function (data){
          console.log(data);
    //    $('#successmessage').modal("show");
        },
        error: function(data)
        {
          $('#errormessage').modal("show");
        }
    });
    }
    else{
      $('#errormessage').modal("show");
    }
    
}
//End of inserting data into from data and ajax call


//Display image after choosing a photo
$('body').on('change', '#getPhoto', function() {
$( "#replaceImg" ).replaceWith( "<img class='imageupload' id='profilePhoto' style='overflow:hidden height:inherit; width:inherit;'>" );
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
$(this).hide();
});



/////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////////////

$('body').on('change', '#empContFile', function() {

  var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) 
        {
         var x = $(this).val().replace(/.*(\/|\\)/, '');
         //console.log(x);
  $( "#empContOpen" ).replaceWith("<li><div  class='imageuploadsect'><p style='text-align:center;overflow:hidden height:inherit; width:inherit;' class='m-0'>"+x+"</p></div></li>");
  
        }
        else{
          if (this.files && this.files[0]) {

            $( "#empContOpen" ).replaceWith("<li><div  class='imageuploadsect'><img id='empContDoc' style=' width:inherit;height:100%;'/></div></li>");
var reader = new FileReader();
reader.onload = empContDocIsLoaded;
reader.readAsDataURL(this.files[0]);
$(this).hide();
}
} 
});

$('body').on('change', '#empAcademicFile', function() {

  var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) 
        {
         var x = $(this).val().replace(/.*(\/|\\)/, '');
         //console.log(x);
  $( "#empAcademicOpen" ).replaceWith("<li><div  class='imageuploadsect'><p style='text-align:center;overflow:hidden height:inherit; width:inherit;' class='m-0'>"+x+"</p></div></li>");
  
        }
        else{
          if (this.files && this.files[0]) {

            $( "#empAcademicOpen" ).replaceWith("<li><div  class='imageuploadsect'><img id='empAcademicDoc' style=' width:inherit;height:100%;'/></div></li>");
var reader = new FileReader();
reader.onload = empAcademicDocIsLoaded;
reader.readAsDataURL(this.files[0]);
$(this).hide();
}
} 
});

$('body').on('change', '#empSkillFile', function() {
  var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) 
        {
         var x = $(this).val().replace(/.*(\/|\\)/, '');
      
  $( "#empSkillOpen" ).replaceWith("<li><div  class='imageuploadsect'><p style='text-align:center; overflow:hidden height:inherit; width:inherit;' class='m-0'>"+x+"</p></div></li>");
  
        }
        else{
          if (this.files && this.files[0]) {

            $( "#empSkillOpen" ).replaceWith("<li ><a onclick='deleteDoc($cnt-1)' id='close'><div  class='imageuploadsect'><img id='empSkillDoc' style=' width:inherit;height:100%;'/></div></li>");
var reader = new FileReader();
reader.onload = empSkillDocIsLoaded;
reader.readAsDataURL(this.files[0]);
$(this).hide();
}
} 
});
$('body').on('change', '#empExpFile', function() {
  console.log("rrrr");
  var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) 
        {
         var x = $(this).val().replace(/.*(\/|\\)/, '');
  $( "#empExpOpen" ).replaceWith("<li id='thumb'><a onclick='deleteDoc($cnt-1)' id='close'><div  class='imageuploadsect'><p style='text-align:center; overflow:hidden height:inherit; width:inherit;' class='m-0'>"+x+"</p></div></li>");
  
        }
        else{
          if (this.files && this.files[0]) {

            $( "#empExpOpen" ).replaceWith("<li><div  class='imageuploadsect'><img id='empExpDoc' style=' width:inherit;height:100%;'/></div></li>");
var reader = new FileReader();
reader.onload = empExpDocIsLoaded;
reader.readAsDataURL(this.files[0]);
$(this).hide();
}
} 
});
function imageIsLoaded(e) {
$('#profilePhoto').attr('src', e.target.result);
};


function empGenDocIsLoaded(e) {
$('#empGenDoc').attr('src', e.target.result);
};

function empContDocIsLoaded(e) {
$('#empContDoc').attr('src', e.target.result);
};
function empAcademicDocIsLoaded(e) {
$('#empAcademicDoc').attr('src', e.target.result);
};
function empSkillDocIsLoaded(e) {
$('#empSkillDoc').attr('src', e.target.result);
};
 
function empExpDocIsLoaded(e) {
$('#empExpDoc').attr('src', e.target.result);
};
 

// Add active class to the current button (highlight it)
var header = document.getElementById("myDIV");
var btns = header.getElementsByClassName("a");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}

$(document).ready(function(){
    $(".menuhomem").click(function(){
    $(".main-content").toggleClass("minleftmenu");
    });
    });


    $('.usernameboxdiv').click( function(event){
        
        event.stopPropagation();
        
        $('#drop').toggle();
        
    });
    
    $(document).click( function(){

        $('#drop').hide();

    });


    $(document).ready(function(){
 // $(".subchildlink").hide();
 $('.parent').siblings().toggle();
 $('#parent2').siblings().show();
});

function changeActive(id){
      
      let x= document.getElementById(id).id;
      // console.log(x);
      let idName = '#'+x;
      // console.log(idName);
     $('.parent').siblings().hide();
      $(idName).siblings().toggle();
      $('.parent').removeClass('activeclass');
      $(idName).addClass('activeclass');
    //  $('.dashboard').removeClass('activeclass');
    }

</script>

<script>
////////////////start emp gen file
var abc =0;

$(document).ready(function() {
  var newId='';
  var tmp='';
  var tot=0;
$('#add_more').click(function() {


$('#ref1').append($("<input/>", {
name: 'empGenFile[]',
type: 'file',
id: 'empGenFile'+abc,
style:'visibility: hidden;height:0px;width:0px;'
}));
$('#add_more').before("<li class='thumb' id='empFileOpen"+abc+"'><div class='imageuploadsect imagoutlinebor'><a class='m-0'><i class='icon-add-plus-button'></i></a></div></li>");
newId='#empGenFile'+abc;

newClick= '#empFileOpen'+abc;
 tmp = abc;

$('body').on('click', newClick, function() {
 
  var ttt = 'empGenFile'+tmp;
  console.log(ttt);
  document.getElementById(ttt).click();
});




});


$('body').on('change', newId, function() {

var x = $(newId).val().replace(/^.*\\/, "");
  

$( '#empFileOpen'+tmp ).replaceWith("<li class='thumb"+tot+"'><a id='close' style='background-color:white; color:red;' onClick='closeDel("+tot+");'>X</a><div  class='imageuploadsect'><p style=' word-wrap: break-word;text-align:center;overflow:hidden; height:inherit; width:inherit;' class='m-0'>"+x+"</p></div></li>");
tot++;
if($(newId).prop('files'))
tempData.push($(newId).prop('files'))
console.log(tot);
abc++;

});
$('body').on('change', '#empGenFile', function() {
  var x = $('#empGenFile').val().replace(/^.*\\/, "");
       
  $( "#empFileOpen" ).replaceWith("<li  class='thumb"+tot+"'><a id='close'  style='background-color:white; color:red;' onClick='closeDel("+tot+");'>X</a><div  class='imageuploadsect'><p style=' word-wrap: break-word; text-align:center;overflow:hidden; height:inherit; width:inherit;' class='m-0'>"+x+"</p></div></li>");
console.log("from chan");
tempData.push($('#empGenFile').prop('files'))
tot++;

});



});
function closeDel(indx)
{
  tempData.splice(indx,1);
  form_data.delete('empGenFile[]');
  var deleteThumbId = ".thumb"+indx;
 $(deleteThumbId).remove();
 console.log(deleteThumbId);
  $("ref1").load('#ref1');
}
///////////////end emp gen file //////

///////////////start emp skill upload ///////////////



    var fieldHTML = '<div class="row"><div class="col-sm-2 mb-2"><div class="form-group addcustomcss"><label class="labelform">Skill Name</label><input name="skillName[]" id="skillName" placeholder="Skill Name" class="form-control rounded-0" width="100%" /> </div></div><div class="col-sm-4 mb-2"><div class="form-group addcustomcss"><label class="labelform">Years of Experience</label><input name="yearsOfExp[]" id="yearsOfExp" placeholder="Years of Experience" class="form-control rounded-0" width="100%" /> </div></div><div class="col-sm-4 mb-2"><div class="form-group addcustomcss"><label class="labelform">Institution</label><input  name="expInstitution[]"  id="expInstitution" placeholder="Institution" class="form-control rounded-0" width="100%" /> </div></div><div class="col-sm-2 mb-2"><div class="form-group addcustomcss"><button id="removeNewSkill" type="button" class="btn rounded-circle" ><i class="icon-cancel-1"style="color:red"></i></button></div></div></div>';
    var skillX = 1; //Initial field counter is 1
 //Once add button is clicked
 $('#addNewSkill').click(function(){
        
        //Check maximum number of input fields
       
        skillX++; //Increment field counter
            $('#initialSkill').before(fieldHTML); //Add field html
        
    });
    
    //Once remove button is clicked
 $('body').on('click', '#removeNewSkill', function(e){
        e.preventDefault();
        $(this).parent('div').parent('div').parent('div').remove(); //Remove field html
        skillX--; //Decrement field counter
  });


///////////////start emp academic upload ///////////////
var fieldHTML2 = '<div class="row"><div class="col-sm-2 mb-2"><div class="form-group addcustomcss"><label class="labelform">Degree Name</label> <input name="degreeName[]" id="degreeName" placeholder="Degree Name" class="form-control rounded-0" width="100%" /> </div></div><div class="col-sm-4 mb-2"><div class="form-group addcustomcss"><label class="labelform">Year of Passing</label><input name="yearOfPassing[]" id="yearOfPassing" placeholder="Year of Passing" class="form-control rounded-0" width="100%" /> </div></div><div class="col-sm-4 mb-2"><div class="form-group addcustomcss"><label class="labelform">Institution</label><input name="institution[]" id="institution" placeholder="Institution" class="form-control rounded-0" width="100%" /> </div></div><div class="col-sm-2 mb-2"><div class="form-group addcustomcss"><button id="removeNewAcademic" type="button" class="btn rounded-circle" ><i class="icon-cancel-1" style="color:red"></i></button></div></div></div>';
var academicX = 1; //Initial field counter is 1
 //Once add button is clicked
 $('#addNewAcademic').click(function(){
        
        //Check maximum number of input fields
       
        academicX++; //Increment field counter
            $('#initialAcademic').before(fieldHTML2); //Add field html
        
    });
    
    //Once remove button is clicked
 $('body').on('click', '#removeNewAcademic', function(e){
        e.preventDefault();
        $(this).parent('div').parent('div').parent('div').remove(); //Remove field html
        academicX--; //Decrement field counter
  });


///////////////start emp exp upload ///////////////
var fieldHTML3 = '<div class="row"><div class="col-sm-3 mb-2"><div class="form-group addcustomcss"><label class="labelform">Company Name</label><input id="companyName" name="companyName[]" placeholder="Company Name" class="form-control rounded-0" width="100%" /> </div></div><div class="col-sm-3 mb-2"><div class="form-group addcustomcss"><label class="labelform">Years of Experience</label><input name="expYears[]" id="expYears" placeholder="Years of Experience" class="form-control rounded-0" width="100%" /> </div></div><div class="col-sm-3 mb-2">  <div class="form-group addcustomcss"><label class="labelform">Designation</label><select  name="designation[]"  id="designation" class="form-control rounded-0"><option>Designation</option><?php $sql1="SELECT * FROM designation";$res1=mysqli_query($conn,$sql1); foreach($res1 as $desg){ echo "<option value=$desg[id]>$desg[designation]</option>"; } ?></select></div></div><div class="col-sm-2 mb-2"><div class="form-group addcustomcss"><label class="labelform">Department</label><select id="department" name="department[]" class="form-control rounded-0"><option>Department</option><?php $sql1="SELECT * FROM departmenttable";$res1=mysqli_query($conn,$sql1); foreach($res1 as $dept){ echo "<option value=$dept[id]>$dept[department]</option>"; } ?></select></div></div><div class="col-sm-1 mb-2"><div class="form-group addcustomcss"><button id="removeNewAcademic" type="button" class="btn rounded-circle" ><i class="icon-cancel-1" style="color:red"></i></button></div>   </div></div>';


var expX = 1; //Initial field counter is 1
 //Once add button is clicked
 $('#addNewExp').click(function(){
        
        //Check maximum number of input fields
       
        expX++; //Increment field counter
            $('#initialExp').before(fieldHTML3); //Add field html
        
    });
    
    //Once remove button is clicked
 $('body').on('click', '#removeNewAcademic', function(e){
        e.preventDefault();
        $(this).parent('div').parent('div').parent('div').remove(); //Remove field html
        expX--; //Decrement field counter
  });




















</script>
<style>
.thumb{
  position : relative;
}
#close{
    display:block;
    float:right;
    width:30px;
    height:29px;
 
}
#close:hover{
  cursor:pointer;
}
</style>
