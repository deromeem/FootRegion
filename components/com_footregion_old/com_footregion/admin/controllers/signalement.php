<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionControllerSignalement extends JControllerForm
{
	function display($cachable = false, $urlparams = false) 
        {
                $input = JFactory::getApplication()->input;
                $input->set('view', $input->getCmd('view', 'signalement'));
 
                parent::display($cachable, $urlparams);
        }
}
