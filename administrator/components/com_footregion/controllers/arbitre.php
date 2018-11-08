<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionControllerArbitre extends JControllerForm
{
	function display($cachable = false, $urlparams = false) 
        {
                $input = JFactory::getApplication()->input;
                $input->set('view', $input->getCmd('view', 'Arbitre'));
 
                parent::display($cachable, $urlparams);
        }
}
