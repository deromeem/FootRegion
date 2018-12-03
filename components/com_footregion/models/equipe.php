<?php
defined('_JEXEC') or die('Restricted access');
 
class FootRegionModelEquipe extends JModelItem
{
	protected $_item = null;
	protected $_context = 'com_footregion.equipe';

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
			$query->select('e.id, e.nom, e.clubs_id, e.categories_id, e.entraineurs_id, j.alias, j.published, j.hits, j.modified');
			$query->from('#__footregion_equipes e');

			$query->select('c.nom AS club')->join('LEFT', '#__footregion_clubs AS c ON c.id = e.clubs_id');
			$query->select('ca.nom AS categorie')->join('LEFT', '#__footregion_categories AS ca ON ca.id=e.categories_id');
			$query->select('en.nom AS entraineur')->join('LEFT', '#__footregion_entraineurs AS en ON en.id=e.entraineurs_id');

			$query->where('j.id = ' . (int) $pk);
			$db->setQuery($query);
			$data = $db->loadObject();
			$this->_item[$pk] = $data;
		}
  		return $this->_item[$pk];
	}
}
