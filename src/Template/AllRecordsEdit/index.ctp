<?php
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
require 'dbconnect.php';
$id=base64_decode($_GET['id']);

?>

<?php
             $mobile='';
             $officeEmail='';
             $personalEmail='';
             $presentAddress='';
             $permanentAddress='';
             $PANno='';
             $PFno='';
             $ESICno='';
             $location='';
             $UANno='';
             $aadharNo='';             
             $conts = TableRegistry::get('employeecontact');
                $query = $conts->find('all');
                //print_r($query);
                foreach($query as $temp){
                  
                    if($id==$temp['empId'])
                    {
                        $mobile=$temp['mobileId'];
                        $officeEmail=$temp['officeEmail'];
                        $personalEmail=$temp['personalEmail'];
                        $presentAddress=$temp['presentAddress'];
                        $permanentAddress=$temp['permanentAddress'];
                        $PANno=$temp['PANno'];
                        $PFno=$temp['PFno'];
                        $ESICno=$temp['ESICno'];
                        $UANno=$temp['UANno'];
                        $aadharNo=$temp['aadharNo']; 
                        $location=$temp['location'];
                        $doc = $temp['documentPath'];
                    }
                }

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
              <a class="activeclass" style="cursor:pointer;">
              <li onClick="javascipt:window.location.href='<?php echo Router::url(['controller'=>'EmpGeneralInfo','action'=>'index']) ?>' "  style="cursor:pointer;background-colour:#1B679F;">
              View Records</li>
            </a>
              <a class="">
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
            <a><li  onClick="javascipt:window.location.href='<?php echo Router::url(['controller'=>'Attendancerecord','action'=>'index','id'=>$max]) ?>' "  style="cursor:pointer;">Attendance Records</li></a>                     -->
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
    <section  class="rightpart">
    <header class="header-resize">
      <div class="row">
        <div class="col-auto ml-auto align-middle">
         <a href="javascript:void(0)" class="usernameboxdiv ml-auto d-block">
          <span class="userpicbox mr-2"><img src="images/User.png" alt="Navsoft Training" title="Navsoft Training"></span>
          <span class="usernamed">Welcome <?php echo $username ?></span>
        </a>
         <div id="drop">
        <div class="logouuserdiv">
          <div class="imagepic"><img src="images/User.png" alt="Navsoft Training" title="Navsoft Training"></div>
          <div class="spantext"><h5 class="mb-0"><?php echo $username ?></h5><a href="javascript:void(0)"><?php echo $email ?></a></div>
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
        <div class="col"><h2>Edit Employee Records</h2></div>
        <div class="col-auto"><button type="button" onClick="javascipt:window.location.href='<?php echo Router::url(['controller'=>'EmpGeneralInfo','action'=>'index']) ?>' " class="btn outlineblue mr-2">Cancel</button> <button onClick="onclickFunction();" type="button" class="btn redbutton">Save</button></div>
      </div>

      <!-- tab start here  -->
      <ul id="myDIV" class="nav nav-tabs">
    <li id="genLi" class="a active"><a id="genTag" data-toggle="tab" href="#home">General Details</a></li>
    <li id="contLi" class="a"><a id="contTag" data-toggle="tab" href="#menu1">Contact Details</a></li>
    <li id="academicLi" class="a"><a id="academicTag" data-toggle="tab" href="#menu2">Academic Details</a></li>
    <li id="skillLi" class="a"><a id="skillTag" data-toggle="tab" href="#menu3">Skills Details</a></li>
    <li id="expLi" class="a"><a id="expTag" data-toggle="tab" href="#menu4">Experience Details</a></li>
  </ul>
  
<!-- ______________________________________GENERAL INFORMATION STARTS HERE________________________________________-->
<?php
             $empName='';
             $dob='';
             $sex='';
             $nationality='';
            
             $bloodGroup='';
             $emergncy='';
             $dateOfJoining='';
             $probation='';
        
             $doc=''; 
             $photoPath='';
             $doc='';
        

             $emp = TableRegistry::get('emp_general_info');
                $query = $emp->find('all');
                //print_r($query);
                foreach($query as $temp){
                  
                    if($id==$temp['empId'])
                    {
                        $empName=$temp['empName'];
                        $dob=$temp['dob'];
                        $nationality=$temp['nationality'];
                        $sex=$temp['sex'];
                        
                        $bloodGroup=$temp['bloodGroup'];
                        $dateOfJoining=$temp['dateOfJoining'];
                        $probation=$temp['probationCompletionDate'];
                   
                        $doc = $temp['documentPath'];
                        $photoPath=$temp['photoPath'];
                        $emergncy=$temp['emergencyContact'];
                       
                        

                    }
                }

            ?>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3 class="mb-3">Employee General Information</h3>
      <div class="row">
   
   <?php
      if($photoPath=='' || $photoPath=='upload/')
      {
        $photoPath='images/User.png';
      }
   ?>
        <div class="col-sm-1 mb-2"><a id='replaceImg'  onclick="document.getElementById('getPhoto').click()" class="imageupload"><img class="imageupload" src="<?php echo $photoPath?>" style='overflow:hidden height:inherit; width:inherit;' ?>" alt="Photo"></a></div>
        <input type='file' id="getPhoto"  style="display:none">
        <div class="col-sm-11  mb-2">
        <div class="row">
            <div class="col-sm-4">
              <div class="form-group addcustomcss">
              <label class="labelform">Employee Name</label>
                <input id="employeeName"  value="<?php echo $empName ?>" name='employeeName' placeholder="Employee Name" class="form-control rounded-0" width="100%" />
              </div>
    
            </div>
            <div class="col-sm-3 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Date of birth</label>
            <input id="dob" value="<?php echo $dob->i18nFormat('M/dd/Y'); ?>" placeholder="Date of Birth" class="form-control rounded-0" width="100%" />
          </div>
        </div>
            <div class="col-sm-4">
              <div class="form-group addcustomcss">
                <select id='sex' class="form-control rounded-0">
                  <option><?php echo $sex ?></option>
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
              <option><?php  echo $nationality ?></option>
              <?php
$content = file_get_contents("allCountries.json");

$result  = json_decode($content);


foreach($result as $temp)
{
  if($nationality!=$temp->name)
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
          
              <option><?php echo $location ?></option>
              <?php
$content = file_get_contents("allStates.json");

$result  = json_decode($content);


foreach($result as $temp)
{
  if($location!=$temp->name)
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
              <option><?php echo $bloodGroup ?></option>
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
            <input id="emergencyContact" value="<?php echo $emergncy ?>" placeholder="Emergency Contact" class="form-control rounded-0" width="100%" />
          </div>
        </div>
        <div class="col-sm-3 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Date of joining</label>
            <input id="dateOfJoining"  value="<?php echo $dateOfJoining->i18nFormat('M/dd/Y'); ?>" placeholder="Date of Joining" class="form-control rounded-0" width="100%" />
          </div>
        </div>
        <div class="col-sm-3 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Probation Completion Date</label>
            <input id="probationDate"  value="<?php echo $probation->i18nFormat('M/dd/Y'); ?>" placeholder="Probation Completion Date" class="form-control rounded-0" width="100%" /> 
          </div>
        </div>
        
      </div>
      <h3 class="my-3">KYC Informations</h3>
      <ul id='refresh1' class="imageuploadlist p-0 m-0">
        <!-- <li><div class="imageuploadsect"><p class="m-0">Upload 1</p></div></li> -->
     
        <?php 
     
        if($doc!=null) {
               
                $mystring = $doc;
                $x='';
                $arr=array();
                $n = strlen($mystring);
                for($i=0;$i<strlen($mystring);$i++)
                {
                    if($mystring[$i]!=';')
                    {
                        $x.=$mystring[$i];
                        
                        
                        $n--;
                    }
                    elseif($n!=0 || $mystring[$i]!=';'){
                        array_push($arr,$x);
                        $x='';
                     
                        $n--;
                    }
                    
                }
                array_push($arr,$x);
                $cnt=0;
                foreach($arr as $temp)
                {
                  // echo "<input value='$cnt' type='hidden' id='delGenFile$cnt'>";
                  $cnt++;
                  $ind= $cnt-1;
                  echo "<input type='hidden' value='$doc' id='d$ind'>";
               echo "<li  id='thumb'><a onclick='deleteDoc($cnt-1)' id='close'></a><div  class='imageuploadsect imagoutlinebor'><a download href='$temp'><p>Document $cnt</p></a></div></li>";
                }
               }
            
                ?>
        <li id='empFileOpen'><div  onclick="document.getElementById('empGenFile').click()"  class="imageuploadsect"><i class="icon-add-plus-button"></i></div></li>
        <input type="file" id="empGenFile" style='visibility: hidden;'>
      </ul>
    </div>

<!-- ______________________________________CONTACT INFORMATION STARTS HERE________________________________________-->

<?php
             $mobile='';
             $officeEmail='';
             $personalEmail='';
             $presentAddress='';
             $permanentAddress='';
             $PANno='';
             $PFno='';
             $ESICno='';
             $UANno='';
             $aadharNo='';             
             $conts = TableRegistry::get('employeecontact');
                $query = $conts->find('all');
                //print_r($query);
                foreach($query as $temp){
                  
                    if($id==$temp['empId'])
                    {
                        $mobile=$temp['mobileId'];
                        $officeEmail=$temp['officeEmail'];
                        $personalEmail=$temp['personalEmail'];
                        $presentAddress=$temp['presentAddress'];
                        $permanentAddress=$temp['permanentAddress'];
                        $PANno=$temp['PANno'];
                        $PFno=$temp['PFno'];
                        $ESICno=$temp['ESICno'];
                        $UANno=$temp['UANno'];
                        $aadharNo=$temp['aadharNo']; 
                        $location=$temp['location'];
                        $doc = $temp['documentPath'];
                    }
                }

            ?>
    <div id="menu1" name="menu1" class="tab-pane fade">
      <h3 class="mb-3">Employee Contact Information</h3>
      <div class="row">

        <div class="col-sm-4 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Phone Number</label>
             <input id="phoneNumber" value="<?php echo $mobile ?>" placeholder="Employee Phone Number" class="form-control rounded-0" width="100%" /> 
          </div>
        </div>
        <div class="col-sm-4 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Official Email</label>
            <input id="officeEmail" value="<?php echo $officeEmail ?>" placeholder="Office Email Address" class="form-control rounded-0" width="100%" /> 
          </div>
        </div>
        <div class="col-sm-4 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Personal Email</label>
            <input id="personalEmail" value="<?php echo $personalEmail ?>" placeholder="Personal Email Address" class="form-control rounded-0" width="100%" /> 
          </div>
        </div>
        <div class="col-sm-4 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Present Address</label>
            <input id="presentAddress" value="<?php echo $presentAddress ?>" placeholder="Present Address" class="form-control rounded-0" width="100%" />
          </div>
        </div>
        <div class="col-sm-4 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Permanent Address</label>
            <input id="permanentAddress" value="<?php echo $permanentAddress ?>" placeholder="Permanent Address" class="form-control rounded-0" width="100%" />
          </div>
        </div>
        <div class="col-sm-4 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Pan Number</label>
            <input id="panNO" value="<?php echo $PANno ?>" placeholder="Pan Number" class="form-control rounded-0" width="100%" />
          </div>
        </div>
        <div class="col-sm-3 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">PF No.</label>
            <input id="pfNO" value="<?php echo $PFno ?>" placeholder="PF No." class="form-control rounded-0" width="100%" />
          </div>
        </div>
        <div class="col-sm-3 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">ESIC No.</label>
            <input id="esicNO" value="<?php echo $ESICno ?>" placeholder="ESIC No." class="form-control rounded-0" width="100%" />
          </div>
        </div>
        <div class="col-sm-3 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">UAN No.</label>
            <input id="uanNO" value="<?php echo $UANno ?>" placeholder="UAN No." class="form-control rounded-0" width="100%" />
          </div>
        </div>
        <div class="col-sm-3 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Aadhar Number</label>
            <input id="aadharNO" value="<?php echo $aadharNo ?>" placeholder="Aadhar No." class="form-control rounded-0" width="100%" />
          </div>
        </div>
      </div>
      <h3 class="my-3">Contact Informations</h3>
      <ul class="imageuploadlist p-0 m-0">
        
        <li id='empContOpen'><div  onclick="document.getElementById('empContFile').click()" class="imageuploadsect imagoutlinebor"><a  class="m-0"><p><?php echo $doc ?></p></a></div></li>
        <input type="file" style='visibility: hidden;' id="empContFile" name="">
      </ul>
    </div>
    
<!-- ______________________________________________Academic STARTS HERE___________________________________________-->

    <div id="menu2" class="tab-pane fade">
     <h3 class="mb-3">Employee Academic Information</h3>
     <div class="col">
        <div class="form-group addcustomcss">
        <button id="addNewAcademic" class="btn outlineblue mr-2" type="button" >Add&nbsp;<i class="icon-add-plus-button" style="color:blue"></i></button>
        </div> 
     <?php
  $degreeName='';
  $yearOfPassing='';
  $institution='';
  $countAcademic=0;
  $academic = TableRegistry::get('academicdetails');
     $query2 = $academic->find('all');
     //print_r($query);
     foreach($query2 as $temp){
       
         if($id==$temp['empId'])
         {
             
             $degreeName=$temp['degreeNames'];
             $yearOfPassing=$temp['yearOfPassing'];
             $institution=$temp['institution'];
             $doc= $temp['documentPath'];
             
         }
     }
   
$x='';
$y='';
$z='';
$arr=array();
$brr=array();
$crr=array();
$n = strlen($degreeName);
$n2 =  strlen($yearOfPassing);
$n3= strlen($institution);
for($i=0;$i<strlen($degreeName);$i++)
{
    if($degreeName[$i]!=';')
    {
        $x.=$degreeName[$i];
        $n--;
      
    }
    elseif($n!=0 || $degreeName[$i]!=';'){
        array_push($arr,$x);
        $x='';
        $n--;
        $countAcademic++;
    }
    
}
$countAcademic++;
for($i=0;$i<strlen($yearOfPassing);$i++)
{
    if($yearOfPassing[$i]!=';')
    {
        $y.=$yearOfPassing[$i];
        $n2--;
    }
    elseif($n2!=0 || $yearOfPassing[$i]!=';'){
        array_push($brr,$y);
        $y='';
        $n2--;
    }
    
}
for($i=0;$i<strlen($institution);$i++)
{
    if($institution[$i]!=';')
    {
        $z.=$institution[$i];
        $n3--;
    }
    elseif($n3!=0 || $institution[$i]!=';'){
        array_push($crr,$z);
        $z='';
        $n3--;
    }
    
}

array_push($arr,$x);
array_push($brr,$y);
array_push($crr,$z);

for($i=0;$i<count($arr);$i++)
{
 $test = $arr[$i];
?>


      <div class="row">
      <div class="col-sm-2 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Degree Name</label>
             <input name="degreeName[]" value="<?php echo $test?>" id="degreeName" class="form-control rounded-0" width="100%" /> 
          </div>
        </div>
        <div class="col-sm-4 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Year of Passing</label>
            <input name="yearOfPassing[]" value="<?php echo $brr[$i]?>" id="yearOfPassing"  class="form-control rounded-0" width="100%" /> 
          </div>
        </div>
        <div class="col-sm-4 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Institution</label>
            <input name="institution[]" value="<?php echo $crr[$i]?>" id="institution"  class="form-control rounded-0" width="100%" /> 
          </div>
        </div>
        <div class="col-sm-1 mb-2">
        <div class="form-group addcustomcss">
        <button id="removeNewAcademic" type="button" class="btn rounded-circle" ><i class="icon-cancel-1" style="color:red"></i></button>
        </div>   
        </div>
        </div>
        
<?php } ?>
</div>


      
      <h3  id="initialAcademic" class="my-3">Academic Informations</h3>
      <ul class="imageuploadlist p-0 m-0">
        <li id='empAcademicOpen'><div  onclick="document.getElementById('empAcademicFile').click()"  class="imageuploadsect imagoutlinebor"><a  class="m-0"><p><?php echo $doc ?></p></a></div></li>
        <input type="file" style='visibility: hidden;' id="empAcademicFile" name="" >
      </ul>
    </div>
    <?php 
     
    ?>
    <!-- ______________________________________________SKILLS STARTS HERE___________________________________________-->
   
    <div id="menu3" class="tab-pane fade">
    <h3 class="mb-3">Employee Academic Information</h3>
     <div class="col">
        <div class="form-group addcustomcss">
        <button id="addNewSkill" class="btn outlineblue mr-2" type="button" >Add&nbsp;<i class="icon-add-plus-button" style="color:blue"></i></button>
        </div> 
     <?php
           $skillName='';
           $yearOfExp='';
           $countSkill=0;
                     
           $skills = TableRegistry::get('professionalskill');
              $query3 = $skills->find('all');
              //print_r($query);
              foreach($query3 as $temp){
                
                  if($id==$temp['empId'])
                  {
                      
                      $skillName=$temp['skillName'];
                      $yearOfExp=$temp['experience'];
                      $doc= $temp['documentPath'];
                      
                  }
              }
  $x='';
  $y='';
  $prr=array();
  $qrr=array();
  $n = strlen($skillName);
  $n2 =  strlen($yearOfExp);
  for($i=0;$i<strlen($skillName);$i++)
  {
      if($skillName[$i]!=';')
      {
          $x.=$skillName[$i];
          $n--;
      }
      elseif($n!=0 || $skillName[$i]!=';'){
        $countSkill++;
          array_push($prr,$x);
          $x='';
          $n--;
      }
      
  }
  $countSkill++;
  for($i=0;$i<strlen($yearOfExp);$i++)
  {
      if($yearOfExp[$i]!=';')
      {
          $y.=$yearOfExp[$i];
          $n2--;
      }
      elseif($n2!=0 || $yearOfExp[$i]!=';'){
          array_push($qrr,$y);
          $y='';
          $n2--;
      }
      
  }
  
  array_push($prr,$x);
  array_push($qrr,$y);
  
      
  
for($i=0;$i<count($prr);$i++)
{
 
?>


      <div class="row">
      <div class="col-sm-2 mb-2">
      <div class="form-group addcustomcss">
          <label class="labelform">Skill Name</label>
             <input name="skillName[]" id="skillName" value="<?php  echo $prr[$i]?>"  class="form-control rounded-0" width="100%" /> 
          </div>
        </div>
        <div class="col-sm-4 mb-2">
        <div class="form-group addcustomcss">
          <label class="labelform">Years of Experience</label>
            <input name="yearsOfExp[]" value="<?php  echo $qrr[$i]?>" id="yearsOfExp" class="form-control rounded-0" width="100%" /> 
          </div>
        </div>
        <div class="col-sm-1 mb-2">
        <div class="form-group addcustomcss">
        <button id="removeNewSkill" type="button" class="btn rounded-circle" ><i class="icon-cancel-1" style="color:red"></i></button>
        </div>   
        </div>
        </div>
        
<?php } ?>
</div>


      <h3 id="initialSkill" class="my-3">Skill Informations</h3>
      <ul class="imageuploadlist p-0 m-0">
        <li id="empSkillOpen"><div  onclick="document.getElementById('empSkillFile').click()" class="imageuploadsect imagoutlinebor"><a class="m-0"><p><?php echo $doc; ?></p></a></div></li>
        <input type="file"  style='visibility: hidden;' id="empSkillFile" name="">
      </ul>
    </div>
    <!-- ______________________________________________Employee Experience STARTS HERE___________________________________________-->
   
    <div id="menu4" class="tab-pane fade">
      <h3 class="mb-3">Employee Experience Information</h3>
      <div class="col">
        <div class="form-group addcustomcss">
        <button id="addNewExp" class="btn outlineblue mr-2" type="button" >Add&nbsp;<i class="icon-add-plus-button" style="color:blue"></i></button>
        </div> 
     <?php
  
  $companyName='';
  $yearsInCompany='';
  $designationE='';
  $departmentE='';
 $countExp = 0;
            
  $exp = TableRegistry::get('experiencedetails');
     $query4 = $exp->find('all');
     //print_r($query);
     foreach($query4 as $temp){
       
         if($id==$temp['empId'])
         {
           
             $companyName=$temp['experience'];
             $designationE=$temp['designationId'];
             $departmentE=$temp['departmentId'];
             $yearsInCompany=$temp['yearsInCompany'];
             $doc= $temp['documentPath'];
             
         }
     }
     $w='';
     $x='';
     $y='';
     $z='';
     $arr=array();
     $brr=array();
     $crr=array();
     $drr=array();
     $n = strlen($companyName);
     $n2 =strlen($yearsInCompany);
     $n3= strlen($designationE);
     $n4= strlen($departmentE);
     for($i=0;$i<strlen($companyName);$i++)
     {
         if($companyName[$i]!=';')
         {
             $w.=$companyName[$i];
             $n--;
         }
         elseif($n!=0 || $companyName[$i]!=';'){
             array_push($arr,$w);
             $w='';
             $n--;
             $countExp++;
         }
         
     }
     $countExp++;
     for($i=0;$i<strlen($yearsInCompany);$i++)
     {
         if($yearsInCompany[$i]!=';')
         {
             $x.=$yearsInCompany[$i];
             $n2--;
         }
         elseif($n2!=0 || $yearsInCompany[$i]!=';'){
             array_push($brr,$x);
             $x='';
             $n2--;
         }
         
     }
     for($i=0;$i<strlen($designationE);$i++)
     {
         if($designationE[$i]!=';')
         {
             $y.=$designationE[$i];
             $n3--;
         }
         elseif($n3!=0 || $designationE[$i]!=';'){
             array_push($crr,$y);
             $y='';
             $n3--;
         }
         
     }
     for($i=0;$i<strlen($departmentE);$i++)
     {
         if($departmentE[$i]!=';')
         {
             $z.=$departmentE[$i];
             $n4--;
         }
         elseif($n3!=0 || $departmentE[$i]!=';'){
             array_push($drr,$z);
             $z='';
             $n4--;
         }
         
     }
     array_push($arr,$w);
     array_push($brr,$x);
     array_push($crr,$y);
     array_push($drr,$z);

     for($i=0;$i<count($arr);$i++)
{
 
?>


      <div class="row">
     
      <div class="col-sm-3 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Company Name</label>
             <input name="companyName[]" value="<?php  echo $arr[$i]?>" id="companyName" placeholder="Company Name" class="form-control rounded-0" width="100%" /> 
          </div>
        </div>
        <div class="col-sm-3 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Years of Experience</label>
            <input name="expYears[]" id="expYears" value="<?php  echo $brr[$i]?>" placeholder="Years of Experience" class="form-control rounded-0" width="100%" /> 
          </div>
        </div>
        <div class="col-sm-3 mb-2">
          <div class="form-group addcustomcss">
          <label class="labelform">Designation</label>
         
            <select  name="designation[]"   id="designation" class="form-control rounded-0">
            <?php
              $sql="SELECT * FROM designation";
              $res=mysqli_query($conn,$sql);
              foreach($res as $row)
              {
                if($crr[$i]==$row[id])
                echo "<option value=$row[id]>$row[designation]</option>";
              }

            ?>
            <?php
              $sql="SELECT * FROM designation";
              $res=mysqli_query($conn,$sql);
              foreach($res as $row)
              {
                if($crr[$i]!=$row[id])
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
                  
                  <?php
                  $sql1="SELECT * FROM departmenttable";
                    $res1=mysqli_query($conn,$sql1);
                    foreach($res1 as $row1)
                    {
                      if($drr[$i]==$row[id])
                      echo "<option value=$row[id]>$row1[department]</option>";
                    }

                  ?>
                  <?php
                  $sql1="SELECT * FROM departmenttable";
                    $res1=mysqli_query($conn,$sql1);
                    foreach($res1 as $row1)
                    {
                      if($drr[$i]!=$row[id])
                      echo "<option value=$row[id]>$row1[department]</option>";
                    }

                  ?>
                </select>
          </div>
        </div>
        <div class="col-sm-1 mb-2">
        <div class="form-group addcustomcss">
        <button id="removeNewExp" type="button" class="btn rounded-circle" ><i class="icon-cancel-1" style="color:red"></i></button>
        </div>   
        </div>
        </div>
        
<?php } ?>
</div>

      <h3 id="initialExp" class="my-3">Experience Informations</h3>
      <ul class="imageuploadlist p-0 m-0">
     
        <li id="empExpOpen"><div onclick="document.getElementById('empExpFile').click()" class="imageuploadsect imagoutlinebor"><p><?php echo $doc?></p></a></div></li>
        <input type="file"  style='visibility: hidden;' id="empExpFile" name="">
      </ul>
    </div>
  </div>
      <!-- tab end here  -->

      </div>
      </form>
    </div>
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
        <button type="button" onclick="jQuery('#successmessage').modal('hide');" class="btn bluebutton">Continue</button>
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
        <button type="button" class="btn bluebutton">Continue</button>
      </div>
    </div>
  </div>
</div>
    <!-- body container end here -->
    <footer><p>© 2019 All Right Reserved</p></footer>
    </section>
    <!-- right part section end here -->    
    </section>


    

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
var id = <?php echo base64_decode($_GET['id']); ?>;
///////////////////////////////
var deleteEmpGenDocId = '';
var name ='';
function deleteDoc(docId){
  console.log(docId);
  var z = 'd'+docId;
  name=document.getElementById(z).value;
  console.log(name);
  deleteEmpGenDocId =docId;
  $.ajax({
        type: "POST",
        url: "updateAllRecords.php",
        data:{
          id : id,
          deleteId : deleteEmpGenDocId,
          docName: name
        },
        success: function (data){
         
         $("#refresh1").load(" #refresh1");
        } 
    });
}




///////////////////////////////
function onclickFunction(){
var temp1=0;
var temp2=0;
var temp3=0;

var temp4=0;
var temp5=0;
var temp6=0;


var form_data = new FormData(); 
if(document.getElementById('getPhoto').value=='')
{
temp1=1;
}
else{
  form_data.append('profilePhoto', $('#getPhoto').prop('files')[0]);
}
if(document.getElementById('empGenFile').value=='')
{
   temp2=1;
}
else
{
  form_data.append('empGenFile', $('#empGenFile').prop('files')[0]);
}
if(document.getElementById('empContFile').value=='')
{
   temp3=1;
}
else{
form_data.append('empContFile', $('#empContFile').prop('files')[0]);
}

if(document.getElementById('empAcademicFile').value=='')
{
   temp4=1;
}
else{
  form_data.append('empAcademicFile', $('#empAcademicFile').prop('files')[0]);
}

if(document.getElementById('empSkillFile').value=='')
{
   temp5=1;
}
else{
  form_data.append('empSkillFile', $('#empSkillFile').prop('files')[0]); 
}
if(document.getElementById('empExpFile').value=='')
{
   temp6=1;
}
else{
  form_data.append('empExpFile', $('#empExpFile').prop('files')[0]); 
}



    form_data.append('id', id);
     //General Info insertion       
    
    form_data.append('temp1',temp1);
    form_data.append('temp2',temp2);
    form_data.append('employeeName', $('#employeeName').val());
    form_data.append('dob', $('#dob').val());
    form_data.append('sex', $('#sex').val());
    form_data.append('nationality', $('#nationality').val());
    form_data.append('location', $('#location').val());
  
    form_data.append('dateOfJoining', $('#dateOfJoining').val());
    form_data.append('probationDate', $('#probationDate').val());
    form_data.append('bloodGroup', $('#bloodGroup').val());
    form_data.append('emergencyContact', $('#emergencyContact').val());
    

    //Contact Details insertion
    form_data.append('temp3',temp3);
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
   


    //Academic Details insertion
    academicX =academicX + <?php echo $countAcademic?>;
    form_data.append('temp4',temp4);
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

    //Skill Details insertion
    form_data.append('temp5',temp5);
    skillX =skillX + <?php echo $countSkill?>;
    for (var skl = 0; skl <skillX; skl++) {
      var tx = document.getElementsByName("skillName[]")[skl].value;
      var ty = document.getElementsByName("yearsOfExp[]")[skl].value;

     if(tx!='')
       form_data.append('skillName[]', tx);
       if(ty!='')
       form_data.append('yearsOfExp[]', ty);
     
    }
    
   
     

   // Employee Experience insertion
    form_data.append('temp6',temp6);
    expX = expX + <?php echo $countExp?>;
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
   
    





    $.ajax({
        type: "POST",
        url: "updateAllRecords.php",
        data:form_data,
        processData: false,
        contentType: false,
        success: function (data){
       
      jQuery("#successmessage").modal('show');
     
        },
        
    error: function(XMLHttpRequest, textStatus, errorThrown) { 
      jQuery("#errormessage").modal('show');
    }  
    });
}
/*function saveAll(){
     //document.getElementById('employeeName').val();
     var empName=document.getElementById('employeeName').value;
    console.log(empName);
}
*/
$('body').on('change', '#getPhoto', function() {
  console.log("tst");
  $( "#replaceImg" ).replaceWith( "<img class='imageupload' id='profilePhoto' style='overflow:hidden height:inherit; width:inherit;'>" );
  var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
$(this).hide();
});
$('body').on('change', '#empGenFile', function() {
  console.log("xxx");
  var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) 
        {
         var x = $(this).val().replace(/.*(\/|\\)/, '');
         //console.log(x);
  $( "#empFileOpen" ).replaceWith("<li><div  class='imageuploadsect'><p style='text-align:center; overflow:hidden height:inherit; width:inherit;' class='m-0'>"+x+"</p></div></li>");
  
        }
        else{
          if (this.files && this.files[0]) {

            $( "#empFileOpen" ).replaceWith("<li><div  class='imageuploadsect'><img id='empGenDoc' style=' width:inherit;height:100%;'/></div></li>");
var reader = new FileReader();
reader.onload = empGenDocIsLoaded;
reader.readAsDataURL(this.files[0]);
$(this).hide();
}
} 
});
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
  console.log("qqqqq");
  var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) 
        {
         var x = $(this).val().replace(/.*(\/|\\)/, '');
         //console.log(x);
  $( "#empSkillOpen" ).replaceWith("<li><div  class='imageuploadsect'><p style='text-align:center; overflow:hidden height:inherit; width:inherit;' class='m-0'>"+x+"</p></div></li>");
  
        }
        else{
          if (this.files && this.files[0]) {

            $( "#empSkillOpen" ).replaceWith("<li><div  class='imageuploadsect'><img id='empSkillDoc' style=' width:inherit;height:100%;'/></div></li>");
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
         //console.log(x);
  $( "#empExpOpen" ).replaceWith("<li><div  class='imageuploadsect'><p style='text-align:center; overflow:hidden height:inherit; width:inherit;' class='m-0'>"+x+"</p></div></li>");
  
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
var varDiv = "<?php echo $_GET['div']  ?>";
if(varDiv==0)
{
  document.getElementById("genTag").click();
}
if(varDiv==1)
{
  document.getElementById("contTag").click();
}
if(varDiv==2)
{
  document.getElementById("academicTag").click();
}if(varDiv==3)
{
  document.getElementById("skillTag").click();
}
if(varDiv==4)
{
  document.getElementById("expTag").click();
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
<style>
#thumb{
  position : relative;
}
#close{
    display:block;
    float:right;
    width:30px;
    height:29px;
    background:url(https://web.archive.org/web/20110126035650/http://digitalsbykobke.com/images/close.png) no-repeat center center;
}
#close:hover{
  cursor:pointer;
}
</style>
<script>

///////////////start emp skill upload ///////////////



var fieldHTML = '<div class="row"><div class="col-sm-2 mb-2"><div class="form-group addcustomcss"><label class="labelform">Skill Name</label><input name="skillName[]" id="skillName" placeholder="Skill Name" class="form-control rounded-0" width="100%" /> </div></div><div class="col-sm-4 mb-2"><div class="form-group addcustomcss"><label class="labelform">Years of Experience</label><input name="yearsOfExp[]" id="yearsOfExp" placeholder="Years of Experience" class="form-control rounded-0" width="100%" /> </div></div><div class="col-sm-4 mb-2"><div class="col-sm-2 mb-2"><div class="form-group addcustomcss"><button id="removeNewSkill" type="button" class="btn rounded-circle" ><i class="icon-cancel-1"style="color:red"></i></button></div></div></div>';
    var skillX = 0; //Initial field counter is 1
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
var academicX = 0; //Initial field counter is 1
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


var expX = 0; //Initial field counter is 1
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