<?php
defined('_JEXEC') or die('Restricted access');

class FootRegionControllerClubsDir extends JControllerAdmin
{
	// surcharge pour gérer la suppression de contacts par le modèle adéquat
	public function getModel($name = 'clubDir', $prefix = 'FootregionModel')
	{
		// récupèrer le modèle de détail ($name au sigulier) pour la suppression assistée d'un (des) enregistrement(s)
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
}
