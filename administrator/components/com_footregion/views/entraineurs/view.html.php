<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionViewEntraineurs extends JViewLegacy
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
		$params = JComponentHelper::getParams('com_footregion');
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
		UtilisateurHelper::addSubmenu('entraineurs');
		// prépare et affuche la sidebar à gauche de la liste
		$this->prepareSideBar();
		$this->sidebar = JHtmlSidebar::render();

		// affiche les calques par appel de la méthode display() de la classe parente
		parent::display($tpl);
	}
 
	protected function addToolBar() 
	{
		// affiche le titre de la page
		JToolBarHelper::title(JText::_('COM_FOOTREGION')." : ".JText::_('COM_FOOTREGION_ENTRAINEURS'));
		
		// affiche les boutons d'action
		JToolBarHelper::addNew('entraineur.add');
		JToolBarHelper::editList('entraineur.edit');
		JToolBarHelper::deleteList('COM_FOOTREGION_DELETE_CONFIRM', 'entraineurs.delete');
		JToolbarHelper::publish('entraineurs.publish', 'JTOOLBAR_PUBLISH', true);
		JToolbarHelper::unpublish('entraineurs.unpublish', 'JTOOLBAR_UNPUBLISH', true);
		JToolbarHelper::archiveList('entraineurs.archive');
		JToolbarHelper::checkin('entraineurs.checkin');
		JToolbarHelper::trash('entraineurs.trash');
		JToolbarHelper::preferences('com_footregion');
	}

	protected function prepareSideBar()
	{
		// definit l'action du formulaire sidebar
		JHtmlSidebar::setAction('index.php?option=com_footregion');
		
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
		// JHtmlSidebar::addFilter("- ".JText::_('COM_FOOTREGION_SELECT_PAYS')." -", 'filter_pay',
			// JHtml::_('select.options', $this->pay,
			// 'value', 'text', $this->state->get('filter.pay'))
		// );
	}

 	protected function getSortFields()
	{
		// prépare l'affichage des colonnes de tri du calque
		return array(
			'en.id' => JText::_('COM_FOOTREGION_ENTRAINEURS_ID'),
			'en.email' => JText::_('COM_FOOTREGION_ENTRAINEURS_EMAIL'),
			'en.num_licence' => JText::_('COM_FOOTREGION_ENTRAINEURS_NUM_LICENCE'),
			'en.published' => JText::_('JSTATUS'),
			'en.modified' => JText::_('JDATE'),
			'en.id' => "Id"
		);
	}  
	
}
