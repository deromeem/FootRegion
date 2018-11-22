<?php
defined('_JEXEC') or die('Restricted access');

class FootregionModelDiscussions extends JModelList
{
	public function __construct($config = array())
	{
		// précise les colonnes activant le tri
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'd.id',
				'theme', 'd.theme',
				'utilisateurs_id', 'd.uilisateurs_id',
				'alias', 'd.alias',
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
		// récupère les informations de la session utilisateur nécessaires au paramétrage de l'écran
		$search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);

		$pay = $this->getUserStateFromRequest($this->context.'.filter.nom', 'filter_nom', '');
		$this->setState('filter.nom', $nom);

		$published = $this->getUserStateFromRequest($this->context.'.filter.published', 'filter_published', '');
		$this->setState('filter.published', $published);

		parent::populateState('modified', 'desc');
	}
	
	protected function getListQuery()
	{
		// construit la requête d'affichage de la liste
		$query = $this->_db->getQuery(true);
		$query->select('d.id, d.theme, d.utilisateurs_id, d.alias, d.published, d.created, d.created_by, d.modified, d.modified_by, d.hits');
		$query->from('#__footregion_discussions d');

		// joint la table utilisateurs
		$query->select('d.noms AS utlisateurs')->join('LEFT', '#__footregion_utilisateurs AS u ON u.id=d.utilisateurs_id');

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
				$searches[]	= 'd.theme LIKE '.$search;
				$searches[]	= 'd.utilisateurs_id LIKE '.$search;
				// Ajoute les clauses à la requête
				$query->where('('.implode(' OR ', $searches).')');
			}
		}

		// filtre selon l'état du filtre 'filter_pay'
		$nom = $this->getState('filter.nom');
		f (is_numeric($nom)) {
		$query->where('d.noms_id=' . (int) $pay);
		}
		
		// filtre selon l'état du filtre 'filter_published'
		$published = $this->getState('filter.published');
		if (is_numeric($published)) {
			$query->where('d.published=' . (int) $published);
		}
		elseif ($published === '') {
			// si aucune sélection, on n'affiche que les publiés et dépubliés
			$query->where('(d.published=0 OR d.published=1)');
		}

		// tri des colonnes
		$orderCol = $this->state->get('list.ordering', 'd.theme');
		$orderDirn = $this->state->get('list.direction', 'ASC');
		$query->order($this->_db->escape($orderCol.' '.$orderDirn));

		//echo nl2br(str_replace('#__','footregion_',$query));			// TEST/DEBUG
		return $query;
	}

	/*public function getNoms()
	{
		$query = $this->_db->getQuery(true);
		$query->select('id, nom');
		$query->from('#__footregion_utilisateurs');
		$query->where('published=1');
		$this->_db->setQuery($query);
		$noms = $this->_db->loadObjectList();
		return $noms;
	}	
	*/
}
