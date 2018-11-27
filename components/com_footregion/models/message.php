<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionModelMessage extends JModelItem
{
	protected $_item = null;
	protected $_context = 'com_footregion.message';

	protected function populateState()
	{
		$app = JFactory::getApplication('site');
		
		// Charge et mémorise l'état (state) de l'id depuis le contexte
		$pk = $app->input->getInt('id');
		$this->setState($this->_context.'.id', $pk);
		// $this->setState('discussion.id', $pk);
	}

	public function getItem($pk = null)
	{
		// Initialise l'id
		$pk = (!empty($pk)) ? $pk : (int) $this->getState($this->_context.'.id');

		// Si pas de données chargées pour cet id
		if (!isset($this->_item[$pk])) {
			$db = $this->getDbo();
			$query = $db->getQuery(true);
			$query->select('m.id, m.libelle, m.discussions_id, m.utilisateurs_id, m.alias, m.published, m.created, m.created_by, m.modified, m.modified_by, m.hits');
			$query->from('#__footregion_messages m');

			// joint la table utilisateurs
			//$query->select('u.nom AS utilisateur')->join('LEFT', '#__footregion_utilisateurs AS u ON u.id=m.discussions_id');
		
			$query->where('m.id = ' . (int) $pk);
			$db->setQuery($query);
			$data = $db->loadObject();
			$this->_item[$pk] = $data;
		}
  		return $this->_item[$pk];
	}
}
