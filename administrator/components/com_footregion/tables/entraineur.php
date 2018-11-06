<?php
defined('_JEXEC') or die('Restricted access');
 
class FootregionTableEntraineur extends JTable
{
	function __construct(&$db) 
	{
			parent::__construct('#__footregion_entraineurs', 'id', $db);
	}

	public function store($updateNulls = false)
	{
		$date	= JFactory::getDate();
		$user	= JFactory::getUser();

		if ($this->id)
		{
			$this->modified		= $date->toSql();
			$this->modified_by	= $user->get('id');
		}
		else
		{
			if (!(int) $this->created)
			{
				$this->created = $date->toSql();
			}
			if (empty($this->created_by))
			{
				$this->created_by = $user->get('id');
			}
		}
		
		// contrôle d'unicité de l'alias SEF
		$table = JTable::getInstance('Entraineur', 'FootregionTable');
		// if ($table->load(array('alias' => $this->alias)) && ($table->id != $this->id || $this->id == 0))
		// {
			// $this->setError("COM_FOOTREGION_ALIAS_USED");
			// return false;
		// }
		
		return parent::store($updateNulls);
	}
}
