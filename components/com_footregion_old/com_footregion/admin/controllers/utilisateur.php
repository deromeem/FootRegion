<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionControllerUtilisateur extends JControllerForm
{
	function display($cachable = false, $urlparams = false) 
        {
                $input = JFactory::getApplication()->input;
                $input->set('view', $input->getCmd('view', 'Utilisateur'));
 
                parent::display($cachable, $urlparams);
        }
}
