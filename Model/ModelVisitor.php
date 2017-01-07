<?php

/**
 * Created by PhpStorm.
 * User: samue
 * Date: 28/12/2016
 * Time: 14:56
 */

class ModelVisitor
{
    public static function listeTitres(){
        global $bpassword,$blogin,$base;
        $gt = new TitreGateway(new Connexion($base,$blogin,$bpassword));
        $res= $gt->getAll();
        if($res == null)
            throw new Exception('Aucun titre trouvé.');
        return $res;
    }

    public static function couverturesFromTitres($tabtitre)
    {
        global $bpassword, $blogin, $base;
        $gt = new AlbumGateway(new Connexion($base, $blogin, $bpassword));
        foreach ($tabtitre as $titre) {
            $res[] = $gt->searchCouvByName($titre['nomAlbum']);
        }
        if ($res == null)
            throw new Exception("Aucune couveture trouvée.");
        foreach($res as $row){
            $results[]=$row;
        }
        return $results;
    }

    public static function NbAvisFromTitres($tabtitre,$note){
        global $bpassword, $blogin, $base;
        $gt = new AvisGateway(new Connexion($base, $blogin, $bpassword));
        foreach ($tabtitre as $titre) {
            $res[] = $gt->countByTitreByAvis($titre['idTitre'],$note);
        }
        if ($res == null)
            throw new Exception("Aucune couveture trouvée.");
        return $res;
    }

    public static function TousLesTitres(){
        global $bpassword, $blogin, $base;
        $con = new Connexion($base, $blogin, $bpassword);
        $tigt = new TitreGateway($con);
        $algt = new AlbumGateway($con);
        $avgt = new AvisGateway($con);
        $titres=$tigt->getAll();
        $couvs=self::couverturesFromTitres($titres);
        $avisF=self::NbAvisFromTitres($titres,"favorable");
        $avisI=self::NbAvisFromTitres($titres,"indifferent");
        $avisD=self::NBAvisFromTitres($titres,"defavorable");
        $i=0;
        foreach ($titres as $row){
            $res[] = array(
                "titre"=>$row['nomTitre'],
                "couverture"=>$couvs[$i],
                "date_debut"=>$row['date_debut'],
                "date_fin"=>$row['date_fin'],
                "avisF"=>$avisF[$i],
                "avisI"=>$avisI[$i],
                "avisD"=>$avisD[$i],
                "idTitre"=>$row['idTitre']
            );
            $i++;
        }
        return $res;
    }

    public static function detailTitre($idTitre){
        global $bpassword, $blogin, $base;
        $con = new Connexion($base, $blogin, $bpassword);
        $tigt = new TitreGateway($con);
        $algt = new AlbumGateway($con);
        $avgt = new AvisGateway($con);

        $titre = $tigt->searchByid($idTitre);
        if($titre==null)
            throw new Exception("Le titre n'a pas pu être trouvé.");
        $album = $algt->searchByName($titre['nomAlbum']);
        if($album==null)
            throw new Exception("L'album n'a pas pu être trouvé.");
        $avis = $avgt->search($idTitre);

        $nbAvisF = $avgt->countByTitreByavis($titre['idTitre'],"favorable");
        $nbAvisI = $avgt->countByTitreByavis($titre['idTitre'],"indifferent");
        $nbAvisD = $avgt->countByTitreByavis($titre['idTitre'],"defavorable");


        $tab = array(
            "idTitre" => $titre['idTitre'],
            "nomTitre" => $titre['nomTitre'],
            "duree" => $titre['duree'],
            "nbAvisF" => $nbAvisF,
            "nbAvisI" => $nbAvisI,
            "nbAvisD" => $nbAvisD,
            "dateDebut" => $titre['date_debut'],
            "dateFin" => $titre['date_fin'],
            "artiste" => $titre['artiste'],
            "parution" => $album['parution'],
            "couv" => $album['couverture'],
            "comm" => $avis
        );
        return $tab;
    }


    public static function insererCommentaire($note,$commentaire,$user,$idTitre){
        global $blogin,$bpassword,$base;
        Validation::validNote($note);
        $commentaire=Nettoyer::nettoyer_string($commentaire);
        $user=Nettoyer::nettoyer_string($user);
        $idTitre=Nettoyer::nettoyer_int($idTitre);
        $gt=new AvisGateway(new Connexion($base,$blogin,$bpassword));
        $nbcomments=$gt->countByTitre($idTitre);
        if($nbcomments>2){
            $idsuprr=$gt->searchAncienByTitre($idTitre);
            if(isset($idsuprr)){
                $gt->delete($idsuprr);
                $gt->insert($note,$commentaire,$user,$idTitre);
            }
            else{
                throw new Exception("Impossible de trouver le plus ancien commentaire à remplacer.");
            }
        }
        else{
            $gt->insert($note,$commentaire,$user,$idTitre);
        }
    }

}