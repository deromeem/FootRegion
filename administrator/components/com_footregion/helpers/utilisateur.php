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
		
		JHtmlSidebar::addEntry(
			JText::_('clubs'),
			'index.php?option=com_footregion&view=clubs',
			$vName == 'clubs'
		);

		JHtmlSidebar::addEntry(
			JText::_('categories'),
			'index.php?option=com_footregion&view=categories',
			$vName == 'categories'
		);

		JHtmlSidebar::addEntry(
			JText::_('directeurs'),
			'index.php?option=com_footregion&view=directeurs',
			$vName == 'directeurs'
		);
	}
}
