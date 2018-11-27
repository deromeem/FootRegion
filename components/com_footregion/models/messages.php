<?php
defined('_JEXEC') or die('Restricted access');
 
jimport('joomla.application.component.modellist');
 
class FootregionModelMessages extends JModelList
{
	
	public function __construct($config = array())
	{
		// précise les colonnes activant le tri
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'm.id',
				'libelle', 'm.libelle',
				'discussions_id', 'm.discussions_id',
				'utilisateurs_id', 'm.uilisateurs_id',
				'alias', 'm.alias',
				'published', 'm.published',
				'created', 'm.created',
				'created_by', 'm.created_by',
				'modified', 'm.modified',
				'modified_by', 'm.modified_by',
				'hits', 'm.hits'
			);
		}
		parent::__construct($config);
	}

	protected function populateState($ordering = null, $direction = null)
	{
		$app = JFactory::getApplication();

		// informations de pagination de la liste
		$limit = $app->getUserStateFromRequest('global.list.limit', 'limit', $app->getCfg('list_limit'), 'uint');
		$this->setState('list.limit', $limit);

		$limitstart = $app->input->get('limitstart', 0, 'uint');
		$this->setState('list.start', $limitstart);

		// informations du tri de la liste
		$orderCol = $app->input->get('filter_order', $ordering);
		$this->setState('list.ordering', $orderCol);

		$listOrder = $app->input->get('filter_order_Dir', $direction);
		$this->setState('list.direction', $listOrder);
		
		$search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);

		parent::populateState('libelle', 'ASC');
	}

	protected function _getListQuery()
	{
		// construit la requête d'affichage de la liste
		$query	= $this->_db->getQuery(true);
		$query->select('m.id, m.libelle, m.discussions_id, m.utilisateurs_id, m.alias, m.published, m.created, m.created_by, m.modified, m.modified_by, m.hits');
		$query->from('#__footregion_messages m');

		// joint la table utilisateurs
		//$query->select('CONCAT(u.nom, " ", u.prenom) AS utilisateur')->join('LEFT', '#__footregion_utilisateurs AS u ON u.id=d.utilisateurs_id');

		// filtre de recherche rapide textuelle
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			// recherche prefixée par 'id:'
			if (stripos($search, 'id:') === 0) {
				$query->where('m.id = '.(int) substr($search, 3));
			}
			else {
				// recherche textuelle classique (sans préfixe)
				$search = $this->_db->Quote('%'.$this->_db->escape($search, true).'%');
				// Compile les clauses de recherche
				$searches	= array();
				$searches[]	= 'm.libelle LIKE '.$search;
				$searches[]	= 'm.discussion_id LIKE '.$search;
				$searches[]	= 'm.utilisateurs_id LIKE '.$search;
				// Ajoute les clauses é la requête
				$query->where('('.implode(' OR ', $searches).')');
			}
		}

		// filtre les éléments publics
		$query->where('m.published=1');
		
		// tri des colonnes
		$orderCol = $this->getState('list.ordering', 'libelle');
		$orderDirn = $this->getState('list.direction', 'ASC');
		$query->order($this->_db->escape($orderCol.' '.$orderDirn));

		//echo nl2br(str_replace('#__','footregion_',$query));			// TEST/DEBUG
		return $query;
	}
}
