<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionModelTournoi extends JModelItem
{
	protected $_item = null;
	protected $_context = 'com_footregion.tournoi';

	protected function populateState()
	{
		$app = JFactory::getApplication('site');
		
		// Charge et mémorise l'état (state) de l'id depuis le contexte
		$pk = $app->input->getInt('id');
		$this->setState($this->_context.'.id', $pk);
		// $this->setState('tournoi.id', $pk);
	}

	public function getItem($pk = null)
	{
		// Initialise l'id
		$pk = (!empty($pk)) ? $pk : (int) $this->getState($this->_context.'.id');

		// Si pas de données chargées pour cet id
		if (!isset($this->_item[$pk])) {
			$db = $this->getDbo();
			$query = $db->getQuery(true);
			$query->select('t.id, t.nom, t.prenom, t.civilites_id, t.typestournois_id, t.entreprises_id, t.fonction, t.email, t.mobile, t.tel, t.commentaire');
			$query->from('#__footregion_tournois AS c');

			// joint la table civilites
			$query->select('m.civilite AS civilite')->join('LEFT', '#__footregion_civilites AS m ON m.id=t.civilites_id');

			// joint la table typestournois
			$query->select('t.typeTournoi AS typetournoi')->join('LEFT', '#__footregion_typestournois AS t ON t.id=t.typestournois_id');

			// joint la table entreprises
			$query->select('e.nom AS entreprise')->join('LEFT', '#__footregion_entreprises AS e ON e.id=t.entreprises_id');		
					
			$query->where('t.id = ' . (int) $pk);
			$db->setQuery($query);
			$data = $db->loadObject();
			$this->_item[$pk] = $data;
		}
  		return $this->_item[$pk];
	}
}
