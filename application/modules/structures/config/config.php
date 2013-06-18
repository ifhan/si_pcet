<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['module_config'] = array(
        'menus'	=> array(
            'loireatlantique'	=> 'structures/loireatlantique/menu',
            'maineetloire'	=> 'structures/maineetloire/menu',
            'mayenne'	=> 'structures/mayenne/menu',
            'sarthe'	=> 'structures/sarthe/menu',
            'vendee'	=> 'structures/vendee/menu'
	),
	'description'	=> 'Collectivit&eacute;s porteuses de PCET',
	'name'		=> '1. Collectivit&eacute;s',
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
