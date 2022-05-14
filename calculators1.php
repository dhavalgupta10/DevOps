<!DOCTYPE html>
<html>
<head>
	<title>Calculator Tools</title>
	<link rel="stylesheet" type="text/css" href="calculator.css">
	<link rel="stylesheet" type="text/css" href="home.css">
</head>
<body class="box">
<ul>
  <li><img src="images/logo1/logo.png"></li>
  <li><a  href="index.html">Home</a></li>
  <li><a class="active"href="calculators1.php">Calculator</a></li>
  <li><a href="#Calorie_counter">Calorie Counter</a></li>	
  <li><a>Diet Plans</a>
  <ul>
    <li><a href="WOMEN.HTML">Womens</a></li>    
    <li><a href="men.html">Mens</a></li>    
</ul>
</li>
  <li><a href="#Exercise">Workout</a></li>
  <li><a href="#Locate">Locate</a></li>
  <li><a href="#about">About Us</a></li>
  <li><a href="#sign_in">Hi! Sign in</a></li>
</ul>

<hr style="margin-top:20px;">

	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<div style="height: 550px;margin-top: 0px; position: relative;">
		<div class="discription">
			<span class="heading" style="border-bottom: 1px solid pink;"><font style="color:#fc6d6d ">What is BMI?</font></span>
			<p class="define">The body mass index (BMI) is a quick, easy way to see if your weight is within the normal or average range for your height.</p>
<p class="define">It’s important to note that BMI does have its drawbacks: It does not take into account a patient's body composition (fat content versus muscle content), age, ethnicity, activity level, or body type. BMI is often less useful for certain groups of people, such as athletes, the elderly, and African Americans. Also, remember that ranges for children are different, so consult with your child’s doctor.</p>
<p class="define">Find your body mass index (BMI) by using our calculator. Your BMI will help explain your weight in relation to your height. See below for more information or go ahead and calculate your BMI.</p>
<font style="font-size: 14px; color: #000; font-family:Verdana; font-weight: bold;" >BMI RANGES</font><br>
<img src="images/bmi-range.png" style="position: static;">
	<p class="define">In kilograms and metres, the formula is:&nbsp;&nbsp;&nbsp;<img src="images/formula2.png" align="center"></p>
		</div>
		<div class="calculator">
			
			<table>
				<tr><td colspan="3"  class="heading"><span style="border-bottom: 1px solid grey">&nbsp;&nbsp;BMI Calculator&nbsp;&nbsp;</span></td></tr>
				<tr>
			<td><label class="text">Gender</label></td>
			<td colspan="2"><div class="radio-toolbar">
			<input type="radio" id="radiomale" name="gender" value="male" checked>
				<label for="radiomale">Male</label>
    		<input type="radio" id="radiofemale" name="gender" value="female">
    			<label for="radiofemale">Female</label>
    		</div></td>
			</tr><tr><td><label class="text">Current Weight</label></td>
			<td><input class="entry" type="text" name="weight"\></td>
			<td><div class="styleselect">
				<select name="w">
				<option name="kg">kg</option>
				<option name="lbs">lbs</option>
			</select>
			</div></td>
			</tr><tr><td><label class="text">Current Height</label></td>
			<td><input class="entry" type="text" name="height"\></td>
			<td><div class="styleselect">
				<select name="h">
				<option name="cm">cm</option>
				<option name="feet">ft in</option>
			</select></div></td></tr>
			<tr><th colspan=3><input class="button" type="submit" value="Calculate BMI" name="BMI"\>
			</th></tr>
		</table>

<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	if(isset($_REQUEST["BMI"])){
	if($_REQUEST['w']=='kg')
	{
		$weight = (float)$_REQUEST['weight'];
	}else if($_REQUEST['w']=='lbs')
	{
		$weight = (float)$_REQUEST['weight']/2.2046226218;
	}
	if($_REQUEST['h']=='cm')
	{
		$height = (float)$_REQUEST['height'];
	}else if($_REQUEST['h']=='ft in'&&is_numeric($_REQUEST['height']))
	{
		$h =explode(".",$_REQUEST['height']);
		$feet=(int)$h[0];
		$inches=(int)$h[1];
		$height=($inches+$feet*12)*2.54;
	}
	if(empty($weight)||empty($height)||!is_numeric($weight)||!is_numeric($height))
  {
  	?><br><font color="red" size="4px"><?php echo "*enter proper values for height and weight";?></font><?php
  }
  else{
  	function bm($weight,$height) 
    {
    	$bmi = $weight/(($height/100)*($height/100));
    	return $bmi;
    }
    $bmi=bm($weight,$height);
    if($_REQUEST["gender"]=="male")
    {
  	if ($bmi <= 18.5){
  		$output = "UNDERWEIGHT";
  	}else if ($bmi > 18.5 AND $bmi<=24.9 ) {
  		$output = "NORMAL WEIGHT";

  	} else if ($bmi > 24.9 AND $bmi<=29.9) {
    	$output = "OVERWEIGHT";

  	} else if ($bmi > 30.0) {
    	$output = "OBESE";
  	}
    else{
      echo"error";  
    }
	}
	elseif ($_REQUEST["gender"]=="female") {
		if ($bmi <= 18.5){
  		$output = "UNDERWEIGHT";
  	}else if ($bmi > 18.5 AND $bmi<=24.9 ) {
  		$output = "NORMAL WEIGHT";

  	} else if ($bmi > 24.9 AND $bmi<=29.9) {
    	$output = "OVERWEIGHT";

  	} else if ($bmi > 30.0) {
    	$output = "OBESE";
  	}
    else{
      echo"error";  
    }
	}
    ?>
    <label class="result"><?php
    echo "<br>Your BMI value is ";?><font color="blue" size="6px"><?php echo number_format((float)$bmi, 2, '.', '');?></font><?php echo" and you are "; 
?><br><font color="blue" size="5px"><?php echo "$output";?></font>

</label>
<?php
}
}
}
?>
</div>
</div>
</form>

<hr width="94%" size="3px;">
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	<div style="height: 600px; position: top:600px;position: relative;">
		<div class="discription">
			<span class="heading" style="border-bottom: 1px solid pink;"><font style="color:#fc6d6d ">What is WHR?</font></span>
<p class="define">The waist-to-hip ratio (WHR) is used as a quick and easy way to measure whether you could be at risk for future health problems and is well supported in scientific fields as an indicator for major health risks. Experts have suggested that WHR is an accurate measure because, in addition to measurements such as your BMI calculation and BMR calculation, it matters where on your body you carry any excess weight.</p>
<p class="define">Work out your waist-to-hip ratio (WHR) with this calculator tool. Simply enter your waist and hip measurements (in either cm or inches). Your WHR number can help you determine which body shape category you fit into.</p>

<font style="font-size: 14px; color: #000; font-family:Verdana; font-weight: bold;" >WHR RANGES</font><br>
<img src="images/whr-range.png" style="position: static;">
	<p class="define">In centimetres, the formula is:&nbsp;&nbsp;&nbsp;<img src="images/whr-formula.png" align="center"></p>
		</div>
		<div class="calculator">
			
			<table>
				<tr><td colspan="3"  class="heading"><span style="border-bottom: 1px solid grey">&nbsp;&nbsp;WHR Calculator&nbsp;&nbsp;</span></td></tr>
				<tr>
			<td><label class="text">Gender</label></td>
			<td colspan="2"><div class="radio-toolbar">
			<input type="radio" id="radiomale1" name="gender1" value="male" checked>
				<label for="radiomale1">Male</label>
    		<input type="radio" id="radiofemale1" name="gender1" value="female">
    			<label for="radiofemale1">Female</label>
    		</div></td>
    		<tr>
    			<td><label class="text">Measurement Unit</label></td><td><div class="radio-toolbar">
				<input type="radio" id="radiommetric" name="unit" value="cm" checked>
				<label for="radiommetric">Metric(cm)</label>
    			
    		<input type="radio" id="radioimperial" name="unit" value="in">
    			<label for="radioimperial">Imperial(in)</label>
    		</div></td>
			</tr>
			</tr><tr><td><label class="text">Waist Measurement</label></td>
			<td><input class="entry" type="text" name="waist"\></td>
			</tr><tr><td><label class="text">Hip Measurement</label></td>
			<td><input class="entry" type="text" name="hip"\></td>
			</tr>
			<tr><th colspan=2><input class="button" type="submit" value="Calculate WHR" name="WHR"\>
			</th></tr>
			</table>
<?php

 if ($_SERVER["REQUEST_METHOD"]=="POST") {
 	if(isset($_REQUEST["WHR"])){
	if($_REQUEST['unit']=='cm')
	{
		$waist = (float)$_REQUEST['waist'];
		$hip = (float)$_REQUEST['hip'];
	}else if($_REQUEST['unit']=='in')
	{
		$waist = (float)$_REQUEST['waist']/2.54;
		$hip = (float)$_REQUEST['hip']/2.54;
	}
	if(empty($waist)||empty($hip)||!is_numeric($waist)||!is_numeric($hip))
  {
  	?><br><font color="red" size="4px">*enter proper values for Waist Measurement and Hip Measurement"</font><?php
  }
  
  else if(isset($_REQUEST['WHR'])){
  	function wh($waist,$hip) 
    {
    	$whr=$waist/$hip;
    	return $whr;
    }
    $whr=wh($waist,$hip);
    if($_REQUEST["gender1"]=="male")
    {
  	if ($whr <= 0.95){
  		$output = "LOW";
  	} else if ($whr > 0.95 AND $whr<=1.0) {
    	$output = "MODERATE";

  	} else if ($whr >1.0) {
    	$output = "HIGH";
  	}
    else{
      echo"error";  
    }
	}
	elseif ($_REQUEST["gender1"]=="female") {
		if ($whr <= 0.80){
  		$output = "LOW";
  	}else if ($whr > 0.80 AND $whr<=0.84 ) {
  		$output = "MODERATE";

  	} else if ($whr > 0.84) {
    	$output = "HIGH";
  	}
    else{
      echo"error";  
    }
	}
    ?>
    <label class="result"><?php
    echo "<br>Your WHR value is ";?><font color="blue" size="6px"><?php echo number_format((float)$whr, 2, '.', '');?></font><?php echo" and you have "; 
?><br><font color="blue" size="5px"><?php echo "$output";?></font>&nbsp;Health Risk

</label>
<?php
}
}
}
?>
</div>
</div>
</form>
<hr width="94%" size="3px;">
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	<div style="height: 650px; position: top:1200px;position: relative;">
		<div class="discription">
			<span class="heading" style="border-bottom: 1px solid pink;"><font style="color:#fc6d6d ">What is BMR?</font></span>
			<p class="define">Your BMR (Basal Metabolic Rate) is an estimate of how many calories your body burns at rest. It represents the minimum amount of energy needed to keep your body functioning, including breathing and keeping your heart beating. Your BMR uses up about two-thirds of your daily calories. Your caloric intake to lose, maintain, or gain weight will be based on your BMR, but will not be the same figure.</p>
			<p class="define">Age, height, weight, and gender determine a person's BMR, also known as basal energy expenditure (BEE). There are multiple formulas used to calculate BMR due to different schools of thought in the health and fitness community. Our calculator uses the Harris-Benedict equation, which works as follows:</p>

<p class="define">Use our calculator to get your basal metabolic rate (BMR). Your BMR is the number of calories your body burns while in a resting state. Use this measure to better understand your body better and reach your fitness goals.</p>
<font style="font-size: 14px; color: #000; font-family:Verdana; font-weight: bold;" >BMR RANGES</font><br>
<img src="images/bmr-range.png" style="position: static;">
	<p class="define">If you’re a man, your BMR is equal to:<br><font color="red"> 65 + (6.2 x weight in pounds) + (12.7 x height in inches) – (6.8 x age in years)</font></p>
	<p class="define">If you’re a woman, your BMR is equal to:<br><font color="red"> 655 + (4.3 x weight in pounds) + (4.3 x height in inches) – (4.7 x age in years)</font></p>
		</div>
		<div class="calculator">
			
			<table>
				<tr><td colspan="3"  class="heading"><span style="border-bottom: 1px solid grey">&nbsp;&nbsp;BMR Calculator&nbsp;&nbsp;</span></td></tr>
			<tr>
    			<td colspan="2" align="center"><div class="radio-toolbar">
				<input type="radio" id="radiommetric1" name="unit1" value="metric" checked>
				<label for="radiommetric1">Metric</label>
    			<input type="radio" id="radioimperial1" name="unit1" value="imperial">
    			<label for="radioimperial1">Imperial</label>
    			</div></td>
    		</tr>
			</tr>
				<tr>
			<td><label class="text">Gender</label></td>
			<td colspan="2"><div class="radio-toolbar">
			<input type="radio" id="radiomale2" name="gender2" value="male" checked>
				<label for="radiomale2">Male</label>
    		<input type="radio" id="radiofemale2" name="gender2" value="female">
    			<label for="radiofemale2">Female</label>
    		</div></td></tr>
    		<tr>
    			<td><label class="text">Age(in yrs.)</label></td>
    			<td><input class="entry" width="5px" type="text" name="age"\></td>
			</tr>
			<tr>
				<td><label class="text">Current Weight</label></td>
				<td><input class="entry" type="text" name="weight"\></td>
			</tr>
			<tr>
				<td><label class="text">Current Height</label></td>
				<td><input class="entry" type="text" name="height"\></td>
			</tr>
			<tr>
				<td><label class="text">Activity Level</label></td>
				<td><div class="styleselect"> <select name="al">
					<option name="select">--Select--</option>
					<option name="sedentary">Sedentary</option>
					<option name="light">Lightly Active</option>
					<option name="moderate">Moderately Active</option>
					<option name="very">Very Active</option>
					<option name="super">Super Active</option>
				</select></div></td>
			</tr>
			<tr><th colspan=3><input class="button" type="submit" value="Calculate BMR" name="BMR"\>
			</th></tr>
			</table>
<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	if(isset($_REQUEST["BMR"])){
		$age=(int)$_REQUEST['age'];
	if($_REQUEST['unit1']=='metric')
	{
		$height = (float)$_REQUEST['height']/2.54;
		$weight = (float)$_REQUEST['weight']*2.2046226218;
	}else if($_REQUEST['unit1']=='imperial'&&is_numeric($_REQUEST['height']))
	{
		$h =explode(".",$_REQUEST['height']);
		$feet=(int)$h[0];
		$inches=(int)$h[1];
		$height=($inches+$feet*12);
		$weight = (float)$_REQUEST['weight'];
	}
	if(empty($weight)||empty($height)||!is_numeric($weight)||!is_numeric($height)||empty($age)||!is_numeric($age))
  {
  	?><br><font color="red" size="4px">*enter proper values for all fields</font><?php
  }
  else{
  	$al=array('Sedentary','Lightly Active','Moderately Active','Very Active','Super Active');
  	$activity=$_REQUEST['al'];
    if($_REQUEST["gender2"]=="male")
    {
    	$bmr=65 + (6.2 * $weight) + (12.7 * $height) - (6.8 * $age);
    	//echo "$bmr\n$weight\n$height\n$age";
  	if (strcmp($activity,$al[0])==0){
  		$calorie=$bmr*1.2;
  	}else if (strcmp($activity,$al[1])==0) {
  		$calorie=$bmr*1.375;
  	} else if (strcmp($activity,$al[2])==0) {
  		$calorie=$bmr*1.55;
  	} else if (strcmp($activity,$al[3])==0) {
  		$calorie=$bmr*1.725;
  	} else if (strcmp($activity,$al[4])==0) {
  		$calorie=$bmr*1.9;
  	}
    else{
      ?><br><font color="red" size="4px">*error calculating results</font><?php
    }
	}
	elseif ($_REQUEST["gender2"]=="female") {
		$bmr=655 + (4.3 * $weight) + (4.3 * $height) - (4.7 * $age);
		if (strcmp($activity,$al[0])==0){
  		$calorie=$bmr*1.2;
  	}else if (strcmp($activity,$al[1])==0) {
  		$calorie=$bmr*1.375;
  	} else if (strcmp($activity,$al[2])==0) {
  		$calorie=$bmr*1.55;
  	} else if (strcmp($activity,$al[3])==0) {
  		$calorie=$bmr*1.725;
  	} else if (strcmp($activity,$al[4])==0) {
  		$calorie=$bmr*1.9;
  	}
    else{
      ?><br><font color="red" size="4px">*error calculating results</font><?php
    }
	}
    ?>
    <label class="result"><?php
    echo "<br>Your BMR value is ";?><font color="blue" size="6px"><?php echo (int)$bmr;?></font><?php echo" and your daily calorie needs is "; 
?><font color="blue" size="5px"><?php echo (int)$calorie;?></font>

</label>
<?php
}
}
}
?>
</div>
</div>
</form>
<div class="footer">
<div class="footer-about">
  <img src="images/logo3.png" width="250px" height="60px">
  <p style="color: #a3a3a3; font-family: verdana; font-size: 14px;">About<br>The Website creates an easy and effective environment to deal with your health cocerns and also provides tools to monitor and manage it.</p>
</div>

  <div class="footer-contact"> 
    Contact:<br>
    <p style="font-size: 14px;"><img src="images/location.png" height="28px" width="28px" align="middle">&nbsp;&nbsp;&nbsp;&nbsp;DES's NMITD, Dadar, Mumbai, Maharasthra-400028.</p>
    <p><img src="images/phone1.png" height="32px" width="32px" align="middle">&nbsp;&nbsp;&nbsp;9545184948 , 7875008276</p>
    <p style="color: #3383c4; "><img src="images/mail.png" height="32px" width="32px" align="middle">
    &nbsp;&nbsp;vinaypra78@gmail.com , dhavalrgupta@gmail.com</p>
  </div>
    <p style="padding-top:170px;margin-left: 28%">&copy;2019 Health and Fitness Management System, AMB-All Rights Reaserved-</p>
</div>
</body>
</html>