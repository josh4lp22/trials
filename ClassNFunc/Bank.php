<HTML>
<HEAD>
	<TITLE>Balance</TITLE>
</HEAD>
<BODY>
	<?php

		class BankAccount
		{
			protected $userName="";
			protected $credit= array();
			protected $debit= array();

			function __construct($userName,$credit,$debit)
			{
				$this->userName=$userName;
				$this->credit = explode('|',$credit );
				$this->debit = explode('|',$debit );
			}
			
			function  displayMyBalance()
			{
				echo "User Name= " . $this->userName . "<BR>";
				//echo "Credit: " . array_sum($this->credit);
				//echo "Debit: " . array_sum($this->debit);
				echo "Balance= " . (array_sum($this->credit)-array_sum($this->debit));
			}
		}
		
		
		$obj=new BankAccount($_POST['txtName'],$_POST['txtCredit'],$_POST['txtDebit']);
		$obj->displayMyBalance();
				
	?>
</BODY>
<HTML>
