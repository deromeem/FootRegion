<?php
defined('_JEXEC') or die('Restricted access');
 
<<<<<<< HEAD
class FootregionController extends JControllerLegacy
=======
class AnnuaireController extends JControllerLegacy
>>>>>>> 8ac9dd57608b1f193da2cc743d0f188d43be714a
{
	public function display($cachable = false, $urlparams = false)
	{
		// affectation de la vue récupérée en paramètre
		$vName = $this->input->get('view', 'entreprises');
		$this->input->set('view', $vName);
		
		parent::display($cachable, false);
		return $this;
	}
}
