  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="dropdown">
   	<a href="javascript:void(0)" class="brand-link dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
        <?php if(empty($_SESSION['login_avatar'])): ?>
        <span class="brand-image img-circle elevation-3 d-flex justify-content-center align-items-center bg-primary text-white font-weight-500" style="width: 38px;height:50px"><?php echo strtoupper(substr($_SESSION['login_firstname'], 0,1).substr($_SESSION['login_surname'], 0,1)) ?></span>
        <?php else: ?>
          <span class="image">
            <img src="assets/uploads/<?php echo $_SESSION['login_avatar'] ?>" style="width: 38px;height:38px" class="img-circle elevation-2" alt="User Image">
          </span>
        <?php endif; ?>
        <span class="brand-text font-weight-light"><?php echo ucwords($_SESSION['login_firstname'].' '.$_SESSION['login_surname']) ?></span>

      </a>
      <div class="dropdown-menu" style="">
        <a class="dropdown-item manage_account" href="javascript:void(0)" data-id="<?php echo $_SESSION['login_staff_id'] ?>">Manage Account</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="ajax.php?action=logout">Logout</a>
      </div>
    </div>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item dropdown">
            <a href="./" class="nav-link nav-home">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            
          </li>    
        <?php if($_SESSION['login_type'] == 1): ?>
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_user">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_user" class="nav-link nav-new_user tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=user_list" class="nav-link nav-user_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_user">
              <i class="nav-icon fa fa-question"></i>
              <p>
                Public Issues
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                <a href="./index.php?page=new_issue" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="./index.php?page=issue_list" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>All Issues</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="./index.php?page=issue_listclosed" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Closed Issues</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=issue_listopen" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Open Issue</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="./index.php?page=issue_listass" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Issue Assigned</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="./index.php?page=issue_listunass" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Issue Unassigned</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="./index.php?page=daterange_issue" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Report by Date Range</p>
                </a>
              </li>
              
               <li class="nav-item">
                <a href="./index.php?page=reports_by_location" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Reports by Location</p>
                </a>
              </li>
              
               <li class="nav-item">
                <a href="./index.php?page=reports_by_issue_category" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Report by Issue Category</p>
                </a>
              </li>
             
            </ul>
          </li>  
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_user">
              <i class="nav-icon fa fa-question"></i>
              <p>
                My Issues
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_issue" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="./index.php?page=my_issue_list" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>All Issues</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="./index.php?page=my_issue_listc" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Closed Issues</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=my_issue_listo" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Open Issue</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="./index.php?page=my_issue_listass" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Issue Assigned</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="./index.php?page=my_issue_listunass" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Issue Unassigned</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=daterange_issue" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Search Issue by Date Range</p>
                </a>
              </li>
             
            </ul>
          </li>  
          <li class="nav-item">
            <a href="#" class="nav-link nav-is-tree nav-edit_document nav-view_document">
              <i class="nav-icon fa fa-folder-open"></i>
              <p>
                Departments
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_dept" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add Department</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=department_list" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>View Departments</p>
                </a>
              </li>
             </ul>
          </li> 
          
          <li class="nav-item">
            <a href="#" class="nav-link nav-is-tree nav-edit_document nav-view_document">
              <i class="nav-icon fa fa-folder-open"></i>
              <p>
                Locations
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_location" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add Location</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=location_list" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>View Locations</p>
                </a>
              </li>
             </ul>
          </li> 
          
           <li class="nav-item">
            <a href="#" class="nav-link nav-is-tree nav-edit_document nav-view_document">
              <i class="nav-icon fa fa-folder-open"></i>
              <p>
                Managers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=make_manager" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Make Manager</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=assign_manager" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Assign Manager</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=manager_list" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>View Managers</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="./index.php?page=revoke_managerc" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Revoke Manager</p>
                </a>
              </li>
             </ul>
          </li> 
          
          <li class="nav-item">
            <a href="#" class="nav-link nav-is-tree nav-edit_document nav-view_document">
              <i class="nav-icon fa fa-folder-open"></i>
              <p>
                Theme
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="./index.php?page=change_theme" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Change Theme</p>
                </a>
              </li>
              
             </ul>
          </li> 
          
          <?php elseif($_SESSION['login_type'] == 3 && $_SESSION['login_manager'] == 'Yes'): ?>
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_user">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="./index.php?page=user_list" class="nav-link nav-user_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link nav-is-tree nav-edit_document nav-view_document">
              <i class="nav-icon fa fa-folder-open"></i>
              <p>
                Issues
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
<!--
              <li class="nav-item">
                <a href="./index.php?page=new_issue" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
-->
                
<!--
                <li class="nav-item">
                <a href="./index.php?page=new_issue" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
-->
                <li class="nav-item">
                <a href="./index.php?page=issue_list" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>All Issues</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="./index.php?page=issue_listclosed" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Closed Issues</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=issue_listopen" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Open Issue</p>
                </a>
              </li>
<!--
                <li class="nav-item">
                <a href="./index.php?page=issue_listass" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Issue Assigned</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="./index.php?page=issue_listunass" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Issue Unassigned</p>
                </a>
              </li>
-->
               <li class="nav-item">
                <a href="./index.php?page=daterange_issue" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Report by Date Range</p>
                </a>
              </li>
              
               <li class="nav-item">
                <a href="./index.php?page=reports_by_location" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Reports by Location</p>
                </a>
              </li>
              
               <li class="nav-item">
                <a href="./index.php?page=reports_by_issue_category" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Report by Issue Category</p>
                </a>
              </li>
<!--             end of editing-->
<!--
                 <li class="nav-item">
                <a href="./index.php?page=issue_listmeall" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>All Issues</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="./index.php?page=issue_listmec" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Closed Issues</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=issue_listme" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Open Issue</p>
                </a>
-->
<!--
              </li>
                <li class="nav-item">
                <a href="./index.php?page=my_issue_listass" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Issue Assigned</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="./index.php?page=my_issue_listunass" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Issue Unassigned</p>
                </a>
              </li>
-->
<!--
              
               <li class="nav-item">
                <a href="./index.php?page=daterange_issue" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Issue by Date Range</p>
                </a>
              </li>
              
               <li class="nav-item">
                <a href="./index.php?page=daterange_issue_listo" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Issue by Date (Open)</p>
                </a>
              </li>
              
               <li class="nav-item">
                <a href="./index.php?page=daterange_issue_listc" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Issue by Date (Closed)</p>
                </a>
              </li>
-->
             
            </ul>
          </li>  
          
          <li class="nav-item">
            <a href="#" class="nav-link nav-is-tree nav-edit_document nav-view_document">
              <i class="nav-icon fa fa-folder-open"></i>
              <p>
                Departments
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=department_list" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>View Departments</p>
                </a>
              </li>
             </ul>
          </li> 
          
          <li class="nav-item">
            <a href="#" class="nav-link nav-is-tree nav-edit_document nav-view_document">
              <i class="nav-icon fa fa-location-arrow"></i>
              <p>
                Locations
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
              <li class="nav-item">
                <a href="./index.php?page=location_list" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>View Locations</p>
                </a>
              </li>
             </ul>
          </li> 
          <li class="nav-item">
            <a href="#" class="nav-link nav-is-tree nav-edit_document nav-view_document">
              <i class="nav-icon fa fa-folder-open"></i>
              <p>
                My Subjects
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=subject_list" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>View Subject</p>
                </a>
              </li>
             </ul>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=my_subject_listo" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>My Subject Open Issues</p>
                </a>
              </li>
             </ul>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=my_subject_listc" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>My Subject Closed Issues</p>
                </a>
              </li>
             </ul>
          </li> 
          <li class="nav-item">
            <a href="#" class="nav-link nav-is-tree nav-edit_document nav-view_document">
              <i class="nav-icon fa fa-tasks"></i>
              <p>
                ATTENTION!
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=issue_listme" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>My Open Issues</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="./index.php?page=issue_listmec" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>My Closed Issues</p>
                </a>
              </li>
              
             </ul>
          </li> 
          
          <?php elseif(($_SESSION['login_type'] == 3) && ($_SESSION['login_manager'] == 'No')): ?>
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_user">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="./index.php?page=user_list" class="nav-link nav-user_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link nav-is-tree nav-edit_document nav-view_document">
              <i class="nav-icon fa fa-folder-open"></i>
              <p>
                Issues
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
<!--
              <li class="nav-item">
                <a href="./index.php?page=new_issue" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
-->
                
<!--
                <li class="nav-item">
                <a href="./index.php?page=new_issue" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
-->
                <li class="nav-item">
                <a href="./index.php?page=issue_list" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>All Issues</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="./index.php?page=issue_listclosed" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Closed Issues</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=issue_listopen" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Open Issue</p>
                </a>
              </li>
<!--
                <li class="nav-item">
                <a href="./index.php?page=issue_listass" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Issue Assigned</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="./index.php?page=issue_listunass" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Issue Unassigned</p>
                </a>
              </li>
-->
               <li class="nav-item">
                <a href="./index.php?page=daterange_issue" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Report by Date Range</p>
                </a>
              </li>
              
               <li class="nav-item">
                <a href="./index.php?page=reports_by_location" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Reports by Location</p>
                </a>
              </li>
              
               <li class="nav-item">
                <a href="./index.php?page=reports_by_issue_category" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Report by Issue Category</p>
                </a>
              </li>
<!--             end of editing-->
<!--
                 <li class="nav-item">
                <a href="./index.php?page=issue_listmeall" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>All Issues</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="./index.php?page=issue_listmec" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Closed Issues</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=issue_listme" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Open Issue</p>
                </a>
-->
<!--
              </li>
                <li class="nav-item">
                <a href="./index.php?page=my_issue_listass" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Issue Assigned</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="./index.php?page=my_issue_listunass" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Issue Unassigned</p>
                </a>
              </li>
-->
<!--
              
               <li class="nav-item">
                <a href="./index.php?page=daterange_issue" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Issue by Date Range</p>
                </a>
              </li>
              
               <li class="nav-item">
                <a href="./index.php?page=daterange_issue_listo" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Issue by Date (Open)</p>
                </a>
              </li>
              
               <li class="nav-item">
                <a href="./index.php?page=daterange_issue_listc" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Issue by Date (Closed)</p>
                </a>
              </li>
-->
             
            </ul>
          </li>  
<!--
          <li class="nav-item">
            <a href="#" class="nav-link nav-is-tree nav-edit_document nav-view_document">
              <i class="nav-icon fa fa-folder-open"></i>
              <p>
                Issues
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_issue" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
                 <li class="nav-item">
                <a href="./index.php?page=my_issue_list" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>All Issues</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="./index.php?page=my_issue_listc" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Closed Issues</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=my_issue_listo" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Open Issue</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="./index.php?page=my_issue_listass" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Issue Assigned</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="./index.php?page=my_issue_listunass" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Issue Unassigned</p>
                </a>
              </li>
              
                <li class="nav-item">
                <a href="./index.php?page=daterange_issue" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Issue by Date Range</p>
                </a>
              </li>
              
               <li class="nav-item">
                <a href="./index.php?page=daterange_issue_listo" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Issue by Date (Open)</p>
                </a>
              </li>
              
               <li class="nav-item">
                <a href="./index.php?page=daterange_issue_listc" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Issue by Date (Closed)</p>
                </a>
              </li>
             
            </ul>
          </li>  
          
-->
          <li class="nav-item">
            <a href="#" class="nav-link nav-is-tree nav-edit_document nav-view_document">
              <i class="nav-icon fa fa-folder-open"></i>
              <p>
                Departments
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=department_list" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>View Departments</p>
                </a>
              </li>
             </ul>
          </li> 
          
          <li class="nav-item">
            <a href="#" class="nav-link nav-is-tree nav-edit_document nav-view_document">
              <i class="nav-icon fa fa-location-arrow"></i>
              <p>
                Locations
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
              <li class="nav-item">
                <a href="./index.php?page=location_list" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>View Locations</p>
                </a>
              </li>
             </ul>
          </li> 

          <li class="nav-item">
            <a href="#" class="nav-link nav-is-tree nav-edit_document nav-view_document">
              <i class="nav-icon fa fa-tasks"></i>
              <p>
                ATTENTION!
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=issue_listme" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>My Open Issues</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="./index.php?page=issue_listmec" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>My Closed Issues</p>
                </a>
              </li>
              
             </ul>
          </li> 
          
        <?php else: ?>
           <li class="nav-item">
            <a href="#" class="nav-link nav-edit_user">
              <i class="nav-icon fa fa-question"></i>
              <p>
               My Issues/Requests
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_issue" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="./index.php?page=issue_list" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>All Issues</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="./index.php?page=issue_listclosed" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Closed Issues</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=issue_listopen" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Open Issue</p>
                </a>
              </li>
<!--
                <li class="nav-item">
                <a href="./index.php?page=issue_listass" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Issue Assigned</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="./index.php?page=issue_listunass" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Issue Unassigned</p>
                </a>
              </li>
-->
               <li class="nav-item">
                <a href="./index.php?page=daterange_issue" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Report by Date Range</p>
                </a>
              </li>
              
<!--
               <li class="nav-item">
                <a href="./index.php?page=reports_by_location" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Reports by Location</p>
                </a>
              </li>
-->
              
               <li class="nav-item">
                <a href="./index.php?page=reports_by_issue_category" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Report by Issue Category</p>
                </a>
              </li>
<!--
              <li class="nav-item">
                <a href="./index.php?page=my_issue_list" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>All Issues</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="./index.php?page=my_issue_listc" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Closed Issues</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=my_issue_listo" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Open Issue</p>
                </a>
              </li>
-->
                <li class="nav-item">
                <a href="./index.php?page=my_issue_listass" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Issue Assigned</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="./index.php?page=my_issue_listunass" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Issue Unassigned</p>
                </a>
              </li>
<!--
             <li class="nav-item">
                <a href="./index.php?page=daterange_issue" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Issue by Date Range</p>
                </a>
              </li>
              
               <li class="nav-item">
                <a href="./index.php?page=daterange_issue_listo" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Issue by Date (Open)</p>
                </a>
              </li>
              
               <li class="nav-item">
                <a href="./index.php?page=daterange_issue_listc" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Issue by Date (Closed)</p>
                </a>
              </li>
-->
             
            </ul>
          </li>  
        <?php endif; ?>
        </ul>
      </nav>
    </div>
  </aside>
  <script>
  	$(document).ready(function(){
  		var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
  		if($('.nav-link.nav-'+page).length > 0){
  			$('.nav-link.nav-'+page).addClass('active')
          console.log($('.nav-link.nav-'+page).hasClass('tree-item'))
  			if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
          $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
  				$('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
  			}
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

  		}
      $('.manage_account').click(function(){
        uni_modal('Manage Account','manage_user.php?id='+$(this).attr('data-id'))
      })
  	})
  </script>