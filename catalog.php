<?php
define('SDK_DIR', __DIR__ ); // Path to the SDK directory
include SDK_DIR.'/database.php';
$loader = include SDK_DIR.'/vendor/autoload.php';

use FacebookAds\Api;

use FacebookAds\Object\ProductCatalog;
use FacebookAds\Object\Fields\ProductCatalogFields;
use FacebookAds\Object\ProductFeed;
use FacebookAds\Object\Fields\ProductFeedFields;
use FacebookAds\Object\Fields\ProductFeedScheduleFields;
use FacebookAds\Object\ProductSet;
use FacebookAds\Object\Fields\ProductSetFields;
use FacebookAds\Object\Fields\ProductAudienceFields;
use FacebookAds\Object\Fields\CustomAudienceFields;
use FacebookAds\Object\ProductAudience;

class Catalog
{


  public function create_catalog($catelogname,$business_id,$pixel_id,$url,$feedname)
	{
	  if($business_id=="538432952992102")
	  {
	     $access_token ="CAAYMfhpISYABAGaOnvIhJI8nV1FraPDivkpU1r5Fe41JoSzbPUUCw77Czbj2EZAlLZBUOnq2XvlhKRY7KqHKXrsD4lz93JCdUQUAaVQQ84aCbhVIZCgNp35cwhPXwyXSG7CdZALNilrfgny5vZBFveXhiFG9ZA2aQnrlZCdPtSSEaK6alOqJL6fU6mTk1aP4PYZD";
         $app_id = "1702585606621568";
         $app_secret = "8a36b0dd3c0e83d49b9c9ec3d2d99989";
	  }
	  else if($business_id=="914767425211118")
      {
	    $access_token ="CAAWCSSrDZBZAIBAARjr2sBNHUfwMYZB231ZBiRenNZAt36EVeeEndKKz69VLbBi6tWLx1lWGCpX9rxAqTxNNTHlTrRa4IRltqICXznES6enZB0hypdLlXZBh0MXSomYFOrZAaelnFUrY0YaJZB0e7YG4mzv8wdcZB2nZAZBqZByaGYimjtaunANwdLKuzznDcq80UtfMZD"; 
        $app_id = "1550625645263250";
        $app_secret = "79e2259e3ecf511390266faf1eeb4798";
	  }
	  /********end client token ******/
      if (is_null($access_token) || is_null($app_id) || is_null($app_secret)) 
      {
      throw new \Exception('You must set your access token, app id and app secret before executing');
      }
      try
	  {

	  Api::init($app_id, $app_secret, $access_token);
	  $api = Api::instance();	

	  $db_object=new Dbconnect();
     // deepesh account business id 538432952992102  //

      $product_catalog = new ProductCatalog(null, $business_id);

      $product_catalog->setData(array(
      ProductCatalogFields::NAME => $catelogname));

      $data=$product_catalog->create();

	  $data=(array)$data;
	  foreach($data as $innerdata)
	  {
	              $innerdata=(array)$innerdata;
       		      if(isset($innerdata["name"]))
				  {
      
      $db_object->inser_data_for_all("fb_catalog_info","catalog_id,name,business_id","'".$innerdata["id"]."','".$innerdata["name"]."','".$business_id."'");
	  
	  $product_catalog = new ProductCatalog($innerdata["id"]);
      $product_catalog->setExternalEventSources(array($pixel_id));
	  $catalog_id=$innerdata["id"];
	  date_default_timezone_set('Asia/Kolkata');
     
	  $ist_hour=date('H');

      if($ist_hour>=12)
      $hour= $ist_hour-12;
      else
	  $hour=(12+$ist_hour);


	 
      $feed = new ProductFeed(null, $innerdata["id"]);

	  $feed->setData(array(
      ProductFeedFields::NAME =>$feedname,
      ProductFeedFields::SCHEDULE => array(
      ProductFeedScheduleFields::INTERVAL => 'DAILY',
      ProductFeedScheduleFields::URL =>$url,
	  ProductFeedScheduleFields::HOUR=>$hour)));
      $getresult=(array)$feed->save();
	  
	   foreach($getresult as $value)
       {

         $getvalue=(array)$value;
         if(isset($getvalue["id"]))
         {
         $db_object->inser_data_for_all("fb_catalog_product_feed","catalog_id,product_id,product_name,url","'".$catalog_id."','".$getvalue["id"]."','".$getvalue["name"]."','".$getvalue["schedule"]["url"]."'");
         }
      }
	  
	  return "<div class='alert alert-success'>Product uploded in facebook";		  
	 }
		          
		  
		   
	  }
	  
	  }catch(Exception $e)
	  {
	   return "<div class='alert alert-danger'>*Message: " .$e->getMessage()."";

	  
	  }
	  	
	}
}