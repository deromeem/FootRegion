<?php
/* Copyright (C) 2011-2015 Emmanuel DEROME - All rights reserved */

// Prevents any direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controller');

class EgsControllerContacts extends EgsController
{
	function __construct()                          // constructor : registers additional tasks to methods, returns void
	{
		parent::__construct();		
		$this->registerTask('add', 'edit');           // registers extra tasks
		$this->registerTask('unpublish', 'publish');
	}

	function edit()                                 // displays edit form, returns void
	{
		JRequest::setVar('view', 'contact');
		JRequest::setVar('layout', 'form');
		JRequest::setVar('hidemainmenu', 1);
		parent::display();
	}

	function save()                                 // saves a record and redirect to main page, returns void
	{
		$model = $this->getModel('contact');

		if ($model->store($post)) {
			$msg = JText::_('COM_EGS_SAVED');
		} else {
			$msg = JText::_('COM_EGS_SAVING_FAILED');
		}
		$link = 'index.php?option=com_egs&view=contacts';
		$this->setRedirect( JRoute::_($link, false), $msg );        
	}

	function remove()                               // removes record(s), returns void
	{
		$model = $this->getModel('contact');
		
		if(!$model->delete()) {
			$msg = JText::_('COM_EGS_REC_NOT_DELETED');
		} else {
			$msg = JText::_('COM_EGS_REC_DELETED');
		}
		$link = 'index.php?option=com_egs&view=contacts';
		$this->setRedirect( JRoute::_($link, false), $msg );        
	}

	function publish()                              // publishes or unpublishes one or more records
	{
		$this->setRedirect('index.php?option=com_egs&view=contacts');
	
		$db			=& JFactory::getDBO();                // initialize variables
		$user		=& JFactory::getUser();
		$cid		= JRequest::getVar( 'cid', array(), 'post', 'array' );
		$task		= JRequest::getCmd( 'task' );
		$publish	= ($task == 'publish');
		$n			= count( $cid );

		if (empty( $cid )) {
			return JError::raiseWarning(500, JText::_('COM_EGS_NO_ITEM_SELECTED'));
		}

		JArrayHelper::toInteger( $cid );
		$cids = implode( ',', $cid );

		$query = 'UPDATE #__egs_contacts'
		. ' SET published = ' . (int) $publish
		. ' WHERE id IN ( '. $cids .' )'
		;
		// echo "queryUD = $query\n";     // TEST/DEBUG
		$db->setQuery( $query );
		if (!$db->query()) {
			return JError::raiseWarning( 500, $row->getError() );
		}
		$this->setMessage( JText::sprintf( $publish ? 'COM_EGS_PUBLISHED_ITEMS' : 'COM_EGS_UNPUBLISHED_ITEMS', $n ) );
	}
	
	function cancel()                               // cancels record editing, returns void
	{
		$msg = JText::_('COM_EGS_OPERATION_CANCELED');
		$link = 'index.php?option=com_egs&view=contacts';
		$this->setRedirect( JRoute::_($link, false), $msg );        
	}
}
