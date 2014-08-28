<?php

// no direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla views library
jimport('joomla.application.component.view');

/**
 * BasicLunches view
 */
class BasicLunchViewBasicLunches extends JViewLegacy
{
	/**
	 * BasicLunches view display method
	 * @return void
	 */
	function display($tpl = null)
	{
		// get data from the model
		$items = $this->get('Items');
		$pagination = $this->get('Pagination');

		// check for errors
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br/>', $errors));
			return false;
		}

		// assign data to the view
		$this->items = $items;
		$this->pagination = $pagination;

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
		JToolbarHelper::title(JText::_('COM_BASICLUNCH_MANAGER_BASICLUNCHES'));
		JToolbarHelper::deleteList('', 'basiclunches.delete');
		JToolbarHelper::editList('basiclunch.edit');
		JToolbarHelper::addNew('basiclunch.add');
	}
}
