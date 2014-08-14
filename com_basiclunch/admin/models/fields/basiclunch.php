<?php

// no direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla list field types
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * BasicLunch form field class for the BasicLunch component
 */
class JFormFieldBasicLunch extends JFormFieldList
{
	/**
	 * the field type
	 *
	 * @var string
	 */
	protected $type = 'BasicLunch';

	/**
	 * method to get a list of options for a list input
	 *
	 * @return array an array of JHtml options
	 */
	protected function getOptions()
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('id,size');
		$query->from('#__basiclunch');
		$db->setQuery($query);
		$messages = $db->loadObjectList();
		$options = array();
		if ($messages)
		{
			foreach ($messages as $message) {
				$options[] = JHtml::_('select.option', $message->id, $message->size);
			}
		}
		$options = array_merge(parent::getOptions(), $options);
		return $options;
	}
}
