<?php
defined('_JEXEC') or die('Restricted access');
 
// récupère une instance du contrôleur préfixé par le nom du composant
<<<<<<< HEAD:components/com_footregion/footregion.php
$controller = JControllerLegacy::getInstance('footregion');
$controller = JControllerLegacy::getInstance('annuaire');
=======

$controller = JControllerLegacy::getInstance('footregion');
>>>>>>> 6b88f80f4ad70354ebe1877b8d5311db26b30a24:components/com_footregion/annuaire.php
 
// exécute la tâche demandée
$input = JFactory::getApplication()->input;
$task = $input->get('task', 'cmd');
$controller->execute($task);
 
// exécute la redirection prévue par le contrôleur
$controller->redirect();
