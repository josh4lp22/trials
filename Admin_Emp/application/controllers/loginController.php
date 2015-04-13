<?php
//include '../models/loginModal.php';

class loginController extends Zend_Controller_Action
{ 

	
	public function loginAction()
	{
		//Code for generating entities
		/* $this->dbObj = Zend_registry::get('db');
		$em = Zend_Registry::get("em");
		
		$connectionParams = array('dbname'=>'zendtest', 'user'=>'root', 'password'=>'', 'host'=>'localhost', 'driver'=>'pdo_mysql');
		$config = new \Doctrine\ORM\Configuration();
		$config->setMetadataDriverImpl($config->newDefaultAnnotationDriver('E:\orchard'));
		$config->setMetadataCacheImpl(new \Doctrine\Common\Cache\ArrayCache);
		$config->setProxyDir(__DIR__ . '/Proxies');
		$config->setProxyNamespace('Proxies');
		$config->setAutoGenerateProxyClasses(true);
		$em = \Doctrine\ORM\
		EntityManager::create($connectionParams, $config);
		
		// custom datatypes (not mapped for reverse engineering)
		$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('set', 'string');
		$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
		$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('longblob', 'string');
		$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('blob', 'string');
		$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('varbinary', 'string');
		$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('tinyint', 'integer');
		
		// fetch metadata
		$driver = new \Doctrine\ORM\Mapping\Driver\
		DatabaseDriver($em->getConnection()->getSchemaManager());
		$em->getConfiguration()->setMetadataDriverImpl($driver);
		$cmf = new \Doctrine\ORM\Tools\
		DisconnectedClassMetadataFactory($em);
		$cmf->setEntityManager($em);
		$classes = $driver->getAllClassNames();
		$metadata = $cmf->getAllMetadata();
		$generator = new \Doctrine\ORM\Tools\
		EntityGenerator();
		$generator->setUpdateEntityIfExists(true);
		$generator->setGenerateStubMethods(true);
		$generator->setGenerateAnnotations(true);
		$generator->generate($metadata, 'C:\Documents and Settings\joshua.varghese\Desktop\Entities');
		exit; */
		
		
		//Code for generating models
		/* $conn = Doctrine_Manager::connection('mysql://root:@localhost/zendtest', 'doctrine');
		Doctrine_Core::generateModelsFromDb('D:\models', array('doctrine'));
		echo 'model generated';
		exit; */
		

		$params = $this->_getAllParams();
		if(isset($params['Login']))
		{
			/* $loginObj=new Model_loginModel($_POST['txtUsrname'], $_POST['txtPassword']);
			$rows=$loginObj->userLogin();  */
			//print_r($data);
			$em = Zend_Registry::get('em');
			$qb = $em->createQueryBuilder();
			$qb->select('emp.usrname,emp.isadmin')
				->from('Entities\\Empdetails', 'emp')
				->andwhere('emp.usrname=?1')
				->andwhere('emp.password=?2')
				->setParameter(1, $_POST['txtUsrname'])
				->setParameter(2, $_POST['txtPassword']);
			$query = $qb->getQuery();
			$rows = $query->getResult();
			

			//echo"<pre>";print_r($rows);exit;
			if(empty($rows))
				echo "Please enter correct details!!";
			else
			{
				//Zend_Session::start();
				$sess = new Zend_Session_Namespace('admin_emp');
				$sess->username=$rows[0]['usrname'];
				$sess->isAdmin=$rows[0]['isadmin'];
				
				if($sess->isAdmin==1)
					$this->_helper->redirector('index', 'admin');
				elseif($sess->isAdmin==0)
					$this->_helper->redirector('index', 'employee');
			}
			
		}
	}
	
	public function logoutAction()
	{
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNeverRender(true);
		//echo "logged out";
		Zend_Session::destroy(true);
		$this->_helper->redirector('login', 'login');
	}
	
	
}