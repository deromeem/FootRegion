<?php
defined('_JEXEC') or die('Restricted access');

class FootregionModelDirecteurs extends JModelList
{
	public function __construct($config = array())
	{
		// précise les colonnes activant le tri
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'd.id',
				'email', 'd.email',
				'date_affectation', 'd.date_affectation',
				'nom','d.nom',
				'prenom','d.prenom',
				'alias','d.alias',
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
		$query->select('d.id, d.email, d.date_affectation, d.alias, d.published, d.created, d.created_by, d.modified, d.modified_by, d.hits');
		$query->from('#__footregion_directeurs d');

		// joint la table pays
		$query->select('u.nom AS nom, u.prenom AS prenom')->join('LEFT', '#__footregion_utilisateurs AS u ON u.email=d.email');

		// filtre de recherche rapide textuel
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
				$searches[]	= 'd.email LIKE '.$search;
				// Ajoute les clauses à la requête
				$query->where('('.implode(' OR ', $searches).')');
			}
		}

		// tri des colonnes
		$orderCol = $this->state->get('list.ordering', 'd.email');
		$orderDirn = $this->state->get('list.direction', 'ASC');
		$query->order($this->_db->escape($orderCol.' '.$orderDirn));

		// echo nl2br(str_replace('#__','footregion_',$query));			// TEST/DEBUG
		return $query;
	}

	public function getUtilisateur()
	{
		$query = $this->_db->getQuery(true);
		$query->select('id, nom, prenom');
		$query->from('#__footregion_utilisateurs');
		$query->where('published=1');
		$query->order('nom ASC');
		$this->_db->setQuery($query);
		$pays = $this->_db->loadObjectList();
		return $club;
	}	
}
