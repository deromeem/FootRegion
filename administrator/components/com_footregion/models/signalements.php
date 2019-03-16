<?php
defined('_JEXEC') or die('Restricted access');

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
				'arbitres_id', 's.arbitres_id',
				'entraineurs_id', 's.entraineurs_id',
				'alias', 's.alias',
				'published', 's.published',
				'hits', 's.hits',
				'modified', 's.modified'
			);
		}
		parent::__construct($config);
	}

	protected function populateState($ordering = null, $direction = null)
	{
		// récupère les informations de la session signalement nécessaires au paramétrage de l'écran
		$search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);

		$arbitre = $this->getUserStateFromRequest($this->context.'.filter.arbitre', 'filter_arbitre', '');
		$this->setState('filter.arbitre', $arbitre);

		$entraineur = $this->getUserStateFromRequest($this->context.'.filter.entraineur', 'filter_entraineur', '');
		$this->setState('filter.entraineur', $entraineur);

		$published = $this->getUserStateFromRequest($this->context.'.filter.published', 'filter_published', '');
		$this->setState('filter.published', $published);

		parent::populateState('modified', 'desc');
	}
	
	protected function getListQuery()
	{
		// construit la requête d'affichage de la liste
		$query = $this->_db->getQuery(true);
		$query->select('s.id, s.libelle, s.arbitres_id, s.entraineurs_id, s.alias, s.published, s.hits, s.modified');
		$query->from('#__footregion_signalements s');

		// joint la table pays
		// $query->select('p.pays AS pays')->join('LEFT', '#__annuaire_pays AS p ON p.id=e.pays_id');
		// joint les tables
		$query->select('a.email AS arbitre')->join('LEFT', '#__footregion_arbitres AS a ON a.id=s.arbitres_id');
		$query->select('e.email AS entraineur')->join('LEFT', '#__footregion_entraineurs AS e ON e.id=s.entraineurs_id');

		// filtre de recherche rapide textuel
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
				// Ajoute les clauses à la requête
				$query->where('('.implode(' OR ', $searches).')');
			}
		}

		// filtre selon l'état du filtre 'filter_arbitre'
		$arbitre = $this->getState('filter.arbitre');
		if (is_numeric($arbitre)) {
		$query->where('s.arbitres_id=' . (int) $arbitre);
		}
		
		// filtre selon l'état du filtre 'filter_entraineur'
		$entraineur = $this->getState('filter.entraineur');
		if (is_numeric($entraineur)) {
		$query->where('s.entraineurs_id=' . (int) $entraineur);
		}

		// filtre selon l'état du filtre 'filter_published'
		$published = $this->getState('filter.published');
		if (is_numeric($published)) {
			$query->where('s.published=' . (int) $published);
		}
		elseif ($published === '') {
			// si aucune sélection, on n'affiche que les publiés et dépubliés
			$query->where('(s.published=0 OR s.published=1)');
		}

		// tri des colonnes
		$orderCol = $this->state->get('list.ordering', 's.libelle');
		$orderDirn = $this->state->get('list.direction', 'ASC');
		$query->order($this->_db->escape($orderCol.' '.$orderDirn));

		echo nl2br(str_replace('#__','footregion_',$query));			// TEST/DEBUG
		return $query;
	}

	// public function getPays()
	// {
		// $query = $this->_db->getQuery(true);
		// $query->select('id, pays');
		// $query->from('#__annuaire_pays');
		// $query->where('published=1');
		// $query->order('pays ASC');
		// $this->_db->setQuery($query);
		// $pays = $this->_db->loadObjectList();
		// return $pays;
	// }	
	public function getEntraineurs()
	{
		$query = $this->_db->getQuery(true);
		$query->select('id');
		$query->from('#__footregion_entraineurs');
		$query->where('published=1');
		$query->order('entraineurs ASC');
		$this->_db->setQuery($query);
		$entraineurs = $this->_db->loadObjectList();
		return $entraineurs;
	}
	public function getArbitres()
	{
		$query = $this->_db->getQuery(true);
		$query->select('id');
		$query->from('#__footregion_arbitres');
		$query->where('published=1');
		$query->order('id ASC');
		$this->_db->setQuery($query);
		$arbitres = $this->_db->loadObjectList();
		return $arbitres;
	}	
}
