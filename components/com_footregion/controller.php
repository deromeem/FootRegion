<?php
defined('_JEXEC') or die('Restricted access');
 
<<<<<<< HEAD
class FootregionController extends JControllerLegacy
=======
<<<<<<< HEAD
class FootregionController extends JControllerLegacy
=======
class AnnuaireController extends JControllerLegacy
>>>>>>> 8ac9dd57608b1f193da2cc743d0f188d43be714a
>>>>>>> 3ce76ca4dfe2e16d31ae2290de2932e93d822cd9
{
	public function display($cachable = false, $urlparams = false)
	{
		// affectation de la vue récupérée en paramètre
<<<<<<< HEAD
		$vName = $this->input->get('view', 'discussions');
=======
		$vName = $this->input->get('view', 'entreprises');
>>>>>>> 3ce76ca4dfe2e16d31ae2290de2932e93d822cd9
		$this->input->set('view', $vName);
		
		parent::display($cachable, false);
		return $this;
	}
}
