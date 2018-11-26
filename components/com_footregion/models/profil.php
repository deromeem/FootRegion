<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionModelProfil extends JModelItem
{
	protected $_item = null;
	protected $_context = 'com_footregion.utilisateur';

	protected function populateState()
	{
		$app = JFactory::getApplication('site');
		
		// Charge et mémorise l'état (state) de l'id depuis le contexte
		$pk = $app->input->getInt('id');
		$this->setState($this->_context.'.id', $pk);
		// $this->setState('utilisateur.id', $pk);
	}

	public function getItem($pk = null)
	{
		// Initialise l'id
		$pk = (!empty($pk)) ? $pk : (int) $this->getState($this->_context.'.id');

		// Si pas de données chargées pour cet id
		if (!isset($this->_item[$pk])) {
			$db = $this->getDbo();
			$query = $db->getQuery(true);
			$query->select('u.id, u.nom, u.prenom, u.mobile, u.email, u.alias, j.poste, j.num_licence, j.date_naiss, j.equipe_id ,e.num_licence, eq.clubs_id, eq.nom, cl.id, cl.nom, cl.sigle, cat.id, cat.nom, d.date_affectation, u.published, u.created, u.modified, u.hits, u.created_by, u.modified_by');
			$query->from('#__footregion_utilisateurs AS u, #__footregion_joueurs AS j, #__footregion_entraineurs AS e,#__footregion_equipes AS eq, #__footregion_clubs AS cl, #__footregion_categories AS cat, #__footregion_directeurs AS d');

			// joint la table equipes
			$query->select('eq.nom AS equipe')->join('LEFT', '#__footregion_equipes AS eq ON eq.entraineurs_id=e.id');

			// joint la table clubs
			$query->select('cl.nom AS club')->join('LEFT', '#__footregion_clubs AS cl ON cl.directeurs_id=d.id');

			// joint la table categories
			$query->select('cat.nom AS categorie')->join('LEFT', '#__footregion_categories AS cat ON cat.id=eq.categories_id');		
					
			$query->where('u.id = ' . (int) $pk);
			$db->setQuery($query);
			$data = $db->loadObject();
			$this->_item[$pk] = $data;
		}
  		return $this->_item[$pk];
	}
}
