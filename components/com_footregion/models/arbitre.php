<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionModelArbitre extends JModelItem
{
	protected $_item = null;
	protected $_context = 'com_footregion.arbitre';

	protected function populateState()
	{
		$app = JFactory::getApplication('site');
		
		// Charge et mémorise l'état (state) de l'id depuis le contexte
		$pk = $app->input->getInt('id');
		$this->setState($this->_context.'.id', $pk);
		// $this->setState('contact.id', $pk);
	}

	public function getItem($pk = null)
	{
		// Initialise l'id
		$pk = (!empty($pk)) ? $pk : (int) $this->getState($this->_context.'.id');

		// Si pas de données chargées pour cet id
		if (!isset($this->_item[$pk])) {
			$db = $this->getDbo();
			$query = $db->getQuery(true);
			$query->select('a.id, a.email, a.published, a.modified, a.hits');
			$query->from('#__footregion_arbitre AS a');

			// joint la table civilites
			// $query->select('m.civilite AS civilite')->join('LEFT', '#__annuaire_civilites AS m ON m.id=a.civilites_id');

			// joint la table typescontacts
			// $query->select('t.typeContact AS typecontact')->join('LEFT', '#__annuaire_typescontacts AS t ON t.id=a.typescontacts_id');

			// joint la table entreprises
			// $query->select('e.nom AS entreprise')->join('LEFT', '#__annuaire_entreprises AS e ON e.id=a.entreprises_id');		
					
			$query->where('a.id = ' . (int) $pk);
			$db->setQuery($query);
			$data = $db->loadObject();
			$this->_item[$pk] = $data;
		}
  		return $this->_item[$pk];
	}
}
