<?php
defined('_JEXEC') or die('Restricted access');
 
// récupère une instance du contrôleur préfixé par le nom du composant
<<<<<<< HEAD
$controller = JControllerLegacy::getInstance('footregion');
=======
$controller = JControllerLegacy::getInstance('annuaire');
>>>>>>> 8ac9dd57608b1f193da2cc743d0f188d43be714a
 
// exécute la tâche demandée
$input = JFactory::getApplication()->input;
$task = $input->get('task', 'cmd');
$controller->execute($task);
 
// exécute la redirection prévue par le contrôleur
$controller->redirect();
