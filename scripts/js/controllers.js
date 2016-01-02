"use strict";

var controllers = angular.module('cabatuan.controllers', []);

// below are the controllers for the admin account 
controllers.controller('curriculumYear', function($scope, $http){
	
	var protocol = window.location.protocol + "//" + window.location.host;
	var fullUrl = protocol + window.location.pathname + window.location.search;   
	
	var curriculumYearUrl = fullUrl + "/get_curriculum";
	$scope.curriculums;      
	
	$http.get(curriculumYearUrl).success(function(data){
		$scope.curriculums = data.curriculums;     
	});  
	
	$scope.getCurriculums = function() {
		$http.get(curriculumYearUrl).success(function(data){
			$scope.curriculums = data.curriculums;     
		});  
	};
	
});

controllers.controller('curriculumSubject', function($scope, $http){
	
	var protocol = window.location.protocol + "//" + window.location.host;
	var fullUrl = protocol + window.location.pathname + window.location.search;   
	
	var curriculumSubjectUrl = fullUrl.replace("curriculum_subjects_controller", "curriculum_subjects_controller/get_curriculum_subject");

	$scope.curriculumSubjects;      
	
	$http.get(curriculumSubjectUrl).success(function(data){
		$scope.curriculumSubjects = data.curriculum_subjects;           
	}); 
	
	$scope.getCurriculumSubjects = function() {
		$http.get(curriculumSubjectUrl).success(function(data){
			$scope.curriculumSubjects = data.curriculum_subjects;     
		});  
	};
	
	
});

controllers.controller('curriculumSection', function($scope, $http){
	
	var protocol = window.location.protocol + "//" + window.location.host;
	var fullUrl = protocol + window.location.pathname + window.location.search;   
	
	var curriculumSectionUrl = fullUrl.replace("curriculum_sections_controller", "curriculum_sections_controller/get_curriculum_section");

	$scope.curriculumSections;      
	
	$http.get(curriculumSectionUrl).success(function(data){
		$scope.curriculumSections = data.curriculum_sections;         
	}); 
	
	$scope.getCurriculumSections = function() {
		$http.get(curriculumSectionUrl).success(function(data){
			$scope.curriculumSections = data.curriculum_sections;         
		}); 
	};
	
});

controllers.controller('teacher', function($scope, $http){
	
	var protocol = window.location.protocol + "//" + window.location.host;
	var fullUrl = protocol + window.location.pathname + window.location.search;   
	
	var teacherUrl = fullUrl + "/get_teacher"; 

	$scope.teachers;      
	
	$http.get(teacherUrl).success(function(data){
	
		$scope.teachers = data.teachers;  

	}); 
	
	$scope.getTeachers = function() {
		$http.get(teacherUrl).success(function(data){
			$scope.teachers = data.teachers;
		}); 
	};

});       

controllers.controller('teacherAccount', function($scope, $http){    
	
	var protocol = window.location.protocol + "//" + window.location.host;
	var fullUrl = protocol + window.location.pathname + window.location.search;     
	
	$scope.teacherId;  
	$scope.teacherName;   
	$scope.username; 
	$scope.password; 
	
	$scope.updateTeacherAccount = function(teacherId, teacherName) {     
	
		var getTeacherAccountUrl = fullUrl + "/get_teacher_account_data?teacher_id=" + teacherId;   
		
		$http.get(getTeacherAccountUrl).success(function(data){
			$scope.username = data.teacher_account[0].username;   
			$scope.password = data.teacher_account[0].password;     
		});  
		
		$scope.$apply(function(){   
			
			$scope.teacherId = teacherId;      	
			$scope.teacherName = teacherName;			

		});
		
		$('#teacherAccountModal').modal('show');
	};        
	
});   

controllers.controller('teacherSubject', function($scope, $http, $sce){
	
	var protocol = window.location.protocol + "//" + window.location.host;
	var fullUrl = protocol + window.location.pathname + window.location.search;   
	
	var teacherSubjectUrl = fullUrl.replace("teacher_subjects_controller", "teacher_subjects_controller/get_teacher_subjects");
	$scope.teacherSubjects;      
	$http.get(teacherSubjectUrl).success(function(data){
		$scope.teacherSubjects = data.teacher_subjects;   
	});   
	
	$scope.getTeacherSubjects = function() {
		$http.get(teacherSubjectUrl).success(function(data){
			$scope.teacherSubjects = data.teacher_subjects;     		
		}); 
	};          
	
	
	// below is for the curriculum subjects of a teacher 
	var getCurriculumSubjectsUrl = fullUrl.replace("teacher_subjects_controller", "teacher_subjects_controller/get_curriculum_subjects_via_angular");                   
	$scope.curriculumSubjects;
	$http.get(getCurriculumSubjectsUrl).success(function(data){
		$scope.curriculumSubjects = $sce.trustAsHtml(data.curriculum_subjects);    
	});  
	
	$scope.getTeacherCurriculumSubjects = function() {
		$http.get(getCurriculumSubjectsUrl).success(function(data){
			$scope.curriculumSubjects = $sce.trustAsHtml(data.curriculum_subjects);  
		});      
	};  
	
});  

controllers.controller('teacherSubjectSection', function($scope, $http, $sce){
	
	var protocol = window.location.protocol + "//" + window.location.host;
	var fullUrl = protocol + window.location.pathname + window.location.search;   
	
	var teacherSubjectSectionUrl = fullUrl.replace("teacher_subject_sections_controller", "teacher_subject_sections_controller/get_teacher_subject_section");               
	$scope.teacherSubjectSections;      
	$http.get(teacherSubjectSectionUrl).success(function(data){
		$scope.teacherSubjectSections = data.teacher_subject_sections;       
	});    
	
	$scope.getTeacherSubjectSections = function() {
		$http.get(teacherSubjectSectionUrl).success(function(data){
			$scope.teacherSubjectSections = data.teacher_subject_sections;       
		}); 
	};   
	
	var curriculumSectionUrl = fullUrl.replace("teacher_subject_sections_controller", "teacher_subject_sections_controller/get_curriculum_sections_via_angular");             
	$scope.curriculumSections;    
	$http.get(curriculumSectionUrl).success(function(data){
		$scope.curriculumSections = $sce.trustAsHtml(data.curriculum_sections);         
	});    
	
	$scope.getTeacherSubjectCurriculumSections = function() {
		$http.get(curriculumSectionUrl).success(function(data){
			$scope.curriculumSections = $sce.trustAsHtml(data.curriculum_sections);         
		});    
	};   
	
});     

controllers.controller('student', function($scope, $http, $sce){
	
	var protocol = window.location.protocol + "//" + window.location.host;
	var fullUrl = protocol + window.location.pathname + window.location.search;   
	
	// below is for the students 
	var studentUrl = fullUrl + "/get_student_via_standard_model"; 
	$scope.students;      
	
	$http.get(studentUrl).success(function(data){
		
		var i; 
		for(i = 0; i < data.students.length; i++) {
			if(data.students[i].enrolled_student_id != null) {
				data.students[i].status = '<button type="button" class="my_button btn btn-info enroll_button" data-toggle="modal" data-target="#enrollModal"><span class="glyphicon glyphicon-education" aria-hidden="true"></span> Enroll</button>';                  
				data.students[i].viewAcademic = '<button type="button" id="'+ data.students[i].id +'" class="view_academic my_button btn btn-info enroll_button" data-toggle="modal" data-target="#academicStatusModal"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> View Academic Status</button>';                           
			} else {
				data.students[i].status = '<button type="button" class="my_button btn btn-info enroll_button" data-toggle="modal" data-target="#enrollModal"><span class="glyphicon glyphicon-education" aria-hidden="true"></span> Enroll</button>';                                                 
				data.students[i].viewAcademic = "<p>(Not Enrolled)</p>";
			} 
		}
	
		$scope.students = data.students;     
		var a; 
		for(a = 0; a < $scope.students.length; a++) {  
			$scope.students[a].status = $sce.trustAsHtml($scope.students[a].status);   
			$scope.students[a].viewAcademic = $sce.trustAsHtml($scope.students[a].viewAcademic);
		}       
		
		//console.log($scope.students);
		
	});   
	
	$scope.getStudents = function() {
		$http.get(studentUrl).success(function(data){
			
			//console.log("student is get..");
			
			var i; 
			for(i = 0; i < data.students.length; i++) {
				if(data.students[i].enrolled_student_id != null) {
					data.students[i].status = '<button type="button" class="my_button btn btn-info enroll_button" data-toggle="modal" data-target="#enrollModal"><span class="glyphicon glyphicon-education" aria-hidden="true"></span> Enroll</button>';                  
					data.students[i].viewAcademic = '<button type="button" id="'+ data.students[i].id +'" class="view_academic my_button btn btn-info enroll_button" data-toggle="modal" data-target="#academicStatusModal"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> View Academic Status</button>';                           
				} else {
					data.students[i].status = '<button type="button" class="my_button btn btn-info enroll_button" data-toggle="modal" data-target="#enrollModal"><span class="glyphicon glyphicon-education" aria-hidden="true"></span> Enroll</button>';                                                 
					data.students[i].viewAcademic = "<p>(Not Enrolled)</p>";
				} 
			}
		
			$scope.students = data.students;     
			var a; 
			for(a = 0; a < $scope.students.length; a++) {  
				$scope.students[a].status = $sce.trustAsHtml($scope.students[a].status);   
				$scope.students[a].viewAcademic = $sce.trustAsHtml($scope.students[a].viewAcademic);
			}   
			
		
		}); 
	};   
	
	// below is get the curriculum years    
	$scope.curriculums;  
	
	var curriculumYearsUrl = fullUrl.replace("students_controller", "curriculum_controller/get_curriculum");
	$http.get(curriculumYearsUrl).success(function(data){
		$scope.curriculums = data.curriculums;        
	});     
	
	
	// below is for the enrollment process     
	// curriculum change 
	$scope.curriculumChange = function() {
		
		if($scope.curriculum_id == "") {
			$("#section_selection").attr("disabled", "");  
		} else {
			$("#section_selection").removeAttr("disabled");    
			var curriculumSectionsUrl = fullUrl + "/get_curriculum_sections_by_curriculum_id?curriculum_id=" + $scope.curriculum_id; 
			$http.get(curriculumSectionsUrl).success(function(data){  
				$scope.curriculumSections = data.curriculum_sections;      
			});
		}
	};       
	
	
});

controllers.controller('studentAccount', function($scope, $http){    
	
	var protocol = window.location.protocol + "//" + window.location.host;
	var fullUrl = protocol + window.location.pathname + window.location.search;     
	
	$scope.studentId;  
	$scope.studentName;   
	$scope.username; 
	$scope.password; 
	
	$scope.updateStudentAccount = function(studentId, studentName) {     
	
		var getStudentAccountUrl = fullUrl + "/get_student_account_data?student_id=" + studentId;   
		
		$http.get(getStudentAccountUrl).success(function(data){
			$scope.username = data.student_account[0].username;   
			$scope.password = data.student_account[0].password;     
		});
		
		$scope.$apply(function(){   
			$scope.studentId = studentId;      	
			$scope.studentName = studentName;			
		});
		
		$('#StudentAccountModal').modal('show');
	};        
	
});  

controllers.controller('enrolledStudentController', function($scope, $sce, $http){
	
	var protocol = window.location.protocol + "//" + window.location.host;
	var fullUrl = protocol + window.location.pathname + window.location.search;   
	
	var enrolledStudentUrl = fullUrl.replace("enrolled_student_controller", "enrolled_student_controller/get_student_academic_data");
	
	$scope.academicDatas;      
	$http.get(enrolledStudentUrl).success(function(data){
		$scope.academicDatas = data.academic_datas;   
	});
	
	
});   

controllers.controller('academic', function($scope, $sce, $http){
	
	var protocol = window.location.protocol + "//" + window.location.host;
	var fullUrl = protocol + window.location.pathname + window.location.search;   
	
	$scope.getStudentEnrolledAcademicData = function(studentId) {  
	
		var studentEnrolledAcademicListUrl = fullUrl + "/list_student_enrolled_academic?student_id=" + studentId;
		
		$scope.listAcademics;
		
		$http.get(studentEnrolledAcademicListUrl).success(function(data){
			
			
			var viewLinkUrl = fullUrl.replace("students_controller", "enrolled_student_controller");
			
			var i;
			for(i = 0; i < data.list_academics.length; i++) {
				data.list_academics[i].viewLink = '<a href="'+ viewLinkUrl +'?enrolled_student_id=' + data.list_academics[i].id +'"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>';
			}
			
			$scope.listAcademics = data.list_academics; 	     
		
			var a; 
			for(a = 0; a < $scope.listAcademics.length; a++) {  
				$scope.listAcademics[a].viewLink = $sce.trustAsHtml($scope.listAcademics[a].viewLink);
			}
			
		});
		
	};  
	

});

controllers.controller('sectionStudents', function($scope, $sce, $http){   

	var protocol = window.location.protocol + "//" + window.location.host;
	var fullUrl = protocol + window.location.pathname + window.location.search;   
	
	var sectionStudentsUrl = fullUrl.replace("section_students_controller", "section_students_controller/get_student_enrolled_school_year");

	$scope.schoolYears;      
	
	$http.get(sectionStudentsUrl).success(function(data){
		$scope.schoolYears = data.school_years;
	});     
	

});   

controllers.controller('viewStudents', function($scope, $sce, $http){
	
	var protocol = window.location.protocol + "//" + window.location.host;
	var fullUrl = protocol + window.location.pathname + window.location.search;   
	
	$scope.students;
	$scope.schoolYear = "hi";    
	
	$scope.viewStudent = function(sectionId, schoolYear, subjectId) {  
		
		$scope.schoolYear = schoolYear;  
		//var getSectionStudentsUrl = protocol + window.location.pathname + "/get_section_students_by_section_id_and_school_year?section_id=" + sectionId + "&school_year=" + schoolYear;
		var getSectionStudentsUrl = protocol + window.location.pathname + "/get_section_students_by_section_id_school_year_and_subject_id?section_id=" + sectionId + "&school_year=" + schoolYear + "&subject_id=" + subjectId;
		
		$http.get(getSectionStudentsUrl).success(function(data){
			$scope.students = data.section_students;     			
			$('#sectionStudentsModal').modal('show');
		});

	};
	
});
 
 // below are the controllers for the teacher account
controllers.controller('teacherAccountController', function($scope, $sce, $http){
	
	var protocol = window.location.protocol + "//" + window.location.host;
	var fullUrl = protocol + window.location.pathname + window.location.search;       
	
	var teacherSubjectUrl = fullUrl + "/get_teacher_subjects";
	
	$scope.teacherSubjects;      
	$http.get(teacherSubjectUrl).success(function(data){  
		$scope.teacherSubjects = data.teacher_subjects;   
	});   
	
});

controllers.controller('teacherAccountSubjectSection', function($scope, $sce, $http){
	
	var protocol = window.location.protocol + "//" + window.location.host;
	var fullUrl = protocol + window.location.pathname + window.location.search;   
	
	var teacherSubjectSectionUrl = fullUrl.replace("teacher_account_subject_sections_controller", "teacher_account_subject_sections_controller/get_teacher_subject_section");               
	$scope.teacherSubjectSections;      
	$http.get(teacherSubjectSectionUrl).success(function(data){
		$scope.teacherSubjectSections = data.teacher_subject_sections;       
	});   
	
});

controllers.controller('teacherAccountSectionStudents', function($scope, $sce, $http){
	
	var protocol = window.location.protocol + "//" + window.location.host;
	var fullUrl = protocol + window.location.pathname + window.location.search;   
	
	var sectionStudentsUrl = fullUrl.replace("teacher_account_section_students_controller", "teacher_account_section_students_controller/get_student_enrolled_school_year");

	$scope.schoolYears;      
	
	$http.get(sectionStudentsUrl).success(function(data){
		$scope.schoolYears = data.school_years;
	});     
	
});  

controllers.controller('viewTeacherStudents', function($scope, $sce, $http){
	
	var protocol = window.location.protocol + "//" + window.location.host;
	var fullUrl = protocol + window.location.pathname + window.location.search;   
	
	$scope.students;
	$scope.schoolYear = "hi";    
	
	$scope.viewStudent = function(sectionId, schoolYear, subjectId) {  
		$scope.schoolYear = schoolYear;  
		
		var getSectionStudentsUrl = protocol + window.location.pathname + "/get_section_students_by_section_id_school_year_and_subject_id?section_id=" + sectionId + "&school_year=" + schoolYear + "&subject_id=" + subjectId;
		
		$http.get(getSectionStudentsUrl).success(function(data){
			$scope.students = data.section_students;     			
			$('#sectionStudentsModal').modal('show');      
			
			console.log($scope.students);
		});
	};      
	
	
	
});

// below are the controllers for the student account   

controllers.controller('studentAccountController', function($scope, $sce, $http){
	
	var protocol = window.location.protocol + "//" + window.location.host;
	var fullUrl = protocol + window.location.pathname + window.location.search;       
	
	// below is for the students 
	var studentUrl = fullUrl + "/get_student_via_standard_model"; 
	$scope.students;      
	
	$http.get(studentUrl).success(function(data){
		
		var i; 
		for(i = 0; i < data.students.length; i++) {
			if(data.students[i].enrolled_student_id != null) {
				data.students[i].status = '<button type="button" class="my_button btn btn-info enroll_button" data-toggle="modal" data-target="#enrollModal"><span class="glyphicon glyphicon-education" aria-hidden="true"></span> Enroll</button>';                  
				data.students[i].viewAcademic = '<button type="button" id="'+ data.students[i].id +'" class="view_academic my_button btn btn-info enroll_button" data-toggle="modal" data-target="#academicStatusModal"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> View Academic Status</button>';                           
			} else {
				data.students[i].status = '<button type="button" class="my_button btn btn-info enroll_button" data-toggle="modal" data-target="#enrollModal"><span class="glyphicon glyphicon-education" aria-hidden="true"></span> Enroll</button>';                                                 
				data.students[i].viewAcademic = "<p>(Not Enrolled)</p>";
			} 
		}
	
		$scope.students = data.students;     
		var a; 
		for(a = 0; a < $scope.students.length; a++) {  
			$scope.students[a].status = $sce.trustAsHtml($scope.students[a].status);   
			$scope.students[a].viewAcademic = $sce.trustAsHtml($scope.students[a].viewAcademic);
		}   
		
	});   
	
});   

controllers.controller('studentAccountAcademic', function($scope, $sce, $http){
	
	var protocol = window.location.protocol + "//" + window.location.host;
	var fullUrl = protocol + window.location.pathname + window.location.search;   
	
	$scope.getStudentEnrolledAcademicData = function(studentId) {  
	
		var studentEnrolledAcademicListUrl = fullUrl + "/list_student_enrolled_academic?student_id=" + studentId;
		
		$scope.listAcademics;
		
		$http.get(studentEnrolledAcademicListUrl).success(function(data){
			
			
			var viewLinkUrl = fullUrl.replace("student_account_controller", "enrolled_student_account_controller");
			
			var i;
			for(i = 0; i < data.list_academics.length; i++) {
				data.list_academics[i].viewLink = '<a href="'+ viewLinkUrl +'?enrolled_student_id=' + data.list_academics[i].id +'"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>';
			}
			
			$scope.listAcademics = data.list_academics; 	     
		
			var a; 
			for(a = 0; a < $scope.listAcademics.length; a++) {  
				$scope.listAcademics[a].viewLink = $sce.trustAsHtml($scope.listAcademics[a].viewLink);
			}
			
		});
		
	};  
	

});

controllers.controller('currentEnrolledStudentController', function($scope, $sce, $http){
	
	var protocol = window.location.protocol + "//" + window.location.host;
	var fullUrl = protocol + window.location.pathname + window.location.search;   
	
	var enrolledStudentUrl = fullUrl.replace("enrolled_student_account_controller", "enrolled_student_account_controller/get_student_academic_data");
	
	$scope.academicDatas;      
	$http.get(enrolledStudentUrl).success(function(data){
		$scope.academicDatas = data.academic_datas;   
	});
	
	
});

// below is for the testing purposes
controllers.controller('test', function($scope, $sce, $http){
	
	var protocol = window.location.protocol + "//" + window.location.host;
	var fullUrl = protocol + window.location.pathname + window.location.search;   
	
	var testUrl = fullUrl + "/get_sample_data";
	$scope.sample_content;      
	
	$http.get(testUrl).success(function(data){
		$scope.sample_content = $sce.trustAsHtml(data.sample_content);        
	});  
	
});












