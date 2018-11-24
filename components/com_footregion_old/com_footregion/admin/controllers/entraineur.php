<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionControllerEntraineur extends JControllerForm
{
	function display($cachable = false, $urlparams = false) 
        {
                $input = JFactory::getApplication()->input;
                $input->set('view', $input->getCmd('view', 'Entraineur'));
 
                parent::display($cachable, $urlparams);
        }
}
