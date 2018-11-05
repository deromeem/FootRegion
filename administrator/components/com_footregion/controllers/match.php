<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionControllerMatch extends JControllerForm
{
	function display($cachable = false, $urlparams = false) 
        {
                $input = JFactory::getApplication()->input;
                $input->set('view', $input->getCmd('view', 'Match'));
 
                parent::display($cachable, $urlparams);
        }
}
