<?php
ob_start();
$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();
if($action == 'login'){
	$login = $crud->login();
	if($login)
		echo $login;
}
if($action == 'logout'){
	$logout = $crud->logout();
	if($logout)
		echo $logout;
}
if($action == 'save_user'){
	$save = $crud->save_user();
	if($save)
		echo $save;
}
if($action == 'save_color'){
	$save = $crud->save_color();
	if($save)
		echo $save;
}
if($action == 'send_chat'){
	$save = $crud->send_chat();
	if($save)
		echo $save;
}


if($action == 'load_convo'){
	$get = $crud->load_convo();
	if($get)
		echo $get;
}
if($action == 'read_msg'){
	$save = $crud->read_msg();
	if($save)
		echo $save;
}
if($action == 'save_dept'){
	$save = $crud->save_dept();
	if($save)
		echo $save;
}

if($action == 'save_issue'){
	$save = $crud->save_issue();
	if($save)
		echo $save;
}

if($action == 'update_user'){
	$save = $crud->update_user();
	if($save)
		echo $save;
}
if($action == 'upload_file'){
	$save = $crud->upload_file();
	if($save)
		echo $save;
	// var_dump($_FILES);
}
if($action == 'remove_file'){
	$delete = $crud->remove_file();
	if($delete)
		echo $delete;
}

if($action == 'save_upload'){
	$save = $crud->save_upload();
	if($save)
		echo $save;
	
	
}

if($action == 'save_location'){
	$save = $crud->save_location();
	if($save)
		echo $save;
	}

if($action == 'edit_location'){
	$save = $crud->edit_location();
	if($save)
		echo $save;
	}

if($action == 'save_manager'){
	$save = $crud->save_manager();
	if($save)
		echo $save;
	}

//confirm Save manager before saving
if($action == 'save_managerc'){
	$save = $crud->save_managerc();
	if($save)
		echo $save;
	}


//Revoking confirm  manager 
if($action == 'save_rmanagerc'){
	$save = $crud->save_rmanagerc();
	if($save)
		echo $save;
	}


//reset_password
if($action == 'reset_password'){
	$save = $crud->reset_password();
	if($save)
		echo $save;
	}

if($action == 'save_managers'){
	$save = $crud->save_managers();
	if($save)
		echo $save;
	}


if($action == 'save_rmanager'){
	$save = $crud->save_rmanager();
	if($save)
		echo $save;
	}



if($action == 'edit_dept'){
	$save = $crud->edit_dept();
	if($save)
		echo $save;
	}
if($action == 'save_assign'){
	$save = $crud->save_assign();
	if($save)
		echo $save;
	
	}


if($action == 'save_reassign'){
	$save = $crud->save_reassign();
	if($save)
		
		echo $save;
	
	}

if($action == 'save_attend'){
	$save = $crud->save_attend();
	if($save)
		echo $save;
	
}

if($action == 'save_close'){
	$save = $crud->save_close();
	if($save)
		echo $save;	
}
if($action == 'delete_file'){
	$delete = $crud->delete_file();
	if($delete)
		echo $delete;
}
if($action == 'delete_user'){
	$save = $crud->delete_user();
	if($save)
		echo $save;
}

if($action == 'delete_dept'){
	$save = $crud->delete_dept();
	if($save)
		echo $save;
}

if($action == 'delete_location'){
	$save = $crud->delete_location();
	if($save)
		echo $save;
}

if($action == 'delete_issue'){
	$save = $crud->delete_issue();
	if($save)
		echo $save;
}

if($action == 'save_search'){
	$save = $crud->save_search();
	if($save)
		echo $save;
}

if($action == 'save_reports'){
	$save = $crud->save_reports();
	if($save)
		echo $save;
}

if($action == 'save_reportscat'){
	$save = $crud->save_reportscat();
	if($save)
		echo $save;
}

if($action == 'save_searcho'){
	$save = $crud->save_searcho();
	if($save)
		echo $save;
}
if($action == 'save_searchc'){
	$save = $crud->save_searchc();
	if($save)
		echo $save;
}

ob_end_flush();
?>
