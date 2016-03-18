<!DOCTYPE>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Display Audience</title>
  <link href="https://app.redretarget.com/camodule/audience/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://app.redretarget.com/camodule/audience/css/style.css" rel="stylesheet">
  <!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','//connect.facebook.net/en_US/fbevents.js');

fbq('init', '1604876259777969');
fbq('track', "PageView");
//fbq('track', 'ViewContent');
fbq('track', 'ViewContent', {
  content_name: 'Really Fast Running Shoes',
  content_category: 'Apparel & Accessories > Shoes',
  content_ids: ['1234'],
  content_type: 'product',
  value: 0.50,
  currency: 'USD'
 });
//fbq('track', 'AddToCart');
//fbq('track', 'Purchase', {value: '0.00', currency: 'USD'});
</script>
<noscript>
<img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1604876259777969&ev=PageView&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
<!-- Jquery Here -->
<script type="text/javascript" src="https://app.redretarget.com/camodule/audience/js/jquery-2.2.0.min.js"></script>
<script>
$(document).ready(function()
{
$("#filtertype").change(function()
{
  var displaymessage= ($(this).val()==1?"Enter a product ID":($(this).val()==2?"Enter a Content-Name Value":($(this).val()==3?"Enter a partial URL":'')));
  $("#displaymessage").html(displaymessage);
})
$("#filter").keyup(function()
{

		 $("#holdfilterresult").hide();
	     var txt = $(this).val();
         $.post("demo_ajax_audince.php", {audince: txt}, function(result){
         $("#holdfilterresult").html(result);
		$("#holdfilterresult").show();
    });
	
});
})
function getid(id,value)
{
$("#filter").val(value);
$("#holdfilterid").val(id);
$("#holdfilterresult").hide();
$("#holdfilterresult").html("");
}
</script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="<?php echo(basename($_SERVER['PHP_SELF'])=="index.php"?"active":''); ?>" href="/camodule/audience"><a href="/camodule/audience">Home</a></li>
      <li class="<?php echo(basename($_SERVER['PHP_SELF'])=="createaudince.php"?"active":''); ?>"><a href="/camodule/audience/createaudince.php" >Create Custom Audience</a></li> 
	  <li class="<?php echo(basename($_SERVER['PHP_SELF'])=="addfeed.php"?"active":''); ?>"><a href="/camodule/audience/addfeed.php">Catalog</a></li>
	  <li class="<?php echo(basename($_SERVER['PHP_SELF'])=="tracking.php"?"active":''); ?>"><a href="/camodule/audience/buzz/tracking.php">Product Tracking</a></li>
	  </ul>
  </div>
</nav>