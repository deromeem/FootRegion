<?php
defined('_JEXEC') or die('Restricted access');
 
jimport('joomla.application.component.modellist');
 
class FootregionModelSignalements extends JModelList
{
	public function __construct($config = array())
	{
		// précise les colonnes activant le tri
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 's.id',
				'libelle', 's.libelle',
				'arbitres', 's.arbitres_id',
				'entraineurs', 's.entraineurs_id',
				'alias', 's.alias',
				'published', 's.published',
				'created', 's.created',
				'created_by', 's.created_by',
				'modified', 's.modified',
				'modified_by', 's.modified_by',
				'hits', 's.hits'
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
		$query->select('s.id, s.libelle, s.arbitres_id, s.entraineurs_id, s.alias, s.published, s.created, s.created_by, s.modified, s.modified_by, s.hits');
		$query->from('#__footregion_signalements s');

		// joint la table artibres
		$query->select('a.id AS id_arbitres')->join('LEFT', '#__footregion_arbitres AS a ON a.id=s.arbitres_id');

		// joint la table entraineurs
		$query->select('e.id AS id_entraineurs')->join('LEFT', '#__footregion_entraineurs AS e ON e.id=s.entraineurs_id');

		// filtre de recherche rapide textuelle
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			// recherche prefixée par 'id:'
			if (stripos($search, 'id:') === 0) {
				$query->where('s.id = '.(int) substr($search, 3));
			}
			else {
				// recherche textuelle classique (sans préfixe)
				$search = $this->_db->Quote('%'.$this->_db->escape($search, true).'%');
				// Compile les clauses de recherche
				$searches	= array();
				$searches[]	= 's.libelle LIKE '.$search;
				$searches[]	= 'u.nom LIKE '.$search;
				// Ajoute les clauses é la requête
				$query->where('('.implode(' OR ', $searches).')');
			}
		}

		// filtre les éléments publics
		$query->where('s.published=1');
		
		// tri des colonnes
		$orderCol = $this->getState('list.ordering', 'theme');
		$orderDirn = $this->getState('list.direction', 'ASC');
		$query->order($this->_db->escape($orderCol.' '.$orderDirn));

		// echo nl2br(str_replace('#__','footregion_',$query));			// TEST/DEBUG
		return $query;
	}
}
