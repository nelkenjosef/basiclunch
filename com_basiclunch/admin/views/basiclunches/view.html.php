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
		$this->addToolBar($this->pagination->total);

		// display the template
		parent::display($tpl);

		// set the document
		$this->setDocument();
	}

	/**
	 * setting the toolbar
	 */
	protected function addToolBar($total = null)
	{
		JToolbarHelper::title(JText::_('COM_BASICLUNCH_MANAGER_BASICLUNCHES') .
				// reflect number of items in title
				($total ? ' <span style="font-size:0.5em;vertiva-align:middle;">(' . $total . ')</span>' : '')
				, 'basiclunch');
		JToolbarHelper::deleteList('', 'basiclunches.delete');
		JToolbarHelper::editList('basiclunch.edit');
		JToolbarHelper::addNew('basiclunch.add');
	}

	/**
	 * method to set up the document properties
	 *
	 * @return void
	 */
	protected function setDocument()
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_BASICLUNCH_ADMINISTRATION'));
	}
}
