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
	 * view form
	 *
	 * @var string form
	 */
	protected $form = null;

	/**
	 * display method of Lunch View
	 * @return void
	 */
	function display($tpl = null)
	{
		// get the data
		$form = $this->get('Form');
		$item = $this->get('Item');
		$script = $this->get('Script');

		// check for errors
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br/>', $errors));
			return false;
		}

		// assign the data
		$this->form = $form;
		$this->item = $item;
		$this->script = $script;

		// set the toolbar
		$this->addToolBar();

		// display the template
		parent::display($tpl);

		// set the document
		$this->setDocument();
	}

	/**
	 * setting the toolbar
	 */
	protected function addToolBar()
	{
		$input = JFactory::getApplication()->input;
		$input->set('hidemainmeu', true);
		$isNew = ($this->item->id == 0);
		JToolbarHelper::title($isNew ? JText::_('COM_BASICLUNCH_MANAGER_BASICLUNCH_NEW')
									 : JText::_('COM_BASICLUNCH_MANAGER_BASICLUNCH_EDIT'), 'basiclunch');
		JToolbarHelper::save('basiclunch.save');
		JToolbarHelper::cancel('basiclunch.cancel', $isNew ? 'JTOOLBAR_CANCEL'
														   : 'JTOOLBAR_CLOSE');
	}

	/**
	 * method to set up the document properties
	 *
	 * @return void
	 */
	protected function setDocument()
	{
		$isNew = ($this->item->id < 1);
		$document = JFactory::getDocument();
		$document->setTitle($isNew ? JText::_('COM_BASICLUNCH_BASICLUNCH_CREATING')
								   : JText::_('COM_BASICLUNCH_BASICLUNCH_EDITING'));
		$document->addScript(JUri::root() . $this->script);
		$document->addScript(JUri::root() . "/administrator/components/com_basiclunch"
										  . "/views/basiclunch/submitbutton.js");
		JText::script('COM_BASICLUNCH_BASICLUNCH_ERROR_UNACCEPTABLE');
	}
}
