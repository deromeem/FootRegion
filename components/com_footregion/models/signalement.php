<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionModelsignalement extends JModelItem
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
			$query->select('s.id, s.libelle, s.arbitres_id, s.entraineurs_id, s.alias, s.published, s.created, s.created_by, s.modified, s.modified_by, s.hits');
			$query->from('#__footregion_signalements s');

			// joint la table equipes
			$query->select('a.email AS arbitre')->join('LEFT', '#__footregion_arbitres AS a ON s.arbitres_id=a.id');
			$query->select('e.email AS entraineur')->join('LEFT', '#__footregion_entraineurs AS e ON s.entraineurs_id=e.id');
					
			$query->where('s.id = ' . (int) $pk);
			$db->setQuery($query);
			$data = $db->loadObject();
			$this->_item[$pk] = $data;
		}
  		return $this->_item[$pk];
	}
}
