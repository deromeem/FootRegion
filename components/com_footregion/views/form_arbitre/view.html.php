<?php
defined('_JEXEC') or die;

class FootregionViewForm_arbitre extends JViewLegacy
{
	protected $form;
	protected $item;
	protected $return_page;
	protected $state;
	
	public function display($tpl = null)
	{
		// initialise les variables
		$this->state		= $this->get('State');
		$this->item			= $this->get('Item');
		$this->form			= $this->get('Form_a');
		$this->return_page	= $this->get('ReturnPage');
		
		// contrôle les erreurs
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseWarning(500, implode("\n", $errors));
			return false;
		}

		// affiche la vue
		parent::display($tpl);
	}
}
