<?php
defined('_JEXEC') or die('Restricted access');
 
class FootRegionControllerDirecteur extends JControllerForm
{
		function display($cachable = false, $urlparams = false) 
        {
                $input = JFactory::getApplication()->input;
                $input->set('view', $input->getCmd('view', 'directeur'));
 
                parent::display($cachable, $urlparams);
        }
}
