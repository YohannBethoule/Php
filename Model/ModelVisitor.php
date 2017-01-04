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

    public static function NbAvisFavFromTitres($tabtitre){
        global $bpassword, $blogin, $base;
        $gt = new AvisGateway(new Connexion($base, $blogin, $bpassword));
        foreach ($tabtitre as $titre) {
            $res[] = $gt->countByTitreByAvis($titre['idTitre'],"favorable");
        }
        if ($res == null)
            throw new Exception("Aucune couveture trouvée.");
        return $res;
    }

    public static function NbAvisIndiffFromTitres($tabtitre){
        global $bpassword, $blogin, $base;
        $gt = new AvisGateway(new Connexion($base, $blogin, $bpassword));
        foreach ($tabtitre as $titre) {
            $res[] = $gt->countByTitreByAvis($titre['nomTitre'],'indifférent');
        }
        if ($res == null)
            throw new Exception("Aucune couveture trouvée.");
        return $res;
    }

    public static function NBAvisDefavFromTitres($tabtitre){
        global $bpassword, $blogin, $base;
        $gt = new AvisGateway(new Connexion($base, $blogin, $bpassword));
        foreach ($tabtitre as $titre) {
            $res[] = $gt->countByTitreByAvis($titre['nomTitre'],'défavorable');
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
        $avisF=self::NbAvisFavFromTitres($titres);
        $avisI=self::NbAvisIndiffFromTitres($titres);
        $avisD=self::NBAvisDefavFromTitres($titres);
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
        $album = $algt->search($titre['idAlbum']);
        $avis = $avgt->search($idTitre);
        $nbAvisF = $avgt->countByTitreByavis($titre['idTitre'],"favorable");
        $nbAvisI = $avgt->countByTitreByavis($titre['idTitre'],"indifférent");
        $nbAvisD = $avgt->countByTitreByavis($titre['idTitre'],"défavorable");

        $res = array(
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

    }
}