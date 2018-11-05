<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionControllerTournoi extends JControllerForm
{
	function display($cachable = false, $urlparams = false) 
        {
                $input = JFactory::getApplication()->input;
                $input->set('view', $input->getCmd('view', 'Tournoi'));
 
                parent::display($cachable, $urlparams);
        }
}
