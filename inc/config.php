<?php

/**
 * \file      config.php
 * \author    Claire ANSART alias Raton
 * \version   1.0
 * \date      21 Mars 2015
 * \brief     Regroupe les fonctions de base telles l'autoload des classes
 *
 * \details   La fonction magique autoload permettra de charger automatiquement les différents objets du projet 
 */
function __autoload($class_name) {
    $class_path = 'Class/'.$class_name.'.php';
    if (file_exists($class_path)) {
        include $class_path;
        return true;
    }
    throw new Exception("Erreur chargement du fichier de class ".$class_name);
}


