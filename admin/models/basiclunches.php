<?php

// no direct access to this file
defined('_JEXEC') or die('Restricted access');

// import the Joomla modellist library
jimport('joomla.application.component.modellist');

/**
 * BasicLunchList model
 */
class BasicLunchModelBasicLunches extends JModelList
{
	/**
	 * method to build an SQL query to load the list data
	 *
	 * @return string an SQL query
	 */
	protected function getListQuery()
	{
		//create a new query object
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		// select some fields from the basiclunch table
		$query->select('id,size')->from('#__basiclunch');

		return $query;
	}
}
