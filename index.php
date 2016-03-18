<?php
include_once("database.php");
$db_object=new Dbconnect();
?>
<?php
$next=0;
 $access_token ="CAAXVF80iGu8BAMAAZAAFA3ROZANtmXChbqeMZB8n0uOdqSH3BY42a1bdKBmKwmRY53XomFa93J39HcA22Gu4sbYp4zD8J371BvVosQZCxkeNWEwZC2DTsZAg8ODKd2365FO9sY8QsqhyLMlcfcYZAJSPazbVJZBqnZCQdYwGWMio6g3Hf5LBSyvmQVY651jsV1gYZD";

$app_id = "1641673086081775";
$app_secret = "8740d72f2cba081eac3a8edb760247d3";
// should begin with "act_" (eg: $account_id = 'act_1234567890';)
$account_id = "40584955";
// Configurations - End

if (is_null($access_token) || is_null($app_id) || is_null($app_secret)) {
  throw new \Exception('You must set your access token, app id and app secret before executing');
}

if (is_null($account_id)) {
  throw new \Exception(
    'You must set your account id before executing');
}
define('SDK_DIR', __DIR__ ); // Path to the SDK directory
$loader = include SDK_DIR.'/vendor/autoload.php';

use FacebookAds\Api;

// Initialize a new Session and instanciate an Api object
Api::init($app_id, $app_secret, $access_token);

// The Api object is now available trough singleton
$api = Api::instance();


use FacebookAds\Object\AdAccount;
use FacebookAds\Object\CustomAudience;
use FacebookAds\Object\Fields\CustomAudienceFields;
//$account = new AdAccount('act_1019129504774909');

$account = new AdAccount('act_40584955');
    $fields = array(
        CustomAudienceFields::ID,
        CustomAudienceFields::NAME,
    CustomAudienceFields::APPROXIMATE_COUNT,
    CustomAudienceFields::DELIVERY_STATUS,
    CustomAudienceFields::AVAILABILITY, 
    CustomAudienceFields::PIXEL_ID,
        CustomAudienceFields::SUBTYPE,
        CustomAudienceFields::ACCOUNT_ID,
    CustomAudienceFields::TIME_UPDATED,
    CustomAudienceFields::DESCRIPTION,
    CustomAudienceFields::DATA_SOURCE,
    CustomAudienceFields::OPERATION_STATUS,
    CustomAudienceFields::RULE,
        );
    $params = array('filters'=>array(
                    array(
                        'field'=>'type',
                        'type'=>'in',
                        'value'=>['WEBSITE','CUSTOM'],
            
                    ),
                ),);    

    $CustomAudience = $account->getCustomAudiences($fields,$params);
  $newdata=(array)$CustomAudience;

foreach($newdata as $key=>$value)
{
$newvalue=(array)$value;
foreach($newvalue as $innervalue)
{
  $innerone=(array)$innervalue;

   foreach($innerone as $key1=>$value1)
   {
   $value1=(array)$value1;
   if(isset($value1["next"]))
   {
   $next= $value1["next"];
   }
   
   }
}
}

  $i=0;
  $holdarrayid=array();
foreach($CustomAudience as $test)
{
   $t=(array)$test;

foreach($t as $innerone)
{

  if(count($innerone))
  {   
       $m=(array)$innerone;
    
    
     if(isset($m["name"]))
     {$i=$i+1;
     $audience["audience_id"]=$m["id"];
     $audience["account_id"]=$m["account_id"];
     $audience["name"]=$m["name"];
     $audience["subtype"]=$m["subtype"];
     $audience["pixel_id"]=$m["pixel_id"];
     $audience["size"]=$m["approximate_count"];
     $audience["time_updated"]=$m["time_updated"];
     $db_object->insert_data($audience);
     
     $holdarrayid[]=$m["id"];
    
    //echo $i."====name==".$m["name"]."=id=".$m["id"]."==pixelid=".$m["pixel_id"]."=subtype=".$m["subtype"]."=time=".$m["time_updated"]."==account-id==".$m["account_id"]."==size=".$m["approximate_count"];  
     
     }

  }


}

}

$audinceid= implode(',',$holdarrayid);
?>
<?php include_once('header.php'); ?>

  <div class="row">
    <div class="column_one">&nbsp;</div>
    <div class="column_two"><?php
      $db_object->get_audince_info($audinceid);
      ?></div><div class="column_three">
      <form method="post" action="nextaudince.php">
        <input type="hidden" value="<?php echo $next;?>" name="nextlink" >
        <input type="submit" value="Next" class="button_class">
      </form>
    </div>
  </div>

  <!-- Project Notes -->

  <div class="container" style="margin-top:20px;max-width:600px">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-warning">
          <strong>Developer's Note : </strong> if you want to show all the field of table you can  Change this class <small>.have_LLA_item{display:none;}</small>  Inside index.php
        </div>
      </div>
    </div>
  </div>
<?php include_once('footer.php'); ?>
