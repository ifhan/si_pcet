<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['module_config'] = array(
    	'menus'	=> array(
            'loireatlantique'	=> 'contacts/loireatlantique/menu',
            'maineetloire'	=> 'contacts/maineetloire/menu',
            'mayenne'	=> 'contacts/mayenne/menu',
            'sarthe'	=> 'contacts/sarthe/menu',
            'vendee'	=> 'contacts/vendee/menu'
	),
	'description'	=> 'Contacts de la collectivité',
	'name'		=> 'Contacts',
	'version'		=> '0.0.1',
	'author'		=> 'Ronan Vignard',
    	'menu_topic'	=> array(
            'loireatlantique'		=>'1. Acteurs',
            'maineetloire'		=>'1. Acteurs',
            'mayenne'		=>'1. Acteurs',
            'sarthe'		=>'1. Acteurs',
            'vendee'		=>'1. Acteurs'
	)
);
