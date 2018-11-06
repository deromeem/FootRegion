<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionControllerMessage extends JControllerForm
{
	function display($cachable = false, $urlparams = false) 
        {
                $input = JFactory::getApplication()->input;
                $input->set('view', $input->getCmd('view', 'Message'));
 
                parent::display($cachable, $urlparams);
        }
}
