<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionViewMessages extends JViewLegacy
{
	function display($tpl = null) 
	{
		// récupère la liste des items à afficher
		$this->items = $this->get('Items');
		// récupère l'objet jPagination correspondant à la liste
		$this->pagination = $this->get('Pagination');

		// récupère l'état des information de tri des colonnes
		$this->state = $this->get('State');
		$this->listOrder = $this->escape($this->state->get('list.ordering'));
		$this->listDirn	= $this->escape($this->state->get('list.direction'));			

		// récupère les paramêtres du fichier de configuration config.xml
		$params = JComponentHelper::getParams('com_annuaire');
		$this->paramDescShow = $params->get('jannuaire_show_desc', 0);
		$this->paramDescSize = $params->get('jannuaire_size_desc', 70);
		$this->paramDateFmt = $params->get('jannuaire_date_fmt', "d F Y");

		// affiche les erreurs éventuellement retournées
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}

		// ajoute la toolbar contenant les boutons d'actions
		$this->addToolBar();
		// invoque la méthode addSubmenu du fichier de soutien (helper)
		UtilisateurHelper::addSubmenu('messages');
		// prépare et affuche la sidebar à gauche de la liste
		$this->prepareSideBar();
		$this->sidebar = JHtmlSidebar::render();

		// affiche les calques par appel de la méthode display() de la classe parente
		parent::display($tpl);
	}
 
	protected function addToolBar() 
	{
		// affiche le titre de la page
		JToolBarHelper::title(JText::_('COM_FOOTREGION')." : ".JText::_('COM_FOOTREGION_MESSAGES'));
		
		// affiche les boutons d'action
		JToolBarHelper::addNew('message.add');
		JToolBarHelper::editList('message.edit');
		JToolBarHelper::deleteList('COM_FOOTREGION_DELETE_CONFIRM', 'messages.delete');
		JToolbarHelper::publish('messages.publish', 'JTOOLBAR_PUBLISH', true);
		JToolbarHelper::unpublish('messages.unpublish', 'JTOOLBAR_UNPUBLISH', true);
		JToolbarHelper::archiveList('messages.archive');
		JToolbarHelper::checkin('messages.checkin');
		JToolbarHelper::trash('messages.trash');
		JToolbarHelper::preferences('com_footregion');
	}

	protected function prepareSideBar()
	{
		// definit l'action du formulaire sidebar
		JHtmlSidebar::setAction('index.php?option=com_annuaire');
		
		// ajoute le filtre standard des statuts dans le bloc des sous-menus
		JHtmlSidebar::addFilter( JText::_('JOPTION_SELECT_PUBLISHED'), 'filter_published',
			JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'),
			'value', 'text', $this->state->get('filter.published'),true)
		);

		// ajoute le filtre spécifique pour les pays
		// $this->pays = $this->get('Pays');
		// $options3	= array();
		// foreach ($this->pays as $pay) {
			// $options3[]	= JHtml::_('select.option', $pay->id,  $pay->pays);
		// }
		// $this->pay = $options3;
		// JHtmlSidebar::addFilter("- ".JText::_('COM_ANNUAIRE_SELECT_PAYS')." -", 'filter_pay',
			// JHtml::_('select.options', $this->pay,
			// 'value', 'text', $this->state->get('filter.pay'))
		// );
				
		// ajoute le filtre spécifique pour les utilisateurs
		$this->utilisateurs = $this->get('utilisateurs');
		$options3	= array();
		foreach ($this->utilisateurs as $user){
			$options3[]	= JHtml::_('select.option', $user->id,  $user->nom);
		}
		$this->user = $options3;
		JHtmlSidebar::addFilter( JText::_('COM_FOOTREGION_UTILISATEURS_NOM'), 'filter_user',
			JHtml::_('select.options', $this->user,
			'value', 'text', $this->state->get('filter.user'))
		);

		// ajoute le filtre spécifique pour les discussions
		$this->discussions = $this->get('discussions');
		$options3	= array();
		foreach ($this->discussions as $discussion){
			$options3[]	= JHtml::_('select.option', $discussion->id, $discussion->theme);
			}
		$this->discussion = $options3;
		JHtmlSidebar::addFilter( JText::_('COM_FOOTREGION_DISCUSSIONS_THEME'), 'filter_discussion',
			JHtml::_('select.options', $this->discussion,
			'value', 'text', $this->state->get('filter.discussion'))
		); 
	}

 	protected function getSortFields()
	{
		// prépare l'affichage des colonnes de tri du calque
		return array(
			'm.libelle' => JText::_('COM_FOOTREGION_MESSAGES_LIBELLE'),
			'm.alias' => JText::_('COM_FOOTREGION_MESSAGES_ALIAS'),
			'u.nom' => JText::_('COM_FOOTREGION_UTILISATEURS_NOM'),
			'd.theme' => JText::_('COM_FOOTREGION_DISCUSSIONS_THEME'),
			'm.published' => JText::_('JSTATUS'),
			'm.modified' => JText::_('JDATE'),
			'm.id' => "Id"
		);
	}  
	
}
