<?php
defined('_JEXEC') or die('Restricted access');
 
jimport('joomla.application.component.modellist');
 
class FootRegionModelEquipes extends JModelList
{
	public function __construct($config = array())
	{
		// pr�cise les colonnes activant le tri
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'e.id',
				'nom', 'e.nom',				
				'clubs_id', 'e.clubs_id',
				'categories_id', 'e.categories_id',
				'entraineurs_id', 'e.entraineurs_id',
				'published', 'e.published',
				'hits', 'e.hits',
				'modified', 'e.modified'
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

		parent::populateState('nom', 'ASC');
	}

	protected function _getListQuery()
	{
		// construit la requ�te d'affichage de la liste
		$query	= $this->_db->getQuery(true);
		$query->select('e.id, e.nom, c.nom AS club, cat.nom as nom_cat, e.published, e.hits, e.modified');
		$query->from('#__footregion_equipes as e');



		$query->join('LEFT','#__footregion_entraineurs AS en ON en.id = e.entraineurs_id')->join('LEFT', '#__footregion_joueurs AS j ON en.email=j.email');

		$query->join('LEFT','#__footregion_categories AS cat ON cat.id = e.categories_id');

		$query->select(' CONCAT(u.nom, " ", u.prenom) AS utilisateur')->join('LEFT', '#__footregion_utilisateurs AS u ON u.email=en.email');

		$query->select(' c.nom AS club')->join('LEFT', '#__footregion_clubs AS c ON c.id=e.clubs_id');

		// SELECT e.id, e.nom, e.categories_id, e.entraineurs_id, e.published, e.hits, e.modified, CONCAT(u.nom, " ", u.prenom) AS utilisateur, c.nom AS club 
		// FROM footregion_footregion_equipes as e 
		// LEFT JOIN footregion_footregion_entraineurs AS en on en.id = e.entraineurs_id 
		// LEFT JOIN footregion_footregion_joueurs AS j ON en.email=j.email 
		// LEFT JOIN footregion_footregion_utilisateurs AS u ON u.email=en.email 
		// LEFT JOIN footregion_footregion_clubs AS c ON c.id= e.clubs_id 
		// WHERE e.published=1 
		// ORDER BY nom ASC
		
		// filtre de recherche rapide textuelle
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			// recherche prefix�e par 'id:'
			if (stripos($search, 'id:') === 0) {
				$query->where('e.id = '.(int) substr($search, 3));
			}
			else {
				// recherche textuelle classique (sans pr�fixe)
				$search = $this->_db->Quote('%'.$this->_db->escape($search, true).'%');
				// Compile les clauses de recherche
				$searches	= array();
				$searches[]	= 'e.id LIKE '.$search;
				$searches[]	= 'club LIKE '.$search;
				$searches[]	= 'e.equipes_id LIKE '.$search;
				$searches[]	= 'nom_cat LIKE '.$search;
				
				// Ajoute les clauses � la requ�te
				$query->where('('.implode(' OR ', $searches).')');
			}
		}

		// filtre les �l�ments publi�s
		$query->where('e.published=1');
		
		// tri des colonnes
		$orderCol = $this->getState('list.ordering', 'email');
		$orderDirn = $this->getState('list.direction', 'ASC');
		$query->order($this->_db->escape($orderCol.' '.$orderDirn));

		 echo nl2br(str_replace('#__','footregion_',$query));			// TEST/DEBUG
		return $query;
	}
}
