<?php
/*------------------------------------------------------------------------
# vm_sef - Search Engine Friendly URL's for Virtuemart
# ------------------------------------------------------------------------
# author    Jeremy Magne
# copyright Copyright (C) 2010 Daycounts.com. All Rights Reserved.
# Websites: http://www.daycounts.com
# Technical Support: http://www.daycounts.com/en/contact/
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# See http://daycounts.com/fr/component/content/article/7 for details
-------------------------------------------------------------------------*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport( 'joomla.application.component.controller' );
require_once (JPATH_ADMINISTRATOR.DS.'components'.DS.'com_vm_sef'.DS.'classes'.DS.'config.php');

/**
 * @package		Joomla
 * @subpackage	Config
 */
class VmSefController extends JController
{
	/**
	 * Custom Constructor
	 */
	function __construct( $default = array())
	{
		parent::__construct( $default );

		$this->registerTask('apply','save');

	}

	function display( )
	{
		JRequest::setVar( 'hidemainmenu', 0 );
		JRequest::setVar( 'layout', 'form'  );
		JRequest::setVar( 'view', 'config'  );
		JRequest::setVar( 'edit', false  );

		//Set the default view, just in case
		$view = JRequest::getCmd('view');
		if(empty($view)) {
			JRequest::setVar('view', 'config');
		};

		parent::display();
	}

	function save()
	{
		global $mainframe;
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );
		
		$config = new SefConfig();
		$config->version 		= JRequest::getVar('version');
		$config->is_active		= JRequest::getVar('is_active', 1, '', 'int' );
		$config->rewrite_mode	= JRequest::getVar('rewrite_mode','full');
		$config->category_mode	= JRequest::getVar('category_mode','full');
		$config->save();

		$msg = JText::_( 'Config saved' );
		$link = 'index.php?option=com_vm_sef';
		$mainframe->redirect($link, $msg);
	}

}