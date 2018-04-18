<?php

/**
 * Palettes
 */
foreach( $GLOBALS['TL_DCA']['tl_module']['palettes'] as $name => $palette )
{
	if ($name == '__selector__')
		continue;

	$GLOBALS['TL_DCA']['tl_module']['palettes'][$name] = str_replace('{expert_legend:hide}', '{expert_legend:hide},alias', $palette, $count);

	if (!$count)
	{
		$GLOBALS['TL_DCA']['tl_module']['palettes'][$name] .= ';{expert_legend:hide},alias;';
	}
}

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
