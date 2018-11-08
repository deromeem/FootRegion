<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionControllerTournois extends JControllerAdmin
{
	// surcharge pour gérer la suppression de tournois par le modèle adéquat
	public function getModel($name = 'tournoi', $prefix = 'FootregionModel') 
	{
		// récupèrer le modèle de détail ($name au sigulier) pour la suppression assistée d'un (des) enregistrement(s)
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
}
