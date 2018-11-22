<?php
defined('_JEXEC') or die('Restricted access');
 
jimport('joomla.application.component.modellist');
 
class AnnuaireModelContacts extends JModelList
{
	public function __construct($config = array())
	{
		// pr�cise les colonnes activant le tri
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'u.id',
				'nom', 'u.nom',
				'prenom', 'u.prenom',
				'mobile','u.mobile'
				'email', 'u.email',
				'alias', 'u.alias',
				'published', 'u.published',
				'created', 'u.created',
				'modified', 'u.modified',
				'hits', 'u.hits',
				'created_by', 'u.created_by',
				'modified_by', 'u.modified_by'
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
		$query->select('u.id, u.nom, u.prenom, u.mobile, u.email, u.alias, u.published, u.created, u.modified, u.hits, u.created_by, u.modified_by');
		$query->from('#__footregion_utilisateurs u');

		// joint la table joueurs
		$query->select('j.id AS id_joueur')->join('LEFT', '#__footregion_joueurs AS j ON j.email=u.email');

		// joint la table entraineurs
		$query->select('e.id AS id_entraineurs')->join('LEFT', '#__footregion_entraineurs AS e ON e.email=u.email');
		
		// joint la table arbitres
		$query->select('a.id AS id_arbitres')->join('LEFT', '#__footregion_arbitres AS a ON a.email=u.email');

		// joint la table directeurs
		$query->select('d.id AS id_directeurs')->join('LEFT', '#__footregion_directeurs AS d ON d.email=u.email');

		// joint la table typescontacts
		//$query->select('t.typeContact AS typecontact')->join('LEFT', '#__annuaire_typescontacts AS t ON t.id=u.typescontacts_id');

		// joint la table entreprises
		//$query->select('e.nom AS entreprise')->join('LEFT', '#__annuaire_entreprises AS e ON e.id=u.entreprises_id');		
		
		// filtre de recherche rapide textuelle
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			// recherche prefix�e par 'id:'
			if (stripos($search, 'id:') === 0) {
				$query->where('u.id = '.(int) substr($search, 3));
			}
			else {
				// recherche textuelle classique (sans pr�fixe)
				$search = $this->_db->Quote('%'.$this->_db->escape($search, true).'%');
				// Compile les clauses de recherche
				$searches	= array();
				$searches[]	= 'u.nom LIKE '.$search;
				$searches[]	= 'u.prenom LIKE '.$search;
				$searches[]	= 'u.mobile LIKE '.$search;
				$searches[]	= 'u.email LIKE '.$search;
				$searches[]	= 'u.alias LIKE '.$search;
				// Ajoute les clauses � la requ�te
				$query->where('('.implode(' OR ', $searches).')');
			}
		}
		
		// filtre les �l�ments publi�s
		$query->where('u.published=1');
		
		// tri des colonnes
		$orderCol = $this->getState('list.ordering', 'nom');
		$orderDirn = $this->getState('list.direction', 'ASC');
		$query->order($this->_db->escape($orderCol.' '.$orderDirn));

		// echo nl2br(str_replace('#__','egs_',$query));			// TEST/DEBUG
		return $query;
	}
}
