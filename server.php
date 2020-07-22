<?php 
    session_start();
   // unset($_SESSION);
    
    
    // Allow from any origin
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    //    header('Access-Control-Allow-Credentials: true');
    //    header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    //if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    //    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
    //        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

     //   if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
    //        header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    //    exit(0);
    //}
    // $arr=array();
    // foreach ($_POST as $key => $val) {
    // echo "$key => $val \n";
    // $arr[$key]=$val;
    // }

//$myfile = fopen("testfile.txt", "w");

$conn = mysqli_connect("localhost","root","","pizzabot");

if (mysqli_connect_errno()){
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


$arr= json_decode($_POST['data']);
foreach ($arr as $key => $val) {
    $pizzaname=$val->pizzaname;
	$quantity=$val->quantity;
	$base=$val->base;
	$customername=$val->customername;
	$phonenumber=$val->phonenumber;
    $address=$val->address;
    
    $query = mysqli_query($conn,"INSERT INTO orders (pizzaname,quantity,base,customername,phonenumber,address,status) VALUES ('$pizzaname','$quantity','$base','$customername','$phonenumber','$address','order placed')");
    
    if($query)
	{
        

	}
	else
	{
			
		echo "couldnt insert data".$query;
    }
}
$result=mysqli_query($conn,"SELECT * FROM orders ORDER BY oid DESC LIMIT 1 ;");
$row=mysqli_fetch_assoc($result);
$oid=$row["oid"];
echo $oid;
mysqli_close($conn);
 ?>