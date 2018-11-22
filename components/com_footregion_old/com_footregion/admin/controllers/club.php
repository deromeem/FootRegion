<?php
defined('_JEXEC') or die('Restricted access');
 
class FootRegionControllerClub extends JControllerForm
{
		function display($cachable = false, $urlparams = false) 
        {
                $input = JFactory::getApplication()->input;
                $input->set('view', $input->getCmd('view', 'club'));
 
                parent::display($cachable, $urlparams);
        }
}
