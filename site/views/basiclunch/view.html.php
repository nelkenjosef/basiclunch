<?php

// no direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * HTML view for the BasicLunch component
 */
class BasicLunchViewBasicLunch extends JViewLegacy
{
	// overwriting JView display method
	function display($tpl = null)
	{
		// assign data to the view
		$this->msg = 'Basic Lunch';

		// display the view
		parent::display($tpl);
	}
}
