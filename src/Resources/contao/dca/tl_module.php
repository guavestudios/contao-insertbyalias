<?php

/**
 * Palettes
 */

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['alias'] = array
(
	'label'                   => array("Alias","Modulealias"),
	'search'                  => true,
	'inputType'               => 'text',
	'sql'                     => "varchar(255) NOT NULL default ''",
	'eval' 					  => array('mandatory' => false, 'tl_class'=>'long clr'),
);
