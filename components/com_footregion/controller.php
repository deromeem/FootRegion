<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionController extends JControllerLegacy
class AnnuaireController extends JControllerLegacy
{
	public function display($cachable = false, $urlparams = false)
	{
		// affectation de la vue récupérée en paramètre
<<<<<<< HEAD
		$vName = $this->input->get('view', 'matchs');
=======
		$vName = $this->input->get('view', 'entreprises');
>>>>>>> 8ac9dd57608b1f193da2cc743d0f188d43be714a
		$this->input->set('view', $vName);
		
		parent::display($cachable, false);
		return $this;
	}
}
