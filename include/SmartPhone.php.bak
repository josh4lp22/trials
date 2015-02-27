<HTML>
<HEAD>
	<TITLE>Smart Phones</TITLE>
</HEAD>
<BODY>
	<?php
		
		include 'Phones.php';
		include 'Camera.php';

		class SmartPhones extends Phones 
		{
			protected $screenSize;
			protected $processor;
			protected $os;
			

			function __construct($display,$memory,$battery,$cost,$screenSize,$processor)
			{
				parent::__construct($display,$memory,$battery,$cost);
				$this->screenSize=$screenSize;
				$this->processor=$processor;
				$this->os="Android 2.6";
				
			}

			function  displayMyConfig()
			{
				parent::displayMyConfig();
				echo "Screen Size= " . $this->screenSize . "<BR>";
				echo "Processor= " . $this->processor . "<BR>";
				echo "OS= " . $this->os . "<BR>";
			}

			function upgradeMyOS()
			{
				echo "<BR><BR>Upgrading OS....<BR>";
				$this->os="Android 4.2";
				echo "<BR><BR>Upgrade Sucsessful. Phone Specs:<br><br>";
				include 'Seperator.php';
				$this->displayMyConfig();
			
			}

			function addCamera($cam)
			{
				echo "<BR>Camera=" . $cam->pixel;
				echo "<BR>Lens=". $cam->lens;
			    $this->cost = $this->cost+$cam->camCost;
			}
			
		}

		
		$sPhone = new SmartPhones("TFT","2GB","1000mA",14000,"4'5","1GHZ"); 
		$sPhone->displayMyConfig();
		$sPhone->displayMyCost();
		include 'Seperator.php';
		$sPhone->upgradeMyOS();
		
		$cam = new Camera("5MP","Carl Zeiss",4000);
		$sPhone->addCamera($cam);
		$sPhone->displayMyCost();
	?>
</BODY>
<HTML>
