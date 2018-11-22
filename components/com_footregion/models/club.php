<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionModelClub extends JModelItem
{
	protected $_item = null;
	protected $_context = 'com_footregion.club';

	protected function populateState()
	{
		$app = JFactory::getApplication('site');
		
		// Charge et mémorise l'état (state) de l'id depuis le contexte
		$pk = $app->input->getInt('id');
		$this->setState($this->_context.'.id', $pk);
		// $this->setState('club.id', $pk);
	}

	public function getItem($pk = null)
	{
		// Initialise l'id
		$pk = (!empty($pk)) ? $pk : (int) $this->getState($this->_context.'.id');

		// Si pas de données chargées pour cet id
		if (!isset($this->_item[$pk])) {
			$db = $this->getDbo();
			$query = $db->getQuery(true);
			$query->select('c.id, c.nom, c.adr_rue,c.sigle, c.adr_ville, c.adr_cp, c.directeurs_id, c.alias, c.published, c.created, c.created_by, c.modified, c.modified_by, c.hits');
			$query->from('#__footregion_clubs AS c');

			// joint la table civilites
			$query->select('d.email AS email')->join('LEFT', '#__footregion_directeurs AS d ON d.id=c.directeurs_id');
			s$query->select('u.nom AS nomDirecteur, u.prenom AS prenomDirecteur')->join('LEFT', '#__footregion_utilisateurs AS u ON u.email=d.email');

			
			$query->where('c.id = ' . (int) $pk);
			$db->setQuery($query);
			$data = $db->loadObject();
			$this->_item[$pk] = $data;
		}
  		return $this->_item[$pk];
	}
}
