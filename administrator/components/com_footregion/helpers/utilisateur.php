<?php
defined('_JEXEC') or die;

class UtilisateurHelper extends JHelperContent
{
	public static function addSubmenu($vName)
	{
		JHtmlSidebar::addEntry(
			JText::_('Arbitres'),
			'index.php?option=com_footregion&view=arbitres',
			$vName == 'arbitres'
		);

		JHtmlSidebar::addEntry(
			JText::_('Arbitres par matchs'),
			'index.php?option=com_footregion&view=matchs_arbitres',
			$vName == 'matchs_arbitres'
		);
		
		JHtmlSidebar::addEntry(
			JText::_('Categories'),
			'index.php?option=com_footregion&view=categories',
			$vName == 'categories'
		);
		
		JHtmlSidebar::addEntry(
			JText::_('Clubs'),
			'index.php?option=com_footregion&view=clubs',
			$vName == 'clubs'
		);
		
		JHtmlSidebar::addEntry(
			JText::_('Directeurs'),
			'index.php?option=com_footregion&view=directeurs',
			$vName == 'directeurs'
		);

		JHtmlSidebar::addEntry(
				JText::_('Discussions'),
				'index.php?option=com_footregion&view=discussions',
				$vName == 'discussions'
		);
		
		JHtmlSidebar::addEntry(
			JText::_('Entraineurs'),
			'index.php?option=com_footregion&view=entraineurs',
			$vName == 'entraineurs'
		);
		
		JHtmlSidebar::addEntry(
			JText::_('Equipes'),
			'index.php?option=com_footregion&view=equipes',
			$vName == 'equipes'
		);
		
		JHtmlSidebar::addEntry(
			JText::_('Joueurs'),
			'index.php?option=com_footregion&view=joueurs',
			$vName == 'joueurs'
		);
		
		JHtmlSidebar::addEntry(
			JText::_('Matchs'),
			'index.php?option=com_footregion&view=matchs',
			$vName == 'matchs'
		);

		JHtmlSidebar::addEntry(
			JText::_('Messages'),
			'index.php?option=com_footregion&view=messages',
			$vName == 'messages'
		);	

		JHtmlSidebar::addEntry(
			JText::_('Signalements'),
			'index.php?option=com_footregion&view=signalements',
			$vName == 'signalements'
		);
		
		JHtmlSidebar::addEntry(
			JText::_('Status'),
			'index.php?option=com_footregion&view=status',
			$vName == 'status'
		);

		JHtmlSidebar::addEntry(
			JText::_('Tournois'),
			'index.php?option=com_footregion&view=tournois',
			$vName == 'tournois'
		);
		
		JHtmlSidebar::addEntry(
			JText::_('Utilisateurs'),
			'index.php?option=com_footregion&view=utilisateurs',
			$vName == 'utilisateurs'
		);
	}
}
