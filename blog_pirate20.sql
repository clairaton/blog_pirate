-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 30 Mars 2015 à 17:25
-- Version du serveur :  5.6.16
-- Version de PHP :  5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `blog_pirate20`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id_cat`, `cat_name`) VALUES
(1, 'pirates'),
(2, 'douarnenez'),
(3, 'activités');

-- --------------------------------------------------------

--
-- Structure de la table `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
  `id_pic` int(11) NOT NULL AUTO_INCREMENT,
  `original_url` varchar(255) NOT NULL,
  `thumb_url` varchar(255) DEFAULT NULL,
  `medium_url` varchar(255) DEFAULT NULL,
  `pic_name` varchar(100) NOT NULL,
  `pic_author` varchar(100) DEFAULT NULL,
  `pic_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pic`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `pictures`
--

INSERT INTO `pictures` (`id_pic`, `original_url`, `thumb_url`, `medium_url`, `pic_name`, `pic_author`, `pic_date`) VALUES
(1, 'uploads/Port-douardenez-by-philippematon.jpg', 'uploads/thumb/Port-douardenez-by-philippematon.jpg', 'uploads/medium/baie-douarnenez-by-exumo-cc.jpg', 'Port Douardenez', 'philippematon CC', '2015-03-26 17:24:05'),
(2, 'uploads/rakham.jpg', 'uploads/thumb/rakham.jpg', NULL, 'Rakham le Rouge de chez Tintin', 'Hergé', '2015-03-28 17:43:50'),
(3, 'uploads/pirate-flag.jpg', 'uploads/thumb/pirate-flag.jpg', NULL, 'drapeau pirate', 'Inconnu', '2015-03-28 17:43:50'),
(4, 'uploads/barbe-noire.jpg', 'uploads/thumb/barbe-noire.jpg', NULL, 'Barbe Noire de Pirate des Caraïbes', 'Disney', '2015-03-28 17:43:50'),
(5, 'uploads/captain-kidd.jpg', 'uploads/thumb/captain-kidd.jpg', NULL, 'Captain Kidd', 'Inconnu', '2015-03-28 17:43:50'),
(6, 'uploads/lapy-pirate.jpg', 'uploads/thumb/lapy-pirate.jpg', NULL, 'Anne Bonny', 'Inconnu', '2015-03-28 17:43:50');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(100) DEFAULT NULL,
  `post_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `post_pic_id` int(11) NOT NULL,
  `post_content` text NOT NULL,
  `post_category` varchar(50) DEFAULT NULL,
  `canonical_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post_author`, `post_date`, `post_pic_id`, `post_content`, `post_category`, `canonical_url`) VALUES
(1, 'DOUARNENEZ', 'Raspoutine', '2015-03-21 16:30:20', 1, '"Douarnenez est une commune française, située dans le département du Finistère en région Bretagne.\r\n\r\nDouarnenez garde encore la réputation d''un grand port sardinier, même si les caprices de la sardine, au fil du temps, ont entraîné une diversification des pêches autrefois saisonnières.\r\n\r\nPort de pêche florissant jusqu''à la fin des années 1970 et début 1980, il a connu un très net déclin depuis. L''activité de la pêche y est aujourd''hui marginale mais de nombreux bateaux y débarquent leur pêche. C''est également un port de plaisance important du Finistère avec Tréboul et le Port-Rhu.\r\n\r\nSes habitants portent le nom de Douarnenistes ; leurs voisins les appellent parfois (notamment les femmes) Penn Sardin, en référence au travail des ouvrières des conserveries qui consistait entre autres à couper la tête des sardines 1 (penn signifiant tête en breton).\r\nLa commune fut agrandie en 1945 en fusionnant avec les communes voisines de Ploaré, Pouldavid et Tréboul, et elle est aujourd''hui connue comme ville aux trois ports (port-Rhu, port du Rosmeur, port de Plaisance)."\r\n\r\nSource :<a href="http://fr.wikipedia.org/wiki/Douarnenez" alt="wikipedia">Wikipedia</a>', '2', 'http://fr.wikipedia.org/wiki/Douarnenez'),
(4, 'Edward Teach dit "Barbe Noire"', 'Barbe Noire', '2015-03-28 16:49:47', 4, '<strong>Naissance</strong> : vers 1680\r\n\r\n<strong>Nationalité</strong> : anglaise\r\n\r\n<strong>Bateau le plus connu</strong> : Queen Anne''s Revenge\r\n\r\n<strong>Signe distinctif</strong> : porte toujours sur lui plusieurs épées, couteaux et six pistolets.\r\n\r\n<strong>Faits célèbres</strong> : Pirate très puissant et très cruel, Barbe Noire est à la tête de 300 hommes et de 4 navires ! Il multiplie les abordages, les pillages et tueries. Il pille en un an plus de 40 navires !\r\nBarbe Noire est évidemment recherché et sa tête est mise à prix... C''est le Lieutenant Maynard, commandant du navire de guerre le "Pearl" qui doit capturer Barbe Noire.\r\n\r\n<strong>Mort</strong> : Au matin du 22 novembre 1718, le lieutenant Maynard lance l''abordage sur le navire de Barbe Noire, un combat féroce s''ensuit. Barbe Noire et Maynard se retrouvent face à face. Chacun étant armé d''un sabre et d''un pistolet. Barbe Noire est touché. Les deux hommes s''affrontent ensuite au sabre, celui du Lieutenant se brise sous les assauts de son terrible adversaire. Barbe Noire se rue sur lui pour lui porter le coup fatal, lorsqu''un matelot lui assène un coup de poignard à la nuque. Surmontant sa douleur, Barbenoire continue à combattre courageusement en dépit de ses multiples blessures quand un autre matelot se mêle au combat et l''assaille de coups de couteaux. Enfin, Maynard le touche mortellement d''un coup de pistolet. Barbe Noire s''écroule.\r\n\r\nSource: <a href="http://www.momes.net/Apprendre/Societe-culture-generale/Les-pirates/Les-pirates-celebres">Les momes.net</a>', '1', 'href="http://www.momes.net/Apprendre/Societe-culture-generale/Les-pirates/Les-pirates-celebres'),
(5, 'WILLIAM KIDD, DIT "CAPITAINE KIDD"', 'Capitaine Kidd', '2015-03-28 16:52:14', 5, '<strong>Naissance</strong> : vers 1645\r\n\r\n<strong>Nationalité</strong> : écossaise et anglaise\r\n\r\n<strong>Bateau le plus connu</strong> : l''Adventure galley\r\n\r\n<strong>Signe distinctif</strong> : marchand respectable avant d''être un pirate ! Particulièrement intéressé par l''or et l''argent.\r\n\r\n<strong>Faits célèbres</strong> : ce pirate a très peu de grandes batailles à son actif. Grâce à son navire, l''Adventure Galley, et à son équipage, il pille de nombreuses embarcations et amasse petit à petit un véritable trésor.\r\nIl est resté dans la légende car on raconte que son trésor est toujours caché quelque part...\r\nWilliam Kidd à caché son trésor quelque part à proximité de la rivière Connecticut, aux Etats-Unis. Certains évoquent l''île de Clarke dans le Massachussets. Après l''avoir partiellement enterré, il aurait organisé un tirage au sort pour désigner quel homme serait tué. Le corps du perdant devant être utilisé pour recouvrir le butin. Mais l''histoire ne s''arrête pas là. Les chercheurs de trésor doivent être au nombre de trois, formant un triangle, et doivent trouver, en silence, l''endroit exact où la pleine lune se reflète sur le sol. L''exploration de l''île fascine encore de nos jours de nombreux curieux !\r\n\r\n<strong>Mort</strong> : Il sera jugé coupable pour ses actes de pirateries mais surtout pour le meurtre d''un certain William Moore. Il sera pendu le 23 mai 1701. On place son corps pendu au-dessus de la Tamise en guise d''avertissement pour les futurs pirates !\r\n\r\n\r\nSource: <a href="http://www.momes.net/Apprendre/Societe-culture-generale/Les-pirates/Les-pirates-celebres">Les momes.net</a>', '1', 'href="http://www.momes.net/Apprendre/Societe-culture-generale/Les-pirates/Les-pirates-celebres'),
(6, 'ANNE BONNY DIT "LAPY PIRATE"', 'Lapy Pirate', '2015-03-28 16:54:29', 6, '<strong>Naissance</strong> : vers 1697\r\n\r\n<strong>Nationalité</strong> : irlandaise\r\n\r\n<strong>Signe distinctif</strong> : une femme ! Très rare dans le monde de la piraterie. On raconte qu’Anne était torse nu comme une Amazone.\r\n\r\n<strong>Faits célèbres</strong> : Avec l’aide d''amis, elle déguise un vieux bateau volé en bateau-fantôme en recouvrans les voiles de faux sang et utilisant des mannequins ensanglantés qu''elle met bien en vue sur son pont. A la vue de ce terrible navire, l’équipage du bateau de commerce, terrifié, prend la fuite laissant sa précieuse cargaison à la merci des apprentis pirates.\r\n\r\n<strong>Mort</strong> : elle évite de peu la pendaison. Puis elle disparaît. Certains pensent qu''elle serait retournée à la piraterie sous un autre nom, en particulier elle pu se déguiser en homme et devenir le pirate Bartholomew Roberts.\r\n\r\n\r\nSource: <a href="http://www.momes.net/Apprendre/Societe-culture-generale/Les-pirates/Les-pirates-celebres">Les momes.net</a>', '1', 'href="http://www.momes.net/Apprendre/Societe-culture-generale/Les-pirates/Les-pirates-celebres'),
(7, 'Les pirates', 'Jack Sparrow', '2015-03-29 23:24:12', 3, 'Un pirate est à l’origine un voleur qui vole sur mer et non sur terre.\r\nDepuis que les gens ont commencé à utiliser des bateaux pour transporter leurs objets précieux, les pirates ont essayé de les voler. Les Pirates existent donc depuis que l’homme navigue !\r\nMais les pirates tels qu’on les imagine aujourd’hui, comme Jack Sparrow de Pirates des Caraïbes, appartiennent à l’age d’or de la piraterie : au 17ème siècle et début du 18ème siècle. C''est à cette époque que le nombre de pirates a fortement augmenté. Ils naviguaient surtout dans la mer des Caraïbes et sur la côte Atlantique du nord de l’Amérique.\r\nA cette période de l’histoire les pays européens, en particulier l’Espagne explore le "Nouveau monde" (c''est-à-dire le monde qui n’est accessible qu’en bateau pour les européens, donc l’Amérique !) à la recherche d’or, d’argent et de pierres précieuses...\r\nLes bateaux, chargées de diamants et d’or naviguaient donc constamment entre l’amérique et l’europe, en plein océan Atlantique: une proie idéale pour les pirates et les corsaires !\r\n\r\nUn corsaire est un pirate qui a l’autorisation de son gouvernement d’attaquer les bateaux des pays ennemis. Les Rois donnent alors une Lettre de marque (image ci-contre) aux Pirates, pour qu’ils deviennent Corsaires, au service de sa majesté. Une manière pour le Roi de faire discrètement la guerre à ces énemis! Et à cette époque les rivalités entre les pays européens (surtout l’Angleterre et l’Espagne) sont très nombreuses.\r\nMais une fois que les rivalités étaient terminées, les corsaires, redevenaient des Pirates libres de piller qui ils voulaient !\r\n\r\nLes Pirates utilisaient des bateaux petits et rapides. Beaucoup plus rapides que les gros navires marchands. Ils les attaquaient avec des canons, puis ils s’approchaient du bateau endommagé à l‘aide de cordes munies de crochets.\r\ncanons pirate - Momes.net\r\nLa plupart des bateaux attaqués se rendaient sans même se battre ! Car les pirates sont connus pour être très forts et sans pitié... Les pirates avaient donc tout le loisir de fouiller les bateaux pour y voler… du rhum et de la nourriture ! ( et oui, les pirates étaient bien plus intéressés par la nourriture que les bijoux ! )\r\nIls en profitaient également pour enrôler les marins en leur proposant de devenir pirates ! Et la plupart acceptaient facilement. Car être marins, c’était très dur, surtout qu’à cette époque, les commandants étaient cruels et tyranniques. Alors que la plupart des bateaux pirates étaient dirigés démocratiquement, c’est-à-dire, que les pirates prenaient les décisions tous ensemble en votant à mains levées, ce sont les membres de l’équipage qui élisaient leur chef et surtout les butins volés étaient partagés équitablement.\r\nLes pirates n’étaient pas seulement des criminels, ils étaient aussi les symboles de la liberté et de l’aventure !\r\n\r\nSource: <a href="http://www.momes.net/Apprendre/Societe-culture-generale/Les-pirates/Je-decouvre-les-pirates" alt="les momes.net">Les momes.net</a>', '1', 'http://www.momes.net/Apprendre/Societe-culture-generale/Les-pirates/Je-decouvre-les-pirates'),
(8, 'Rackham le Rouge', 'Rackham', '2015-03-28 16:38:10', 2, 'Rackham le Rouge, , connu des fans de Tintin comme héros du « Secret de la Licorne », n’est pas un personnage totalement fictif ! Ce pirate que l’on appela Jack Rackham écuma les mers de Jamaïque à bord du Revenge en compagnie des deux pirates les plus sulfureuses de l’histoire de la flibuste : Anne Bonny et Mary Read ! Une légende épique qui n’a rien à envier à la quadrilogie "Pirates des Carïbes"  » qui utilise d’ailleurs l’étendard de Rackham (deux sabres surmontés d’une tête de mort) pour flotter au grand mât du "Black Pearl".\r\nRackham le Rouge est largement inspiré d’un authentique pirate du XVIIIème siècle : Jack Rackham alias Calico Jack ! Ce surnom de « calicot » viendrait des habits très colorés qu’il portait et qui auraient été en calicot, tissu de coton grossier. Jack (non pas Sparrow mais Rackham) aurait été maitre timonier sur le navire britannique le Neptune .  Le commandant de ce dernier ayant refusé de se frotter à un navire français l’équipage se serait mutiné et Jack aurait pris le contrôle du Neptune . Nouveau maitre à bord Jack se serait lancé à la poursuite du navire français et l’aurait arraisonné avec un franc succès ! Couvert de gloire par ce premier triomphe, acclamé par l’équipage qui vient de mettre la main sur le butin des vaincus, Jack propose aux matelots de s’émanciper du pouvoir britannique et de voguer à présent pour leur compte. En d’autres termes il les invite à devenir pirates ! L’idée est approuvée, mais pouvait-il en être autrement quand les mutins sont condamnés à mort ?\r\n\r\nJack finit néanmoins par accepter un pardon royal (meilleur moyen trouvé par le gouverneur pour se débarrasser des pirates)  et s’installe aux Bahamas où il rencontre Anne Bonny, une jeune femme mariée avec qui il entretient une relation adultère. Liaison dangereuse s’il en est puisque le mari n’est autre que James Bonny, lui-même pirate. Quand la trahison est dévoilée Anne est condamnée au fouet et Jack s’enfuit avec elle, réunit un équipage et reprend la mer à bord d’un sloop, le Revenge . Bien entendu la présence d’une femme sur un navire ne ferait pas l’unanimité, loin de là, c’est pourquoi Anne se travestit et prend le nom d’Adam Bonny. Combattant au milieu des autres loups de mer Anne deviendra une des grandes figures féminines de la flibusterie ! D’ailleurs Jack n’est pas au bout de ses surprises avec ses louves de mer… Il recrute sans le savoir une autre travestie : Mary Read !  Anne et Mary auraient entretenu une relation homosexuelle mais, comme pour tout ce qui touche à la piraterie, il est difficile de savoir ce qui touche du fait historique, de la légende et du fantasme. Quand Jack aurait découvert la féminité de Mary les deux femmes auraient toujours vécues ensemble, comme un couple. Dans un premier temps Jack et ses amazones font régner la terreur dans les mers chaudes, les navires sont arraisonnés, le butin s’entasse dans les cales. A tel point que le gouverneur de Jamaïque finit par lancer une opération d’envergure pour écraser ces boucaniers. Mais les jeunes louves de Jack jouent autant de leurs lames que de leurs charmes, on raconte que Mary dénudait son intimité avant d’achever un homme. Anne quant à elle aurait réussi à séduire le capitaine du Royal Queen  (qui appartenait à son ex-mari) pour infiltrer le navire et mouiller les mèches des canons pendant la nuit, permettant aux pirates de l’arraisonner sans résistance le lendemain.\r\n\r\nEn Octobre 1720 les pirates sont capturés par le capitaine Barnet et ses hommes. On dit qu’ils ont opposés peu de résistance, peut-être à cause de leur ébriété avancée. La scène désole les deux femmes qui tentent en vain de pousser l’équipage au combat, elles blessent plusieurs de leurs camarades dont Jack… Finalement après une résistance forcenée elles sont capturées et n’échappent à la pendaison qu’en prétextant qu’elles sont enceintes.  Mary meurt en prison d’une fausse couche, ou de la fièvre jaune, en 1721.  Anne aurait été gracié et on se perd en hypothèses sur la fin de sa vie : retour auprès de son premier mari, nouveau mariage, retour à la piraterie sous un autre nom… Nul ne sait.  Jack et le reste de l’équipage sont transférés le 16 Novembre 1720 à Spanish Town (Jamaïque) où ils sont jugés et pendus le lendemain. \r\n\r\nSource: <a href="http://www.histoire-pour-tous.fr/dossiers/97-le-siecle-des-lumieres-/3858-la-veritable-histoire-de-rackham-le-rouge-jack-rackham.html" alt="source: histoire pour tous">Histoire pour tous</a>', '1', 'http://www.histoire-pour-tous.fr/dossiers/97-le-siecle-des-lumieres-/3858-la-veritable-histoire-de-rackham-le-rouge-jack-rackham.html');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `creation_date` datetime NOT NULL,
  `pic_id` varchar(255) NOT NULL,
  `pass` char(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
