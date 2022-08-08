<aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><a href="#"><img src="../../img/bglogo.png" class="" width="90"></a></p>
          <h5 class="centered">Head Teacher Account</h5>
          <li class="mt">
            <a class="active" href="index.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
           <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-users"></i>
              <span>Record Mangemnt</span>
              </a>
            <ul class="sub">
                <li><a href="addstaffmember.php">Add Staff</a></li>
                <li><a href="registerpupil.php">Register Pupil</a></li>
              
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-building"></i>
              <span>Data Mangemnt</span>
              </a>
            <ul class="sub">
               
                <li><a href="teacherprofile.php?id=<?php echo $public_id; ?>&&school_id=<?php echo $school_id; ?>">View Profile</a></li>
               <li><a href="uploaddocuments.php">Upload Document</a></li>
              
            
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-file-pdf-o"></i>
              <span>Reports</span>
              </a>
            <ul class="sub">
                <li><a href="listofpupilsreport.php">List Of Pupils Registered</a></li>
                <li><a href="listoteachersreport.php">List Of Teacher </a></li>
             
            </ul>
          </li>
          
          
          
          
          
          
          
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
