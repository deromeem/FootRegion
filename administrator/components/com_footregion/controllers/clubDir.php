<?php
defined('_JEXEC') or die('Restricted access');

class FootRegionControllerClubDir extends JControllerForm
{
		function display($cachable = false, $urlparams = false)
        {
                $input = JFactory::getApplication()->input;
                $input->set('view', $input->getCmd('view', 'clubDir'));

                parent::display($cachable, $urlparams);
        }
}
