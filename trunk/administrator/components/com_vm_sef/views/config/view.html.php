<?php
/**
* @version		$Id: view.html.php 14401 2010-01-26 14:10:00Z louis $
* @package		Joomla
* @subpackage	Config
* @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.view');
//jimport('joomla.filesystem.file');
require_once (JPATH_ADMINISTRATOR.DS.'components'.DS.'com_vm_sef'.DS.'classes'.DS.'config.php');

/**
 * HTML View class for the Poll component
 *
 * @static
 * @package		Joomla
 * @subpackage	Poll
 * @since 1.0
 */
class VmSefViewConfig extends JView
{
	function display($tpl = null)
	{
		$config = new SefConfig();
		$this->assignRef('config',	$config);
		
		$rewrite_modes = array();
		$rewrite_modes[] = JHTML::_('select.option', 'full', JText::_('ID-Alias'));
		$rewrite_modes[] = JHTML::_('select.option', 'id', JText::_('ID'));
		$this->assignRef('rewrite_modes',	$rewrite_modes);
		
		$category_modes = array();
		$category_modes[] = JHTML::_('select.option', 'full', JText::_('Parent category/Category'));
		$category_modes[] = JHTML::_('select.option', 'single', JText::_('Category'));
		$this->assignRef('category_modes',	$category_modes);
		
		if (file_exists(JPATH_ADMINISTRATOR.DS."components".DS."com_virtuemart".DS."virtuemart.cfg.php")) {
			$virtuemart = 1;
		}
		$this->assignRef('virtuemart',	$virtuemart);
		
		$JConfig =& JFactory::getConfig();
		$sef = $JConfig->getValue('sef');
		$this->assignRef('sef',	$sef);
		
		parent::display($tpl);

	}
}