<?php
defined('_JEXEC') or die('Restricted access');

class FootregionModelJoueurs extends JModelList
{
	public function __construct($config = array())
	{
		// précise les colonnes activant le tri
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'j.id',
				'email', 'j.email',
				'nom_joueur', 'j.nom_joueur',
				'poste', 'j.poste',
				'num_licence', 'j.num_licence',
				'date_naiss', 'j.date_naiss',
				'equipe_id', 'j.equipes_id',
				'nom_equipe', 'j.nom_equipe',
				'published', 'j.published',
				'hits', 'j.hits',
				'modified', 'j.modified'
			);
		}
		parent::__construct($config);
	}

	protected function populateState($ordering = null, $direction = null)
	{
		// récupère les informations de la session Joueur nécessaires au paramétrage de l'écran
		$search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);

		$pay = $this->getUserStateFromRequest($this->context.'.filter.pay', 'filter_pay', '');
		$this->setState('filter.pay', $pay);

		$published = $this->getUserStateFromRequest($this->context.'.filter.published', 'filter_published', '');
		$this->setState('filter.published', $published);

		parent::populateState('modified', 'desc');
	}
	
	protected function getListQuery()
	{
		// construit la requête d'affichage de la liste
		$query = $this->_db->getQuery(true);
		$query->select('j.id, j.email, j.poste, j.num_licence, j.date_naiss, j.equipes_id, j.published, j.hits, j.modified');
		$query->from('#__footregion_joueurs j');

		// joint la table equipes
		$query->select('eq.nom AS nom_equipe')->join('LEFT', '#__footregion_equipes AS eq ON eq.id = j.equipes_id');

		// joint la table utilisateurs
		$query->select('CONCAT(u.nom, " ", u.prenom) AS nom_joueur')->join('LEFT', '#__footregion_utilisateurs AS u ON u.email = j.email');

		// filtre de recherche rapide textuel
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			// recherche prefixée par 'id:'
			if (stripos($search, 'id:') === 0) {
				$query->where('j.id = '.(int) substr($search, 3));
			}
			else {
				// recherche textuelle classique (sans préfixe)
				$search = $this->_db->Quote('%'.$this->_db->escape($search, true).'%');
				// Compile les clauses de recherche
				$searches	= array();
				$searches[]	= 'j.email LIKE '.$search;
				// Ajoute les clauses à la requête
				$query->where('('.implode(' OR ', $searches).')');
			}
		}

		// filtre selon l'état du filtre 'filter_pay'
		// $pay = $this->getState('filter.pay');
		// if (is_numeric($pay)) {
		// 	$query->where('e.pays_id=' . (int) $pay);
		// }
		
		// filtre selon l'état du filtre 'filter_published'
		$published = $this->getState('filter.published');
		if (is_numeric($published)) {
			$query->where('j.published=' . (int) $published);
		}
		elseif ($published === '') {
			// si aucune sélection, on n'affiche que les publiés et dépubliés
			$query->where('(j.published=0 OR j.published=1)');
		}

		// tri des colonnes
		$orderCol = $this->state->get('list.ordering', 'j.email');
		$orderDirn = $this->state->get('list.direction', 'ASC');
		$query->order($this->_db->escape($orderCol.' '.$orderDirn));

		// echo nl2br(str_replace('#__','footregion_',$query));			// TEST/DEBUG
		return $query;
	}
	public function getJoueur()
	{
		$query = $this->_db->getQuery(true);
		$query->select('id');
		$query->from('#__footregion_joueurs');
		$query->where('published=1');
		$query->order('nom ASC');
		$this->_db->setQuery($query);
		$pays = $this->_db->loadObjectList();
		return $club;
	}	
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

