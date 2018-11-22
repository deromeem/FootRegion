<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionModelMatch extends JModelItem
{
	protected $_item = null;
	protected $_context = 'com_footregion.match';

	protected function populateState()
	{
		$app = JFactory::getApplication('site');
		
		// Charge et mémorise l'état (state) de l'id depuis le contexte
		$pk = $app->input->getInt('id');
		$this->setState($this->_context.'.id', $pk);
		// $this->setState('match.id', $pk);
	}

	public function getItem($pk = null)
	{
		// Initialise l'id
		$pk = (!empty($pk)) ? $pk : (int) $this->getState($this->_context.'.id');

		// Si pas de données chargées pour cet id
		if (!isset($this->_item[$pk])) {
			$db = $this->getDbo();
			$query = $db->getQuery(true);
			$query->select('m.id, m.nom, m.prenom, m.civilites_id, m.typesmatchs_id, m.entreprises_id, m.fonction, m.email, m.mobile, m.tel, m.commentaire');
			$query->from('#__footregion_footregion_matchs AS m');

			// // joint la table civilites
			// $query->select('m.civilite AS civilite')->join('LEFT', '#__footregion_civilites AS m ON m.id=m.civilites_id');

			// // joint la table typesmatchs
			// $query->select('t.typematch AS typematch')->join('LEFT', '#__footregion_typesmatchs AS t ON t.id=m.typesmatchs_id');

			// // joint la table entreprises
			// $query->select('e.nom AS entreprise')->join('LEFT', '#__footregion_entreprises AS e ON e.id=m.entreprises_id');		
					
			$query->where('m.id = ' . (int) $pk);
			$db->setQuery($query);
			$data = $db->loadObject();
			$this->_item[$pk] = $data;
		}
  		return $this->_item[$pk];
	}
}
