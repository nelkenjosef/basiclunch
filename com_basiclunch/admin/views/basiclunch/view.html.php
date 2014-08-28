<?php

// no direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla views library
jimport('joomla.application.component.view');

/**
 * BasicLunches view
 */
class BasicLunchViewBasicLunch extends JViewLegacy
{
	/**
	 * display method of Lunch View
	 * @return void
	 */
	function display($tpl = null)
	{
		// get the data
		$form = $this->get('Form');
		$item = $this->get('Item');

		// check for errors
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br/>', $errors));
			return false;
		}

		// assign the data
		$this->form = $form;
		$this->item = $item;

		// set the toolbar
		$this->addToolBar();

		// display the template
		parent::display($tpl);
	}

	/**
	 * setting the toolbar
	 */
	protected function addToolBar()
	{
		$input = JFactory::getApplication()->input;
		$input->set('hidemainmeu', true);
		$isNew = ($this->item->id == 0);
		JToolbarHelper::title($isNew ? JText::_('COM_BASICLUNCH_MANAGER_NEW')
									 : JText::_('COM_BASICLUNCH_MANAGER_EDIT'));
		JToolbarHelper::save('basiclunch.save');
		JToolbarHelper::cancel('basiclunch.cancel', $isNew ? 'JTOOLBAR_CANCEL'
														   : 'JTOOLBAR_CLOSE');
	}
}
