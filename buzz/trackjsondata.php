<?php
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Credentials: true'); 
header('Access-Control-Allow-Methods: OPTIONS, GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type, X-Requested-With');
header("p3p: CP=ALL DSP COR PSAa PSDa OUR NOR ONL UNI COM NAV");

$userip=md5($_SERVER['REMOTE_ADDR'] .$_SERVER['HTTP_USER_AGENT']);

if($_POST)
{
  if(isset($_POST['productinfo']))
  {
  $data=json_decode($_POST['productinfo'],true);
  //print_r($data);
  $connect=dbconect();
  inser_data_for_all('track_product','name,product_id,price,quantity,ip_address,browser_name,variant',"'".$data["name"]."',".$data["id"].",".trim(str_replace("$","",trim($data["price"]))).",".$data["quantity"].",'".$userip."','".$data["browsername"]."',".$data["variant"]."",$connect);
  }
  else if(isset($_POST['getdata']))
  {

  $connect=dbconect();
  getdata('track_product','name,product_id,price,quantity,ip_address,browser_name,variant',$connect,"where ip_address='".$userip."'");
  }
  else if(isset($_POST['deldata']))
  {
    $connect=dbconect();
    $condition=isset($_POST['ipaddress'])?"where ip_address in ('".$userip."','".$_POST['ipaddress']."')":"where ip_address='".$userip."'";
	remove_data('track_product',$connect,$condition);
	
  }else if(isset($_POST['checkout']))
  {
  $data=json_decode($_POST['checkout'],true);
  
  foreach($data as $value)
  {
   $data=json_decode($value,true);
   $connect=dbconect();
   $total= count_record($connect,'track_product','where variant="'.$data["variant"].'" and ip_address="'.$userip.'"');
   if($total=="0")
   {
    inser_data_for_all('track_product','name,product_id,price,quantity,ip_address,browser_name,variant',"'".$data["name"]."',".$data["id"].",".trim(str_replace("$","",trim($data["price"]))).",".$data["quantity"].",'".$userip."','".$data["browser"]."','".$data["variant"]."'",$connect);
   }
  }
  }
}
function dbconect()
{
       
		//database configuration
		$dbServer = '63c3dacd12dbbe8c0790671898d64fb7828b292e.rackspaceclouddb.com'; //Define database server host
		$dbUsername = 'deepeshtrip'; //Define database username
		$dbPassword = 'Qjb8TjcRJcfOCW7'; //Define database password
		$dbName = '493328_trackify'; //Define database name
		
		//connect databse
		$con = mysqli_connect($dbServer,$dbUsername,$dbPassword,$dbName);
		if(mysqli_connect_errno())
		{
			die("Failed to connect with MySQL: ".mysqli_connect_error());
		}
		else
		{
			$connect = $con;
		}
		return $connect;

}
function count_record($connect,$tablename,$condition)
{

 $result=mysqli_query($connect,"select count(*) as total from ".$tablename." ".$condition."");
 $totalcount=mysqli_fetch_assoc($result);
 return $totalcount["total"];
}
function remove_data($tablename,$connect,$condition)
{

     mysqli_query($connect, "delete from ".$tablename." ".$condition."")or die(mysqli_error($connect));
      mysqli_close($connect);
}
function inser_data_for_all($tablename,$fields_name,$fields_value,$connect)
{
	
mysqli_query($connect, "insert into ".$tablename."(".$fields_name.")value(".$fields_value.")") or die(mysqli_error($connect));
  mysqli_close($connect);	
}
function getdata($tablename,$fields_value,$connect,$condition)
{
    $result=mysqli_query($connect,"select ".$fields_value." from ".$tablename." ".$condition."");
    $getdata=array();
    while($getresult=mysqli_fetch_assoc($result))
    { 
      $getdata[]=$getresult;
    }
   mysqli_close($connect);
   print_r(json_encode($getdata));
}
?>


