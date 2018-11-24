<?php
defined('_JEXEC') or die('Restricted access');

class FootregionModelCategories extends JModelList
{
	public function __construct($config = array())
	{
		// précise les colonnes activant le tri
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'c.id',
				'nom', 'c.nom',
				'alias','c.alias',
				'published', 'c.published',
				'created', 'c.created',
				'created_by', 'c.created_by',
				'modified', 'c.modified',
				'modified_by', 'c.modified_by',
				'hits', 'c.hits'
			);
		}
		parent::__construct($config);
	}

	protected function populateState($ordering = null, $direction = null)
	{
		// récupère les informations de la session categorie nécessaires au paramétrage de l'écran
		$search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);

		$nomE = $this->getUserStateFromRequest($this->context.'.filter.nomE', 'filter_nomE', '');
		$this->setState('filter.nomE', $nomE);

		$published = $this->getUserStateFromRequest($this->context.'.filter.published', 'filter_published', '');
		$this->setState('filter.published', $published);

		parent::populateState('modified', 'desc');
	}
	
	protected function getListQuery()
	{
		// construit la requête d'affichage de la liste
		$query = $this->_db->getQuery(true);
		$query->select('c.id, c.nom, c.alias, c.published, c.created, c.created_by, c.modified, c.modified_by, c.hits');
		$query->from('#__footregion_categories c');

		// joint la table pays
		//$query->select('#__footregion_clubs.nom AS clubs')->join('LEFT', '#__footregion_clubs ON #__footregion_clubs.id=c.clubs_id');

		// filtre de recherche rapide textuel
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			// recherche prefixée par 'id:'
			if (stripos($search, 'id:') === 0) {
				$query->where('c.id = '.(int) substr($search, 3));
			}
			else {
				// recherche textuelle classique (sans préfixe)

				$search = $this->_db->Quote('%'.$this->_db->escape($search, true).'%');
				// Compile les clauses de recherche
				$searches	= array();
				$searches[]	= 'c.nom LIKE '.$search;
				// Ajoute les clauses à la requête
				$query->where('('.implode(' OR ', $searches).')');
			}
		}

		// tri des colonnes
		$orderCol = $this->state->get('list.ordering', 'c.nom');
		$orderDirn = $this->state->get('list.direction', 'ASC');
		$query->order($this->_db->escape($orderCol.' '.$orderDirn));

		// echo nl2br(str_replace('#__','footregion_',$query));			// TEST/DEBUG
		return $query;
	}

	public function getClub()
	{
		$query = $this->_db->getQuery(true);
		$query->select('id, nom');
		$query->from('#__footregion_clubs');
		$query->where('published=1');
		$query->order('nom ASC');
		$this->_db->setQuery($query);
		$pays = $this->_db->loadObjectList();
		return $club;
	}	
}
