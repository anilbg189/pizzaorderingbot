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


$oid= $_POST['oid'];

    
$res = mysqli_query($conn,"SELECT status from orders where oid=$oid ;");
$num = mysqli_num_rows($res);
if($num==1)
{
$row=mysqli_fetch_assoc($res);
$status=$row["status"];
echo $status;
}
else{
	echo 'failed to fetch the data';
}

 ?>