<?php

if(!defined('DOKU_INC')) die();

if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');

require_once(DOKU_PLUGIN.'admin.php');

class admin_plugin_css extends DokuWiki_Admin_Plugin {

	function getInfo(){
		return array(
			'author' => 'h6e.net',
			'email'  => 'contact@h6e.net',
			'date'   => '2009-06-23',
			'name'   => 'Custom CSS Editor',
			'desc'   => 'Add easily custom CSS rules',
			'url'    => 'http://h6e.net/dokuwiki/plugins/css'
		);
	}

	function getMenuText($language)
	{
		return 'Custom CSS Editor';
	}

	function handle()
	{
	}

	function html()
	{
		$folder = DOKU_INC . 'data/style';
		$filename = $folder . '/custom.css';
		if (!empty($_POST['css_custom'])) {
			$custom_css = $_POST['css_custom'];
			if (!file_exists($folder)) {
				mkdir($folder, 0777, true);
			}
			file_put_contents($filename, $_POST['css_custom']);
		} else if (file_exists($filename)) {
			$custom_css = file_get_contents($filename);
		} else {
			$custom_css = "/* Custom CSS */\n\n";
		}
		?>

		<h1>Custom CSS Editor</h1>

		<form action="" method="post">
		<textarea name="css_custom" style="width:95%" rows="30" spellcheck="false"><?php
		echo htmlspecialchars($custom_css);
		?></textarea>
		<input type="submit" class="submit button" value="Update"/>
		</form>

		<?php
	}

}
