if($_GET['submit']) { 
    $mass = $_GET['mass'];
    $height = $_GET['height'];
    function bmi($mass,$height) {
        $bmi = $mass/($height*$height);
        return $bmi;
    }   

    $bmi = bmi($mass,$height); //<--- this is critical

    if ($bmi <= 18.5) {
        $output = "UNDERWEIGHT";

        } else if ($bmi > 18.5 AND $bmi<=24.9 ) {
        $output = "NORMAL WEIGHT";

        } else if ($bmi > 24.9 AND $bmi<=29.9) {
        $output = "OVERWEIGHT";

        } else if ($bmi > 30.0) {
        $output = "OBESE";
    }
    echo "Your BMI value is  " . $bmi . "  and you are : "; 
    echo "$output";
}