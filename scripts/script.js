jQuery.fn.extend({
	check: function() {
		return this.each(function() { this.checked = true; });
	},
	uncheck: function() {
		return this.each(function() { this.checked = false; });
	}
});

var modalModule = (function() {

	var modalAddShow = function() {
		$('#myAddModal').on('show.bs.modal', function (e) {
			//console.log('showed');
		});
	};     
	
	var modalAddHide = function() {
		$('#myAddModal').on('hide.bs.modal', function (e) {
			$(document).find("#modal_add_form").trigger("reset");
		});   
	};
	
	var modalAddFormSubmit = function() {
		$("#modal_add_form").ajaxForm({
			dataType: 'json',
			forceSync: true,
			beforeSubmit: loading,
			success: success_status
		});   
		
		function loading() {
			return true;
		}   
		
		function success_status(data) {
			if(data.status) {
				$(document).find(".curriculum_angular_trigger").trigger("click");
			} else {
				console.log(data.errors);
			}
		}
		
	};
	
	var modalUpdateShow = function() {
	
		$(document).on('click', '.my_update_link', function(){
		
			$(document).find("#modal_update_form").trigger("reset");
			
			var getUrl = $(this).attr("href");   
			$.get(getUrl, function(data){
				var datas = eval('msg=' + data);     
				$(document).find("#curriculum_update").attr("value", datas.curriculum);
				$(document).find("#update_id").attr("value", datas.id);
			});
			
			return false;
		});
	
	};   
	
	var modalUpdateHide = function() {
		$('#myUpdateModal').on('hide.bs.modal', function (e) {  
			$(document).find("#curriculum_update").attr("value", "");
			$(document).find("#update_id").attr("value", "");
		});   
	};   
	
	
	
	var modalUpdateSubmit = function() {
		
		$("#modal_update_form").ajaxForm({
			dataType: 'json',
			forceSync: true,
			beforeSubmit: loading,
			success: success_status
		});   
		
		function loading() {
			return true;
		}   
		
		function success_status(data) {
			if(data.status) {
				$(document).find(".curriculum_angular_trigger").trigger("click");       
			} else {
				console.log(data.errors);
			}
		}
		
	};

	
	
	return {
		modalAddShow: 			modalAddShow, 
		modalAddHide: 			modalAddHide, 
		modalAddFormSubmit: 	modalAddFormSubmit, 
		modalUpdateShow: 		modalUpdateShow, 
		modalUpdateSubmit:		modalUpdateSubmit, 
		modalUpdateHide:		modalUpdateHide
	}

})()

modalModule.modalAddShow();   
modalModule.modalAddHide();      
modalModule.modalAddFormSubmit();     
modalModule.modalUpdateSubmit();  
modalModule.modalUpdateShow();  
//modalModule.modalUpdateHide();


var deleteFormModule = (function() {  

	var executeCheckBox = function() {
		
		$(document).on('click', "#delete_form .main_check", function(){
		
			if($(this).is(":checked")) {
				$("#delete_form .sub_check").check();
			} else {
				$("#delete_form .sub_check").uncheck();
			}
	
		});
		
		$(document).on('click', "#delete_form .sub_check", function(){
			
			if($("#delete_form .sub_check:checked").length === $("#delete_form .sub_check").length) {
				$("#delete_form .main_check").check();
			} else {
				$("#delete_form .main_check").uncheck();
			}
			
		});
		
	};  
	
	var deleteFormSubmit = function() {
		$("#delete_form").ajaxForm({
			dataType: 'json',
			forceSync: true,
			beforeSubmit: loading,
			success: success_status
		});   
		
		function loading() {
			return true;
		}  
		
		function success_status(data) {
			if(data.status) {
				$(document).find(".curriculum_angular_trigger").trigger("click");
			}
		}
		
	};
	
	return {
		executeCheckBox:	executeCheckBox, 
		deleteFormSubmit:	deleteFormSubmit
	}

})()   

deleteFormModule.executeCheckBox();   
deleteFormModule.deleteFormSubmit();





