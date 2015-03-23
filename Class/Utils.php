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
	 * \details    ON vérifiera tout d'abord que la chaîne de texte initiale est bien supérieure à la coupe. La fonction coupera le texte au mot qui précède immédiatement la limit et y accolle un élément pour montrer que le texte renvoyé est un extrait.
	 *                  des coordonnées des points. (cf #Point)
	 * \param    $content     représente le contenu à couper.
	 * \param    $cut      représente la taille de l'extrait (... et lire la suite exclut).
	 * \param    $next       définit l'élément qui suit l'extrait "...", lien vers l'article... par défaut oncoupe à 150 mots 
	 * \return    Une chaine de texte coupée avec un élément montrant que c'est un extrait. Par défaut on accolle [...] + un lien Lire la suite
	 */

	public static function resume($content, $id, $cut = 150){
		if(strlen($content)>$cut){
			$resume=wordwrap($content,$cut,'|',true);
			$array=explode('|',$resume);
			$resume=$array[0].'[...] <a href="single.php?id='.$id.'">Lire la suite</a> ';
		}
		else{
			$resume=$content;	
		}
		return $resume;
	}
}


