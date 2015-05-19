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














