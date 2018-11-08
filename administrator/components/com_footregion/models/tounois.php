<?php
defined('_JEXEC') or die('Restricted access');

class FootregionModelTournois extends JModelList
{
	public function __construct($config = array())
	{
		// précise les colonnes activant le tri
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 't.id',
				'nom', 't.nom',
				'adresse', 't.adr_rue',
				'ville', 't.adr_ville',
				'codePostale', 't.adr_cp',
				'coordgps', 't.coord_gps',
				'published', 't.published',
				'hits', 't.hits',
				'modified', 't.modified'
			);
		}
		parent::__construct($config);
	}

	protected function populateState($ordering = null, $direction = null)
	{
		// récupère les informations de la session tournoi nécessaires au paramétrage de l'écran
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
		$query->select('t.id, t.nom, t.score_domicile, t.score_invite, t.adr_rue, t.adr_ville, t.adr_cp, t.coord_gps, t.published, t.hits, t.modified');
		$query->from('#__footregion_tournois t');

		// joint la table pays
		// $query->select('p.pays AS pays')->join('LEFT', '#__annuaire_pays AS p ON p.id=e.pays_id');
		
		// filtre de recherche rapide textuel
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			// recherche prefixée par 'id:'
			if (stripos($search, 'id:') === 0) {
				$query->where('t.id = '.(int) substr($search, 3));
			}
			else {
				// recherche textuelle classique (sans préfixe)
				$search = $this->_db->Quote('%'.$this->_db->escape($search, true).'%');
				// Compile les clauses de recherche
				$searches	= array();
				$searches[]	= 't.nom LIKE '.$search;
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
			$query->where('t.published=' . (int) $published);
		}
		elseif ($published === '') {
			// si aucune sélection, on n'affiche que les publiés et dépubliés
			$query->where('(t.published=0 OR t.published=1)');
		}

		// tri des colonnes
		$orderCol = $this->state->get('list.ordering', 't.nom');
		$orderDirn = $this->state->get('list.direction', 'ASC');
		$query->order($this->_db->escape($orderCol.' '.$orderDirn));

		// echo nl2br(str_replace('#__','footregion_',$query));			// TEST/DEBUG
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
}
