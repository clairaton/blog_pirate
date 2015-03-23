<?php

/**
 * \file      Post.php
 * \author    Claire ANSART alias Raton
 * \version   1.0
 * \date      21 Mars 2015
 * \brief     Regroupe l'ensemble des propriétées et méthodes liées à l'objet Post du site du site.
 *
 * \details   La classe Post regroupe un ensemble de variables et de fonctions qui seront utilisées dans le cadre de la publications des articles du blog
 */

class Post{
	public $_post_id;
	public $_post_title;
	public $_post_author;
	public $_post_pic_id;
	public $_post_content;

	/**
	 * \brief      Permet d'initialiser les variables privées de l'objet Post
	 *
	 * \param      $post_id     représente l'id de l'article
	 *
	 */

    public function setPost_id($post_id) {
    	$this->_post_id = $post_id;
    }

    	/**
	 * \brief      Permet d'initialiser les variables privées de l'objet Post
	 *
	 * \param      $post_title     représente le titre de l'article
	 *
	 */

	public function setPost_title($post_title) {
		$this->_post_title = $post_title;
	}

		/**
	 * \brief      Permet d'initialiser les variables privées de l'objet Post
	 *
	 * \param      $post_author     représente l'auteur de l'article
	 *
	 */

	public function setPost_author($post_author) {
		$this->_post_author = $post_author;
	}

		/**
	 * \brief      Permet d'initialiser les variables privées de l'objet Post
	 *
	 * \param      $post_pic_id     représente l'id de la photo de l'article
	 *
	 */

	public function setPost_pic_id($post_pic_id) {
		$this->_post_pic_id = $post_pic_id;
	}

		/**
	 * \brief      Permet d'initialiser les variables privées de l'objet Post
	 *
	 * \param      $post_content     représente le contenu de l'article
	 *
	 */

	public function setPost_content($post_content) {
		$this->_post_content = $post_content;
	}



	/**
	 * \brief      Permet d'accèder variables privées de l'objet Post
	 *
	 * \return      $post_id     représente l'id de l'article
	 *
	 */

	public function getPost_id(){
		return $this->_post_id;
	}

	/**
	 * \brief      Permet d'accèder variables privées de l'objet Post
	 *
	 * \return      $post_title     représente le titre de l'article
	 *
	 */

	public function getPost_title(){
		return $this->_post_title;
	}

	/**
	 * \brief      Permet d'accèder variables privées de l'objet Post
	 *
	 * \return      $post_author     représente l'auteur' de l'article
	 *
	 */

	public function getPost_author(){
		return $this->_post_author;
	}

	/**
	 * \brief      Permet d'accèder variables privées de l'objet Post
	 *
	 * \return      $post_pic_id     représente l'id de l'image de l'article
	 *
	 */

	public function getPost_pic_id(){
		return $this->_post_pic_id;
	}

	/**
	 * \brief      Permet d'accèder variables privées de l'objet Post
	 *
	 * \return      $post_content     représente le contenu de l'article
	 *
	 */

	public function getPost_content(){
		return $this->_post_content;
	}

}

