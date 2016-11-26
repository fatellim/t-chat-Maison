<?php

namespace Controller;

use \W\Controller\Controller;
use Model\UtilisateursModel;

class UserController extends Controller
{
	/**
	 * Cette fonction sert à afficher la liste des utilisateurs
	 */
	public function listUsers() {
//		$usersList = array(
//			'Googleman', 'Pausewoman', 'Pauseman', 'Roland'
//		);
		
		/*
		 * Ici j'instancie depuis l'action du contrôleur un modèle d'utilisateurs
		 * pour pouvoir accéder à la liste des utilisateurs
		 */
		$usersModel = new UtilisateursModel();
		
		$usersList = $usersModel->findAll();
		
		// la ligne suivante affiche la vue présente dans app/Views/users/list.php
		// et y injecte le tableau $usersList sous un nouveau nom $listUsers
		$this->show('users/list', array('listUsers' => $usersList));
	}
}