<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NonReqLeave[]|\Cake\Collection\CollectionInterface $nonReqLeave
 */
use Cake\Routing\Router;
require 'dbconnect.php'

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
              <a style="cursor:pointer;">
              <li onClick="javascipt:window.location.href='<?php echo Router::url(['controller'=>'EmpGeneralInfo','action'=>'index']) ?>' "  style="cursor:pointer;background-colour:#1B679F;">
              View Records</li>
            </a>
              <a>
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
            <a id="parent4" class="parent " onclick="changeActive('parent4');" href="javascript:void(0);"><i class="icon-file"></i> <span>Employee Leave Request</span></a>
            <ul class="subchildlink">
            <a><li  onClick="javascipt:window.location.href='<?php echo Router::url(['controller'=>'LeaveSetting','action'=>'index']) ?>' "  style="cursor:pointer;">View Leave Setting</li></a>             
              <a><li  onClick="javascipt:window.location.href='<?php echo Router::url(['controller'=>'ReqLeave','action'=>'index']) ?>' "  style="cursor:pointer;">Add Requested Leave </li></a>
              <a  class="activeclass"><li  onClick="javascipt:window.location.href='<?php echo Router::url(['controller'=>'NonReqLeave','action'=>'index']) ?>' "  style="cursor:pointer;">Add Non Requested Leave </li></a>
            
            
            </ul>
          </li>
          <li>
            <a id="parent5" class="parent" onclick="changeActive('parent5');" href="javascript:void(0);"><i class="icon-department"></i> <span>Employee Designation</span></a>
          </li>
          <li>
            <a id="parent6" class="parent" onclick="changeActive('parent6');" href="javascript:void(0);"><i class="icon-briefcase"></i> <span>Employee Department</span></a>
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

    <!-- body container start here -->
    <div class="bodytransition">
      <div class="bodypart">
        <div class="row pageheadertop mb-3">
        <div class="col"><h2>View Non Requested Leave</h2></div>
        <div onClick="javascipt:window.location.href='<?php echo Router::url(['action'=>'add']) ?>' " class="col-auto"><button type="button" class="btn orangebutton rounded-circle"><a><i class="icon-add-plus-button" style="color:white;"></i></a> </button></div>
      </div>
      <div>
        <table class="table employtable">
  <thead>
    <tr>
      <th scope="col">Employee Name </th>
      <th scope="col">No of Days</th>
      <th scope="col">Balance Leave</th>
      <th scope="col">Starting Date</th>
      <th scope="col">Ending Date</th>
      <th scope="col">Inform State</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  <?php foreach ($nonReqLeave as $nonReqLeave): ?>
  <?php 
  $date = date("Y");
  if($nonReqLeave->leave_year!=$date){
    continue;
  }?>
    <tr>
    <?php  $test=0?>
        <td><?= h($nonReqLeave->emp_name) ?></td>
        <td><?= $this->Number->format($nonReqLeave->no_of_day) ?></td>
        <td><?php $dd_res=mysqli_query($conn,"Select * from leave_setting");
        $x=0;
        $y=0;
                while($r=mysqli_fetch_assoc($dd_res))
                { 
                    if($r['financial_year']==$nonReqLeave->leave_year){
                      $x=$r['no_of_holiday'];
                    }
                }
                $emp=mysqli_query($conn,"Select * from non_req_leave where empId=$nonReqLeave->empId && leave_year=$nonReqLeave->leave_year");
                {
                  while($r1=mysqli_fetch_assoc($emp)){
                    if($nonReqLeave->starting_date->format("Y-m-d") >= $r1['starting_date']){
                      $y=$y+$r1['no_of_day'];
                      // echo $y;
                      // echo $x-$y;
                    }
                   
                    else{
                      // echo "abc";
                    }
                  }
                }
                $x1 = $x-$y;
                $y1=0;
                $emp1=mysqli_query($conn,"Select * from req_leave where empId=$nonReqLeave->empId && leave_year=$nonReqLeave->leave_year");
                
                  while($r2=mysqli_fetch_assoc($emp1)){
                    // echo "123";
                    if($nonReqLeave->starting_date->format("Y-m-d") > $r2['ending_date']){
                      $y1=$y1+$r2['no_of_day_requested'];
                    }
                    
                    else
                     
                      echo "\n";
                  }
                
                echo $x1-$y1;
                $emp2=mysqli_query($conn,"Update non_req_leave set balance_leave=$x1-$y1 where non_req_id=$nonReqLeave->non_req_id");
                
                ?></td>
        <td><?= $nonReqLeave->starting_date->i18nFormat('dd/MM/Y'); ?></td>
        <td><?= $nonReqLeave->ending_date->i18nFormat('dd/MM/Y'); ?></td>
        <td><?= h($nonReqLeave->inform_status) ?></td>
        <td class="actions">
        <?php 
        if($nonReqLeave->documentPath==NULL){
          echo '<a href="';
          echo Router::url( ["action" => "download", $nonReqLeave->non_req_id]);
          echo '" ><i class="icon-download-1" style="color:#C0C0C0"></i></a>';
          }
          else{           
          echo "<a href='$nonReqLeave->documentPath' download><i class='icon-download-1' style='color:#039E14'></i></a>";
          }
           ?>

        <!-- echo "<a href='$nonReqLeave->documentPath' download><i class='icon-download-1' style='color:#039E14'></i></a>"
         ?> -->
        <a href="<?php echo Router::url( ['action' => 'view', $nonReqLeave->non_req_id])?>" >&nbsp; <i class="icon-file" style="color:blue;">&nbsp;</i></a> 

            <a href="<?php echo Router::url( ['action' => 'edit', $nonReqLeave->non_req_id])?>" ><i class="icon-pencil" style="color:black"></i>&nbsp;</a>
            <!-- <a href="<?php echo Router::url( ['action' => 'delete', $nonReqLeave->non_req_id])?>" ><i onlick="myFunction3()" class="icon-trash-1" style="color:red"></i></a>         -->
            <?= $this->Form->postLink('<i class="icon-trash-1" style="color:red"></i> ',
            ['action' => 'delete', $nonReqLeave->non_req_id], 
            [
                'escape' => false,
                'confirm' => __('Are you sure?\nYou want to delete the leave request of "{0}" for the date {1} to {2}?',$nonReqLeave->emp_name,$nonReqLeave->starting_date,$nonReqLeave->ending_date)
            ]
        ) ?>
        </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

      </div>
      <div class="row mb-5">
        <div class="col-auto">
          <div class="pageloadleft"><label>Show</label><select><option>Page 1</option></select><label>Entries</label></div>
        </div>
        <div class="col-auto ml-auto">
          <nav aria-label="Page navigation example">
  <ul class="pagination paginationcss">
    <li class="page-item">
      <!-- <a class="page-link" href="#" aria-label="Previous">
        <
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        >
      </a> -->
       <?php   echo $this->Paginator->prev('< ' . __('Prev'), array('tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'page-item'), null, array('class' => 'page-item'));
    echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";
    echo $this->Paginator->numbers(array('separator' => '','tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'page-item')); echo "&nbsp;"; echo "&nbsp;";echo "&nbsp;";
    echo $this->Paginator->next(__('Next').' >', array('tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'page-item'), null, array('class' => 'page-item'));
    
    ?>
    </li>
    
  </ul>
</nav>
        </div>
      </div>

      </div>
    </div>
    <!-- body container end here -->
    <footer><p>© 2019 All Right Reserved</p></footer>
    </section>
    <!-- right part section end here -->

    <!-- header start here -->
    <!-- <nav class="navbar navbar-expand-lg bg-white py-2">
    <div class="container">
    <a class="navbar-brand mr-auto mr-sm-0" href="index.html"><img src="images/logo-inside.png" alt="Navsoft Training" title="Navsoft Training"></a>
    <button class="navbar-toggler p-0 border-0 navbutton" type="button" data-toggle="offcanvas">
    <i class="icon-menu"></i>
    </button>

    <div class="navbar-collapse offcanvas-collapse mobilemenu align-items-end">
        <div class="usernameboxdiv ml-auto">
          <span class="userpicbox mr-2"><img src="images/User.png" alt="Navsoft Training" title="Navsoft Training"></span>
          <span class="usernamed">Welcome Harry</span>
        </div>
    </div>
    </div>
    </nav> -->

    <!-- header ends here -->

    
    </section>


    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
 
  </body>
</html>
<script>
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
 $('#parent4').siblings().show();
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
    }
</script>

