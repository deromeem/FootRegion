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

	private function LoadViewResult($view, $id = 0, $did = 0, $email = "")
	{
		$this->_db = JFactory::getDBO();
		$query = $this->_db->getQuery(true);
		$query->select('*');
		$query->from($this->_db->quoteName('#__vue_'.$view));
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
		$this->_db->setQuery($query);
		return $this->_db->loadObjectList();
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
		$email = "";
		
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
		 echo ("DEBUG login = " . $login . " pwd = " . $pwd . " task =>" . $task . " id =>" . $id . "<");    // TEST/DEBUG
		
		if (($login != "") and ($pwd != "")) {

			$credentials = array();
			$credentials['username']  = $login;
			$credentials['password']  = $pwd;
			$credentials['secretkey'] = '';      // 6 digits user secret for Two-Factor Authentication

			$config = JFactory::getConfig();
			$authenticate = JAuthentication::getInstance();
			$resp = $authenticate->authenticate($credentials);
			
			if (1 !== $resp->status)
			{
				// Echec de connexion !
				$response["success"] = 0;
				$response["message"] = "Echec de connexion";
				$response["user"] = "";		
				echo json_encode($response);
			}else{
				// Connexion réussie !
				$response["success"] = 1;
				$response["message"] = "Connexion reussie";
				
				// Recherche le nom et l'email de l'utilisateur connecté :
				$this->_db = JFactory::getDBO();
				$query = $this->_db->getQuery(true);
				$query->select('name, email');
				$query->from($this->_db->quoteName('#__users'));
				$query->where('username = "'.$login.'"');
				$this->_db->setQuery($query);
				$response["user"] = $this->_db->loadObject();
				$email = $response["user"]->email;
				
				// Recherche la vue éventuellement demandée :
				if ($task !== ""){
					if (($task == "matchs") or ($task == "joueurs")) {
						$response[$task] = $this->LoadViewResult($task, $id);
					} elseif ($task == "messages") {
						$response[$task] = $this->LoadViewResult($task, $id, $did);
					} else {
						$response[$task] = $this->LoadViewResult($task, $id, 0, $email);
					}
				}
				echo json_encode($response);
			}
			
		} else {
			// Paramètre(s) de connexion manquant(s) :
			$response["success"] = 0;
			$response["message"] = "Echec de connexion";
			$response["user"] = "";
			echo json_encode($response);
		}

	}
	
	public function isAdmin()
	{
		// fonction appelée quand l'utilisateur est connecté
		return false;
    }

}