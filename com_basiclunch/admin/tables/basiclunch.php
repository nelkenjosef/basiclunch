<?php

// no direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla table library
jimport('joomla.database.table');

/**
 * BasicLunch table class
 */
class BasicLunchTableBasicLunch extends JTable
{
	/**
	 * constructor
	 *
	 * @param object $db database connector object
	 */
	function __construct(&$db) {
		parent::__construct('#__basiclunch', 'id', $db);
	}
}
