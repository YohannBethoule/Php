# Php
Projet php

Projet C: Site de musique en ligne

Le but du projet est de proposer la gestion d'un site de musique en ligne, en utilisant le patron MVC. Vous devez considérer différentes parties:

la partie "accueil du site". Sur cette page sont mentionnés les titres actuellement mis en ligne, ordonnés selon le nombre d'avis favorables obtenus (ordre décroissant). Pour chacun de ces titres, on trouvera:

-son nom

-la couverture de l'album d'où il est tiré

-la période de mise en ligne

-le nombre d'avis favorables, négatifs et indifférents obtenus depuis le début de la mise en ligne

Le visiteur doit pouvoir:

-accéder au détail des informations sur un titre sans possibilité de modification

-ajouter un commentaire et/ou donner un avis (j'aime, je n'aime pas, indifférent) sur un titre

-faire afficher les commentaires déjà enregistrés, à la demande. Afin de ne pas surcharger la BDD, seuls les 3 derniers commentaires pour chaque titre seront conservés.

-écouter un titre (facultatif) la partie "informations sur un titre". Elle permet de consulter tout ce qui concerne un titre:

-le nom du titre,

-la durée d'écoute,

-les avis obtenus,

-la période durant laquelle il est ou il a été mis sur le site,

-les 3 derniers commentaires postés par les visiteurs en plus (si le reste est au point):

-des infos sur l'album,

-le nom et la couverture de l'album,

-l'artiste qui l'a fait,

-l'année de parution,

Bien sûr toutes ses informations peuvent être obtenues ensemble ou séparément. A vous de voir quelles variantes vous pouvez proposer. la partie "administrateur", elle permet:

-d'ajouter/supprimer un titre.

-de consulter et modifier tout ce qui concerne un titre, possibilité de supprimer un commentaire utilisateur jugé inutile.

L'ensemble des données sur les titres, albums, commentaires, doivent être sauvegardées dans une base de données.

Consignes d'élaboration de votre site

Toutes les pages doivent avoir une structure typique HTML5. Par l'utilisation de session, vous devez permettre à un administrateur connecté de ne pas perdre ses droits en se déplaçant de page en page. Chaque page de votre site contiendra :

-une en-tête avec le nom du site. Prévoir une zone de connexion par mot de passe pour l'administration.

-un titre spécifique

-un bloc de contenu

-un bloc de bas de page où sont mentionnées les informations sur les concepteurs du site : nom, prénom et groupe.

-ajouter sur la partie droite de chaque page un bloc contenant éventuellement une liste de liens externes.. Gardez un ratio 80% - 20% de largeur pour le contenu et ce bloc.

-ajouter un menu pour accéder plus rapidement aux pages. Il doit être présent dans l'en-tête de chaque page. Le menu est composé de liens mis côte à côte .

-La gestion d'erreurs doit être complète. (champs vérifiés, connection à la BD,...)
