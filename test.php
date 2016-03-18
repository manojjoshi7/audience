<?php
define('SDK_DIR', __DIR__ ); // Path to the SDK directory
$loader = include SDK_DIR.'/vendor/autoload.php';

use FacebookAds\Api;


use FacebookAds\Object\ProductFeed;
use FacebookAds\Object\Fields\ProductFeedFields;
use FacebookAds\Object\Fields\ProductFeedScheduleFields;
$access_token ="CAAE0QYJ0bGoBAH5uiPRArNXtfDHq4e8s47nhYdT7GbwIDVFRYxd6VwDNGMgRXzMBFcOUA4ZB5oMWkw3ZBwThnhECFaJIAY2rWL6YxOXisRZAHUpLBu4YlhA2RBfXiHOHEPhh03QXHr1V8uLBzleeLfyZABwpcVhgjLcHlYJZBAA0iQZBcA77gj1cAFoCg0wnyiRZAx0x51GJjlQOmyzr2QN";

$app_id = "338930942897258";
$app_secret = "02c002a52d5eadb0ec54e2cc5b9f6f70";

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


$product_feed = new ProductFeed(null, '171438103227588');

$product_feed->setData(array(
  ProductFeedFields::NAME => 'manoj',
  ProductFeedFields::SCHEDULE => array(
    ProductFeedScheduleFields::INTERVAL => 'DAILY',
    ProductFeedScheduleFields::URL =>'https://app.redretarget.com/camodule/audience/sample_feed.tsv',
    ProductFeedScheduleFields::HOUR => 22,
  ),
));

print_r($product_feed->create());

?>
