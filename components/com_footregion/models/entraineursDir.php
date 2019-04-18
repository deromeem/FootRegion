<?php
defined('_JEXEC') or die('Restricted access');
 
jimport('joomla.application.component.modellist');
 
class FootRegionModelEntraineursDir extends JModelList
{
	public function __construct($config = array())
	{
		// pr�cise les colonnes activant le tri
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'en.id',
				'email', 'en.email',
				'num_licence', 'en.num_licence',
				'published', 'en.published',
				'hits', 'en.hits',
				'modified', 'en.modified'
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

		parent::populateState('email', 'ASC');
	}

	protected function _getListQuery()
	{
        // construit la requ�te d'affichage de la liste
        $user = JFactory::getUser();
		$user = $user->email;
		$query	= $this->_db->getQuery(true);
		$query->select('en.id, en.email, en.num_licence, en.published, en.hits, en.modified');
		$query->from('#__Footregion_Entraineurs en');

        $query->select('en.email AS email');
        $query->join('LEFT', '#__footregion_equipes AS e ON en.id=e.entraineurs_id');
        $query->join('LEFT', '#__footregion_clubs AS c ON c.id=e.clubs_id');
        $query->join('LEFT', '#__footregion_directeurs AS d ON d.id=c.directeurs_id');
        $query->where('d.email='.'"'.$user.'"');
        $query->select(' CONCAT(u.nom, " ", u.prenom) AS utilisateur')->join('LEFT', '#__footregion_utilisateurs AS u ON u.email=en.email');
        
		// filtre de recherche rapide textuelle
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			// recherche prefix�e par 'id:'
			if (stripos($search, 'id:') === 0) {
				$query->where('en.id = '.(int) substr($search, 3));
			}
			else {
				// recherche textuelle classique (sans pr�fixe)
				$search = $this->_db->Quote('%'.$this->_db->escape($search, true).'%');
				// Compile les clauses de recherche
				$searches	= array();
				$searches[]	= 'en.email LIKE '.$search;
				$searches[]	= 'u.nom LIKE '.$search;
				$searches[]	= 'u.prenom LIKE '.$search;
				
				// Ajoute les clauses � la requ�te
				$query->where('('.implode(' OR ', $searches).')');
			}
		}

		// filtre les �l�ments publi�s
		$query->where('en.published=1');
		
		// tri des colonnes
		$orderCol = $this->getState('list.ordering', 'email');
		$orderDirn = $this->getState('list.direction', 'ASC');
		$query->order($this->_db->escape($orderCol.' '.$orderDirn));

		// echo nl2br(str_replace('#__','footregion_',$query));			// TEST/DEBUG
		return $query;
	}
}
