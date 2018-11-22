<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionModelProfil extends JModelItem
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
		// Initialise l'id
		$pk = (!empty($pk)) ? $pk : (int) $this->getState($this->_context.'.id');

		// Si pas de données chargées pour cet id
		if (!isset($this->_item[$pk])) {
			$db = $this->getDbo();
			$query = $db->getQuery(true);
			$query->select('c.id, c.nom, c.prenom, c.mobile, c.email, c.alias, c.published, c.created, c.modified, c.hits, c.created_by, c.modified_by');
			$query->from('#__footregion_utilisateurs AS c');

			// joint la table civilites
			// $query->select('m.civilite AS civilite')->join('LEFT', '#__footregion_civilites AS m ON m.id=c.civilites_id');

			// joint la table typesutilisateurs
			// $query->select('t.typeutilisateur AS typeutilisateur')->join('LEFT', '#__footregion_typesutilisateurs AS t ON t.id=c.typesutilisateurs_id');

			// joint la table entreprises
			// $query->select('e.nom AS entreprise')->join('LEFT', '#__footregion_entreprises AS e ON e.id=c.entreprises_id');		
					
			$query->where('c.id = ' . (int) $pk);
			$db->setQuery($query);
			$data = $db->loadObject();
			$this->_item[$pk] = $data;
		}
  		return $this->_item[$pk];
	}
}
