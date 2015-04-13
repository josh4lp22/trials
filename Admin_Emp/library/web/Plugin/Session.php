<?php
class Web_Plugin_Session extends Zend_Controller_Plugin_Abstract
{
	public $sess;
	public function preDispatch()
	{	
		$controller = strtolower ( $request->getControllerName () );
		$action = strtolower ( $request->getActionName () );
		$route = $controller . '/' . $action;
		
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