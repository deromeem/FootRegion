<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionModelUtilisateur extends JModelItem
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
		// Recherche user courant
		$user = JFactory::getUser();
		$email = $user->email;
		// echo("user email: ".$user->email);
		// Initialise l'id
		$pk = (!empty($pk)) ? $pk : (int) $this->getState($this->_context.'.id');

		// Si pas de données chargées pour cet id
		if (!isset($this->_item[$pk])) {
			$db = $this->getDbo();
			$query = $db->getQuery(true);

			$query->select('u.id, u.nom, u.prenom, u.mobile, u.email, u.alias, u.published, u.created, u.modified, u.hits, u.created_by, u.modified_by');
			$query->from('#__footregion_utilisateurs AS u');

			$user = JFactory::getUser(); 
			if(in_array('12', $user->groups)){
				// joint la table arbitres
				$query->select('a.id AS id_arbitres')->join('LEFT', '#__footregion_arbitres AS a ON a.email=u.email');
			}
			if(in_array('13', $user->groups)){
				// joint la table directeurs
				$query->select('d.id AS id_directeurs, d.date_affectation AS date_aff')->join('LEFT', '#__footregion_directeurs AS d ON d.email=u.email');
			}
			if(in_array('14', $user->groups)){
				// joint la table entraineurs
				$query->select('e.id AS id_entraineurs, e.num_licence AS num_licence_e')->join('LEFT', '#__footregion_entraineurs AS e ON e.email=u.email');
			}
			if(in_array('15', $user->groups)){
				// joint la table joueurs
				$query->select('j.id AS id_joueur, j.poste AS poste,j.date_naiss AS date_naiss,j.num_licence AS num_licence')->join('LEFT', '#__footregion_joueurs AS j ON j.email=u.email');
			}
			$query->where("u.email ='".$email."'");
			 echo nl2br(str_replace('#__','footregion_',$query));			// TEST/DEBUG

			$db->setQuery($query);
			$data = $db->loadObject();
			$this->_item[$pk] = $data;
		}
  		return $this->_item[$pk];
	}
}
