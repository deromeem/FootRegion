<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionControllerJoueurs extends JControllerAdmin
{
	// surcharge pour gérer la suppression de Joueurs par le modèle adéquat
	public function getModel($name = 'Joueur', $prefix = 'FootregionModel') 
	{
		// récupèrer le modèle de détail ($name au sigulier) pour la suppression assistée d'un (des) enregistrement(s)
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
}
