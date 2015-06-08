"use strict";

var controllers = angular.module('cabatuan.controllers', []);

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
		
		var enrolledStudentUrl = fullUrl.replace("students_controller", "enrolled_student_controller");
		var i; 
		for(i = 0; i < data.students.length; i++) {
			if(data.students[i].enrolled_student_id != null) {
				var enrolledStudentLink = enrolledStudentUrl + "?enrolled_student_id=" + data.students[i].enrolled_student_id;
				data.students[i].status = "<a href='" + enrolledStudentLink +"'>(Enrolled) View Academic Status</a>";
			} else {
				data.students[i].status = '<button type="button" class="my_button btn btn-info enroll_button" data-toggle="modal" data-target="#enrollModal"><span class="glyphicon glyphicon-education" aria-hidden="true"></span> Enroll</button>';                                                 
			} 
		}
	
		$scope.students = data.students;     
		var a; 
		for(a = 0; a < $scope.students.length; a++) {  
			$scope.students[a].status = $sce.trustAsHtml($scope.students[a].status);
		}

	});   
	
	$scope.getStudents = function() {
		$http.get(studentUrl).success(function(data){
		
			var enrolledStudentUrl = fullUrl.replace("students_controller", "enrolled_student_controller");
			var i; 
			for(i = 0; i < data.students.length; i++) {
				if(data.students[i].enrolled_student_id != null) {
					var enrolledStudentLink = enrolledStudentUrl + "?enrolled_student_id=" + data.students[i].enrolled_student_id;
					data.students[i].status = "<a href='" + enrolledStudentLink +"'>(Enrolled) View Academic Status</a>";
				} else {
					data.students[i].status = '<button type="button" class="my_button btn btn-info enroll_button" data-toggle="modal" data-target="#enrollModal"><span class="glyphicon glyphicon-education" aria-hidden="true"></span> Enroll</button>';                                                 
				} 
			}
		
			$scope.students = data.students;     
			var a; 
			for(a = 0; a < $scope.students.length; a++) {  
				$scope.students[a].status = $sce.trustAsHtml($scope.students[a].status);
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

controllers.controller('enrolledStudentController', function($scope, $sce, $http){
	
	var protocol = window.location.protocol + "//" + window.location.host;
	var fullUrl = protocol + window.location.pathname + window.location.search;   
	
	var enrolledStudentUrl = fullUrl.replace("enrolled_student_controller", "enrolled_student_controller/get_student_academic_data");
	
	$scope.academicDatas;      
	$http.get(enrolledStudentUrl).success(function(data){
		$scope.academicDatas = data.academic_datas;   
	});
	
	
});

controllers.controller('test', function($scope, $sce, $http){
	
	var protocol = window.location.protocol + "//" + window.location.host;
	var fullUrl = protocol + window.location.pathname + window.location.search;   
	
	var testUrl = fullUrl + "/get_sample_data";
	$scope.sample_content;      
	
	$http.get(testUrl).success(function(data){
		$scope.sample_content = $sce.trustAsHtml(data.sample_content);        
	});  
	
	
});












