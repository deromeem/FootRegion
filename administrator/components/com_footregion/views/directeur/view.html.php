<?php
defined('_JEXEC') or die('Restricted access');
 
class FootRegionViewDirecteur extends JViewLegacy
{
	protected $form;
	protected $item;
	protected $state;
	
	public function display($tpl = null) 
	{
		$this->form		= $this->get('Form');
		$this->item		= $this->get('Item');
		$this->state	= $this->get('State');

		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}

		$this->addToolBar();
		parent::display($tpl);
	}

	protected function addToolBar() 
	{			
		$input = JFactory::getApplication()->input;
		$input->set('hidemainmenu', true);

		$user		= JFactory::getUser();
		$userId		= $user->get('id');
		// $checkedOut	= !($this->item->checked_out == 0 || $this->item->checked_out == $userId);
	
		$isNew = ($this->item->id == 0);
		JToolBarHelper::title(($isNew ? JText::_('COM_FOOTREGION_NEW'): JText::_('COM_FOOTREGION_MODIF_DIRECTEUR')), 'address');


		if ($isNew)
		{
			JToolbarHelper::apply('directeur.apply');
			JToolbarHelper::save('directeur.save');
			JToolbarHelper::save2new('directeur.save2new');
		}
		else
		{
			// if (!$checkedOut)
			// {
				JToolbarHelper::apply('directeur.apply');
				JToolbarHelper::save('directeur.save');
			// }
		}
		JToolBarHelper::cancel('directeur.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
	}
}
