<?php
defined('_JEXEC') or die('Restricted access');
 
class FootRegionModelJoueur extends JModelItem
{
	protected $_item = null;
	protected $_context = 'com_footregion.joueur';

	protected function populateState()
	{
		$app = JFactory::getApplication('site');
		
		// Charge et mémorise l'état (state) de l'id depuis le contexte
		$pk = $app->input->getInt('id');
		$this->setState($this->_context.'.id', $pk);
		// $this->setState('entreprise.id', $pk);
	}

	public function getItem($pk = null)
	{
		// Initialise l'id
		$pk = (!empty($pk)) ? $pk : (int) $this->getState($this->_context.'.id');

		// Si pas de données chargées pour cet id
		if (!isset($this->_item[$pk])) {
			$db = $this->getDbo();
			$query = $db->getQuery(true);
			$query->select('j.id, j.email, j.poste, j.num_licence, j.date_naiss, j.equipes_id, j.alias, j.published, j.hits, j.modified');
			$query->from('#__footregion_joueurs j');

			$query->select('e.nom AS equipe')->join('LEFT', '#__footregion_equipes AS e ON e.id = j.equipes_id');
			$query->select('utilisateurs.nom AS nom')->join('LEFT', '#__footregion_utilisateurs AS utilisateurs ON utilisateurs.email=j.email');
			$query->select('u.prenom AS prenom')->join('LEFT', '#__footregion_utilisateurs AS u ON u.email=j.email');

			$query->where('j.id = ' . (int) $pk);
			$db->setQuery($query);
			$data = $db->loadObject();
			$this->_item[$pk] = $data;
		}
  		return $this->_item[$pk];
	}
}
