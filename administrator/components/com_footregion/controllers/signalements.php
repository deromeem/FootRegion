<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionControllerSignalements extends JControllerAdmin
{
<<<<<<< HEAD
	// surcharge pour gérer la suppression de utilisateurs par le modèle adéquat
=======
	// surcharge pour gérer la suppression de signalements par le modèle adéquat
>>>>>>> 1864178e8c4e7a439d19aae374572180cb263095
	public function getModel($name = 'Signalement', $prefix = 'FootregionModel') 
	{
		// récupèrer le modèle de détail ($name au sigulier) pour la suppression assistée d'un (des) enregistrement(s)
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
}
