<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionModelDiscussion extends JModelItem
{
	protected $_item = null;
	protected $_context = 'com_footregion.discussion';

	protected function populateState()
	{
		$app = JFactory::getApplication('site');
		
		// Charge et mémorise l'état (state) de l'id depuis le contexte
		$pk = $app->input->getInt('id');
		$this->setState($this->_context.'.id', $pk);
		$this->setState('discussion.id', $pk);
	}

	public function getItem($pk = null)
	{
		// Initialise l'id
		$pk = (!empty($pk)) ? $pk : (int) $this->getState($this->_context.'.id');

		// Si pas de données chargées pour cet id
		if (!isset($this->_item[$pk])) {
			$db = $this->getDbo();
			$query = $db->getQuery(true);
			$query->select('d.theme, u.nom, u.prenom');
			$query->from('#__footregion_utilisateurs AS u')->join('LEFT', '#__footregion_discussions AS d ON u.id=d.utilisateurs_id');
			
			$query->select('d.id, d.theme, d.utilisateurs_id, d.alias, d.published, d.created, d.created_by, d.modified, d.modified_by, d.hits');
			$query->from('#__footregion_discussions d');

			// joint la table message
			$query->select('m.libelle AS libelle')->join('LEFT', '#__footregion_messages AS m ON d.id=m.discussions_id');
			
			$query->where('d.id = ' . (int) $pk);
			$db->setQuery($query);
			$data = $db->loadObject();
			$this->_item[$pk] = $data;
		}
  		return $this->_item[$pk];
	}
}
