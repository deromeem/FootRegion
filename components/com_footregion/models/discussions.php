<?php
defined('_JEXEC') or die('Restricted access');
 
jimport('joomla.application.component.modellist');
 
class FootregionModelDiscussions extends JModelList
{
	public function __construct($config = array())
	{
		// précise les colonnes activant le tri
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'd.id',
				'theme', 'd.theme',
				'utilisateurs_id', 'd.utilisateurs_id',
				'alias', 'd.alias',
				'published', 'd.published',
				'created', 'd.created',
				'created_by', 'd.created_by',
				'modified', 'd.modified',
				'modified_by', 'd.modified_by',
				'hits', 'd.hits'
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

		parent::populateState('theme', 'ASC');
	}

	protected function _getListQuery()
	{
		// construit la requête d'affichage de la liste
		$query	= $this->_db->getQuery(true);
		$query->select('d.id, d.theme, d.utilisateurs_id, d.alias, d.published, d.created, d.created_by, d.modified, d.modified_by, d.hits');
		$query->from('#__footregion_discussions d');

		// joint la table utilisateurs
		$query->select('CONCAT(u.nom, " ", u.prenom) AS utilisateur')->join('LEFT', '#__footregion_utilisateurs AS u ON u.id=d.utilisateurs_id');
			
		// filtre de recherche rapide textuelle
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			// recherche prefixée par 'id:'
			if (stripos($search, 'id:') === 0) {
				$query->where('d.id = '.(int) substr($search, 3));
			}
			else {
				// recherche textuelle classique (sans préfixe)
				$search = $this->_db->Quote('%'.$this->_db->escape($search, true).'%');
				// Compile les clauses de recherche
				$searches	= array();
				$searches[]	= 'd.theme LIKE '.$search;
				$searches[]	= 'CONCAT(u.nom, " ", u.prenom) LIKE '.$search;
				// Ajoute les clauses é la requête
				$query->where('('.implode(' OR ', $searches).')');
			}
		}

		// filtre les éléments publics
		$query->where('d.published=1');
		echo nl2br(str_replace('#__','footregion_',$query));	  
		// tri des colonnes
		$orderCol = $this->getState('list.ordering', 'theme');
		$orderDirn = $this->getState('list.direction', 'ASC');
		$query->order($this->_db->escape($orderCol.' '.$orderDirn));

		return $query;
	}
}
