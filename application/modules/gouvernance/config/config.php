<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['module_config'] = array(
    	'menus'	=> array(
            'loireatlantique'	=> 'gouvernance/loireatlantique/menu',
            'maineetloire'	=> 'gouvernance/maineetloire/menu',
            'mayenne'	=> 'gouvernance/mayenne/menu',
            'sarthe'	=> 'gouvernance/sarthe/menu',
            'vendee'	=> 'gouvernance/vendee/menu'
	),    
	'description'	=> 'Suivi de la gouvernance des PCET',
	'name'		=> '8. Gouvernance',
	'version'		=> '0.0.1',
	'author'		=> 'Anthony Tolone',
        'menu_topic'	=> array(
            'loireatlantique'		=>'1. Acteurs',
            'maineetloire'		=>'1. Acteurs',
            'mayenne'		=>'1. Acteurs',
            'sarthe'		=>'1. Acteurs',
            'vendee'		=>'1. Acteurs'
	)    
);
