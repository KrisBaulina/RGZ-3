﻿<html>
	<head>
		<title>РГЗ 3</title>
	</head>
	<body>
		<?php	
		$daysOfWeek=require('day.php');
		if (isset($_GET['value'])) {
			$myDate=DateTime::createFromFormat('Y-m-d', $_GET['value']);
		}
		?>
		<form method="GET" action="index.php" >
			<input type="date" name="value" value="<?php 
			if (isset($myDate)){
				echo htmlspecialchars($myDate->format('Y-m-d'));
			}
			else{
				echo date('Y-m-d');
			}
			?>">
			<input type="submit" value="Узнать">
		</form>
		<?php
		
		if (isset($myDate)){
			$month=$myDate -> format('m');
			$year=$myDate -> format('Y');				
			$myDate->setDate((int)$year,(int)$month,1);
			$dayOfWeek=$myDate->format('D');
			echo $dayOfWeek;
			$i=1;
			while ($dayOfWeek !== 'Sat' || $dayOfWeek !== 'Sun'){
				$myDate->setDate((int)$year,(int)$month-$i,1);
				$i++;
				$dayOfWeek=$myDate->format('D');
			};
			if ($dayOfWeek=='Sat'){
					echo "Последний раз первое число выпало на выходной ". $myDate . ", это была " . $daysOfWeek[$dayOfWeek];
				}
				else {
					echo "Последний раз первое число выпало на выходной ". $myDate . ", это было " . $daysOfWeek[$dayOfWeek];
				}	
		}			
		?>	
	</body>
</html>
