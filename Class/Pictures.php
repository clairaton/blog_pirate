<?php

/**
 * \file      Pictures.php
 * \author    Claire ANSART alias Raton
 * \version   1.0
 * \date      21 Mars 2015
 * \brief     Regroupe l'ensemble des propriétées et méthodes liées à l'objet Pictures du site du site du site.
 *
 * \details   La classe Post regroupe un ensemble de variables et de fonctions qui seront utilisées dans le cadre de la publications des articles du blog
 */

class Pictures{
	private $_id_pic;
	private $_original_url;
	private $_thumb_url;
	private $_medium_url;
	private $_pic_name;
	private $_pic_author;
	private $_pic_date;


	/**
	 * \brief    Construit l'objet pictures avec ses setters
	 *
	 * \param    $post_id     représente l'id de l'article
	 * \return   $post_img    représente l'Url de l'image
	 */


	 public function __construct($data = array())    {
	       // Pour chaque élément du tableau $data
	    foreach ($data as $key => $value) {
	           // On défini une variable pour reconstituer le nom d'un setter avec la clé issue du tableau $data
	        $method = 'set'.ucfirst($key); 
	        if (method_exists($this, $method)) {
	               // On appelle le setter et on lui passe la valeur issue du tableau $data
	               $this->$method($value); 
	        }
	    }
	}

	/**
	 * \brief      Permet de récupérer toutes les infos d'une photo
	 *
	 * \param      $post_id     représente l'id de l'article
	 * \return   $post_img    représente l'Url de l'image
	 */

	public function displayImg($pic_id){
		$stmt = $db -> query('SELECT * FROM pictures WHERE id_pic = :pic_id');
		$stmt -> bindValue('pic_id',$pic_id, PDO::PARAM_INT);
		$stmt -> execute();
		$result = $stmt -> fetch();

		return $result;
	}

	/**
	 * \brief      Permet d'enregistrer l'image uploadée lors de la création d'un article
	 *
	 * \param      $pic_id      représente l'id de l'article
	 * \return     $thumb_url   représente l'Url de l'image
	 */

	public function uploadImg($pic_id=NULL){
		// on s'assure que la photo est bien enregistrée en minuscule sans espace

		// si nous avons bien récupéré une image
		if (!empty($_FILES['news_pic'])){
			// si il n'y a pas d'erreurs de chargement
			if ($_FILES['news_pic']['error'] <= 0){
				// si la taille du fichier est inférieur à 2Mo
				if ($_FILES['news_pic']['size'] <= 2097152){
					// on récupére le nom de l'image chargée dans une variable
					$news_pic = $_FILES['news_pic']['name'];
					// on crée un array dans lequel figurent seulement les extensions acceptées, avec le type MIME qui leur est associé
					$extensionList = array('jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg');
					$extensionListIE = array('jpg' => 'image/pjpg', 'jpeg'=>'image/pjpeg'); // Exception IE pour le jpeg
					// on vérifie l'extension du fichier :
					$presumExtension = explode('.', $news_pic);
					$presumExtension = strtolower($presumExtension[count($presumExtension)-1]);
					if ($presumExtension == 'jpg' || $presumExtension == 'jpeg' || $presumExtension == 'pjpg' || $presumExtension == 'pjpeg' || $presumExtension == 'gif' || $presumExtension == 'png'){
						$news_pic = getimagesize($_FILES['news_pic']['tmp_name']);
						if($news_pic['mime'] == $ExtensionList[$presumExtension]  || $news_pic['mime'] == $extensionListIE[$presumExtension]){
							$choosenPic = imagecreatefromjpeg($_FILES['news_pic']['tmp_name']);
							//on enregistre l'image
							imagejpeg($choosenPic , 'uploads/'.$NomImageExploitable.'.'.$ExtensionPresumee, 100);
						}
					}
				}
			}
		}
	}

	/**
	 * \brief      Permet de créer une vignette à partir de la photo de départ en fonction de la largeur
	 *
	 * \param      $url_pic     représente l'url de la photo original
	 * \param      $thumb_w     représente la largeur cible de la photo
	 * \return     $thumb_url   représente l'Url de l'image
	 */

	public function ThumbByW($url_pic,$thumb_w=300){
		// on récupère la taille de l'image envoyée
		$size=getimagesize($url_pic);
		$w=$size[0]; 
		$h=$size[1];

		// on calcule la nouvelle hauteur
		if($w>$thumb_w){
			$thumb_h=$thumb_w*$h/$w;
		}
	}

	/**
	 * \brief      Permet de créer une vignette à partir de la photo de départ en fonction de la largeur
	 *
	 * \param      $url_pic     représente l'url de la photo original
	 * \param      $thumb_w     représente la largeur cible de la photo
	 * \param      $thumb_h     représente la hauteur cible de la photo
	 * \return     $thumb_url   représente l'Url de l'image
	 */

	public function createNewFormatImg($url_pic, $new_w, $new_h, $w, $h){
		// on crée la nouvelle image en couleurs vraies
		$newBlackPic=imagecreatetruecolor($new_w,$new_h);
		if(!$newBlackPic){
			throw new Exception ('l\'image true color n\'a pas pu être crée');
		}
		// On récupère le nom de l'image
		$nameFile=explode('/',$url_pic);
		$nameFile=$nameFile[1];
		// on copie la nouvelle image dans le template True Color que nous venons de créer
		imagecopyresampled('thumb/'.$nameFile, $url_pic, 0, 0, 0, 0, $thumb_w, $thumb_h, $w, $h)
	}

	/**
	 * \brief      Permet d'initialiser les variables privées de l'objet Pictures
	 *
	 * \param      $id_pic     représente l'id de l'image
	 *
	 */

    public function setPost_id($id_pic) {
    	$this->_id_pic = $id_pic;
    }

	/**
	 * \brief      Permet d'initialiser les variables privées de l'objet Pictures
	 *
	 * \param      $original_url     représente l'id de l'image
	 *
	 */

    public function setOriginal_url($original_url) {
    	$this->_original_url = $original_url;
    }

	/**
	 * \brief      Permet d'initialiser les variables privées de l'objet Pictures
	 *
	 * \param      $thumb_url     représente l'id de l'image
	 *
	 */

    public function setThumb_url($thumb_url) {
    	$this->_thumb_url = $thumb_url;
    }
	/**
	 * \brief      Permet d'initialiser les variables privées de l'objet Pictures
	 *
	 * \param      $medium_url     représente l'id de l'image
	 *
	 */

    public function setMedium_url($medium_url) {
    	$this->_medium_url = $medium_url;
    }
	/**
	 * \brief      Permet d'initialiser les variables privées de l'objet Pictures
	 *
	 * \param      $pic_name     représente l'id de l'image
	 *
	 */

    public function setPic_name($pic_name) {
    	$this->_pic_name = $pic_name;
    }
	/**
	 * \brief      Permet d'initialiser les variables privées de l'objet Pictures
	 *
	 * \param      $pic_author     représente l'id de l'image
	 *
	 */

    public function setPic_author($pic_author) {
    	$this->_pic_author = $pic_author;
    }
 	/**
	 * \brief      Permet d'initialiser les variables privées de l'objet Pictures
	 *
	 * \param      $pic_date     représente l'id de l'image
	 *
	 */

    public function setPic_date($pic_date) {
    	$this->_pic_date = $pic_date;
    }
	/**
	 * \brief      Permet d'accèder variables privées de l'objet Pictures
	 *
	 * \return      $id_pic     représente l'id de l'article
	 *
	 */

	public function getId_pic(){
		return $this->_id_pic;
	}
	/**
	 * \brief      Permet d'accèder variables privées de l'objet Pictures
	 *
	 * \return      $original_url     représente l'url de la photo originale
	 *
	 */

	public function getOriginal_url(){
		return $this->_original_url;
	}
	/**
	 * \brief      Permet d'accèder variables privées de l'objet Pictures
	 *
	 * \return      $thumb_url     représente l'url de la photo au format vignette
	 *
	 */

	public function getThumb_url(){
		return $this->_thumb_url;
	}
	/**
	 * \brief      Permet d'accèder variables privées de l'objet Pictures
	 *
	 * \return      $medium_url     représente l'url de la photo au format medium
	 *
	 */

	public function getMedium_url(){
		return $this->_medium_url;
	}
	/**
	 * \brief      Permet d'accèder variables privées de l'objet Pictures
	 *
	 * \return      $pic_name     représente le nom de la photo
	 *
	 */

	public function getPic_name(){
		return $this->_pic_name;
	}
	/**
	 * \brief      Permet d'accèder variables privées de l'objet Pictures
	 *
	 * \return      $pic_author     représente l'auteur de la photo
	 *
	 */

	public function getPic_author(){
		return $this->_pic_author;
	}
	/**
	 * \brief      Permet d'accèder variables privées de l'objet Pictures
	 *
	 * \return      $pic_date     représente la date de la photo
	 *
	 */

	public function getPic_date(){
		return $this->_pic_date;
	}
