<!DOCTYPE html>
<html>

<body>

<?php
//importing the Braintree PHP SDK
require_once 'C:\xampp\htdocs\dashboard\braintree-php-3.39.0\lib\Braintree.php';
// //hiding all errors for clearner xls output
error_reporting(0);
//execution time
set_time_limit(300);

if ($_SERVER["REQUEST_METHOD"]=="POST"){


	if(isset($_POST["mid"]))
		$mid=$_POST["mid"];
	if(isset($_POST["pubkey"]))
		$pubkey=$_POST["pubkey"];
	if(isset($_POST["pvtkey"]))
		$pvtkey=$_POST["pvtkey"];
	if(isset($_FILES["ufile"]['tmp_name']))
		$ufil=$_FILES["ufile"]['tmp_name'];

	//else
		//throw new Exception("ASDASDasd");

}

//Intitializing Braintree SDK instance
$gateway = new Braintree_Gateway([
    	'environment' => 'sandbox',
    	'merchantId' => $mid,//'5n2krnfw5xz3ww2y',//'hks7325w6hqpmygy',
    	'publicKey' => $pubkey,//'xrbfv9twr8jbqvxv',//'dyqnqv93y4stzn2m'
    	'privateKey' => $pvtkey //'0a847d53558e8e286a6e59029bf6fbc5',//'2135025ec312580993dda0dd56c6d523'
	]);



if ($_SERVER["REQUEST_METHOD"]=="POST"){


	if(isset($_POST["mid"]))
		$mid=$_POST["mid"];
	if(isset($_POST["pubkey"]))
		$pubkey=$_POST["pubkey"];
	if(isset($_POST["pvtkey"]))
		$pvtkey=$_POST["pvtkey"];
	if(isset($_FILES["ufile"]['tmp_name']))
		$ufil=$_FILES["ufile"]['tmp_name'];

	//else
		//throw new Exception("ASDASDasd");

}

try{

	$clientToken = $gateway->clientToken()->generate();
}
catch(Exception $e){
	alert("Error");
}

$myfile = fopen($ufil, "r") or die("Unable to open file!");
fgets($myfile);//to skip first line
$a=array(array("Status","TransactionID","Amount","orderID"));
while(!feof($myfile)){

	$linef=fgets($myfile);
	$pieces = explode("	", $linef);
	// echo $pieces[0];
	// echo $pieces[1];
	// echo $pieces[2];


	$result = $gateway->transaction()->sale([
    		'amount' => $pieces[0],
    		'paymentMethodToken' => $pieces[1],
    		'orderId' => $pieces[2],
    		'options' => ['submitForSettlement' => true]
    	]);

	if($result->success){
	 echo $result->success;
	 echo $result->transaction->id;

	array_push($a, array("success",$result->transaction->id,$result->transaction->amount,$result->transaction->orderId));
	}
	else{

		echo $result->code;
		echo $result->message;

		array_push($a, array($result->message,$result->transaction->id,$result->transaction->amount,$result->transaction->orderId));

	}

}
fclose($myfile);

echo count($a);
ob_get_clean();
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=".$mid.date('m/d/Y h:i:s a').".xls");

echo "<table>";
     for ($x=0; $x<count($a)-1; $x++){
        echo "<tr><td>".$a[$x][0]."</td><td>".$a[$x][1]."</td><td>".$a[$x][2]."</td><td>".$a[$x][3]."</td></tr>";
    }
echo "</table>";
die()
?>

</body>
</html>