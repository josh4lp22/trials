<HTML>
<HEAD>
	<TITLE>Currency Conversion</TITLE>
</HEAD>
<BODY>
	<FORM action="" method="post">
		<?php 
		global $selected_val;
//		$selected_val = "";
		//print_R($_POST['currency']);
		if(isset($_POST['conv']))
				{
					 ConvCurrency();
				}

		function ConvCurrency()
			{
				global $selected_val;
				$selected_val =  $_POST['currency'] * $_POST['rupee'];
				
				
			}
		?>
		Enter amount in Rupees:<INPUT type="text" name="rupee">
		Amount:<INPUT type="text" name="amount" readonly="readonly" value="<?php echo $selected_val; ?>">
		<br>
		Choose Currency: 
		<select name="currency">
		<?php 
			$curr = array("Dollars" => 0.02,"Euro" => 0.01,"Australian Dollar" => 0.02);
			foreach($curr as $key => $value) 
			{ 
				echo "<option value=" . $value . ">" . $key  . "</option>";
			}
			?>
		</select><br>
		<INPUT type="submit" value="Convert" name="conv">
		<?php
			 
		?>
	</FORM>
</BODY>
</HTML>