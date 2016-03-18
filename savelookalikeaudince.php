<?php
include_once("database.php");
$db_object=new Dbconnect();

if(!isset($_POST["holdfilterid"]) || !isset($_POST["lookalikename"]))
{
header('Location: https://app.redretarget.com/camodule/audience/createaudince.php');
}
else if(empty(trim($_POST["holdfilterid"])) || empty(trim($_POST["lookalikename"])))
{
header('Location: https://app.redretarget.com/camodule/audience/createaudince.php');
}
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
use FacebookAds\Object\CustomAudience;
use FacebookAds\Object\Fields\CustomAudienceFields;
use FacebookAds\Object\Values\CustomAudienceSubtypes;

$lookalike = new CustomAudience(null, 'act_40584955');
$lookalike->setData(array(
  CustomAudienceFields::NAME => $_POST["lookalikename"],
  CustomAudienceFields::SUBTYPE => CustomAudienceSubtypes::LOOKALIKE,
  CustomAudienceFields::ORIGIN_AUDIENCE_ID => $_POST["holdfilterid"],
  CustomAudienceFields::LOOKALIKE_SPEC => array(
    'type' => 'similarity',
    'country' => 'US',
  ),
));
try
{
$getobject=$lookalike->create();
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
	     $db_object->insert_data($audience);
		 echo "lookalike  audience has been create and save in database";
		}

}

}
catch(Exception $e)
{
echo 'Message: ' .$e->getMessage();
}
?>
