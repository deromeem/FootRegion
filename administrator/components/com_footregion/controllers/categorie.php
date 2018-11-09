<?php
defined('_JEXEC') or die('Restricted access');
 
class FootRegionControllerCategorie extends JControllerForm
{
		function display($cachable = false, $urlparams = false) 
        {
                $input = JFactory::getApplication()->input;
                $input->set('view', $input->getCmd('view', 'categorie'));
 
                parent::display($cachable, $urlparams);
        }
}
