<?php
 
defined('_JEXEC') or die;

JLoader::import('joomla.user.authentication');
JLoader::import('joomla.application.component.helper');

class AppFootregionWeb extends JApplicationCms
{
	public function __construct()
	{
		parent::__construct();
		require_once JPATH_CONFIGURATION.'/configuration.php';
	}

	private function LoadViewResult($task, $id = 0, $did = 0, $email = "")
	{
		$this->_db = JFactory::getDBO();
		$query = $this->_db->getQuery(true);
		$query->select('*');
		$query->from($this->_db->quoteName('#__vue_'.$task));
		if ($id != 0){
			$query->where('id = '.$id);
		}
		if ($did != 0){
			$query->where('did = '.$did);
		}
		if ($email != ""){
			$query->where('email = "'.$email.'"');
		}
		// echo nl2br(str_replace('#__','footregion_',$query));			// TEST/DEBUG
		try {
			$this->_db->setQuery($query);
			return $this->_db->loadObjectList();
		}
		catch (exception $e) {
			return 0;
		}
	}
	
	public function doExecute()
	{
		// Initialisation du tableau pour la réponse JSON :
		$response = array();
		
		// Initialisation des paramètres de l'url :
		$login = "";
		$pwd = "";
		
		$task = "";
		$id = 0;
		$did = 0;
		
		// Récupération des paramètres de connexion de l'url (en GET ou POST) :
		if ((isset($_GET["login"])) and (isset($_GET["pwd"]))) {
			$login = $_GET['login'];
			$pwd = $_GET['pwd'];
		} elseif ((isset($_POST["login"])) and (isset($_POST["pwd"]))) {
			$login = $_POST['login'];
			$pwd = $_POST['pwd'];
		}
		// Récupération du paramètre d'action, si existant, de l'url (en GET ou POST) :
		if (isset($_GET["task"])) {
			$task = $_GET['task'];
		} elseif (isset($_POST["task"])) {
			$task = $_POST['task'];
		}
		// Récupération du paramètre id, si existant, de l'url (en GET ou POST) :
		if (isset($_GET["id"])) {
			$id = $_GET['id'];
		} elseif (isset($_POST["id"])) {
			$id = $_POST['id'];
		}
		// Récupération du paramètre did, si existant, de l'url (en GET ou POST) :
		if (isset($_GET["did"])) {
			$did = $_GET['did'];
		} elseif (isset($_POST["did"])) {
			$did = $_POST['did'];
		}
		
		// echo ("DEBUG login = " . $login . " pwd = " . $pwd . " task =>" . $task . " id =>" . $id . "<");    // TEST/DEBUG
	
		if (($login != "") and ($pwd != "")) {

			$credentials = array();
			$credentials['username']  = $login;
			$credentials['password']  = $pwd;
			$credentials['secretkey'] = '';      // 6 digits user secret for Two-Factor Authentication

			$config = JFactory::getConfig();
			$authenticate = JAuthentication::getInstance();
			$resp = $authenticate->authenticate($credentials);
			
			if ($resp->status !== 1){
				// Echec de connexion !
				$response["success"] = 0;
				$response["message"] = "Echec de connexion";
				$response["user"] = "";		
			}else{
				// Connexion réussie !
				$response["success"] = 1;
				$response["message"] = "Connexion reussie";
				
				// Recherche le nom, l'email et le groupe de l'utilisateur connecté :
				$this->_db = JFactory::getDBO();
				$query = $this->_db->getQuery(true);
				
				$query->select('u.id AS uid, u.name AS name, u.email AS email');
				$query->from('#__users u');
				$query->select('ugm.group_id AS ugid')->join('LEFT', '#__user_usergroup_map AS ugm ON ugm.user_id=u.id');				
				$query->select('ug.title AS frgroup')->join('LEFT', '#__usergroups AS ug ON ug.id=ugm.group_id');				
				$query->where('u.username = "'.$login.'"');
				$query->where('ugm.group_id > 10');
				
				$this->_db->setQuery($query);
				$response["user"] = $this->_db->loadObject();
				
				// Supprime le premier mot ("FootRegion") du nom du groupe :
				$gwords = explode(" ", $response["user"]->frgroup);
				$response["user"]->frgroup = $gwords[1];
				
				// Recherche la vue éventuellement demandée :
				if ($task !== ""){
					$task_prefix = "";
					$twords = explode("_", $task);
					if (count($twords) > 1){						
						$task_prefix = $twords[0];
					}
					// echo ("DEBUG task_prefix =>" . $task_prefix . "< ");   // TEST/DEBUG
					if (($task_prefix == "mes") or ($task_prefix == "mon") or ($task_prefix == "ma")) {
						$email = $response["user"]->email;
					} else {
						$email = "";				
					}
					$response[$task] = $this->LoadViewResult($task, $id, $did, $email);
					
					if ($response[$task] == 0){
						// Vue inexistante :
						$response["success"] = 0;
						$response["message"] = "Vue_" . $task . " inexistante";
					}
				}
			}
		} else {
			// Identifiant(s) de connexion manquant(s) :
			$response["success"] = 0;
			$response["message"] = "Identifiant(s) de connexion manquant(s)";
			$response["user"] = "";
		}
		echo json_encode($response);
	}
	
	public function isAdmin()
	{
		// fonction appelée quand l'utilisateur est connecté
		return false;
    }

}