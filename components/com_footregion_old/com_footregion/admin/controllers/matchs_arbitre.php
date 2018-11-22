<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionControllerMatchs_arbitre extends JControllerForm
{
	function display($cachable = false, $urlparams = false) 
        {
                $input = JFactory::getApplication()->input;
                $input->set('view', $input->getCmd('view', 'Matchs_arbitre'));
 
                parent::display($cachable, $urlparams);
        }
}
