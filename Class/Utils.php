<?php

/**
 * \file      Utils.php
 * \author    Claire ANSART alias Raton
 * \version   1.0
 * \date      21 Mars 2015
 * \brief     Regroupe l'ensemble des fonctions généralistes du site.
 *
 * \details   La classe Utils regroupe un ensemle de fonctions qui seront utilisées dans plusieurs context ou objets différentsS
 */

class Utils{

	/**
	 * \brief      Coupe un extrait d'article
	 * \details    On vérifiera tout d'abord que la chaîne de texte initiale est bien supérieure à la coupe. La fonction coupera le texte au mot qui précède immédiatement la limit et y accolle un élément pour montrer que le texte renvoyé est un extrait.
	 *                  des coordonnées des points. (cf #Point)
	 * \param    $content     représente le contenu à couper.
	 * \param    $cut      représente la taille de l'extrait (... et lire la suite exclut).
	 * \param    $next       définit l'élément qui suit l'extrait "...", lien vers l'article... par défaut oncoupe à 150 mots 
	 * \return    Une chaine de texte coupée avec un élément montrant que c'est un extrait. Par défaut on accolle [...] + un lien Lire la suite
	 */

	public static function resume($content, $id, $cut = 100){
		if(strlen($content)>$cut){
			$resume=wordwrap($content,$cut,'|',true);
			$array=explode('|',$resume);
			$resume='<p>'.$array[0].'[...] </p>';
		}
		else{
			$resume=$content;	
		}
		return $resume;
	}

	/**
	 * \brief      Transforme une chaîne de type variable séparée par des underscores en camelCase utilasable pour une fonction
	 * \details    On remplace des underscores par des espaces on transforme les mots en mettant la première lettre de chacun en lettre capitale
	 * \param      $str     représente la chaine à transformer.
	 * \return     Une chaine de texte en CamelCase
	 */

	public static function camelCase($str){
		$str=str_replace('_',' ',$str);
		$str=ucwords($str);
		$str=str_replace(' ','',$str);

		return $str;
	}




}


