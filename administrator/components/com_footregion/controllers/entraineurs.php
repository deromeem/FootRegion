<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionControllerEntraineurs extends JControllerAdmin
{
	// surcharge pour gérer la suppression de Entraineurs par le modèle adéquat
	public function getModel($name = 'Entraineur', $prefix = 'FootregionModel') 
	{
		// récupèrer le modèle de détail ($name au sigulier) pour la suppression assistée d'un (des) enregistrement(s)
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
}
