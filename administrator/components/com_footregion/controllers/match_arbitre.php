<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionControllerMatch_Arbitre extends JControllerForm
{
	function display($cachable = false, $urlparams = false) 
        {
                $input = JFactory::getApplication()->input;
                $input->set('view', $input->getCmd('view', 'Match_Arbitre'));
 
                parent::display($cachable, $urlparams);
        }
}
