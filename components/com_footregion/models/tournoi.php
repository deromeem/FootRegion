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
			$query->select('t.id, t.nom');
			$query->from('#__footregion_tournois AS t');
			// jointures vers matchs enfin plutot match vers tournoi
			//$query->select('e.nom AS Equipe_Invite')->join('LEFT', '#__footregion_matchs AS m ON t.id=m.tournois_id')->join('LEFT', '#__footregion_equipes AS e ON m.equipes_invite_id=e.id');	;	
			$query->select('m.nom AS nomm');
			$query->from('#__footregion_matchs AS m');

			$query->where('t.id = ' . (int) $pk);
			$db->setQuery($query);
			$data = $db->loadObject();
			$this->_item[$pk] = $data;
		}
  		return $this->_item[$pk];
	}
}
