<?php

define('SDK_DIR', __DIR__ ); // Path to the SDK directory
$loader = include SDK_DIR.'/vendor/autoload.php';

use FacebookAds\Api;


use FacebookAds\Object\CustomAudience;
use FacebookAds\Object\Fields\CustomAudienceFields;
use FacebookAds\Object\Values\CustomAudienceSubtypes;

class Dbconnect 
{
	public $table_name = 'fb_audience_info';
	private $connect;
	
	public function create_catalog()
	{
	$access_token ="CAAXVF80iGu8BAMAAZAAFA3ROZANtmXChbqeMZB8n0uOdqSH3BY42a1bdKBmKwmRY53XomFa93J39HcA22Gu4sbYp4zD8J371BvVosQZCxkeNWEwZC2DTsZAg8ODKd2365FO9sY8QsqhyLMlcfcYZAJSPazbVJZBqnZCQdYwGWMio6g3Hf5LBSyvmQVY651jsV1gYZD";

     $app_id = "1641673086081775";
    $app_secret = "8740d72f2cba081eac3a8edb760247d3";
    if (is_null($access_token) || is_null($app_id) || is_null($app_secret)) 
    {
     throw new \Exception('You must set your access token, app id and app secret before executing');
    }

    if (is_null($account_id)) 
    {
     throw new \Exception(
    'You must set your account id before executing');
    }
	
	}
	public function create_custom_ac()
	{
	$access_token ="CAAXVF80iGu8BAMAAZAAFA3ROZANtmXChbqeMZB8n0uOdqSH3BY42a1bdKBmKwmRY53XomFa93J39HcA22Gu4sbYp4zD8J371BvVosQZCxkeNWEwZC2DTsZAg8ODKd2365FO9sY8QsqhyLMlcfcYZAJSPazbVJZBqnZCQdYwGWMio6g3Hf5LBSyvmQVY651jsV1gYZD";

$app_id = "1641673086081775";
$app_secret = "8740d72f2cba081eac3a8edb760247d3";

$account_id = "40584955";
// Configurations - End
if (is_null($access_token) || is_null($app_id) || is_null($app_secret)) 
{
  throw new \Exception('You must set your access token, app id and app secret before executing');
}

if (is_null($account_id)) 
{
  throw new \Exception(
    'You must set your account id before executing');
}

// Initialize a new Session and instanciate an Api object
Api::init($app_id, $app_secret, $access_token);

// The Api object is now available trough singleton
$api = Api::instance();	
	
	
	if($_POST["filtertype"]==3)
    {
      if($_POST["eventtype"]=="AddToCart")
      {

      $data='{"and": [
{"event": {"i_contains": "AddToCart"}},
{"content_ids": {"i_contains": "'.$_POST["filtervalue"].'"}}
]}';  
      $rule=json_decode($data);
       }
      else if($_POST["eventtype"]=="Purchase")
      {
    $data='{"and": [
{"event": {"i_contains": "Purchase"}},
{"content_ids": {"i_contains": "'.$_POST["filtervalue"].'"}}
]}';  
       $rule=json_decode($data);
      }
	  else
	  {
	  $rule=array('url' => array('i_contains' =>$_POST["filtervalue"]));
	  }

    }
   else if($_POST["filtertype"]==1)
   {
   if($_POST["eventtype"]=="AddToCart")
   {

    $data='{"and": [
{"event": {"i_contains": "AddToCart"}},
{"content_ids": {"i_contains": "'.$_POST["filtervalue"].'"}}
]}';
  }
  else if($_POST["eventtype"]=="Purchase")
  {
  
  $data='{"and": [
{"event": {"i_contains": "Purchase"}},
{"content_ids": {"i_contains": "'.$_POST["filtervalue"].'"}}
]}';
  }
  else
  {  
	 $data='{"and": [
{"event": {"i_contains": "ViewContent"}},
{"content_ids": {"i_contains": "'.$_POST["filtervalue"].'"}}
]}';
  }
$rule=json_decode($data);
}
else if($_POST["filtertype"]==2)
{
  if($_POST["eventtype"]=="AddToCart")
  {

    $data='{"and": [
{"event": {"i_contains": "AddToCart"}},
{"content_name": {"i_contains": "'.$_POST["filtervalue"].'"}}
]}';
  }
  else if($_POST["eventtype"]=="Purchase")
  {
  
  $data='{"and": [
{"event": {"i_contains": "Purchase"}},
{"content_name": {"i_contains": "'.$_POST["filtervalue"].'"}}
]}';
  }
  else
  {
  $data='{"and": [
{"event": {"i_contains": "ViewContent"}},
{"content_name": {"i_contains": "'.$_POST["filtervalue"].'"}}
]}';
  }
$rule=json_decode($data);
}
    // For Tom----------------
   $custom_audience = new CustomAudience(null, 'act_40584955');	
   //----------------------- 
	
	// For Trackify------
	//$custom_audience = new CustomAudience(null, 'act_1019129504774909');
	//------------------------
	
	$custom_audience->setData(array(
    
	// For Trackify------
	//CustomAudienceFields::PIXEL_ID =>'1604876259777969',
   //-------------------------
  
  // For Tom--------------
   CustomAudienceFields::PIXEL_ID =>'237340816467636',
  //----------------------------
  CustomAudienceFields::NAME => $_POST["custom_audience_name"],
  CustomAudienceFields::SUBTYPE => CustomAudienceSubtypes::WEBSITE,
  CustomAudienceFields::RETENTION_DAYS => $_POST["custom_look_back_days"],

  CustomAudienceFields::RULE => $rule,
   
  CustomAudienceFields::PREFILL => true,
    ));
   try
   {
      $getobject=$custom_audience->create();
      $getobject=(array)$getobject;
      foreach($getobject as $value)
      {
        $m=(array)$value;
		if(is_array($m) && count($m)!=0 && isset($m["name"]))
		 {
		 $audience["audience_id"]=$m["id"];
	     $audience["account_id"]="40584955";
	     $audience["name"]=$m["name"];
	     $audience["subtype"]=$m["subtype"];
	     $audience["pixel_id"]=$m["pixel_id"];
	     $audience["size"]=$m["approximate_count"];
	     $audience["time_updated"]=$m["time_updated"];
	     $this->insert_data($audience);
		
		}

     }
    }
     catch(Exception $e)
     {
      echo 'Message: ' .$e->getMessage();
	  die;
     }

	}
	function __construct()
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
			$this->connect = $con;
		}
	}
	
	public function get_data($data)
	{
	     
		$result= mysqli_query($this->connect, "select audience_id,name from fb_audience_info where name like '%".$data."%' and subtype!='LOOKALIKE'") or die(mysqli_error($this->connect));


		echo "<ul class='getfilter'>";
		while($value=mysqli_fetch_assoc($result))
		{

		echo "<li onclick='getid(".$value["audience_id"].",\"".$value["name"]."\")'>".$value["name"]."</li>";
		
		} 
		echo "</ul>";
		 
	}
	public function get_audince_info($data)
	{
          $result= mysqli_query($this->connect, "select audience_id,name,subtype,pixel_id,size,time_updated from fb_audience_info where audience_id in (".$data.")") or die(mysqli_error($this->connect));
	       echo "<table class='gridtable'>
		   <thead>
                <tr>
                <th>Name</th>
                <th>Subtype</th>
                <th>Pixel Id</th>
				<th>Size</th>
				<th>Time Updated</th>
				<th>LAA Link</th>
                </tr>
          </thead>";

		   while($value=mysqli_fetch_assoc($result))
		   {
		   		/***** CA LLA FILTER *******/
		   		$CA_with_LLA_Key="";
		   		$trAttributes = "";
		   		$addATagtagOpt = "";
		   		if(strtolower($value["subtype"]) === "lookalike")
				{
				$updatetime="";

		   			$Relation_LLA_arr = explode(') - ', $value["name"]);
		   			if(isset($Relation_LLA_arr[1])){

		   				$CA_with_LLA_Key = "data-CAkey ='".$Relation_LLA_arr[1]."'";
		   				$trAttributes ="class='have_LLA_item' ".$CA_with_LLA_Key;
		   			} //if(isset($Relation_LLA_arr[1])){
		   			$addATagtagOpt = $value["name"];
		   		}else{
				 $updatetime=date('d-m-Y h:m:s A', $value["time_updated"]);
		   			$addATagtagOpt = "<a class='btn btn-info showLLA ' href='#".$value["name"]."'>".$value["name"]."</a>";	

		   		} // if(strtolower($value["subtype"]) === "lookalike"){
		   		

		     $hasaudince=($this->has_audience($value["name"])>0?"Yes":"");
   echo "<tr ".$trAttributes."><td>".$addATagtagOpt."</td><td>".$value["subtype"]."</td><td>".$value["pixel_id"]."</td><td>".$value["size"]."</td><td>".$updatetime."</td><td>".$hasaudince."</td></tr>";
		   }
		   echo "</table>";
	
	}
	public function insert_data($data)
	{
	    
	 $count=$this->has_data($data["audience_id"]);
	 if(!$count)
	 {
	   //$this->delete($data["audience_id"]);
	 mysqli_query($this->connect, "insert into ".$this->table_name."(audience_id,name,subtype,account_id,pixel_id,size,time_updated)value('".$data["audience_id"]."','".addslashes($data["name"])."','".addslashes($data["subtype"])."','".$data["account_id"]."','".$data["pixel_id"]."','".$data["size"]."','".$data["time_updated"]."')") or die(mysqli_error($this->connect));
	 }
	 else
	 {
	  $this->update_data($data);
	 }
	}
	public function inser_data_for_all($tablename,$fields_name,$fields_value)
	{
		 mysqli_query($this->connect, "insert into ".$tablename."(".$fields_name.")value(".$fields_value.")") or die(mysqli_error($this->connect));
	
	}
	public function get_data_for_table($tablename,$fields_name)
	{
	   $result=  mysqli_query($this->connect,"select ".$fields_name." from ".$tablename."");
	   $result_obj;
	   while($value=mysqli_fetch_assoc($result))
	   {
		$result_obj[]=$value;	   
			   
	   }
	   return json_encode($result_obj);
	}
	private function has_audience($data)
	{
     $data=" - ".trim($data);

	 $result=mysqli_query($this->connect,"SELECT count(*) as total FROM ".$this->table_name." WHERE name REGEXP '".$data."'") or die(mysqli_error($this->connect));
	 $audince=mysqli_fetch_assoc($result);
	return $audince["total"];
	}
	public function has_data($id)
	{
	
	   $result=mysqli_query($this->connect,"select count(*) as total from ".$this->table_name." where audience_id='".$id."'")or die(mysqli_error($this->connect));
	   
	   $getcount=mysqli_fetch_assoc($result);
       
	   return $getcount["total"];
	
	}
	private function update_data($data)
	{

	   mysqli_query($this->connect,"UPDATE ".$this->table_name."
SET name='".addslashes($data["name"])."', subtype='".addslashes($data["subtype"])."',account_id='".$data["account_id"]."',pixel_id='".$data["pixel_id"]."',size='".$data["size"]."',time_updated='".$data["time_updated"]."'
WHERE audience_id='".$data["audience_id"]."'") or die(mysqli_error($this->connect));
	   
	}
	private function delete($id)
	{
	  mysqli_query($this->connect,"delete from ".$this->table_name." where audience_id='".$id."'") or die(mysqli_error($this->connect));
	}
}