<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.modellist');

class FootregionModelClub extends JModelList
{
	public function __construct($config = array())
	{
		// pr�cise les colonnes activant le tri
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
		$user = JFactory::getUser();
		$user = $user->email;
		$query	= $this->_db->getQuery(true);
		$query->select('DISTINCT c.id, c.nom, c.adr_rue,c.sigle, c.adr_ville, c.adr_cp, c.directeurs_id, c.alias, c.published, c.created, c.created_by, c.modified, c.modified_by, c.hits');
		$query->from('#__footregion_clubs c');


		$query->select('d.email AS email')->join('LEFT', '#__footregion_directeurs AS d ON d.id=c.directeurs_id');
    	$query->join('LEFT', '#__footregion_equipes AS e ON  e.clubs_id=c.id');
    	$query->select('ent.email AS email')->join('LEFT', '#__footregion_entraineurs AS ent ON ent.id=e.entraineurs_id');
    	$query->join('LEFT', '#__footregion_categories AS cat ON cat.id=e.categories_id');
    	$query->join('LEFT', '#__footregion_joueurs AS j ON j.equipes_id=e.id');
		$query->select('u.nom AS nomDirecteur, u.prenom AS prenomDirecteur')->join('LEFT', '#__footregion_utilisateurs AS u ON u.email=d.email and u.email=ent.email and u.email=j.email')->where('d.email='.'"'.$user.'" or j.email='.'"'.$user.'" or ent.email='.'"'.$user.'"');

		// filtre de recherche rapide textuelle
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			// recherche prefix�e par 'id:'
			if (stripos($search, 'id:') === 0) {
				$query->where('c.id = '.(int) substr($search, 3));
			}
			else {
				// recherche textuelle classique (sans pr�fixe)
				$search = $this->_db->Quote('%'.$this->_db->escape($search, true).'%');
				// Compile les clauses de recherche
				$searches	= array();
				$searches[]	= 'c.nom LIKE '.$search;

				// Ajoute les clauses � la requ�te
				$query->where('('.implode(' OR ', $searches).')');
			}
		}

		// filtre les �l�ments publi�s
		$query->where('c.published=1');

		// tri des colonnes
		$orderCol = $this->getState('list.ordering', 'nom');
		$orderDirn = $this->getState('list.direction', 'ASC');
		$query->order($this->_db->escape($orderCol.' '.$orderDirn));

	    //echo nl2br(str_replace('#__','footregion_',$query));			// TEST/DEBUG
		return $query;
	}
}
