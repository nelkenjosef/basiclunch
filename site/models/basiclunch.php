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
			$this->msg = 'Basic Lunch';
		}
		return $this->msg;
	}
}