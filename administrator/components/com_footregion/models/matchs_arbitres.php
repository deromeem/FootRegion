<?php
defined('_JEXEC') or die('Restricted access');

class FootregionModelMatchs_arbitres extends JModelList
{
	public function __construct($config = array())
	{
		// précise les colonnes activant le tri
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'ma.id',
				'role', 'ma.role',
				'matchs_id', 'ma.matchs_id',
				'arbitres_id', 'ma.arbitres_id',
				'alias', 'ma.alias',
				'published', 'ma.published',
				'hits', 'ma.hits',
				'modified', 'ma.modified'
			);
		}
		parent::__construct($config);
	}

	protected function populateState($ordering = null, $direction = null)
	{
		// récupère les informations de la session utilisateur nécessaires au paramétrage de l'écran
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
		$query->select('ma.id, ma.role, ma.matchs_id, ma.arbitres_id, ma.alias, ma.published, ma.hits, ma.modified');
		$query->from('#__footregion_matchs_arbitres ma');

		// joint les tables
		$query->select('m.nom AS nommatch')->join('LEFT', '#__footregion_matchs AS m ON m.id=ma.matchs_id');
		$query->select('a.email AS emailarbitre')->join('LEFT', '#__footregion_arbitres AS a ON a.id=ma.arbitres_id');


		// filtre de recherche rapide textuel
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			// recherche prefixée par 'id:'
			if (stripos($search, 'id:') === 0) {
				$query->where('ma.id = '.(int) substr($search, 3));
			}
			else {
				// recherche textuelle classique (sans préfixe)
				$search = $this->_db->Quote('%'.$this->_db->escape($search, true).'%');
				// Compile les clauses de recherche
				$searches	= array();
				$searches[]	= 'ma.role LIKE '.$search;
				$searches[]	= 'ma.matchs.id LIKE '.$search;
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
			$query->where('ma.published=' . (int) $published);
		}
		elseif ($published === '') {
			// si aucune sélection, on n'affiche que les publiés et dépubliés
			$query->where('(ma.published=0 OR m.published=1)');
		}

		// tri des colonnes
		$orderCol = $this->state->get('list.ordering', 'ma.role');
		$orderDirn = $this->state->get('list.direction', 'ASC');
		$query->order($this->_db->escape($orderCol.' '.$orderDirn));

		// echo nl2br(str_replace('#__','footregion_',$query));			// TEST/DEBUG
		return $query;
	}

	public function getMatchs()
	{
		$query = $this->_db->getQuery(true);
		$query->select('id');
		$query->from('#__footregion_matchs');
		$query->where('published=1');
		$query->order('id ASC');
		$this->_db->setQuery($query);
		$matchs = $this->_db->loadObjectList();
		return $matchs;
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
