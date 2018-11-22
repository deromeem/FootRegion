<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionControllerJoueur extends JControllerForm
{
	function display($cachable = false, $urlparams = false) 
        {
                $input = JFactory::getApplication()->input;
                $input->set('view', $input->getCmd('view', 'Joueur'));
 
                parent::display($cachable, $urlparams);
        }
}
