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
				'id', 'c.id',
				'nom', 'c.nom',
				'prenom', 'c.prenom',
				'mobile','c.mobile'
				'email', 'c.email',
				'alias', 'c.alias',
				'published', 'c.published',
				'created', 'c.created',
				'modified', 'c.modified',
				'hits', 'c.hits',
				'created_by', 'c.created_by',
				'modified_by', 'c.modified_by'
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
		$query->select('c.id, c.nom, c.prenom, c.mobile, c.email, c.alias, c.published, c.created, c.modified, c.hits, c.created_by, c.modified_by');
		$query->from('#__footregion_utilisateurs c');

		// joint la table typescontacts
		//$query->select('t.typeContact AS typecontact')->join('LEFT', '#__annuaire_typescontacts AS t ON t.id=c.typescontacts_id');

		// joint la table entreprises
		//$query->select('e.nom AS entreprise')->join('LEFT', '#__annuaire_entreprises AS e ON e.id=c.entreprises_id');		
		
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
				$searches[]	= 'c.prenom LIKE '.$search;
				$searches[]	= 'c.mobile LIKE '.$search;
				$searches[]	= 'c.email LIKE '.$search;
				$searches[]	= 'c.alias LIKE '.$search;
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

		// echo nl2br(str_replace('#__','egs_',$query));			// TEST/DEBUG
		return $query;
	}
}
