<?php
/*------------------------------------------------------------------------
# vm_sef - Search Engine Friendly URL's for Virtuemart
# ------------------------------------------------------------------------
# author    Jeremy Magne
# copyright Copyright (C) 2010 Daycounts.com. All Rights Reserved.
# Websites: http://www.daycounts.com
# Technical Support: http://www.daycounts.com/en/contact/
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# See http://daycounts.com/ for details
-------------------------------------------------------------------------*/

defined( '_JEXEC' ) or die( 'Restricted access - vm_sef free v1.5.0' );

jimport('joomla.application.helper');
jimport('joomla.filesystem.file');
jimport('joomla.utilities.simplexml');

class SefConfig {
	var $version 		= '1.5.3';
	var $version_cat 	= '3';
	var $is_active 		= 1;
	var $rewrite_mode 	= 'full';
	var $category_mode 	= 'full';
	var $vm_prefix		= 'vm';
	var $component_name	= 'com_vm_sef';
	
	function __construct() {
		$this->load();
	}
	
	function load() {
		if (file_exists(JPATH_ADMINISTRATOR.DS."components".DS."com_vm_sef".DS."vm_sef.cfg.xml")) {
			$xml = new JSimpleXML;
			$xml->loadFile(JPATH_ADMINISTRATOR.DS."components".DS."com_vm_sef".DS."vm_sef.cfg.xml");
			//if ($xml->document->version[0]) {
			//	$this->version = $xml->document->version[0]->data();
			//}
			if ($xml->document->is_active[0]) {
				$this->is_active = $xml->document->is_active[0]->data();
			}
			if ($xml->document->rewrite_mode[0]) {
				$this->rewrite_mode = $xml->document->rewrite_mode[0]->data();
			}
			if ($xml->document->category_mode[0]) {
				$this->category_mode = $xml->document->category_mode[0]->data();
			}
		}
		//Load the version number from the install XML file.
		$comp = JApplicationHelper::parseXMLInstallFile(JPATH_ADMINISTRATOR.DS.'components'.DS.$this->component_name.DS.$this->component_name.'.xml');
		$this->version = $comp['version'];
	}
	
	function save() {
		$xml = "<vm_sef>
					<version>".$this->version."</version>
					<is_active>".$this->is_active."</is_active>
					<rewrite_mode>".$this->rewrite_mode."</rewrite_mode>
					<category_mode>".$this->category_mode."</category_mode>
				</vm_sef>";
		JFile::write(JPATH_ADMINISTRATOR.DS."components".DS."com_vm_sef".DS."vm_sef.cfg.xml",$xml);
	}
}