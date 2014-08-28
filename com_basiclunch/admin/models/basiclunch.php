<?php

// no direct access to this file
defined('_JEXEC') or die('Restricted access');

// import the Joomla modelform library
jimport('joomla.application.component.modeladmin');

/**
 * BasicLunch model
 */
class BasicLunchModelBasicLunch extends JModelAdmin
{
	/**
	 * returns a reference to a table object, always creating it
	 *
	 * @param string $type the table type to instantiate
	 * @param string $prefix a prefix for the table class name - optional
	 * @param array $config configuration array for model - optional
	 * @return JTable a database object
	 * @since 2.5
	 */
	public function getTable($type = 'BasicLunch', $prefix = 'BasicLunchTable', $config = array()) {
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * method to get the record form
	 *
	 * @param array $data data for the form
	 * @param boolean $loadData true if the form is to load its own data (default case), false if not
	 * @return mixed a JForm object on success, false on failure
	 * @since 2.5
	 */
	public function getForm($data = array(), $loadData = true)
	{
		// get the form
		$form = $this->loadForm('com_basiclunch.basiclunch', 'basiclunch',
								array('control' => 'jform', 'load_data' => $loadData));
		if (empty($form))
		{
			return false;
		}
		return $form;
	}

	/** method to get the data that should be injected in the form
	 *
	 * @return mixed the data for the form
	 * @since 2.5
	 */
	protected function loadFormData()
	{
		// check the session for previously entered form data
		$data = JFactory::getApplication()->getUserState('com_basiclunch.edit.basiclunch.data', array());
		if (empty($data))
		{
			$data = $this->getItem();
		}
		return $data;
	}

}
