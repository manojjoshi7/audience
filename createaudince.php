<?php include_once('header.php'); ?>
<div  class="container">
        <div class="row">
            <div class="col-sm-12">
                 <form method="post" name="custom_audience_form" action="savecustomaudince.php">
                    
                    <h1>
                       Trackify CA Builder
                    </h1>
                     <div class="form-group">
                       <label>Filter Type</label>
					   <select class="form-control" id="filtertype" name="filtertype" >
					   <option value="1">Event-content_ids (Product)</option>
					   <option value="2">Event-content_name (Niche)</option>
					   <option value="3">URL-Based</option>
					   </select>
                     </div>
                    <div class="form-group">
                       
					   <label>Filter Value</label><br/>
					   <small id="displaymessage">Enter a product ID</small>
					   
                       <input type="text" required class="form-control" name="filtervalue"/>
                    </div>

					<div class="form-group">
                       
					   <label>Event Type </label>
					   
                       <select class="form-control" name="eventtype">
					   <option value="ViewContent">ViewContent</option>
					   <option value="AddToCart">Add To Cart</option>
					   <option value="Purchase">Purchase</option>
					   <option value="all">*Create All 3</option>
					   </select>
                    </div>
                   <div class="form-group">

					   <label>Lookback Period</label><br/>
					   	<small>Enter the amount of days the data will stay in the audience(max 180)</small>
                       <input  type="number" min="1" max="180" style="max-width: 95px;" required class="form-control" name="custom_look_back_days"/>
					   
                    </div>
					<div class="form-group">
					 <label>CA Name</label>
					
					<input type="text" required class="form-control" name="custom_audience_name" />
					</div>
                    <div class="form-group">
                       <input type="submit" value="Create" class="btn btn-primary"/>
                    </div>
                 </form>
            </div> <!-- /col-sm-12 -->
        </div><!-- /row -->
      </div>




<?php include_once('footer.php'); ?>