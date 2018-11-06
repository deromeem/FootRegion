<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionControllerStatuts extends JControllerAdmin
{
	// surcharge pour gérer la suppression de statuts par le modèle adéquat
	public function getModel($name = 'Statut', $prefix = 'FootregionModel') 
	{
		// récupèrer le modèle de détail ($name au sigulier) pour la suppression assistée d'un (des) enregistrement(s)
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
}
