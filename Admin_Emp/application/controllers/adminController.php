<?php

class adminController extends Zend_Controller_Action
{
	
	public function init(){
		$this->dbObj = Zend_registry::get('db');
	}
	
	public function indexAction()
	{		
		If (Zend_Session::sessionExists())
			$sess = new Zend_Session_Namespace ( 'admin_emp' );
		//echo $sess->username;
		
		$params = $this->_getAllParams();
		/* $data=array();
		$evntObj = new Model_eventModel();
		$data=$evntObj->viewEvents();
		/* echo '<pre>';
		print_r($data);exit;
		$this->view->deta = $data; */
		$em = Zend_Registry::get('em');
		$qb = $em->createQueryBuilder();
		
		$qb->select('allev')->from('Entities\\Events', 'allev');
		$query = $qb->getQuery();
		$rows = $query->getResult();
		$this->view->deta = $rows;
		
		
		$page = $this->_getParam('page');

		/* $data2=array();
		$projObj=new Model_projassignModel();
		$data2=$projObj->viewProject(); */
		//$this->view->prjData = $data2; 
		$qb1 = $em->createQueryBuilder();
		$qb1->select('pro')->from('Entities\\Projects', 'pro');
		$query = $qb1->getQuery();
		$rows = $query->getResult();
		//$this->view->deta = $rows;
		$paginator = Zend_Paginator::factory($rows);
		//print_r($paginator);exit;
		$paginator->setCurrentPageNumber($page);
		$paginator->setItemCountPerPage(5);
		$this->view->pagePrj = $paginator;
		
		
		/* $data3=array();
		$leavObj=new Model_leavModel();
		$data3=$leavObj->viewLeav();
		$this->view->lvData=$data3; */

		$qb2 = $em->createQueryBuilder();
		$qb2->select('lev.leavid,lev.fromdate,lev.todate,emp.empname')
		->from('Entities\\Leaveapp', 'lev')
		->innerJoin('lev.userapplied','emp')
		->where('lev.status=1');
		
		$query = $qb2->getQuery();
		//echo $query->getSql();exit;
		$rows = $query->getResult();
		$this->view->lvData = $rows;
		//echo "<pre>loko";print_r($rows);exit;

		
		
		
		//$id = $this->_request->getParam ( 'id' );
		
		
		
		/* $data4=array();
		$skillObj=new Model_skillsModel();
		$data4=$skillObj->viewEmp(); */
		$qb3 = $em->createQueryBuilder();
		$qb3->select('emp.usrname,emp.empname')
			->from('Entities\\Empdetails', 'emp');
		$query = $qb3->getQuery();
		$rows = $query->getResult();
		$this->view->skilData=$rows;
		
		$data5=array();
		$mngPicObj=new Model_managepicModel();
		$data5=$mngPicObj->loadProfPic($sess->username);
		$this->view->picData=$data5;
		
		$data6=array();
		$data6=$mngPicObj->loadUserPic($sess->username);
		$this->view->UpicData=$data6;
		
		
		if(isset($params['Send']))
		{
			$mail = new Zend_Mail();
			$mail->setBodyText($params['txtContent']);
			$mail->setFrom('dan4lp21@gmail.com', 'Danny');
			$mail->addTo('joshua.varghese@synergytechservices.com', 'Joshua Varghese');
			$mail->addTo('josh4lp22@gmail.com','Joey');
			$mail->addTo('astha.sharma@synergytechservices.com','Emo');
			$mail->setSubject($params['txtSubj']);
			$mail->send();
		}
		
	}
	
	public function createeventAction()
	{
		$params = $this->_getAllParams();
		 if(isset($params['Create']))
		{
			//print_r($params);
			//$evntObj = new Model_eventModel();
			//$evntObj->setEvents($_POST['txtEvName'], $_POST['txtDate']);
			$em = Zend_Registry::get('em');
			
			$evnt= new Entities\Events();
			$evnt->setEventname($_POST['txtEvName']);
			$evnt->setEventdate($_POST['txtDate']);
			$em->persist($evnt);
			$em->flush();
						
			
			$this->_helper->redirector('index', 'admin');
		} 
		
	}
	
	public function editmembAction()
	{
		$em = Zend_Registry::get('em');
		//print_r($this->_getAllParams()); 
		$params = $this->_getAllParams();
		$data=array();
		$data2=array();
		$prjObj=new Model_projassignModel();
		
		$data=$prjObj->getExistEmp($this->_getParam('prjid', 0));
		$this->view->prjeemp=$data;
		
		$data2=$prjObj->getNonExistEmp($this->_getParam('prjid', 0));
		$this->view->prjnemp=$data2;

		//$params = $this->_getAllParams();
		if(isset($params['Remove']))
		{ 
			/* $remObj=new Model_addremempModel();
			$remObj->removeEmp($params['selRemEmp'], $params['prid']); */
						
			/* $qb = $em->createQueryBuilder();
			$qb->delete('pro')
				->from('Entities\\Projassign', 'pro')
				->andwhere('pro.projid=?1')
				->andwhere('pro.usrname=?2')
				->setParameter(1, $params['prid'])
				->setParameter(2, $params['selRemEmp']);
			$query = $qb->getQuery();
			$rows=$query->execute(); */
			$q = $em->createQuery("delete from Entities\Projassign e 
									where e.projid= ?1 and e.usrname= ?2")
					->setParameter(1, $params['prid'])
					->setParameter(2, $params['selRemEmp']);
			$numDeleted = $q->execute();
			//$em->remove($query);
	
			//$em->flush();
			
			$this->_helper->redirector('index', 'admin');
		}
		elseif(isset($params['Add']))
		{

			//echo "hello:" .$params['prid2'];
			$addObj=new Model_addremempModel();
			$addObj->addEmp($params['selAddEmp'], $params['prid2']);
			$this->_helper->redirector('index', 'admin');
		}


	}
	
	public function assigntaskAction()
	{	$params = $this->_getAllParams();
		 if(isset($params['Assign']))
		{	
			$addtsk=new Model_taskModel();
			$addtsk->addTask($params['txtDesc'],$params['txtEndDate'],$params['prid']);
			$this->_helper->redirector('index', 'admin');
		}
	}
	
	public function approveleavAction()
	{
		$sess = new Zend_Session_Namespace ( 'admin_emp' );
		$data=array();
		$leavObj=new Model_leavModel();
		$data=$leavObj->viewLeavApprPend();
		$this->view->levData = $data;
		
		$params = $this->_getAllParams();
		
		if(isset($params['Approve']))
		{
			$leavObj->manageLeav($params['selEmp'], "1",$sess->username);
			$this->_helper->redirector('index', 'admin');
			
		}
		elseif(isset($params['Disapprove']))
		{
			$leavObj->manageLeav($params['selEmp'], "0",$sess->username);
			$this->_helper->redirector('index', 'admin');
		}
		
	}
	
	public function editskillAction()
	{
		$em = Zend_Registry::get('em');
		
		$params = $this->_getAllParams();
		$data=array();
		$skillObj=new Model_skillsModel();
		$data=$skillObj->viewRating();
		$this->view->skData=$data;
		//echo $params['usrname'];
		$data2=array();
		$data2=$skillObj->viewSingleRating($params['emp']);
		$this->view->sksData=$data2;
		
		if(isset($params['Update']))
		{
			
			//echo "Hello:".$params['usrname'];
			//echo $params['empRate'];
			
			//$skillObj->updateSkills($params['usrname'], $params['empRate']);
			$skill = $em->find('Entities\\Empdetails', $params['usrname']);
			$skill->setSkillrating($params['empRate']);
			$em->persist($skill);
			$em->flush();
			
			$this->_helper->redirector('index', 'admin');
				
		}
	}
	
	public function managepicAction()
	{
		$params = $this->_getAllParams();
		$sess = new Zend_Session_Namespace ( 'admin_emp' );
		
		if(isset($params['Upload']))
		{
			$picObj=new Model_managepicModel();
			$picObj->uploadImg($sess->username);
			$this->_helper->redirector('index', 'admin');
		}
	}
	
	public function setpictureAction()
	{
		$params = $this->_getAllParams();
		//print_r($params);
		$sess = new Zend_Session_Namespace ( 'admin_emp' );
		
		if(isset($params['Set']))
		{
			$picObj=new Model_managepicModel();
			$picObj->setProfPic($sess->username, $params['picPath']);
			$this->_helper->redirector('index', 'admin');
		}
		
	}
	
	public function galleryAction()
	{
		
	}
}