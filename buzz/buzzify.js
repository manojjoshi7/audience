var cssElement = document.createElement("style");
cssElement.innerHTML = '@import url(http://fonts.googleapis.com/css?family=Raleway:300,700);.customized{background:javascript:void(0);fff;border:0;border-radius:0;bottom:20px;display:none;left:20px;padding:0;position:fixed;text-align:left;width:auto;z-index:99999;font-family:Raleway,sans-serif;-webkit-box-shadow:0 0 4px 0 rgba(0,0,0,.4);-moz-box-shadow:0 0 4px 0 rgba(0,0,0,.4);box-shadow:0 0 4px 0 rgba(0,0,0,.4);margin-right:20px;}.customized img{float:left;max-height:80px;width:auto}.customized p{color:javascript:void(0);000;float:left;font-size:13px;margin:0 0 0 13px;width:auto;padding:12px 12px 0 0;line-height:20px}.customized p a{color:javascript:void(0);000;display:block;font-size:15px;font-weight:700}.customized p a:hover{color:javascript:void(0);000}.customized p small{display:block;font-size:10px}@media screen and (max-width:767px){.customized{bottom: 0 !important;left: 0 !important;width: 100%;}.customized p{font-size:12px;}.customized p a{font-size:14px;}}';
document.getElementsByTagName("head")[0].appendChild(cssElement);
window.onload=function()
{
var prop={"product":[{"product_id":"1437091086","name":"If At First You Do not Succeed Try Doing What Your Teacher Told You The First Time","image_url":"http://cdn.shopify.com/s/files/1/0923/3518/products/Mug_Mock-up_dc0007b3-c0f1-46e6-b3bc-a70bd900cc56_large.png","price":"12.99","compareprice":"24.95"},{"product_id":"1441600827","name":"Circle Of Trust Shiba Inu","image_url":"http://cdn.shopify.com/s/files/1/0923/3518/products/CIRCLE_OF_TRUST_SHIBA_INU-1_large.jpeg","price":"14.47","compareprice":"24.95"},{"product_id":"1453347926","name":"2015 2016 It is Going To Be A Great Year","image_url":"http://cdn.shopify.com/s/files/1/0923/3518/products/596198d6-7d69-438b-8035-5861ee783bca_large.jpg","price":"14.97","compareprice":"24.95"},{"product_id":"1454362898","name":"","image_url":"http://cdn.shopify.com/s/files/1/0923/3518/products/let_s_have_coffee_together_2_large.jpg","price":"14.19","compareprice":"24.95"},{"product_id":"1452136542","name":"My Husband Is","image_url":"http://cdn.shopify.com/s/files/1/0923/3518/products/Mug_Mock-up_copy_637b3170-ead2-476a-b070-a441392ef4eb_large.png","price":"14.97","compareprice":"24.95"},{"product_id":"1442460093","name":"I Love My Wife To The Moon And Back","image_url":"http://cdn.shopify.com/s/files/1/0923/3518/products/I_love_my_Wife_to_the_moon_and_back_large.jpeg","price":"14.97","compareprice":"24.95"}]}
var product=JSON.stringify(prop);
//var product=prop.product;
getdata=JSON.parse(product);
len=getdata.product.length;
var popup="";
for(i=0;i<len;i++)
{
	if(popup=="")
	{
	popup='<div style="display:none;opacity:0;" class="customized" id="someone-purchased'+i+'"><img src="'+getdata.product[i].image_url+'?v='+getdata.product[i].product_id+'"><p>'+getdata.product[i].name+' <a  onclick="track(\''+getdata.product[i].name+'\',\'display_product.php\',\''+getdata.product[i].product_id+'\')" href="javascript:void(0);">'+getdata.product[i].name+'</a></p></div>';	
	}
	else
	{
	popup=popup+'<div style="display:none;opacity:0;" class="customized" id="someone-purchased'+i+'"><img src="'+getdata.product[i].image_url+'?v='+getdata.product[i].product_id+'"><p>'+getdata.product[i].name+' <a  onclick="track(\''+getdata.product[i].name+'\',\'display_product.php\',\''+getdata.product[i].product_id+'\')" href="javascript:void(0);">'+getdata.product[i].name+'</a></p></div>';	
	}
}
var buzzify = document.createElement('div');
buzzify.id = "buzzify";
document.getElementsByTagName('body')[0].appendChild(buzzify);
document.getElementById('buzzify').innerHTML =popup;


var i=0;
var total=(len-1);
var x=total;
setInterval(function()
{
   i=(i>total?0:i);	
   
   document.getElementById("someone-purchased"+x).style.opacity=0;
   var div  = document.getElementById("someone-purchased"+i);
   var opacity = 0;
   var bottom = 0;
   var opacity = 1;
   var bottom = 0;
   var self = this;
   div.style.bottom = bottom + 'px';
   div.style.opacity = opacity;
   div.style.filter = 'alpha(opacity=' + opacity * 100 + ")";
   div.style.display = 'block';
   x=i;
   i++;
   }, 3000);
}
var product='';
function track(productname,page,product_id)
{
 window.location.href=window.location.origin+"/camodule/audience/buzz/"+page+"?v="+product_id+"&track=1";
 
}
var getQueryString = function ( field, url ) {
    var href = url ? url : window.location.href;
    var reg = new RegExp( '[?&]' + field + '=([^&#]*)', 'i' );
    var string = reg.exec(href);
    return string ? string[1] : null;
};
var fetch_product=function(product_id)
                  {
var prop={"product":[{"product_id":"1437091086","name":"If At First You Do not Succeed Try Doing What Your Teacher Told You The First Time","image_url":"http://cdn.shopify.com/s/files/1/0923/3518/products/Mug_Mock-up_dc0007b3-c0f1-46e6-b3bc-a70bd900cc56_large.png","price":"12.99","compareprice":"24.95"},{"product_id":"1441600827","name":"Circle Of Trust Shiba Inu","image_url":"http://cdn.shopify.com/s/files/1/0923/3518/products/CIRCLE_OF_TRUST_SHIBA_INU-1_large.jpeg","price":"14.47","compareprice":"24.95"},{"product_id":"1453347926","name":"2015 2016 It is Going To Be A Great Year","image_url":"http://cdn.shopify.com/s/files/1/0923/3518/products/596198d6-7d69-438b-8035-5861ee783bca_large.jpg","price":"14.97","compareprice":"24.95"},{"product_id":"1454362898","name":"","image_url":"http://cdn.shopify.com/s/files/1/0923/3518/products/let_s_have_coffee_together_2_large.jpg","price":"14.19","compareprice":"24.95"},{"product_id":"1452136542","name":"My Husband Is","image_url":"http://cdn.shopify.com/s/files/1/0923/3518/products/Mug_Mock-up_copy_637b3170-ead2-476a-b070-a441392ef4eb_large.png","price":"14.97","compareprice":"24.95"},{"product_id":"1442460093","name":"I Love My Wife To The Moon And Back","image_url":"http://cdn.shopify.com/s/files/1/0923/3518/products/I_love_my_Wife_to_the_moon_and_back_large.jpeg","price":"14.97","compareprice":"24.95"}]}
var product=JSON.stringify(prop);
getdata=JSON.parse(product);
len=getdata.product.length;
					  
					  
                     for(i=0;i<len;i++)
                     {
						var id_one=getdata.product[i].product_id.trim();
						var id_two=product_id.trim();
	                    if(id_one==id_two)
						{
                       document.getElementById("productname").innerHTML=getdata.product[i].name;
					   document.getElementById("large-img").src=getdata.product[i].image_url;
                       document.getElementsByClassName('product-price on-sale')[0].innerHTML="$"+getdata.product[i].price; 
          document.getElementsByClassName('product-compare-price')[0].innerHTML="Was $"+getdata.product[i].compareprice; 
						}
	                 
                      }
				  }