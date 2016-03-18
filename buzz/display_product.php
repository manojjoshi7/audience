<?php include_once('../header.php'); ?>
<form id="add-item-form" action="thanks.php" method="post" enctype="multipart/form-data">
<h1 style="padding:0px;font-size:1.2em;" itemprop="name" id="productname"></h1>
<div>
<img src="" id="large-img" height="200px" width="200px"/>
</div>
<div id="product-price" style="padding:0px;margin:10px 5px;" itemprop="offers">
				<meta itemprop="priceCurrency" content="USD" />
				
					<link itemprop="availability" />
				
			
				<p>
					<span class="product-price on-sale" itemprop="price">
        			
        			</span>
        			
        			<br />
        			<span class="product-compare-price">
        			
        			</span>
        			
				</p>
			</div>
	<div  style="float: left; width: 30%;">
            <label style="width:40px;padding:0px;">QTY</label>
            <input id="quantity" type="number" name="quantity" value="1" style="width:30px;">
          </div>
			<div id="product-add">
            <input type="submit" value="Buy It Now" name="add" id="add"  style="background-color:#4bb232;">
             
              </div>
</form>
<script type="text/javascript"  src="https://app.redretarget.com/camodule/audience/buzz/buzzify.js"></script>
<script>
 fetch_product(getQueryString('v'));

 var add_cart=function(event)
             {
             event.preventDefault();
 			 var track=getQueryString('track');
			 if(track)
			 {
			 
			document.cookie= document.cookie==""?"Product Name: "+document.getElementById("productname").innerHTML+" | Product Price: "+document.getElementsByClassName('product-price on-sale')[0].innerHTML+" | QTY: "+document.getElementById("quantity").value+" | Product Compare Price: "+document.getElementsByClassName('product-compare-price')[0].innerHTML:document.cookie+"<br/>Product Name: "+document.getElementById("productname").innerHTML+" | Product Price: "+document.getElementsByClassName('product-price on-sale')[0].innerHTML+" | QTY: "+document.getElementById("quantity").value+" | Product Compare Price: "+document.getElementsByClassName('product-compare-price')[0].innerHTML;

			 }
			 document.getElementById("add-item-form").submit();			 
			 }  
if(document.getElementById("add").addEventListener) 
{
  
    document.getElementById("add").addEventListener("click", add_cart, false);
} 
else 
{
  if(document.getElementById("add").attachEvent) 
  {   
    document.getElementById("add").attachEvent("click", add_cart);
  }
} 

</script>

<?php include_once('../footer.php'); ?>