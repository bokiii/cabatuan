jQuery.fn.extend({
	check: function() {
		return this.each(function() { this.checked = true; });
	},
	uncheck: function() {
		return this.each(function() { this.checked = false; });
	}
});


var alertModule = (function() {

	var modalAlertOpen = function(data, containerToAppend) {
		if(data.status) {
			containerToAppend.children(".form-group").addClass("hidden");
			containerToAppend.children(".my_alert_container").html("<div class='alert alert-success'  data-dismiss='alert' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> <strong>Success</strong></div> ");                                                    
		} else {
			containerToAppend.children(".form-group").addClass("hidden");
			containerToAppend.children(".my_alert_container").html("<div class='alert alert-danger' data-dismiss='alert' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" + data.errors + "</div> ");                                                    
		}	
	};        
	
	var modalAlertClose = function() {
		
		$(document).on('click', '#modal_add_form .modal-body button.close', function () {
			$(document).find(".hidden").removeClass('hidden');
			$(document).find("#modal_add_form").trigger("reset");
		});  
		
		
		$(document).on('click', '#modal_update_form .modal-body button.close', function () {
			$(document).find(".hidden").removeClass('hidden');
		});
	
	};
	


	return {
		modalAlertOpen:		modalAlertOpen, 
		modalAlertClose:	modalAlertClose
	}

})()

alertModule.modalAlertClose();   


var modalModule = (function() {

	var modalAddShow = function() {
		$('#myAddModal').on('show.bs.modal', function (e) {
			//console.log('showed');
		});
	};     
	
	var modalAddHide = function() {
		$('#myAddModal').on('hide.bs.modal', function (e) {
			$(document).find("#modal_add_form").trigger("reset");     
			$(document).find("#modal_add_form .modal-body button.close").trigger("click");     
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
			
			var containerToAppend = $("#modal_add_form .modal-body");
			
			if(data.status) {
				$(document).find(".curriculum_angular_trigger").trigger("click");
				alertModule.modalAlertOpen(data, containerToAppend);
			} else {
				alertModule.modalAlertOpen(data, containerToAppend);
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
			$(document).find("#modal_update_form .modal-body button.close").trigger("click");   
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
			var containerToAppend = $("#modal_update_form .modal-body");
			
			if(data.status) {
				$(document).find(".curriculum_angular_trigger").trigger("click");       
				alertModule.modalAlertOpen(data, containerToAppend);
			} else {
				alertModule.modalAlertOpen(data, containerToAppend);
			}
		}
		
	};


	return {
		modalAddShow: 			modalAddShow, 
		modalAddHide: 			modalAddHide, 
		modalAddFormSubmit: 	modalAddFormSubmit, 
		modalUpdateShow: 		modalUpdateShow,   
		modalUpdateHide:		modalUpdateHide,
		modalUpdateSubmit:		modalUpdateSubmit
	}

})()

modalModule.modalAddShow();   
modalModule.modalAddHide();      
modalModule.modalAddFormSubmit();     
modalModule.modalUpdateShow();     
modalModule.modalUpdateHide();
modalModule.modalUpdateSubmit(); 


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






