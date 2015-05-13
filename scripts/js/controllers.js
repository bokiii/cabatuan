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
	
	
	/*var studentAcademicUrl = fullUrl.replace("manage_students", "get_student_academic_data_group_by_school_year_and_term_id");
	
	$scope.subjects;
	
	$http.get(studentAcademicUrl).success(function(data){
		$scope.subjects = data.subjects; 	    
	});
	
	$scope.getSubjects = function() {
		$http.get(studentAcademicUrl).success(function(data){
			$scope.subjects = data.subjects;     
		});
	};*/  
	
	
});

























