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


controllers.controller('teacherSubject', function($scope, $http){
	
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
	
});


controllers.controller('teacherSubjectSection', function($scope, $http){
	
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
	
});
















