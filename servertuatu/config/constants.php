<?php

return [
	'functions_scale' => [1,3,5],
	'evaluation' => [
		'skills' => "skills",
		'functions' => "functions"
	],
	'evaluators_roles' => ['Autoevaluación','Equipo','Jefe'],
	'evaluators_colors' => [
		'Autoevaluación'=>'window.chartColors.red',
		'Equipo'=>'window.chartColors.purple',
		'Jefe'=>'window.chartColors.orange'
	],
	'evaluators_roles_functions' => [
		'Autoevaluación' => 0.3,
		'Jefe' => 0.7
	],
	'job_title_type' => [
		'operativos' => "Operativos",
		'misionales' => "Misionales",
		'estrategicos' => "Estratégicos"
	],
	'skills' => [
		'conocimiento' => "Conocimiento",
		'comunicacion' => "Comunicación",
		'relaciones' => "Relaciones Interpersonales",
		'liderazgo' => "Liderazgo",
		'resultados' => "Orientación a Resultados",
		'actitud' => "Actitud Glüker",
		'velocidad' => "Velocidad",
		'transformacion' => "Transformación"	
	],
];

//Config::get('constants.functions_scale');