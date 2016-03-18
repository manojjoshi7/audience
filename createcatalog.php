<?php
define('SDK_DIR', __DIR__ );
include SDK_DIR.'/vendor/autoload.php';
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

Api::init('1702585606621568', '8a36b0dd3c0e83d49b9c9ec3d2d99989', 'CAAYMfhpISYABAGaOnvIhJI8nV1FraPDivkpU1r5Fe41JoSzbPUUCw77Czbj2EZAlLZBUOnq2XvlhKRY7KqHKXrsD4lz93JCdUQUAaVQQ84aCbhVIZCgNp35cwhPXwyXSG7CdZALNilrfgny5vZBFveXhiFG9ZA2aQnrlZCdPtSSEaK6alOqJL6fU6mTk1aP4PYZD');


     $product_catalog = new ProductCatalog(null, '1534628646835473');

$product_catalog->setData(array(
  ProductCatalogFields::NAME => "Catalog",
));

$product_catalog->create();

?>
