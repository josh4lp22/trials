<?php
	include "modal_getEmpData.php";
//echo "<pre>";print_R($_POST);
//$_POST["selAction"] = "View";

//if(){

	$modEmpDt =new modal_getEmployee();
	$data = $modEmpDt->getData();

	include_once "ViewChooseEmp.php";
//}

if(isset($_POST["selAction"])){
	if($_POST["selAction"] == "View"){
		include "modal_getEmpDet.php";
		$empObj = new modal_getEmpDet($_POST['selEmpID']);
		$data = $empObj->viewEmployee();
		include "ViewEmpDet.php";
	}

	if($_POST["selAction"] == "Add"){
		include "modal_getViewFields.php";
		$getDetObj = new getFieldData();
		include "ViewEnterData.php";
	
	}
	
	if($_POST["selAction"] == "Edit"){
		include "modal_getViewFields.php";
		$getDetObj = new getFieldData();
		$getDetObj->setFields($_POST["selEmpID"]);
		
		include "ViewEnterData.php";
		
	}

	if($_POST["selAction"] == "Delete"){
		
		include "modal_deleteEmp.php";
		$delEmpObj = new EmpDelete($_POST['selEmpID']);
		$delEmpObj->deleteEmployee();
	}

}	
//echo $_POST["selEmpID"];
if(isset($_POST["submit"])){ 

	if($_POST["submit"]=="Update"){ 

		if($_POST["action"]=="Add")	{ 

			include "modal_addEmp.php";
			
			$empAddObj = new EmpAdd($_POST['txtFName'],$_POST['txtLName'],$_POST['txtEmail'],$_POST['txtDob'],$_POST['txtCity']);
			$empAddObj->addEmployee();
		}
		elseif($_POST["action"]=="Edit"){
				include "modal_updateEmp.php";
				$empEditObj = new EmpUpdate($_POST['txtID'],$_POST['txtFName'],$_POST['txtLName'],$_POST['txtEmail'],$_POST['txtDob'],$_POST['txtCity']);
				$empEditObj->UpdateEmployee();
			
		}
	}
}
?>