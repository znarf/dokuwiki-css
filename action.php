<?php

if(!defined('DOKU_INC')) die();

if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');

require_once(DOKU_PLUGIN.'action.php');

class action_plugin_css extends DokuWiki_Action_Plugin {

	function getInfo()
	{
		return array(
			'author' => 'h6e.net',
			'email'  => 'contact@h6e.net',
			'date'   => '2009-06-23',
			'name'   => 'Custom CSS Editor',
			'desc'   => 'Add easily custom CSS rules',
			'url'    => 'http://h6e.net/dokuwiki/plugins/css',
		);
	}

	function register(&$controller)
	{
		$controller->register_hook('TPL_METAHEADER_OUTPUT',
			'BEFORE',
			$this,
			'tpl_metaheader_output',
			array());
	}

	function tpl_metaheader_output(&$event, $param)
	{
		$css_url = DOKU_BASE . 'lib/plugins/css';
		$event->data['link'][] = array( 'rel'=>'stylesheet', 'type'=>'text/css', 'href'=> $css_url . '/style.php');
	}

}
