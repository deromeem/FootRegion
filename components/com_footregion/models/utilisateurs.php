<?php
defined('_JEXEC') or die('Restricted access');
 
jimport('joomla.application.component.modellist');
 
class FootregionModelUtilisateurs extends JModelList
{
	public function __construct($config = array())
	{
		// précise les colonnes activant le tri
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
		// récupère les informations de la session utilisateur nécessaires au paramétrage de l'écran
		$search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);

		//$pay = $this->getUserStateFromRequest($this->context.'.filter.pay', 'filter_pay', '');
		//$this->setState('filter.pay', $pay);

		$user = $this->getUserStateFromRequest($this->context.'.filter.user', 'filter_user', '');
		$this->setState('filter.user', $user);

		$discussion = $this->getUserStateFromRequest($this->context.'.filter.discussion', 'filter_discussion', '');
		$this->setState('filter.discussion', $discussion);

		$published = $this->getUserStateFromRequest($this->context.'.filter.published', 'filter_published', '');
		$this->setState('filter.published', $published);

		parent::populateState('modified', 'desc');
	}
	
	protected function getListQuery()
	{
		// construit la requete d'affichage de la liste
		$query	= $this->_db->getQuery(true);

		$query->select('j.poste, j.num_licence, j.date_naiss, j.equipes_id, j.alias, j.published, j.created, j.modified, j.hits, j.created_by, j.modified_by');
		$query->from('#__footregion_joueurs AS j');

		$query->select('e.num_licence, e.alias, e.published, e.created, e.modified, e.hits, e.created_by, e.modified_by');
		$query->from('#__footregion_entraineurs AS e');

		$query->select('d.date_affectation, d.alias, d.published, d.created, d.modified, d.hits, d.created_by, d.modified_by');
		$query->from('#__footregion_directeurs AS d');
		
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
		
		// filtre de recherche rapide textuel
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			// recherche prefixée par 'id:'
			if (stripos($search, 'id:') === 0) {
				$query->where('u.id = '.(int) substr($search, 3));
			}
			else {
				// recherche textuelle classique (sans préfixe)
				$search = $this->_db->Quote('%'.$this->_db->escape($search, true).'%');
				// Compile les clauses de recherche
				$searches	= array();
				$searches[]	= 'u.nom LIKE '.$search;
				//$searches[]	= 'u.prenom LIKE '.$search;
				// Ajoute les clauses à la requête
				$query->where('('.implode(' OR ', $searches).')');
			}
		}


		//filtre selon l'état du filtre 'filter_user'
		$user = $this->getState('filter.user');
		if (is_numeric($user)) {
			$query->where('u.nom=' . (int) $user);
		}
		
		//filtre selon l'état du filtre 'filter_joueur'
		$joueur = $this->getState('filter_joueur');
		if (is_numeric($joueur)) {
			$query->where('j.email=' . (int) $joueur);
		}

		//filtre selon l'état du filtre 'filter_entraineur'
		$entraineur = $this->getState('filter_entraineur');
		if (is_numeric($entraineur)) {
			$query->where('e.email=' . (int) $entraineur);
		}

		//filtre selon l'état du filtre 'filter_arbitre'
		$arbitre = $this->getState('filter_arbitre');
		if (is_numeric($arbitre)) {
			$query->where('a.email=' . (int) $arbitre);
		}

		//filtre selon l'état du filtre 'filter_directeur'
		$directeur = $this->getState('filter_directeur');
		if (is_numeric($directeur)) {
			$query->where('d.email=' . (int) $directeur);
		}

		// filtre selon l'état du filtre 'filter_published'
		$published = $this->getState('filter.published');
		if (is_numeric($published)) {
			$query->where('u.published=' . (int) $published);
		}
		elseif ($published === '') {
			// si aucune sélection, on n'affiche que les publiés et dépubliés
			$query->where('(u.published=0 OR u.published=1)');
		}

		// tri des colonnes
		$orderCol = $this->state->get('list.ordering', 'u.nom');
		$orderDirn = $this->state->get('list.direction', 'ASC');
		$query->order($this->_db->escape($orderCol.' '.$orderDirn));

		//echo nl2br(str_replace('#__','footregion_',$query));			// TEST/DEBUG
		return $query;
	}

	public function getDirecteurs()
	{
		$query = $this->_db->getQuery(true);
		$query->select('id, email');
		$query->from('#__footregion_directeurs');
		$query->where('published=1');
		$query->order('nom ASC');
		$this->_db->setQuery($query);
		$directeurs = $this->_db->loadObjectList();
		return $directeurs;
	}	
	public function getEntraineurs()
	{
		$query = $this->_db->getQuery(true);
		$query->select('id, email');
		$query->from('#__footregion_entraineurs');
		$query->where('published=1');
		$query->order('nom ASC');
		$this->_db->setQuery($query);
		$entraineurs = $this->_db->loadObjectList();
		return $entraineurs;
	}	
	public function getJoueurs()
	{
		$query = $this->_db->getQuery(true);
		$query->select('id, email');
		$query->from('#__footregion_joueurs');
		$query->where('published=1');
		$query->order('nom ASC');
		$this->_db->setQuery($query);
		$joueurs = $this->_db->loadObjectList();
		return $joueurs;
	}	
	public function getArbitres()
	{
		$query = $this->_db->getQuery(true);
		$query->select('id, email');
		$query->from('#__footregion_arbitres');
		$query->where('published=1');
		$query->order('theme ASC');
		$this->_db->setQuery($query);
		$arbitres = $this->_db->loadObjectList();
		return $arbitres;
	}	
	}
}