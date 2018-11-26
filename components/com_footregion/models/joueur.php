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

			$query->select('eq.nom AS nom_equipes')->join('LEFT', '#__footregion_equipes AS eq ON eq.id = j.id');

			$query->where('j.id = ' . (int) $pk);
			$db->setQuery($query);
			$data = $db->loadObject();
			$this->_item[$pk] = $data;
		}
  		return $this->_item[$pk];
	}
}
