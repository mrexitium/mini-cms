<?php 

$config = [
	'login' => [
		[
			'field' => 'username',
			'label' => 'Username',
			'rules' => 'required',
		],
		[
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required',
		]
	],
	'create' => [
		[
			'field' => 'title',
			'label' => 'Page Title',
			'rules' => 'required',
		],
		[
			'field' => 'content',
			'label' => 'Content',
			'rules' => 'required',
		]
	],
];