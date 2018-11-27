<?php
defined('_JEXEC') or die('Restricted access');
 
jimport('joomla.application.component.modellist');
 
class FootregionModelMatchs extends JModelList
{
	public function __construct($config = array())
	{
		// pr�cise les colonnes activant le tri
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'm.id',
				'date_heure', 'm.date_heure',
				'score_domicile', 'm.score_domicile',
				'score_invite', 'm.score_invite',
				'nom', 'm.nom', 
				'adr_rue', 'm.adr_rue',
				'adr_ville', 'm.adr_ville',
				'adr_cp', 'm.adr_cp',
				'coord_gps', 'm.coord_gps',
				'equipes_invite_id', 'm.equipes_invite_id',
				'equipes_domicile_id', 'm.equipes_domicile_id',
				'entraineurs_invite_id', 'm.entraineurs_invite_id',
				'entraineurs_initiateur_id', 'm.entraineurs_initiateur_id',
				'tournois_id', 'm.tournois_id',
				'statuts_id', 'm.statuts_id',
				'published', 'm.published',
				'hits', 'm.hits',
				'modified', 'm.modified'
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
		$query->select('m.id, m.date_heure, m.date_heure, m.score_domicile, m.score_invite, m.adr_rue, m.adr_ville, m.adr_cp, m.coord_gps, m.equipes_invite_id, m.equipes_domicile_id, m.entraineurs_invite_id, m.entraineurs_initiateur_id, m.tournois_id, m.statuts_id, m.nom, m.published, m.hits, m.modified');
		$query->from('#__footregion_matchs m');

		// joint la table typesmatchs
		//$query->select('t.typematch AS typematch')->join('LEFT', '#__footregion_typesmatchs AS t ON t.id=m.typesmatchs_id');

		// joint la table statut
		$query->select('s.statut AS statut')->join('LEFT', '#__footregion_statuts AS s ON s.id=m.statuts_id');		
		
		// filtre de recherche rapide textuelle
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			// recherche prefix�e par 'id:'
			if (stripos($search, 'id:') === 0) {
				$query->where('m.id = '.(int) substr($search, 3));
			}
			else {
				// recherche textuelle classique (sans pr�fixe)
				$search = $this->_db->Quote('%'.$this->_db->escape($search, true).'%');
				// Compile les clauses de recherche
				$searches	= array();
				$searches[]	= 'm.nom LIKE '.$search;
				$searches[]	= 'm.prenom LIKE '.$search;
				$searches[]	= 't.typematch LIKE '.$search;
				$searches[]	= 'e.nom LIKE '.$search;
				// Ajoute les clauses � la requ�te
				$query->where('('.implode(' OR ', $searches).')');
			}
		}
		
		// filtre les �l�ments publi�s
		$query->where('m.published=1');
		
		// tri des colonnes
		$orderCol = $this->getState('list.ordering', 'nom');
		$orderDirn = $this->getState('list.direction', 'ASC');
		$query->order($this->_db->escape($orderCol.' '.$orderDirn));

		// echo nl2br(str_replace('#__','egs_',$query));			// TEST/DEBUG
		return $query;
	}
}
