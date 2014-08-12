<?php

// no direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');

/**
 * BasicLunch model
 */
class BasicLunchModelBasicLunch extends JModelItem
{
	/**
	 * @var array messages
	 */
	protected $messages;

	/**
	 * returns a reference to a table object, always creating it
	 *
	 * @param string $type the table type to the instantiate
	 * @param string $prefix a prefix for the table class name - optional
	 * @param array $config configuration array for model - optional
	 * @return JTable a database object
	 * @since 2.5
	 */
	public function getTable($type = 'BasicLunch', $prefix = 'BasicLunchTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * get the message
	 * @param int $id the corresponding id of the message to be retrieved
	 * @return string the message to be displayed to the user
	 */
	public function getMsg($id = 1)
	{
		if (!is_array($this->messages))
		{
			$this->messages = array();
		}

		if (!isset($this->messages[$id]))
		{
			// request the selected id
			$jinput = JFactory::getApplication()->input;
			$id = $jinput->get('id', 1, 'INT');

			// get the BasicLunchTable instance
			$table = $this->getTable();

			// load the message
			$table->load($id);

			// assign the message
			$this->messages[$id] = $table->size;
		}
		
		return $this->messages[$id];
	}
}