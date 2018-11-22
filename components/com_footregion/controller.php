<?php
defined('_JEXEC') or die('Restricted access');
 
<<<<<<< HEAD
class AnnuaireController extends JControllerLegacy
=======
class FootregionController extends JControllerLegacy
>>>>>>> 275f3efea617e781b17110c8e35e9cde6638779f
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
