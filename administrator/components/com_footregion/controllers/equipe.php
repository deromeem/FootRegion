<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionControllerEquipe extends JControllerForm
{
	function display($cachable = false, $urlparams = false) 
        {
                $input = JFactory::getApplication()->input;
                $input->set('view', $input->getCmd('view', 'Equipe'));
 
                parent::display($cachable, $urlparams);
        }
}
