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
			// below is for the hide off addModal for students 
			containerToAppend.children("#studentAddModal").addClass("hidden");
			// below is for the hide off updateModal for students 
			containerToAppend.children("#studentUpdateModal").addClass("hidden");
			// below is the standard hide of addModal
			containerToAppend.children(".form-group").addClass("hidden");
			
			containerToAppend.children(".my_alert_container").html("<div class='alert alert-success'  data-dismiss='alert' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> <strong>Success</strong></div> ");                                                    
		} else {
			// below is for the hide off addModal for students 
			containerToAppend.children("#studentAddModal").addClass("hidden");
			// below is for the hide off updateModal for students 
			containerToAppend.children("#studentUpdateModal").addClass("hidden");
			// below is the standard hide of addModal
			containerToAppend.children(".form-group").addClass("hidden");
		
			containerToAppend.children(".my_alert_container").html("<div class='alert alert-danger' data-dismiss='alert' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" + data.errors + "</div> ");                                                    
		}	
	};        
	
	var modalAlertClose = function() {
		
		$(document).on('click', '#modal_add_form .modal-body button.close', function () {
			$(document).find(".hidden").removeClass('hidden');
			$(document).find("#modal_add_form").trigger("reset");
		});    
		
		$(document).on('click', '#modal_add_form .modal-body div.alert', function () {
			$(document).find(".hidden").removeClass('hidden');
			$(document).find("#modal_add_form").trigger("reset");
		});  
		
	
		$(document).on('click', '#modal_update_form .modal-body button.close', function () {
			$(document).find(".hidden").removeClass('hidden');
		});     
		
		$(document).on('click', '#modal_update_form .modal-body div.alert', function () {
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
				
				// below is the angular trigger for curriculum
				$(document).find(".curriculum_angular_trigger").trigger("click");   
				
				// below is the angular trigger for curriculum subject
				$(document).find(".curriculum_subject_angular_trigger").trigger("click");        
				
				// below is the angular trigger for curriculum section
				$(document).find(".curriculum_section_angular_trigger").trigger("click");       
				
				// below is the trigger for the teachers 
				$(document).find(".teacher_angular_trigger").trigger("click");     
				
				// below is the trigger for the students 
				$(document).find(".student_angular_trigger").trigger("click"); 
				
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
				
				// below is for the curriculum update 
				if(datas.curriculum != undefined) {
					console.log(datas.curriculum);
					$(document).find("#curriculum_update").attr("value", datas.curriculum);
					$(document).find("#update_id").attr("value", datas.id);
				}  
				
				// below is for the curriculum subject update 
				if(datas.subject != undefined) {
					$(document).find("#subject_update").attr("value", datas.subject);
					$(document).find("#update_id").attr("value", datas.id);
				}          
				
				// below is for the curriculum section update 
				if(datas.section != undefined) {
					$(document).find("#section_update").attr("value", datas.section);
					$(document).find("#update_id").attr("value", datas.id);
				}    
				
				// below is for the teacher update   
				if(datas.user_type != undefined && datas.user_type == "teacher" ) {   
					$(document).find("#first_name_update").attr("value", datas.first_name);     
					$(document).find("#last_name_update").attr("value", datas.last_name);  
					$(document).find("#middle_name_update").attr("value", datas.middle_name);
					$(document).find("#address_update").attr("value", datas.address);
					$(document).find("#civilstatus_update").attr("value", datas.civilstatus);
					$(document).find("#religion_update").attr("value", datas.religion);
					$(document).find("#birth_date_update").attr("value", datas.birth_date);
					$(document).find("#update_id").attr("value", datas.id);
				}    
				
				// below is for the student update   
				if(datas.user_type != undefined && datas.user_type == "student" ) {   
					$(document).find("#sur_name_update").attr("value", datas.sur_name);     
					$(document).find("#first_name_update").attr("value", datas.first_name);  
					$(document).find("#middle_name_update").attr("value", datas.middle_name);
					$(document).find("#lrn_update").attr("value", datas.lrn);
					$(document).find("#sex_update").attr("value", datas.sex);  
					$(document).find("#date_of_birth_update").attr("value", datas.date_of_birth);   
					$(document).find("#place_of_birth_update").attr("value", datas.place_of_birth);
					$(document).find("#age_update").attr("value", datas.age);   
					$(document).find("#present_address_update").attr("value", datas.present_address);   
					$(document).find("#school_last_attended_update").attr("value", datas.school_last_attended);
					$(document).find("#school_address_update").attr("value", datas.school_address);
					$(document).find("#grade_or_year_level_update").attr("value", datas.grade_or_year_level);     
					$(document).find("#school_year_update").attr("value", datas.school_year);    					
					$(document).find("#tve_specialization_update").attr("value", datas.tve_specialization);    
					$(document).find("#father_update").attr("value", datas.father);     
					$(document).find("#mother_update").attr("value", datas.mother);      
					$(document).find("#person_to_notify_update").attr("value", datas.person_to_notify); 
					$(document).find("#address_update").attr("value", datas.address);    
					$(document).find("#contact_number_update").attr("value", datas.contact_number); 
				
					$(document).find("#update_id").attr("value", datas.id);
				}  
				
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
			
				// below is the angular trigger for curriculum
				$(document).find(".curriculum_angular_trigger").trigger("click");   
				
				// below is the angular trigger for curriculum subject
				$(document).find(".curriculum_subject_angular_trigger").trigger("click");     

				// below is the angular trigger for curriculum section
				$(document).find(".curriculum_section_angular_trigger").trigger("click");       
				
				// below is the trigger for the teachers 
				$(document).find(".teacher_angular_trigger").trigger("click");  
				
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
	
	var deleteClick = function() {
		
		$(document).on('click', "#my_form_delete_button", function(e){
		
			e.preventDefault();
			
			bootbox.confirm("Are you sure?", function(result) {
				if(result) {
					$(document).find("#delete_form").submit();
				}
			});        
			
		
		});
		
	
	};

	var deleteFormSubmit = function() {
		
		var returnValue = false; 
		var isCancelled = false;
		
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
				
				$(document).find(".main_check").uncheck();  
				$(document).find(".sub_check").uncheck();
				
				// below is the angular trigger for curriculum
				$(document).find(".curriculum_angular_trigger").trigger("click");   
				
				// below is the angular trigger for curriculum subject
				$(document).find(".curriculum_subject_angular_trigger").trigger("click");       
				
				// below is the angular trigger for curriculum section
				$(document).find(".curriculum_section_angular_trigger").trigger("click");       
				
				// below is the trigger for the teachers 
				$(document).find(".teacher_angular_trigger").trigger("click");     
				
				// below is the trigger for the teacher subjects 
				$(document).find(".teacher_subject_angular_trigger").trigger("click");    
				// below is the trigger for the teacher curriculum subjects 
				$(document).find(".teacher_curriculum_subject_angular_trigger").trigger("click");      				
				
				// below is the trigger for the teacher subject sections
				$(document).find(".teacher_subject_section_angular_trigger").trigger("click");     
				// below is the trigger for the teacher subject curriculum section 
				$(document).find(".teacher_subject_curriculum_section_angular_trigger").trigger("click"); 

				// below is the trigger for the students 
				$(document).find(".student_angular_trigger").trigger("click"); 				
			}
		}
		
	};
	
	return {
		executeCheckBox:	executeCheckBox,    
		deleteClick:		deleteClick,
		deleteFormSubmit:	deleteFormSubmit
	}

})()   

deleteFormModule.executeCheckBox();      
deleteFormModule.deleteClick();
deleteFormModule.deleteFormSubmit();

var datePickerModule = (function() {
	
	var getBirthDate = function() {
		
		$('#add_birth_date_picker').datetimepicker({
			format: 'YYYY-MM-DD', 
			keepInvalid: true
		});      
		
		$('#update_birth_date_picker').datetimepicker({
			format: 'YYYY-MM-DD', 
			keepInvalid: true
		});
	
	};  
	
	return {
		getBirthDate: 	getBirthDate
	}
	
})()

datePickerModule.getBirthDate();  

var listModalModule = (function() {

	var listAddModalHide = function() {

		$('#listAddModal').on('hide.bs.modal', function (e) {
			$(document).find("#list_add_form").trigger("reset");    
		});   
	
	};

	var listAddFormSubmit = function() {
		
		$("#list_add_form").ajaxForm({
			dataType: 'json',
			forceSync: true,
			beforeSubmit: loading,
			success: success_status
		});   
		
		function loading() {   
			return true;
		}   
		
		function success_status(data) {
			
			$('#listAddModal').modal('hide');
			
			if(data.status == true) {
				bootbox.alert("Success")
			} else {
				bootbox.alert("Failed");
			} 
			
			// below is the trigger for the teacher subjects 
			$(document).find(".teacher_subject_angular_trigger").trigger("click");        
			// below is the trigger for the teacher curriculum subjects 
			$(document).find(".teacher_curriculum_subject_angular_trigger").trigger("click");         
			
			// below is the trigger for the section subject teachers   
			$(document).find(".teacher_subject_section_angular_trigger").trigger("click");         
			// below is the trigger for the teacher subject curriculum section 
			$(document).find(".teacher_subject_curriculum_section_angular_trigger").trigger("click");     
		
		}
	
	};  
	
	return {
		listAddFormSubmit: 		listAddFormSubmit, 
		listAddModalHide:		listAddModalHide
	}

})()

listModalModule.listAddFormSubmit();   
listModalModule.listAddModalHide();


var loginModule = (function() {

	var loginFormSubmit = function() {
		$("#login_form").ajaxForm({
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
				window.location = data.redirect;
			} else {
				bootbox.alert("Invalid username or password");
			} 
		}
	};    
	
	return {
		loginFormSubmit:	loginFormSubmit
	}
	
})()   

loginModule.loginFormSubmit();




























