<?php

// no direct access to this file
defined('_JEXEC') or die('Restricted access');

// set some global property
$document = JFactory::getDocument();
$document->addStyleDeclaration('.icon-basiclunch {background-image: url(../media/com_basiclunch/images/restaurant-16x16.png);}');

// import Joomla controller library
jimport('joomla.application.component.controller');

// get an instance of the controller prefixed by BasicLunch
$controller = JControllerLegacy::getInstance('BasicLunch');

// perform the request task
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));

// redirect if set by the controller
$controller->redirect();
