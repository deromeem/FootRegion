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
			$query->select('m.id, m.date_heure, m.date_heure, m.score_domicile, m.score_invite, m.adr_rue, m.adr_ville, m.adr_cp, m.coord_gps, m.equipes_invite_id, m.equipes_domicile_id, m.entraineurs_invite_id, m.entraineurs_initiateur_id, m.tournois_id, m.statuts_id, m.nom, m.published, m.hits, m.modified');
			$query->from('#__footregion_matchs AS m');
			//JOINTURES
			$query->select('s.statut AS statut')->join('LEFT', '#__footregion_statuts AS s ON s.id=m.statuts_id');		
			$query->select('e.nom AS equipe_invite')->join('LEFT', '#__footregion_equipes AS e ON e.id=m.equipes_invite_id');		
			$query->select('ed.nom AS equipe_domicile')->join('LEFT', '#__footregion_equipes AS ed ON ed.id=m.equipes_domicile_id');		
			$query->select('en.email AS entraineur_initiateur')->join('LEFT', '#__footregion_entraineurs AS en ON en.id=m.entraineurs_initiateur_id');		
			$query->select('ei.email AS entraineur_invite')->join('LEFT', '#__footregion_entraineurs AS ei ON ei.id=m.entraineurs_invite_id');		
			$query->select('t.nom AS tournoi')->join('LEFT', '#__footregion_tournois AS t ON t.id=m.tournois_id');		

			// joint la table civilites
			//$query->select('d.email AS email')->join('LEFT', '#__footregion_directeurs AS d ON d.id=m.directeurs_id');
			//$query->select('u.nom AS nomDirecteur, u.prenom AS prenomDirecteur')->join('LEFT', '#__footregion_utilisateurs AS u ON u.email=d.email');

			
			$query->where('m.id = ' . (int) $pk);

			// echo nl2br(str_replace('#__','footregion_',$query));
			$db->setQuery($query);
			$data = $db->loadObject();
			$this->_item[$pk] = $data;
		}
  		return $this->_item[$pk];
	}
}
