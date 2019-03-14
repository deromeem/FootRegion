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
			
			$query->select('dis.theme, CONCAT(u.nom, " ",u.prenom) as utilisateur, m.created as date');

			$query->from('#__footregion_utilisateurs AS u')->join('LEFT', '#__footregion_messages AS m ON u.id= m.utilisateurs_id');
			// joint la table message
			$query->select('m.libelle AS message')->join('LEFT', '#__footregion_discussions AS dis ON dis.id = m.discussions_id');
			
			$query->where('dis.id = ' . (int) $pk);
			$query->order('date ASC');
			//echo nl2br(str_replace('#__','footregion_',$query));			// TEST/DEBUG
			$db->setQuery($query);
			$data = $db->loadObjectList();
			$this->_item[$pk] = $data;
		}
  		return $this->_item[$pk];
	}
}
