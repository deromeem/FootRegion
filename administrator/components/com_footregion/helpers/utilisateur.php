<?php
defined('_JEXEC') or die;

class UtilisateurHelper extends JHelperContent
{
	public static function addSubmenu($vName)
	{
		JHtmlSidebar::addEntry(
			JText::_('Utilisateurs'),
			'index.php?option=com_footregion&view=utilisateurs',
			$vName == 'utilisateurs'
		);

			JHtmlSidebar::addEntry(
				JText::_('Discussions'),
				'index.php?option=com_footregion&view=discussions',
				$vName == 'discussions'
		);
	}
}
