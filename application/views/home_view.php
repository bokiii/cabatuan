<div ng-controller="home_controller" id="getUpdateNewsModal" class="modal fade updateNewsModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">  
			<form method="post" id="news_update_form" action="<?php echo base_url(); ?>index.php/home_controller/update_news">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">News Update</h4>
				</div>  
				<div class="modal-body">  
					
					<div class="form-group">
						<label for="news_update">News</label>
						<input type="text" class="form-control" name="news_update" id="news_update" value={{getNewsContent.news}}>
						<input type="hidden" name="news_id" id="news_id" value="{{getNewsContent.id}}" />
					</div>
				</div>  
				
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>  
			</form> 

		</div>
	</div>
</div>


<div class="main_container">
	
	<div class="container">  
		<div class="row">   
			<div class="col-md-12">   
				<div class="page-header">
					<h1>News Feeds</h1>
				</div>
			</div>  
		</div>        
	</div>     
	
	
	<div class="container">   
		<form method="post" id="add_news_form" action="<?php echo base_url(); ?>index.php/home_controller/add_news">    
		
			<div class="row">  
				<div class="col-md-12">  
					<label for="news">Add News</label>
					<textarea name="news" id="news" class="form-control" rows="3"></textarea> 
				</div>   
			</div>   
			
			<br />
			
			<div class="row">  
				<div class="col-md-12">  
					<button type="submit" class="btn btn-info" id="news_submit" disabled>Add</button>
				</div>
			</div>
	
		</form>
	</div>   
	
	<br />  
	<hr />
	
	<div class="container" id="home_angular_container" ng-controller='home_controller'>    
		
		<div class="row news_lists" ng-repeat="new in news">  
			<div class="col-md-12">  
				<div class="panel panel-default">
					<div class="panel-body">
						{{new.news}}
					</div>
					<div class="panel-footer"> <button id="<?php echo base_url(); ?>index.php/home_controller/get_news_update_content_by_id?id={{new.id}}" type="button" class="btn btn-primary show_update" data-toggle="modal" data-target=".updateNewsModal">Update</button>  <a class="btn btn-default delete_news_link" href="<?php echo base_url(); ?>index.php/home_controller/delete_latest_news?id={{new.id}}" role="button">Delete</a> &nbsp; <span>(Created) {{new.created}}</span></div>
				</div>
			</div>  
		</div>     
		
	</div>  

	
</div> <!-- end main container -->  













