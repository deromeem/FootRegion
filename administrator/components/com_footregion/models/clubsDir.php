<?php
defined('_JEXEC') or die('Restricted access');

class FootregionModelClubsDir extends JModelList
{
	public function __construct($config = array())
	{
		// précise les colonnes activant le tri
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'c.id',
				'nom', 'c.nom',
				'sigle','c.sigle',
				'adr_rue', 'c.adr_rue',
				'adr_ville', 'c.adr_ville',
				'adr_cp', 'c.adr_cp',
				'nom','c.nomDirecteur',
				'prenom','c.prenomDirecteur',
				'directeurs_id', 'c.directeurs_id',
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
		// récupère les informations de la session club nécessaires au paramétrage de l'écran
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
		$query->select('c.id, c.nom, c.adr_rue,c.sigle, c.adr_ville, c.adr_cp, c.directeurs_id, c.alias, c.published, c.created, c.created_by, c.modified, c.modified_by, c.hits');
		$query->from('#__footregion_clubs c');

		$query->select('d.email AS email')->join('LEFT', '#__footregion_directeurs AS d ON d.id=c.directeurs_id');
		$query->select('u.nom AS nomDirecteur, u.prenom AS prenomDirecteur')->join('LEFT', '#__footregion_utilisateurs AS u ON u.email=d.email');


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
		$nomE = $this->_db->loadObjectList();
		return $nomE;
	}
}
