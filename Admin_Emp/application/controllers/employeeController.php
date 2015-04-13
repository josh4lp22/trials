<?php
/* If (!Zend_Session::sessionExists())
header( 'Location: login/login' ) ;
else
	$sess = new Zend_Session_Namespace('userData'); */

class employeeController extends Zend_Controller_Action
{
	public function indexAction()
	{
		If (Zend_Session::sessionExists())
			$sess = new Zend_Session_Namespace ( 'admin_emp' );
		
		$data=array();
		$empObj = new Model_showempdetModel();
		$data=$empObj->viewUsrDetails($sess->username);
		$this->view->empData = $data;
		
		$data2=array();
		$data2=$empObj->viewUsrProjDetails($sess->username);
		$this->view->emppData = $data2;
		
		$data3=array();
		$evntObj = new Model_eventModel();
		$data3=$evntObj->viewEvents();
		$this->view->evntData = $data3;
		
		$data4=array();
		$tskObj=new Model_taskModel();
		$data4=$tskObj->viewTask($sess->username);
		$this->view->tskData=$data4;
		
		$data5=array();
		$mngPicObj=new Model_managepicModel();
		$data5=$mngPicObj->loadProfPic($sess->username);
		$this->view->picData=$data5;
	}
	
	public function applyleaveAction()
	{
		$sess = new Zend_Session_Namespace ( 'admin_emp' );
		$params = $this->_getAllParams();
		if(isset($params['Apply']))
		{
			//print_r($params);
			$leavObj = new Model_leavModel();
			$leavObj->applyLeave($_POST['txtDesc'], $_POST['txtFrom'],$_POST['txtTo'],$sess->username);
			$this->_helper->redirector('index', 'employee');
		}
	}
}