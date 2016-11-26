<?php

namespace Controller;

use \W\Controller\Controller;
use Model\SalonsModel;
use Model\MessagesModel;

class SalonController extends Controller
{
	/**
	 * Cette action permet de voir la liste des messages d'un salon
	 * @param int $id l'id du salon dont je cherche à voir les messages
	 */
	public function seeSalon($id) {
		/*
		 * On instancie le modèle des salons de façon à récupérer les informations
		 * du salon dont l'id est $id (passé dans l'url)
		 */
		$salonsModel = new SalonsModel();
		$salon = $salonsModel->find($id);
		
		/*
		 * On instancie le modèles des messages pour récupérer les messages du
		 * salon dont l'id est $id
		 */
		$messagesModel = new MessagesModel();
		
		/*
		 * J'utilise la méthode search qui me permet d'exécuter la requête suivante :
		 * SELECT * FROM messages WHERE id_salon = $id
		 * Cette méthode me renvoie l'équivalent d'un fetchAll, c'est-à-dire
		 * un tableau de tableaux
		 */
		$messages = $messagesModel->search(array('id_salon'=>$id), 'OR', FALSE);
		
		$this->show('salons/see', array('salon' => $salon, 'messages' => $messages));
	}
}