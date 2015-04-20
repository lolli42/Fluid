<?php

/*
 * EXAMPLE: Variables usage
 *
 * This example shows you how to use variables in
 * the Fluid template language and illustrates
 * how dynamic variable access works.
 */

require __DIR__ . '/include/view_init.php';

// Assigning View variables: we assign variables that will be used by the
// expressions we build in this example.
$dynamic1 = 'DYN1'; // used as dynamic part when accessing other variables
$dynamic2 = 'DYN2'; // used as dynamic part when accessing other variables

// In this example we assign all our variables in one array. Alternative is
// to repeatedly call $view->assign('name', 'value').
$view->assignMultiple(array(
	// Casting types
	'types' => array(
		'csv' => 'one,two',
		'aStringWithNumbers' => '132 a string',
		'anArray' => array('one', 'two'),
		'typeNameInteger' => 'integer'
	),
	// The variables we will use as dynamic part names:
	'dynamic1' => $dynamic1,
	'dynamic2' => $dynamic2,
	// Strings we will be accessing dynamically:
	'stringwith' . $dynamic1 . 'part' => 'String using $dynamic1',
	'stringwith' . $dynamic2 . 'part' => 'String using $dynamic2',
	// Arrays we will be accessing dynamically:
	'array' => array(
		'fixed' => 'Fixed key in $array[fixed]',
		// A numerically indexed array which we will access directly.
		'numeric' => array(
			'foo',
			'bar'
		),
		$dynamic1 => 'Dynamic key in $array[$dynamic1]',
		$dynamic2 => 'Dynamic key in $array[$dynamic2]',
	)
));

// Assigning the template path and filename to be rendered. Doing this overrides
// resolving normally done by the TemplatePaths and directly renders this file.
$view->getTemplatePaths()->setTemplatePathAndFilename(__DIR__ . '/Resources/Private/Singles/Variables.html');

// Rendering the View: plain old rendering of single file, no bells and whistles.
$output = $view->render();

// Output using helper from view_init.php
example_output($output);
