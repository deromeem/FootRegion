<?php
defined('_JEXEC') or die;

class FootregionControllerUtilisateur extends JControllerForm
{
	// précise la vue (formulaire de saisie) à afficher
<<<<<<< HEAD:components/com_footregion/controllers/utilisateur.php
	protected $view_item = 'Form_utilisateur';
=======
	protected $view_item = 'form_utilisateur';
>>>>>>> ec5812df77e54b6e399eb9a7a34881e2806eabf1:components/com_footregion/controllers/profil.php
	
	// précise la variable d'édition URL
	protected $urlVar = 'a.id';
	
	public function add()
	{
		if (!parent::add())
		{
			// redirige à la page de retour
			$this->setRedirect($this->getReturnPage());
		}
	}

	public function edit($key = null, $urlVar = 'a_id')
	{
		$result = parent::edit($key, $urlVar);
		if (!$result)
		{
			$this->setRedirect($this->getReturnPage());
		}
		return $result;
	}

	public function save($key = null, $urlVar = 'a_id')
	{
		$result = parent::save($key, $urlVar);
		if ($result)
		{
			$this->setRedirect($this->getReturnPage());
		}
		return $result;
	}

	public function cancel($key = 'a_id')
	{
		parent::cancel($key);
		$this->setRedirect($this->getReturnPage());
	}

	protected function getReturnPage()
	{
		// $return = $this->input->get('return', null, 'base64');

		// if (empty($return) || !JUri::isInternal(base64_decode($return)))
		// {
			// return JUri::base();
		// }
		// else
		// {
			// return base64_decode($return);
		// }
		return JURI::base()."/index.php?option=com_footregion&view=utilisateur";		
	}

<<<<<<< HEAD:components/com_footregion/controllers/utilisateur.php
	public function getModel($name = 'Form_utilisateur', $prefix = '', $config = array('ignore_request' => true))
=======
	public function getModel($name = 'form_utilisateur', $prefix = '', $config = array('ignore_request' => true))
>>>>>>> ec5812df77e54b6e399eb9a7a34881e2806eabf1:components/com_footregion/controllers/profil.php
	{
		$model = parent::getModel($name, $prefix, $config);
		return $model;
	}
}
