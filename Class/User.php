<?php

/**
 * \file      Pictures.php
 * \author    Claire ANSART alias Raton
 * \version   1.0
 * \date      21 Mars 2015
 * \brief     Regroupe l'ensemble des propriétées et méthodes liées à l'objet User du site.
 *
 * \details   La classe User regroupe un ensemble de variables et de fonctions qui seront utilisées dans le cadre de la publications des articles du blog
 */

class User{

	private $_id;
	private $_user_lastname;
	private $_user_firstname;
	private $_user_email;
	private $_user_pseudo;
	private $_user_creation_date;
	private $_pic_id;
	private $_user_pass;

	/*************************************************************************
	 *																		 *
	 *		 						 Methods    					         *
	 *									 									 *
	 ************************************************************************/

	/****************************************************************
	*                           Constructeur                        *
	****************************************************************/

	/**
	 * \brief    Construit l'objet user avec ses setters
	 *
	 * \param    $data     	  représente un tableau contenant les différentes valeurs à affecter aux propriétés de l'objet
	 * 
	 */

	public function __construct($post=array()){

		// on crée une boucle pour lancer l'ensemble des setters au construct
		foreach($post as $key => $value){
			$method= 'set'.Utils::camelCase($key);
			if(method_exists($this, $method)){
				$this->$method($value);
			}
		}
	}

	/****************************************************************
	*                             Setters                           *
	****************************************************************/

	public function setId($id){
		if(is_numeric($id) && $id>0){
			$this->_id=$id;
			return true;
		}
		throw new Exception ('ERROR: l\'id doit être un chiffre > 0');
	}
	public function setUserLastname($user_lastname){
		if(is_string($user_lastname) && strlen($user_lastname)<100){
			$this->_user_lastname=$user_lastname;
			return true;
		}
		throw new Exception ('ERROR: le user_lastname doit être une chaîne de caracatère inférieure à 100 caractères');
	}
	public function setUserFirstname($user_firstname){
		if(is_string($user_firstname) && strlen($user_firstname)<100){
			$this->_user_firstname=$user_firstname;
			return true;
		}
		throw new Exception ('ERROR: le user_firstname doit être une chaîne de caracatère inférieure à 100 caractères');
	}
	public function setUserEmail($user_email){
		if(filter_var($user_email, FILTER_VALIDATE_EMAIL) && strlen($user_email)<=150){
			$this->_user_email=$user_email;
			return true;
		}
		throw new Exception ('ERROR: le user_email doit être un email valide inférieur à 100 caractères');
	}
	public function setUserPseudo($user_pseudo){
		if(is_string($user_pseudo) && strlen($user_pseudo)<100){
			$this->_user_pseudo=$user_pseudo;
			return true;
		}
		throw new Exception ('ERROR: le user_pseudo doit être une chaîne de caracatère inférieure à 100 caractères');
	}
	public function setUserCreationDate($user_creation_date){
		if(strtotime($user_creation_date) !== false){
			$this->_user_creation_date=$user_creation_date;
			return true;
		}
		throw new Exception ('ERROR: la date de création doit être de format date');
	}
	public function setPicId($pic_id){
		if(is_string($pic_id) && strlen($pic_id)<255){
			$this->_pic_id=$pic_id;
			return true;
		}
		throw new Exception ('ERROR: le pic_id doit être une chaîne de caracatère inférieure à 100 caractères');
	}
	public function setUserPass($user_pass){
			$this->_user_pass=$user_pass;
			return true;
	}

	/****************************************************************
	*                             Getters                           *
	****************************************************************/

	public function getId(){
		return $this->_id;
	}
	
	public function getUserLastname(){
		return $this->_user_lastname;
	}
	
	public function getUserFirstname(){
		return $this->_user_firstname;
	}
	
	public function getUserEmail(){
		return $this->_user_email;
	}
	
	public function getUserPseudo(){
		return $this->_user_pseudo;
	}
	
	public function getUserCreationDate(){
		return $this->_user_creation_date;
	}
	
	public function getPicId(){
		return $this->_pic_id;
	}

	public function getUserPass(){
		return $this->_user_pass;
	}
}