<?php
use Cake\Routing\Router;
use Cake\ORM\TableRegistry;
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmpGeneralInfo[]|\Cake\Collection\CollectionInterface $empGeneralInfo
 */
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
            <a id="parent6" onclick="changeActive('parent6')" class="activeclass parent" href="<?php echo Router::url(['controller'=>'Departmenttable','action'=>'index']) ?>"><i class="icon-home"></i> <span>Employe Department</span></a>
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

    <!-- body container start here -->
    <div class="bodytransition">
    <div class="bodypart">
        <div class="row pageheadertop mb-3">
        <div class="col"><h2>View Department</h2></div>

       
        
        <input type="file" name="file" id="" style="display:none;">
        <!-- <div class="col-auto"><button  onClick="javascipt:window.location.href='<?php echo Router::url(['controller'=>'AllRecordsSave','action'=>'index']) ?>' "   type="button" class="btn orangebutton rounded-circle"><i   class="icon-add-plus-button"></i></button></div> -->
      <div class="col-auto"> <button onClick="javascipt:window.location.href='<?php echo Router::url(['controller'=>'Departmenttable','action'=>'add']) ?>' "  type="button" class="btn outlineblue mr-2">Add Dpartment</button></div>
      </div>
      <div>
        <table class="table employtable" id="changeActiveStatus">
  <thead>
    <tr>
    <th scope="col">Id</th>
      <th scope="col">Department</th>
      <th scope="col">Designation Id</th>
      <th scope="col"> Status</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($departmenttable as $departmenttable): ?>
            <tr>
            <td><?= h($departmenttable->id) ?></td>
            <td><?= h($departmenttable->department) ?></td>
            <td><?= h($departmenttable->designationId) ?></td>
            <td><?= h($departmenttable->departmentStatus) ?></td>
            <td class="actions">
               <?php if(strtolower($departmenttable->departmentStatus) == "active"){
                  echo " <a id='changeDiv1'  onClick='onclickFunction($departmenttable->id,7);' style='color:red;cursor:pointer;' ><i class='icon-cancel-1'></i>  </a>";
                  echo "&nbsp;";
                }
                else{
                  echo " <a id='changeDiv2' onClick='onclickFunction($departmenttable->id,8);' style='color:#00FF00;cursor:pointer;'><i class='icon-check-sign'></i>  </a>";
                  echo "&nbsp;";

                }?>
            
                    <a style='color:black;' href="<?php echo Router::url(['controller'=>'Departmenttable','action'=>'edit',$departmenttable->id]); ?>" ><i class='icon-pencil'></i>  </a>
               <?php echo "&nbsp;";?>
                    <?php echo " <a data-toggle='modal' data-target='#confirmModal'  onClick='deleteS($departmenttable->id);' href='javascript:void(0)'><i class='icon-trash-1'></i>  </a>";
                ?></td>   
                    
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
   
    <?php   echo $this->Paginator->prev('< ' . __('Prev'), array('tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'page-item'), null, array('class' => 'page-item'));
    echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";
    echo $this->Paginator->numbers(array('separator' => '','tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'page-item')); echo "&nbsp;"; echo "&nbsp;";echo "&nbsp;";
    echo $this->Paginator->next(__('Next').' >', array('tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'page-item'), null, array('class' => 'page-item'));
    
    ?>
  </ul>
</nav>
        </div>
      </div>

      </div>
    </div>

    <!-- SUCCSS-->
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
        
        <p class="mb-3">Successfully inserted</p>
        
      </div>
     
      <div class="modal-footer border-top-0 justify-content-center mb-3">
        <button type="button" onclick="jQuery('#successmessage').modal('hide');" class="btn bluebutton">Continue</button>
      </div>
    </div>
  </div>
</div>
<!-- FAIL -->
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
        
        <p class="mb-3">Something went wrong!!!</p>
        
      </div>
     
      <div class="modal-footer border-top-0 justify-content-center mb-3">
        <button type="button" onclick="jQuery('#errormessage').modal('hide');" class="btn bluebutton">Continue</button>
      </div>
    </div>
  </div>
</div>

 

<!-- Confirm -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModal" aria-hidden="true">
  <input type="hidden" id="xyz" name="xyz" value="">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0 pb-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="icon-cancel-1"></i>
        </button>
      </div>
      <div class="modal-body text-center messagestatuspop">
        <div class="iconstatus redcolr mb-3"><i class="icon-error"></i></div>
        <h4 class="mb-3">Are you sure?</h4>
    
      </div>
     
      <div class="modal-footer border-top-0 justify-content-center mb-3">
        <?php echo "<button type='button' data-dismiss='modal' aria-label='Close' onClick='onclickFunction(9,9);' class='btn bluebutton'>Yes</button>" ?>
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
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header modalheadercust">
        <h3 class="modal-title"><i class="icon-file"></i> Add excel file</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="icon-cancel-1"></i>
        </button>
      </div>
      <div class="modal-body modalbodycustom">
        <h4 class="mb-3">Select file</h4>
        <div class="row">
        <ul class="imageuploadlist p-0 m-0">
     &nbsp;
     <li id="replaceFile"><div onclick="document.getElementById('excelSheet').click()" class="imageuploadsect imagoutlinebor"><i class="icon-add-plus-button"></i></a></div></li>
     
   </ul>
         
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn redbutton" data-dismiss="modal">Cancel</button>
        <button onclick="uploadExcel();"  type="button" class="btn bluebutton">Save</button>
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


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

  </body>
  <script>

var IdDelete = '';
function deleteS(id){
  IdDelete = id;    
//   console.log(IdDelete);     
}     



  

   function onclickFunction(aId,changeStatus){
     if(changeStatus==9)
     {
       aId=IdDelete;
       
     }
    $.ajax({
        type: "POST",
        url: "changeStatus.php",
        data: {
            aId:aId,
            changeId:changeStatus

        },
        success: function (data){
            //  console.log(data);
        $("#changeActiveStatus").load(" #changeActiveStatus");
        }
    });

    
    return false;
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
     
</script>
</html>
<script> 
$(document).ready(function(){
 // $(".subchildlink").hide();
 $('.parent').siblings().toggle();

});
</script>

<script type="text/javascript">
      $('.uploadclss').on('shown.bs.modal', function () {
      $('#errormessage').trigger('focus')
      });
      $('.successm').on('shown.bs.modal', function () {
      $('#successmessage').trigger('focus')
      });

    </script>
    <script>
    

$('body').on('change', '#excelSheet', function() {
  var fileExtension = ['xls', 'xlsx'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) 
        {
          
       $('#exampleModal2').modal("hide");
       $('#errormessage').modal("show");
      
        }
        else{
          var x = $(this).val().replace(/.*(\/|\\)/, '');
  $( "#replaceFile" ).replaceWith("<li><div  class='imageuploadsect'><p style='text-align:center; overflow:hidden height:inherit; width:inherit;' class='m-0'>"+x+"</p></div></li>");
  
} 
});

      function changeActive(id){
      let x= document.getElementById(id).id;
      let idName = '#'+x;
      $('.parent').siblings().hide();
      $(idName).siblings().toggle();
      $('.parent').removeClass('activeclass');
      $(idName).addClass('activeclass');
    }
    function uploadExcel(){
    var form_data = new FormData(); 
     
      form_data.append('excelSheet', $('#excelSheet').prop('files')[0]);
      $.ajax({
        type: "POST",
        url: "uploadExcel.php",
        data:form_data,
        processData: false,
        contentType: false,
        success: function (data){
          //alert(data);
          $('#exampleModal2').modal("hide");
       
          $('#successmessage').modal("show");
          setTimeout(function(){
           location.reload();
           }, 3000);
        },
        error: function(data){
          $('#errormessage').modal("show");
        }
    });
    
    
} 
    </script>
