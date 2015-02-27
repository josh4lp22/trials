<?php
		class Camera
		{
			public $pixel;
			public $lens;
			public $camCost;

			function __construct($pixel,$lens,$camCost)
			{
				$this->pixel=$pixel;
				$this->lens=$lens;
				$this->camCost=$camCost;
			}
		}
?>