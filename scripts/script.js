// below is for the global variables 
var phoneContentClone;  
   

jQuery.fn.extend({
	check: function() {
		return this.each(function() { this.checked = true; });
	},
	uncheck: function() {
		return this.each(function() { this.checked = false; });
	}
});

var delay = (function(){
	var timer = 0;
	return function(callback, ms){
		clearTimeout (timer);
		timer = setTimeout(callback, ms);
	};
})();

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
				angular.element($("#student_angular_container")).scope().getUnenrolledStudents(); 
				
				
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
					
					// add validation classes first 
					$('#modal_update_form .for_validation').addClass("success_color");   
					$('#modal_update_form .for_validation').addClass("is_good");  
					
					$('#modal_update_form .validation_for_select').addClass("success_color");   
					$('#modal_update_form .validation_for_select').addClass("is_good");  
					
					$('#modal_update_form .validation_for_phone_select').addClass("success_color");   
					$('#modal_update_form .validation_for_phone_select').addClass("is_good");
					
					
					$(document).find("#sur_name_update").attr("value", datas.sur_name);     
					$(document).find("#first_name_update").attr("value", datas.first_name);  
					$(document).find("#middle_name_update").attr("value", datas.middle_name);
					$(document).find("#lrn_update").attr("value", datas.lrn);
					
					
					$('input[name=sex_update][value=' + datas.sex + ']').prop('checked',true)
					
					
					//$(document).find("#date_of_birth_update").attr("value", datas.date_of_birth);     
					var splitDateOfBirth = datas.date_of_birth.split("-");       
					var monthValue = splitDateOfBirth[1]; 
					var monthText;
					
					if(monthValue == 01) {  
						monthText = "Jan";
					} else if(monthValue == 02) { 
						monthText = "Feb";  
					} else if(monthValue == 03) { 
						monthText = "Mar";
					} else if(monthValue == 04) { 
						monthText = "Apr";
					} else if(monthValue == 05) { 
						monthText = "May";
					} else if(monthValue == 06) { 
						monthText = "Jun";
					} else if(monthValue == 07) { 
						monthText = "Jul";
					} else if(monthValue == 08) { 
						monthText = "Aug";
					} else if(monthValue == 09) { 
						monthText = "Sep";
					} else if(monthValue == 10) { 
						monthText = "Oct";
					} else if(monthValue == 11) { 
						monthText = "Nov";
					} else if(monthValue == 12) { 
						monthText = "Dec";
					}
					
					$(document).find("#month_update").children(".blank_value").text(monthText);  
					$(document).find("#month_update").children(".blank_value").val(splitDateOfBirth[1]); 
					$(document).find("#day_update").children(".blank_value").text(splitDateOfBirth[2]);
					$(document).find("#day_update").children(".blank_value").val(splitDateOfBirth[2]);  
					$(document).find("#year_update").children(".blank_value").text(splitDateOfBirth[0]);
					$(document).find("#year_update").children(".blank_value").val(splitDateOfBirth[0]);
					
					
					$(document).find("#place_of_birth_update").attr("value", datas.place_of_birth);
					$(document).find("#age_update").attr("value", datas.age);   
					$(document).find("#present_address_update").attr("value", datas.present_address);   
					$(document).find("#school_last_attended_update").attr("value", datas.school_last_attended);
					$(document).find("#school_address_update").attr("value", datas.school_address);
					
					
					//$(document).find("#grade_or_year_level_update").attr("value", datas.grade_or_year_level);   
					$(document).find("#grade_or_year_level_update").children(".blank_value").text(datas.grade_or_year_level);	
					$(document).find("#grade_or_year_level_update").children(".blank_value").val(datas.grade_or_year_level);					
					
					//$(document).find("#school_year_update").attr("value", datas.school_year);     
					$(document).find("#school_year_update").children(".blank_value").text(datas.school_year);     
					$(document).find("#school_year_update").children(".blank_value").val(datas.school_year);
					
					
					
					$(document).find("#tve_specialization_update").attr("value", datas.tve_specialization);    
					$(document).find("#father_update").attr("value", datas.father);     
					$(document).find("#mother_update").attr("value", datas.mother);      
					$(document).find("#person_to_notify_update").attr("value", datas.person_to_notify); 
					$(document).find("#address_update").attr("value", datas.address);    
					$(document).find("#contact_number_update").attr("value", datas.contact_number); 
					
					
					$(document).find("#phone_selected_update").attr("value", datas.phone_selected);   
					$(document).find(".current_phone_type").text("(Current Phone Type) " + "(" + datas.phone_selected + ")"); 
					phoneContentClone = $(document).find(".for_phone_update").html();   
				
	
					$(document).find("#update_id").attr("value", datas.id);
				}  
				
			});
			
			return false;
		});
	
	};   
	
	var modalUpdateHide = function() {
		$('#myUpdateModal').on('hide.bs.modal', function (e) {
			
			
			$(document).find("#modal_update_form .modal-body button.close").trigger("click");     
			
		
			$('#modal_update_form .for_validation').popover('hide');
			
			
			$('#modal_update_form .validation_for_select').popover('hide');
			
			  
			$('#modal_update_form .validation_for_phone_select').popover('hide');		
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
				angular.element($("#student_angular_container")).scope().getUnenrolledStudents();   
				angular.element($("#student_angular_container")).scope().getStudents(); 
				
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
			format: 'MM/DD/YYYY', 
			keepInvalid: true
		});      
		
		$('#update_birth_date_picker').datetimepicker({
			format: 'MM/DD/YYYY', 
			keepInvalid: true
		});
	
	};      
	
	return {
		getBirthDate: 	getBirthDate
	}
	
})()

// datetime picker is removed
//datePickerModule.getBirthDate();  

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

	var bottomTabsClick = function() { 
		
		$(document).find(".active_tab").show("slow");  
		
		$(document).on("click", ".home_tab", function(e){   
			e.preventDefault();    
			
			$(this).parent("li").siblings().removeClass("active");  
			$(this).parent("li").addClass("active");
			
			// below is for the tabs below
			var forActiveTab = $(this).attr("id");  
			$(document).find(".active_tab").fadeOut("fast").removeClass("active_tab");  
			$(document).find("." + forActiveTab).fadeIn("slow", function(){  
				$(this).addClass("active_tab");
			});  
			
		});
	}

	var determineAge = function() {   
		
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!
		var yyyy = today.getFullYear();      
		
		var monthValue = ""; 
		var dayValue = ""; 
		var yearValue = ""; 
		var birthday;          
		
		var monthValueUpdate = "";
		var dayValueUpdate = "";
		var yearValueUpdate = "";
		var birthdayUpdate;   
		

		
		var i = 0;
		$("#add_birth_date_picker").on("dp.change", function (e) {
			i++;      
			if(i > 1) { 
				
				var birthday = $("#date_of_birth").val();   
				
				myAgeValidation(birthday);
				
			
				function myAgeValidation(birthValue) {

					var lre = /^\s*/;
					var datemsg = "";

					var inputDate = birthValue;
					inputDate = inputDate.replace(lre, "");
					datemsg = isValidDate(inputDate);
					
					if (datemsg != "") {
						bootbox.alert(" " + datemsg);
						return;
					}
					else {
						getAge(new Date(inputDate));
					}
				}   
				
				function getAge(birth) {

					var today = new Date();
					var nowyear = today.getFullYear();
					var nowmonth = today.getMonth();
					var nowday = today.getDate();

					var birthyear = birth.getFullYear();
					var birthmonth = birth.getMonth();
					var birthday = birth.getDate();

					var age = nowyear - birthyear;
					var age_month = nowmonth - birthmonth;
					var age_day = nowday - birthday;

					if(age_month < 0 || (age_month == 0 && age_day <0)) {
						age = parseInt(age) -1;
					}
					
					$("#age").val(age);	
					
				} // end function
				
				function isValidDate(dateStr) {


					var msg = "";
			
					var datePat = /^(\d{1,2})(\/|-)(\d{1,2})\2(\d{4})$/;

					var matchArray = dateStr.match(datePat); 
					if (matchArray == null) {
						msg = "Date is not in a valid format.";
						return msg;
					}

					month = matchArray[1]; 
					day = matchArray[3];
					year = matchArray[4];


					if (month < 1 || month > 12) { 
						msg = "Month must be between 1 and 12.";
						return msg;
					}

					if (day < 1 || day > 31) {
						msg = "Day must be between 1 and 31.";
						return msg;
					}

					if ((month==4 || month==6 || month==9 || month==11) && day==31) {
						msg = "Month "+month+" doesn't have 31 days!";
						return msg;
					}

					if (month == 2) { 
						var isleap = (year % 4 == 0 && (year % 100 != 0 || year % 400 == 0));
						if (day>29 || (day==29 && !isleap)) {
							msg = "February " + year + " doesn't have " + day + " days!";
							return msg;
						}
					}

					if (day.charAt(0) == '0') day= day.charAt(1);

					return msg;  
				} 
			} // end if	
		}); 
		
		$("#month").on("change", function(){ 
			monthValue = $(this).val();    
			if(monthValue != "" && dayValue != "" && yearValue != "") { 
				birthday = monthValue + "/" + dayValue + "/" + yearValue; 
				automaticGetAge(birthday);
			} else { 
				$("#age").val("");
			}
		});  
		
		$("#day").on("change", function(){ 
			dayValue = $(this).val();   
			if(monthValue != "" && dayValue != "" && yearValue != "") { 
				birthday = monthValue + "/" + dayValue + "/" + yearValue; 
				automaticGetAge(birthday);
			} else { 
				$("#age").val("");
			}
		});  
		
		$("#year").on("change", function(){ 
			yearValue = $(this).val();   
			if(monthValue != "" && dayValue != "" && yearValue != "") { 
				birthday = monthValue + "/" + dayValue + "/" + yearValue; 
				automaticGetAge(birthday);
			} else {  
				$("#age").val("");
			}
		});   
		
		// below is for the update   
			$("#month_update").on("change", function(){ 
			monthValueUpdate = $(this).val();  
			dayValueUpdate = $(document).find("#day_update").val(); 
			yearValueUpdate = $(document).find("#year_update").val();
			if(monthValueUpdate != "" && dayValueUpdate != "" && yearValueUpdate != "") { 
				birthdayUpdate = monthValueUpdate + "/" + dayValueUpdate + "/" + yearValueUpdate; 
				automaticGetAge(birthdayUpdate);
			} else { 
				$("#age_update").val("");
			}
		});  
		
		$("#day_update").on("change", function(){ 
			dayValueUpdate = $(this).val();   
			monthValueUpdate = $(document).find("#month_update").val(); 
			yearValueUpdate = $(document).find("#year_update").val();
			if(monthValueUpdate != "" && dayValueUpdate != "" && yearValueUpdate != "") { 
				birthdayUpdate = monthValueUpdate + "/" + dayValueUpdate + "/" + yearValueUpdate; 
				automaticGetAge(birthdayUpdate);
			} else { 
				$("#age_update").val("");
			}
		});  
		
		$("#year_update").on("change", function(){ 
			yearValueUpdate = $(this).val();    
			monthValueUpdate = $(document).find("#month_update").val(); 
			dayValueUpdate = $(document).find("#day_update").val();
			if(monthValueUpdate != "" && dayValueUpdate != "" && yearValueUpdate != "") { 
				birthdayUpdate = monthValueUpdate + "/" + dayValueUpdate + "/" + yearValueUpdate; 
				automaticGetAge(birthdayUpdate);
			} else { 
				$("#age_update").val("");
			}
		});   
		
		
		function automaticGetAge(birthday) {  
			myAgeValidation(birthday);
			
			function myAgeValidation(birthValue) {

				var lre = /^\s*/;
				var datemsg = "";

				var inputDate = birthValue;
				inputDate = inputDate.replace(lre, "");
				datemsg = isValidDate(inputDate);
				
				if (datemsg != "") {
					bootbox.alert(" " + datemsg);
					return;
				}
				else {
					getAge(new Date(inputDate));
				}
			}   
			
			function getAge(birth) {

				var today = new Date();
				var nowyear = today.getFullYear();
				var nowmonth = today.getMonth();
				var nowday = today.getDate();

				var birthyear = birth.getFullYear();
				var birthmonth = birth.getMonth();
				var birthday = birth.getDate();

				var age = nowyear - birthyear;
				var age_month = nowmonth - birthmonth;
				var age_day = nowday - birthday;

				if(age_month < 0 || (age_month == 0 && age_day <0)) {
					age = parseInt(age) -1;
				}
				
				$("#age").val(age);	 
				$("#age_update").val(age);	
				
			} // end function
			
			function isValidDate(dateStr) {


				var msg = "";
		
				var datePat = /^(\d{1,2})(\/|-)(\d{1,2})\2(\d{4})$/;

				var matchArray = dateStr.match(datePat); 
				if (matchArray == null) {
					msg = "Date is not in a valid format.";
					return msg;
				}

				month = matchArray[1]; 
				day = matchArray[3];
				year = matchArray[4];


				if (month < 1 || month > 12) { 
					msg = "Month must be between 1 and 12.";
					return msg;
				}

				if (day < 1 || day > 31) {
					msg = "Day must be between 1 and 31.";
					return msg;
				}

				if ((month==4 || month==6 || month==9 || month==11) && day==31) {
					msg = "Month "+month+" doesn't have 31 days!";
					return msg;
				}

				if (month == 2) { 
					var isleap = (year % 4 == 0 && (year % 100 != 0 || year % 400 == 0));
					if (day>29 || (day==29 && !isleap)) {
						msg = "February " + year + " doesn't have " + day + " days!";
						return msg;
					}
				}

				if (day.charAt(0) == '0') day= day.charAt(1);

				return msg;  
			} 
			
		} // end function
		
		
	};
	
	var telephoneSelect = function() { 
		$(document).on("click", ".select_telephone", function(e){  
			e.preventDefault();
			
			var selected = $(this).attr("id");
			var buttonValue;
			if(selected == "cellphone") { 
				buttonValue = "Cell #";  
				$(this).parent().parent().parent().parent().children("#contact_number").removeAttr("readonly").attr({ 
					placeholder: "09092700838",
					maxlength: "11"
					/*minlength: "11", 
					required: "required"*/
				}).removeClass("telephone").addClass("cellphone");     
				$("#phone_selected").val("cellphone");  
				$("#contact_number").val("").trigger("keyup");      
				
				// below is for the update        
				$(this).parent().parent().parent().parent().children("#contact_number_update").removeAttr("readonly").attr({ 
					placeholder: "09092700838",
					maxlength: "11"
					/*minlength: "11", 
					required: "required"*/
				}).removeClass("telephone").addClass("cellphone");     
				$("#phone_selected_update").val("cellphone");  
				$("#contact_number_update").val("").trigger("keyup");      
				
			} else if(selected == "telephone") { 
				buttonValue = "Tel #";  
				$(this).parent().parent().parent().parent().children("#contact_number").removeAttr("readonly").attr({  
					placeholder: "0335318343",
					maxlength: "10"
					/*minlength: "10", 
					required: "required"*/
				}).removeClass("cellphone").addClass("telephone");  
				$("#phone_selected").val("telephone");  
				$("#contact_number").val("").trigger("keyup");   
				
				// below is for the update   
				$(this).parent().parent().parent().parent().children("#contact_number_update").removeAttr("readonly").attr({  
					placeholder: "0335318343",
					maxlength: "10"
					/*minlength: "10", 
					required: "required"*/
				}).removeClass("cellphone").addClass("telephone");  
				$("#phone_selected_update").val("telephone");  
				$("#contact_number_update").val("").trigger("keyup");   
				
				
			}
			
			$(this).parent().parent().parent().children("button").children(".button_value").text(buttonValue);  
			
		});
	};
	
	
	return {
		loginFormSubmit:			loginFormSubmit, 
		bottomTabsClick:			bottomTabsClick, 
		determineAge:				determineAge, 
		telephoneSelect:			telephoneSelect
	}  
	
})()   

loginModule.loginFormSubmit();  
loginModule.bottomTabsClick();  
loginModule.determineAge();   
loginModule.telephoneSelect();

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
			angular.element(document.getElementById('student_angular_container')).scope().getUnenrolledStudents();  			
		
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
	
	var determineAgeUpdate = function() {   
		
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!
		var yyyy = today.getFullYear();   
	
		$("#update_birth_date_picker").on("dp.change", function (e) { 
		
			var birthday = $("#date_of_birth_update").val();   
			
			myAgeValidation(birthday);
			
		
			function myAgeValidation(birthValue) {

				var lre = /^\s*/;
				var datemsg = "";

				var inputDate = birthValue;
				inputDate = inputDate.replace(lre, "");
				
				datemsg = isValidDate(inputDate);
				
				if (datemsg != "") {
					bootbox.alert(" " + datemsg);
					return;
				}
				else {
					
					getAge(new Date(inputDate));
				}
			}   
			
			function getAge(birth) {

				var today = new Date();
				var nowyear = today.getFullYear();
				var nowmonth = today.getMonth();
				var nowday = today.getDate();

				var birthyear = birth.getFullYear();
				var birthmonth = birth.getMonth();
				var birthday = birth.getDate();

				var age = nowyear - birthyear;
				var age_month = nowmonth - birthmonth;
				var age_day = nowday - birthday;

				if(age_month < 0 || (age_month == 0 && age_day <0)) {
					age = parseInt(age) -1;
				}
				
				$("#age_update").val(age);
				
			} 
			
			function isValidDate(dateStr) {

				var msg = "";
	
				var datePat = /^(\d{1,2})(\/|-)(\d{1,2})\2(\d{4})$/;

				var matchArray = dateStr.match(datePat); 
				if (matchArray == null) {
					msg = "Date is not in a valid format.";
					return msg;
				}

				month = matchArray[1]; 
				day = matchArray[3];
				year = matchArray[4];


				if (month < 1 || month > 12) { 
					msg = "Month must be between 1 and 12.";
					return msg;
				}

				if (day < 1 || day > 31) {
					msg = "Day must be between 1 and 31.";
					return msg;
				}

				if ((month==4 || month==6 || month==9 || month==11) && day==31) {
					msg = "Month "+month+" doesn't have 31 days!";
					return msg;
				}

				if (month == 2) { // check for february 29th
					var isleap = (year % 4 == 0 && (year % 100 != 0 || year % 400 == 0));
					if (day>29 || (day==29 && !isleap)) {
						msg = "February " + year + " doesn't have " + day + " days!";
						return msg;
					}
				}

				if (day.charAt(0) == '0') day= day.charAt(1);

				return msg;
			}  
			
		
		});      
	};
	
	var processConfirmationCode = function() { 
		
		var codeValue = "";
		
		$("#code").on("keyup", function(){ 
			codeValue = $(this).val();
			
			delay(function(){  
				if(codeValue != "") { 
					$("#code_submit").removeAttr("disabled");
				} else { 
					$("#code_submit").attr("disabled", "disabled");
				}
			}, 1000);
		});   
		
		
		$("#verify_student_form").ajaxForm({
			dataType: 'json',
			forceSync: true,
			beforeSubmit: loading,
			success: success_status
		});      
		
		function loading() {  
			return true;
		}   
		
		function success_status(data) {
			bootbox.alert(data.message);  
			$("#verify_student_form").trigger("reset");
			angular.element($("#student_angular_container")).scope().getUnenrolledStudents(); 
		}
		
	} 

	return {
		enrollProcess: 				enrollProcess,    
		enrollModalHide:			enrollModalHide,   
		enrollModalShow:			enrollModalShow, 
		enrollmentFormSubmit:		enrollmentFormSubmit, 
		viewAcademicStatusShow:		viewAcademicStatusShow,  
		determineAgeUpdate:			determineAgeUpdate, 
		processConfirmationCode:	processConfirmationCode
		
	}
	
})()      

studentModule.enrollProcess();   
studentModule.enrollModalHide();  
studentModule.enrollModalShow();
studentModule.enrollmentFormSubmit();  
studentModule.viewAcademicStatusShow();     
// determine age update is removed
//studentModule.determineAgeUpdate();     
studentModule.processConfirmationCode();


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
			console.log("clicked");
			e.preventDefault();
			var teacherId = $(this).attr("id");  
			var teacherName = $(this).parent('td').siblings(".teacher_name").text();   

			angular.element($("#teacher_account_form")).scope().updateTeacherAccount(teacherId, teacherName);  
	
		});
	};     

	var teacherActiveAccountClick = function() {  
		$(document).on("click", ".teacher_active_account", function(e){    
		
			e.preventDefault();
			$("#teacherAccountModal").modal('show');  
			
			var teacherId = $(this).attr("id");  
			var teacherName = $(document).find(".teacher_name").text();    
			
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
			//angular.element(document.getElementById('teacher_container')).scope().getTeachers();     
			
			if(data.status) {  
				bootbox.alert("Account updated."); 
			} else {  
				bootbox.alert("Failed.");   
			}
		}
		
	};
	
	
	return {   
		teacherAccountClick:		teacherAccountClick, 
		teacherActiveAccountClick:	teacherActiveAccountClick,
		teacherAccountModalHide:	teacherAccountModalHide, 
		teacherAccountFormSubmit:	teacherAccountFormSubmit
	}

})()   

teacherModule.teacherAccountClick();     
teacherModule.teacherActiveAccountClick();    
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
				//bootbox.alert("<div style='color: #5CB85C;'><p>Please check your email for verification letter.</p></div>");
				//$("#register_enrollee_form").trigger("reset");     
				$(document).find(".for_print").children("h3").text(data.confirmation_code); 
				location.reload();
				window.print();
			}
		}
		
	};  
	
	var printContent = function() { 
		//window.print();
	}
	
	
	return {  
		submitRegister: submitRegister, 
		printContent:	printContent
	}

})()
 
registrationModule.submitRegister();  
registrationModule.printContent();
 
 
var popOverModule = (function() { 

	
	var hasStringValue = function(arrayValue) { 
		var stringCount = 0; 
		for(val in arrayValue) {  
			if(!$.isNumeric(arrayValue[val])){ 
				stringCount++;
			}	
		}   
		
		if(stringCount > 0) { 
			return true;
		} else { 
			return false;
		} 
	}
	
	var hasNumberValue = function(arrayValue) { 
	
		var numCount = 0;   
		for(val in arrayValue) { 
			if($.isNumeric(arrayValue[val])){ 
				numCount++;
			}	
		}     
		
		if(numCount > 0) { 
			return true;
		} else { 
			return false;
		} 
	};
	
	var validationPopOver = function() {  
		
		var countGood;  
		var sexValue = "";  
		
		var countGoodFromUpdate;  
		var sexValueUpdate = "";  
		
		
		$(".for_validation").on("keyup", function(){   
			var id = $(this).attr("id"); 
			if(id == "place_of_birth" || id == "present_address" || id == "school_address" || id == "address") { 
				anotherValidationOfInputValue(id);  
			} else { 
				validateInputValue(id);
			}   
			
			enableDisableEnrollmentButton();
			
		});      
		
		$(".for_validation").on("blur", function(){    
			$(document).find(".is_good").popover("hide");   
			enableDisableEnrollmentButton();
		});   

		$(document).on("change", ".validation_for_select", function(){  
			var id = $(this).attr("id");    
			var selectValue = $("#" + id).val();    
			anotherValidationOfInputValue(id);      
			
			enableDisableEnrollmentButton();
		});
		
		// below is for the event in for validation
		$('.for_validation').on('hidden.bs.popover', function () {
			var isGood = $(this).hasClass("is_good");
			if($(this).val().length > 0 && isGood === false) { 
				$(this).popover("show");   
			}    
			enableDisableEnrollmentButton();
		});     
		
		// below are for the events of select option
		$('.validation_for_select').on('hidden.bs.popover', function () {
			$(this).popover("destroy");      
			enableDisableEnrollmentButton();
		});     

		$('.validation_for_select').on('blur', function () {
			$(this).popover("destroy");     
			enableDisableEnrollmentButton();
		});         
		
		$('.validation_for_select').on('click', function () {
			$(this).popover("destroy");     
			enableDisableEnrollmentButton();
		});         
		
		$(".validation_for_phone_select").on("keyup", function(){  
			var id = $(this).attr("id");   
			validatePhoneInput(id);  
			enableDisableEnrollmentButton();
		
		});      
		
		// removes space in phone input
		$(".validation_for_phone_select").on("keypress", function(e){  
			if(e.which == 32) { 
				return false;
			}
		});         
		
		// below i will add an event for showing validation messages   
		$('.for_validation').on('shown.bs.popover', function () {
			enableDisableEnrollmentButton();
		});        
		
		$('.validation_for_select').on('shown.bs.popover', function () {
			enableDisableEnrollmentButton();
		});         

		$('.validation_for_phone_select').on('shown.bs.popover', function () {
			enableDisableEnrollmentButton();
		});          
		
		
		// i will add an event below for the selection of sex  
		$(".sex").on("change", function(){ 
			sexValue = $(this).val(); 
			enableDisableEnrollmentButton();
		});      

		$(".sex_update").on("change", function(){ 
			sexValueUpdate = $(this).val(); 
			enableDisableEnrollmentButton();  
		});      
	
		
		
		$(".wrap_inputs").mousemove(function(){ 
			enableDisableEnrollmentButton();
		});  
		
		$(".wrap_update_inputs").mousemove(function(){ 
			enableDisableEnrollmentButton();
		});
		
		
		// i will add an event for the reset in the modal add form in student view
		$("#modal_add_form").on("reset", function(){ 
			$('.for_validation').popover('destroy');
			$('.for_validation').removeClass("error_color");	 
			$('.for_validation').removeClass("success_color");   
			$('.for_validation').removeClass("is_good");    
			
			$('.validation_for_select').popover('destroy');
			$('.validation_for_select').removeClass("error_color");	 
			$('.validation_for_select').removeClass("success_color");   
			$('.validation_for_select').removeClass("is_good");    
			
			$('.validation_for_phone_select').popover('destroy');
			$('.validation_for_phone_select').removeClass("error_color");	 
			$('.validation_for_phone_select').removeClass("success_color");   
			$('.validation_for_phone_select').removeClass("is_good");  
			
		});  
		
		// i will add an event for the reset of the modal update form  
		$("#modal_update_form").on("reset", function(){ 
			$(".for_phone_update").html(phoneContentClone);	  
			
			
		});
		
		// below is for the enrollment button behavior 
		function enableDisableEnrollmentButton() { 
			
			// below is for the update 
			countGoodFromUpdate = $(document).find(".wrap_update_inputs .is_good").length;
			sexValueUpdate = $(document).find(".sex_update").val(); 
		
			
			if(countGoodFromUpdate == 19 && sexValueUpdate != "") {   
				$(document).find("#update_form_submit").removeAttr("disabled");
			} else { 
				$(document).find("#update_form_submit").attr("disabled", "disabled");    
			}  
			
			
			// below is for the add
			//countGood = $(document).find(".is_good").length;  
			countGood = $(document).find(".wrap_inputs .is_good").length; 
		
			if(countGood == 19 && sexValue != "") {   
				$(document).find("#enrollment_submit").removeAttr("disabled");
			} else { 
				$(document).find("#enrollment_submit").attr("disabled", "disabled");    
			}  
		
		}   
		
		
		// below is to validate the phone 
		function validatePhoneInput(id) {  
			delay(function(){  
			
				var inputValue = $('#' + id).val();    
				var title; 
				var content;
				var inputValue;  
				var wrapValue;    
				
				var splitValue;
				
				var inputLength = $("#" + id).attr("maxlength"); 
				
				
				if(inputValue.length > 0 && inputValue.length == inputLength) { 
					splitValue = inputValue.split("");
					if(hasStringValue(splitValue)) {   
						$('#' + id).removeClass("success_color");	
						$('#' + id).addClass("error_color");	
						title = "Error";   
						content = "String is not allowed"; 
						inputValue = "bad";    
						wrapValue = "error";
						popOverMessage(title, content, id, inputValue);
					} else {   
						title = "Good";   
						content = "Entered value is allowed"; 
						inputValue = "good";  
						wrapValue = "success";
						popOverMessage(title, content, id, inputValue);   
						$('#' + id).removeClass("error_color");	  
						$('#' + id).addClass("success_color");		   
						
					}  
					startPopOver(true, id, wrapValue);	  
				} else if(inputValue.length > 0 && inputValue.length < inputLength) {  
					splitValue = inputValue.split("");   
					if(hasStringValue(splitValue)) {   
						$('#' + id).removeClass("success_color");	
						$('#' + id).addClass("error_color");	
						title = "Error";   
						content = "Value must be " +  inputLength + " long and String is not allowed"; 
						inputValue = "bad";    
						wrapValue = "error";
						popOverMessage(title, content, id, inputValue); 
					} else { 
						$('#' + id).removeClass("success_color");	
						$('#' + id).addClass("error_color");	
						title = "Error";   
						content = "Value must be " +  inputLength + " long"; 
						inputValue = "bad";    
						wrapValue = "error";
						popOverMessage(title, content, id, inputValue); 
					} 
					
					startPopOver(true, id, wrapValue);	  
				} else { 
					$('#' + id).popover('destroy');
					$('#' + id).removeClass("error_color");	 
					$('#' + id).removeClass("success_color");   
					$('#' + id).removeClass("is_good");
				}
				
			}, 1000);
		}
	   
		// below is the validation that allows the number 
		function anotherValidationOfInputValue(id) { 
			delay(function(){   
			
				var inputValue = $('#' + id).val();    
				var title; 
				var content;
				var inputValue;  
				var wrapValue;   
				
				if(inputValue.length > 0) { 
					title = "Good";   
					content = "Entered value is allowed"; 
					inputValue = "good";  
					wrapValue = "success";
					popOverMessage(title, content, id, inputValue);   
					$('#' + id).removeClass("error_color");	  
					$('#' + id).addClass("success_color");   

					startPopOver(true, id, wrapValue);	  
					
				} else {  
					$('#' + id).popover('destroy');
					$('#' + id).removeClass("success_color");	 
					$('#' + id).removeClass("is_good");
				}
				
			}, 1000);  
		}
		
		// below is the validation that does not allow the number
		function validateInputValue(id) { 
			
			delay(function(){  
				
				var inputValue = $('#' + id).val();    
				var title; 
				var content;
				var inputValue;  
				var wrapValue;
				
				if(inputValue.length > 0) { 
					var splitValue = inputValue.split("");
					if(hasNumberValue(splitValue)) {   
						$('#' + id).removeClass("success_color");	
						$('#' + id).addClass("error_color");	
						title = "Error";   
						content = "Number is not allowed"; 
						inputValue = "bad";    
						wrapValue = "error";
						popOverMessage(title, content, id, inputValue);
					} else { 
						title = "Good";   
						content = "Entered value is allowed"; 
						inputValue = "good";  
						wrapValue = "success";
						popOverMessage(title, content, id, inputValue);   
						$('#' + id).removeClass("error_color");	  
						$('#' + id).addClass("success_color");						
					}  
					startPopOver(true, id, wrapValue);	  
				} else { 
					//startPopOver(false, id);	    
					$('#' + id).popover('destroy');
					$('#' + id).removeClass("error_color");	 
					$('#' + id).removeClass("success_color");   
					$('#' + id).removeClass("is_good");
				}
				
			}, 1000 );   
		}   
		
		function popOverMessage(title, content, id, inputValue) {  
		
			var titleLength = $('#' + id).attr("title").length;  
			if(titleLength == 0) { 
				$('#' + id).attr("data-original-title", title);   
				$('#' + id).attr("data-content", content);
			} else { 
				$('#' + id).attr("title", title);   
				$('#' + id).attr("data-content", content);
			}   
			
			if(inputValue == "good") { 
				$('#' + id).addClass("is_good");  
				countGood++;
			} else if(inputValue == "bad") { 
				$('#' + id).removeClass("is_good");  
				countGood--;
			}
			
		}
		
		function startPopOver(pop, id, wrapValue) { 
			if(pop) { 
				$('#' + id).popover('show');   

				if(wrapValue == "success") {  
					$("#" + id).next(".popover").removeClass("error_wrap"); 
					$("#" + id).next(".popover").addClass("success_wrap");
				} else if(wrapValue == "error") { 
					$("#" + id).next(".popover").removeClass("success_wrap"); 
					$("#" + id).next(".popover").addClass("error_wrap");
				} 
				
			} else { 
				$('#' + id).popover('hide');     
			}
		}
		
	};
	
	
	return {  
		validationPopOver:			validationPopOver
	}  
	
})()   

popOverModule.validationPopOver();  


// below is for the home module
var homeModule = (function() { 

	var newsValue = "";

	var inputNews = function() { 
		
		$("#news").keyup(function(){ 
			var newsValue = $(this).val();
			delay(function(){ 
				if(newsValue != "") { 
					$("#news_submit").removeAttr("disabled");
				} else { 
					$("#news_submit").attr("disabled", "disabled");
				}
			}, 1000);
		});    
		
		
		$("#add_news_form").ajaxForm({
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
				bootbox.alert("News added successfully");
			} else { 
				bootbox.alert("Failed");
			}
			
			$("#add_news_form").trigger("reset");  
			
			$("#news_submit").attr("disabled", "disabled");  
			
			// get all the news via angular  
			angular.element($("#home_angular_container")).scope().getNews(); 
			
		}  
	
	};  
	
	var deleteNews = function() { 
		
		$(document).on("click", ".delete_news_link", function(e){ 
			e.preventDefault();
			var deleteNewsLink = $(this).attr("href");     
			
			$.get(deleteNewsLink, function(data){
				var datas = eval('msg=' + data);        
				if(datas.status) {   
					bootbox.alert("Deleted");
				} else {  
					bootbox.alert("Deletion failed");
				}    
			});  
			
			// get all the news via angular  
			angular.element($("#home_angular_container")).scope().getNews(); 
			
		});  
		
		
		
	};
	
	var showUpdateNews = function() {   
		$(document).on("click", ".show_update", function(e){ 
			e.preventDefault();  
			
			var updateLink = $(this).attr("id");    
		
			//get all the news via angular  
			angular.element($("#getUpdateNewsModal")).scope().getNewsUpdateContent(updateLink); 
			
			
		});
	};	
	
	
	var updateNews = function() { 
		
		$("#news_update_form").ajaxForm({
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
				bootbox.alert("News updated successfully");
			} else { 
				bootbox.alert("Failed");
			}
			
			// get all the news via angular  
			angular.element($("#home_angular_container")).scope().getNews();   
			
		}  
	};
	
	return { 
		inputNews:			inputNews, 
		deleteNews:			deleteNews, 
		showUpdateNews:		showUpdateNews, 
		updateNews:			updateNews
	}  
	
})()       

homeModule.inputNews();   
homeModule.deleteNews();  
homeModule.showUpdateNews();  
homeModule.updateNews();

















    





 


























