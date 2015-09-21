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
				
				// below is the trigger for the students 
				$(document).find(".student_angular_trigger").trigger("click"); 
				
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
		
		
		
		// below is the checkbox for the view academic
		$(document).on('click', "#view_academic .main_check", function(){
			if($(this).is(":checked")) {
				$("#view_academic .sub_check").check();
			} else {
				$("#view_academic .sub_check").uncheck();
			}
		});
		
		$(document).on('click', "#view_academic .sub_check", function(){
			if($("#view_academic .sub_check:checked").length === $("#view_academic .sub_check").length) {
				$("#view_academic .main_check").check();
			} else {
				$("#view_academic .main_check").uncheck();
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
	
	var academicListDeleteClick = function() {  
		
		$(document).on('click', "#academic_list_form_delete_button", function(e){
			e.preventDefault();
			
			if($("#view_academic .sub_check:checked").length != 0) {  
			
				bootbox.confirm("Are you sure?", function(result) {
					if(result) {
						$(document).find("#view_academic").submit();
					}
				});        
			
			} else {   
				bootbox.alert("Select item to delete..");
			}
		
		});
	
	};     
	
	var viewAcademicFormSubmit = function() {  
		$("#view_academic").ajaxForm({
			dataType: 'json',
			forceSync: true,
			beforeSubmit: loading,
			success: success_status
		});    
		
		function loading() {  
			return true;
		}   
		
		function success_status(data) {    
			angular.element(document.getElementById('student_angular_container')).scope().getStudents(); 
			var studentId = data.student_id;  
			angular.element($("#view_academic")).scope().getStudentEnrolledAcademicData(studentId);   
			
			$("#view_academic .main_check").uncheck();
		}   
		
	};
	
	
	return {
		executeCheckBox:			executeCheckBox,    
		deleteClick:				deleteClick,
		deleteFormSubmit:			deleteFormSubmit, 
		academicListDeleteClick:	academicListDeleteClick, 
		viewAcademicFormSubmit:		viewAcademicFormSubmit
	}

})()   

deleteFormModule.executeCheckBox();      
deleteFormModule.deleteClick();
deleteFormModule.deleteFormSubmit();   
deleteFormModule.academicListDeleteClick();  
deleteFormModule.viewAcademicFormSubmit();

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
				bootbox.alert("<p style='color: #D9534F;'>Invalid username or password</p>");
			} 
		}
	};    
	
	return {
		loginFormSubmit:	loginFormSubmit
	}
	
})()   

loginModule.loginFormSubmit();

var studentModule = (function() {

	var enrollProcess = function() {
		$(document).on("click", ".enroll_button", function(){
			var id = $(this).parent("td").siblings(".has_student_id").children("input").val();
			var student = $(this).parent("td").siblings(".student_name").text();   
			$("#student_enrollment_form #myModalLabel").text(student);      
			$("#student_enrollment_form #student_id_selection").val(id);  
		});
	};       
	
	var enrollModalHide = function() {  
		$('#enrollModal').on('hide.bs.modal', function (e) {
			$(document).find("#student_enrollment_form").trigger("reset");    
			$("#student_enrollment_form .show").removeClass("show").addClass("hidden");
		});   
	};  
	
	var enrollModalShow = function() {
		$('#enrollModal').on('show.bs.modal', function (e) {
			$(document).find("#student_enrollment_form").trigger("reset");    
			$("#student_enrollment_form .alert").addClass("hidden");
		});   
	};
	
	var enrollmentFormSubmit = function() {
		
		$("#student_enrollment_form").ajaxForm({
			dataType: 'json',
			forceSync: true,
			beforeSubmit: loading,
			success: success_status
		});      
		
		function loading() {
			if($("#student_enrollment_form #curriculum_selection").val() == "" || $("#student_enrollment_form #section_selection").val() == "" || $("#student_enrollment_form #school_year").val() == "") {                                           
				$("#student_enrollment_form .hidden").removeClass("hidden").addClass("show");
				return false;
			} else {  
				return true;
			}
		}   
		
		function success_status(data) {
			$('#enrollModal').modal('hide'); 
			
			if(data.status == true) {
				bootbox.alert("Success");
			} else {
				bootbox.alert("Failed");
			} 
		
			// below is the trigger for the students 
			angular.element(document.getElementById('student_angular_container')).scope().getStudents();     
		
			var studentId = data.student_id;
			// below is the trigger for the view list academic  
			angular.element($("#view_academic")).scope().getStudentEnrolledAcademicData(studentId);   
			
		}
	
	};
	
	var viewAcademicStatusShow = function() {   
		$(document).on("click", ".view_academic", function(){
			var studentId = $(this).attr("id");   
			angular.element($("#view_academic")).scope().getStudentEnrolledAcademicData(studentId);  
		});
	};    
	
	
	return {
		enrollProcess: 				enrollProcess,    
		enrollModalHide:			enrollModalHide,   
		enrollModalShow:			enrollModalShow, 
		enrollmentFormSubmit:		enrollmentFormSubmit, 
		viewAcademicStatusShow:		viewAcademicStatusShow
	}
	
})()      

studentModule.enrollProcess();   
studentModule.enrollModalHide();  
studentModule.enrollModalShow();
studentModule.enrollmentFormSubmit();  
studentModule.viewAcademicStatusShow();  

var sectionStudentModule = (function() { 

	var viewSectionStudentsClick = function() {  
		$(document).on("click", ".viewSectionStudentsLink", function(e){   
			e.preventDefault();
			var sectionId = $(this).attr("id");     
			var schoolYear = $(this).parent("td").prev("td").text();     
			var subjectId = $("#subject_id").text();   
	
			angular.element($("#section_students")).scope().viewStudent(sectionId, schoolYear, subjectId);   
			
		});
	};   
	
	return {   
		viewSectionStudentsClick:	viewSectionStudentsClick
	}
	
})()   

sectionStudentModule.viewSectionStudentsClick();      

var teacherModule = (function() {   
	
	var teacherAccountClick = function() {  
		$(document).on("click", ".teacher_account", function(e){   
			e.preventDefault();
			var teacherId = $(this).attr("id");  
			var teacherName = $(this).parent('td').siblings(".teacher_name").text();   

			angular.element($("#teacher_account_form")).scope().updateTeacherAccount(teacherId, teacherName);  
	
		});
	};      

	var teacherAccountModalHide = function() { 
		
		$('#teacherAccountModal').on('hide.bs.modal', function(e) {
			$(document).find("#teacher_account_form").trigger("reset");
		});   
	
	};
	
	var teacherAccountFormSubmit = function() {   
		
		$("#teacher_account_form").ajaxForm({
			dataType: 'json',
			forceSync: true,
			beforeSubmit: loading,
			success: success_status
		});     
		
		function loading() {  
			
			var usernameVal = $("#teacher_account_form #username").val();  
			var passwordVal = $("#teacher_account_form #password").val();   
			
			if(usernameVal == "" || passwordVal == "") {   
				bootbox.alert("<p style='color: #D9534F;'>Failed. Username and password must not be empty.</p>");
				return false;
			} else {  
				return true;
			}
			
		}  
		
		function success_status(data) {  
			
			// below is the trigger for the students 
			angular.element(document.getElementById('teacher_container')).scope().getTeachers();     
			
			if(data.status) {  
				bootbox.alert("Account updated."); 
			} else {  
				bootbox.alert("Failed.");   
			}
		}
		
	};
	
	
	return {   
		teacherAccountClick:		teacherAccountClick, 
		teacherAccountModalHide:	teacherAccountModalHide, 
		teacherAccountFormSubmit:	teacherAccountFormSubmit
	}

})()   

teacherModule.teacherAccountClick();  
teacherModule.teacherAccountModalHide();  
teacherModule.teacherAccountFormSubmit();

var studentModule = (function() {   

	var studentAccountClick = function() {   
		$(document).on('click', '.student_account', function(){   
			
			var studentId = $(this).attr("id");   
			var studentName = $(this).parent('td').siblings(".student_name").text();   
			
			angular.element($("#student_account_form")).scope().updateStudentAccount(studentId, studentName);  
			
			
		});
	};   
	
	var student_account_form_submit = function() {   
		
		$("#student_account_form").ajaxForm({
			dataType: 'json',
			forceSync: true,
			beforeSubmit: loading,
			success: success_status
		});     
		
		function loading() {  
		
			var usernameVal = $("#student_account_form #username").val();  
			var passwordVal = $("#student_account_form #password").val();   
			
			if(usernameVal == "" || passwordVal == "") {   
				bootbox.alert("<p style='color: #D9534F;'>Failed. Username and password must not be empty.</p>");
				return false;
			} else {  
				return true;
			}
			
		}  
		
		function success_status(data) {  
			
			// below is the trigger for the students 
			angular.element(document.getElementById('student_angular_container')).scope().getStudents(); 
			
			if(data.status) {  
				bootbox.alert("Account updated.");
			} else {  
				bootbox.alert("Failed.");
			}
		}
		
	};
	
	return {      
		studentAccountClick:			studentAccountClick, 
		student_account_form_submit:	student_account_form_submit
	}

})()   

studentModule.studentAccountClick();
studentModule.student_account_form_submit();    


// below are the modules for the teacher access   

var teacherAccessModule = (function() {   

	var updateSubjectGradeClick = function() {   
		$(document).on("click", ".update_subject_grade", function(e){  
			e.preventDefault();
			var href =  $(this).attr("href");        
			var firstQuarter = $(this).parent("td").siblings(".first_quarter").children(".update_student_grade").val();
			var secondQuarter = $(this).parent("td").siblings(".second_quarter").children(".update_student_grade").val();  
			var thirdQuarter = $(this).parent("td").siblings(".third_quarter").children(".update_student_grade").val();
			var fourthQuarter = $(this).parent("td").siblings(".fourth_quarter").children(".update_student_grade").val();
			var finalGrade = $(this).parent("td").siblings(".final_grade").children(".update_student_grade").val();   
			var remarks = $(this).parent("td").siblings(".remarks").children(".update_student_grade").val();
		
			var updateLink = href + "&first_quarter=" + firstQuarter + "&second_quarter=" + secondQuarter + "&third_quarter=" + thirdQuarter + "&fourth_quarter=" + fourthQuarter + "&final_grade=" + finalGrade + "&remarks=" + remarks;
			
			$.get(updateLink, function(data){
				var datas = eval('msg=' + data);        
				if(datas.status) {   
					bootbox.alert("success");
				} else {  
					bootbox.alert("failed");
				}  
				
			});
	
		}); 
	};  
	
	return {  
		updateSubjectGradeClick:	updateSubjectGradeClick
	}

})()

teacherAccessModule.updateSubjectGradeClick();

// below is the module for the captcha 

var captchaModule = (function() {  

	var refreshClick = function() {  
		$(".refresh_captcha").on('click', function(e){   
			e.preventDefault();  
			var refreshUrl = $(this).attr("href");  
			
			$.get(refreshUrl, function(data){
				var datas = eval('msg=' + data);  
				$(document).find('#image_captcha').html(datas.image);
			});
			
		});
	}; 
	
	return {  
		refreshClick:	refreshClick
	}    
	
})()       

captchaModule.refreshClick();


var registrationModule = (function() {    

	var submitRegister = function() {   
		
		$("#register_enrollee_form").ajaxForm({
			dataType: 'json',
			forceSync: true,
			beforeSubmit: loading,
			success: success_status
		});     
		
		function loading() {    
			return true;
		}  
		
		function success_status(data) {  
			
			if(data.status === false) { 
				bootbox.alert("<div style='color: #E0534F;'>" + data.errors + "</div>");
			} else {   
				bootbox.alert("<div style='color: #5CB85C;'><p>Please check your email for verification letter.</p></div>");
				$("#register_enrollee_form").trigger("reset");
			
			}
		}
		
	};  
	
	return {  
		submitRegister: submitRegister
	}

})()
 
registrationModule.submitRegister();



























