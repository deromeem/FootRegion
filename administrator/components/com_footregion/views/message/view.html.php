<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionViewMessage extends JViewLegacy
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
		JToolBarHelper::title(JText::_('COM_FOOTREGION_MESSAGE')." : ".($isNew ? JText::_('COM_FOOTREGION_NEW'): JText::_('COM_FOOTREGION_MODIF')), 'libelle');


		if ($isNew)
		{
			JToolbarHelper::apply('message.apply');
			JToolbarHelper::save('message.save');
			JToolbarHelper::save2new('message.save2new');
		}
		else
		{
			// if (!$checkedOut)
			// {
				JToolbarHelper::apply('message.apply');
				JToolbarHelper::save('message.save');
			// }
		}
		JToolBarHelper::cancel('message.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
	}
}
