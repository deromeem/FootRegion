<?php
defined('_JEXEC') or die('Restricted access');

class FootregionModelMessages extends JModelList
{
	public function __construct($config = array())
	{
		// précise les colonnes activant le tri
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'm.id',
				'libelle', 'm.libelle',
				'alias', 'm.alias',
				'utilisateurs_id', 'm.utilisateurs_id',
				'discussions_id', 'm.discussions_id',
				'published', 'm.published',
				'hits', 'm.hits',
				'modified', 'm.modified',

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
		// construit la requête d'affichage de la liste
		$query = $this->_db->getQuery(true);
		$query->select('m.id,m.libelle,m.alias,m.utilisateurs_id,m.discussions_id,m.published,m.hits,m.modified');
		$query->from('#__footregion_messages m');

		// joint la table pays
		// $query->select('p.pays AS pays')->join('LEFT', '#__annuaire_pays AS p ON p.id=e.pays_id');

		// joint la table discussions
		$query->select('d.theme AS theme')->join('LEFT', '#__footregion_discussions AS d ON d.id=m.discussions_id');

		// joint la table utilisateurs
		$query->select('u.nom AS nom')->join('LEFT', '#__footregion_utilisateurs AS u ON u.id=m.discussions_id');
		
		// filtre de recherche rapide textuel
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			// recherche prefixée par 'id:'
			if (stripos($search, 'id:') === 0) {
				$query->where('m.id = '.(int) substr($search, 3));
			}
			else {
				// recherche textuelle classique (sans préfixe)
				$search = $this->_db->Quote('%'.$this->_db->escape($search, true).'%');
				// Compile les clauses de recherche
				$searches	= array();
				$searches[]	= 'u.nom LIKE '.$search;
				//$searches[]	= 'm.prenom LIKE '.$search;
				// Ajoute les clauses à la requête
				$query->where('('.implode(' OR ', $searches).')');
			}
		}

		// filtre selon l'état du filtre 'filter_pay'
		// $pay = $this->getState('filter.pay');
		// if (is_numeric($pay)) {
		// 	$query->where('e.pays_id=' . (int) $pay);
		// }

		//filtre selon l'état du filtre 'filter_user'
		$user = $this->getState('filter.user');
		if (is_numeric($user)) {
			$query->where('u.nom=' . (int) $user);
		}
		
		//filtre selon l'état du filtre 'filter_discussion'
		$discussion = $this->getState('filter_discussion');
		if (is_numeric($discussion)) {
			$query->where('d.theme=' . (int) $discussion);
		}
		// filtre selon l'état du filtre 'filter_published'
		$published = $this->getState('filter.published');
		if (is_numeric($published)) {
			$query->where('m.published=' . (int) $published);
		}
		elseif ($published === '') {
			// si aucune sélection, on n'affiche que les publiés et dépubliés
			$query->where('(m.published=0 OR m.published=1)');
		}

		// tri des colonnes
		$orderCol = $this->state->get('list.ordering', 'm.nom');
		$orderCol = $this->state->get('list.ordering', 'm.libelle');
		$orderDirn = $this->state->get('list.direction', 'ASC');
		$query->order($this->_db->escape($orderCol.' '.$orderDirn));

		// echo nl2br(str_replace('#__','footregion_',$query));			// TEST/DEBUG
		return $query;
	}

	public function getUtilisateurs()
	{
		$query = $this->_db->getQuery(true);
		$query->select('id, nom');
		$query->from('#__footregion_utilisateurs');
		$query->where('published=1');
		$query->order('nom ASC');
		$this->_db->setQuery($query);
		$utilisateurs = $this->_db->loadObjectList();
		return $utilisateurs;
	}	
	public function getDiscussions()
	{
		$query = $this->_db->getQuery(true);
		$query->select('id, theme');
		$query->from('#__footregion_discussions');
		$query->where('published=1');
		$query->order('theme ASC');
		$this->_db->setQuery($query);
		$discussions = $this->_db->loadObjectList();
		return $discussions;
	}	
}
