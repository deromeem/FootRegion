<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionControllerStatut extends JControllerForm
{
	function display($cachable = false, $urlparams = false) 
        {
                $input = JFactory::getApplication()->input;
                $input->set('view', $input->getCmd('view', 'Statut'));
 
                parent::display($cachable, $urlparams);
        }
}
