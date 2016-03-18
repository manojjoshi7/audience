<?php
include_once("database.php");
$db_object=new Dbconnect();
if(!isset($_POST["custom_audience_name"])  || !isset($_POST["custom_look_back_days"]) || !isset($_POST["filtervalue"]))
{
header('Location: https://app.redretarget.com/camodule/audience/createaudince.php');
}
else if(empty(trim($_POST["custom_audience_name"])) || empty(trim($_POST["custom_look_back_days"])) || empty(trim($_POST["filtervalue"])))
{
header('Location: https://app.redretarget.com/camodule/audience/createaudince.php');
}
  $customaudince_name=$_POST["custom_audience_name"];
  $_POST["custom_audience_name"]=($_POST["eventtype"]=="all"?$customaudince_name."_"."ViewContent"."_".$_POST["custom_look_back_days"]:$customaudince_name);
  $db_object->create_custom_ac();
  if($_POST["eventtype"]=="all")
  {
     $_POST["eventtype"]="AddToCart"; 
	 $_POST["custom_audience_name"]=$customaudince_name."_"."AddToCart"."_".$_POST["custom_look_back_days"];
     $db_object->create_custom_ac();   
	 $_POST["eventtype"]="Purchase";
	 $_POST["custom_audience_name"]=$customaudince_name."_"."Purchase"."_".$_POST["custom_look_back_days"];
	 $db_object->create_custom_ac(); 
  }
header('Location: https://app.redretarget.com/camodule/audience');
  
?>
