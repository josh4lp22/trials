<?php
class Session extends Zend_Controller_Plugin_Abstract
{
	//public $sess;
	public function preDispatch()
	{	
		/* $controller = strtolower ( $this->_request->getControllerName () );
		$action = strtolower ( $this->_request->getActionName () );
		$route = $controller . '/' . $action; 
		echo $route; */
		If (!Zend_Session::sessionExists())
		{
			//echo $this->_request->getControllerName();
			if($this->_request->getControllerName()!="login")
				header ( 'Location: login/login' );
					
		}
		else
		{
			$sess = new Zend_Session_Namespace ( 'admin_emp' );
		}
	}
}