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
	 * @var string msg
	 */
	protected $msg;

	/**
	 * get the message
	 * @return string the message to be displayed to the user
	 */
	public function getMsg()
	{
		if (!isset($this->msg))
		{
			$jinput = JFactory::getApplication()->input;
			$id = $jinput->get('id', 1, 'INT');

			switch ($id)
			{
				case 3:
					$this->msg = 'groups with 5 to 6 persons';
					break;
				case 2:
					$this->msg = 'groups with 3 to 4 persons';
					break;
				default:
				case 1:
					$this->msg = 'only 2 persons';
					break;
			}
		}
		return $this->msg;
	}
}