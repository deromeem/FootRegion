<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionController extends JControllerLegacy
{
	public function display($cachable = false, $urlparams = false)
	{
		// affectation de la vue récupérée en paramètre

		$vName = $this->input->get('view', 'matchs');

		$vName = $this->input->get('view', 'entreprises');

		$vName = $this->input->get('view', 'discussions');

		$vName = $this->input->get('view', 'entreprises');

		$this->input->set('view', $vName);
		
		parent::display($cachable, false);
		return $this;
	}
}
