<?php
class Utiliser
{

    public static function Get_Qte_Commande($idboisson, $idevent, $iduser)
    {
        require_once('pdo.php');
        $bdheroku=connexion();

        $req = $bdheroku->prepare('SELECT qtecommande FROM utiliser WHERE idboisson = :idboisson AND idevent=:idevent AND iduser=:iduser');

        $req->bindParam(':idboisson', $idboisson);
        $req->bindParam(':idevent', $idevent);
        $req->bindParam(':iduser', $iduser);
        $req->execute();

        $data=$req->fetch();

        return $data[0];
    }

    public static function Get_Nbre_Produit($idproduit, $idevent, $iduser)
    {
        require_once('pdo.php');
        $bdheroku=connexion();

        $req = $bdheroku->prepare('SELECT nbreproduit FROM utiliser WHERE idproduit = :idproduit AND idevent=:idevent AND iduser=:iduser');

        $req->bindParam(':idproduit', $idproduit);
        $req->bindParam(':idevent', $idevent);
        $req->bindParam(':iduser', $iduser);
        $req->execute();

        $data=$req->fetch();

        return $data[0];
    }

    public static function Get_Prix_Total($idboisson, $idevent, $iduser)
    {
        require_once('pdo.php');
        $bdheroku=connexion();

        $req = $bdheroku->prepare('SELECT prixtotal FROM utiliser WHERE idproduit = :idboisson AND idevent=:idevent AND iduser=:iduser');

        $req->bindParam(':idboisson', $idboisson);
        $req->bindParam(':idevent', $idevent);
        $req->bindParam(':iduser', $iduser);
        $req->execute();

        $data=$req->fetch();

        return $data[0];
    }



    public static function Get_All_Utiliser($idevent,$iduser)
    {
        require_once('pdo.php');
        $bdheroku = connexion();

        $req = $bdheroku->prepare('SELECT * FROM utiliser u 
                                        INNER JOIN produit p ON p.idproduit = u.idproduit
                                        WHERE u.idevent=:idevent AND u.iduser=:iduser AND p.iduser=:iduser');
        $req->bindParam(':idevent',$idevent);
        $req->bindParam(':iduser',$iduser);
        $req->execute();
        while ($data = $req->fetch()) {
            $result[] = $data;
        }

        return $result;
    }

    public static function Get_All_Utiliser_2($iduser)
    {
        require_once('pdo.php');
        $bdheroku = connexion();

        $req = $bdheroku->prepare('SELECT * FROM utiliser ut
                                        RIGHT JOIN produit p ON p.idproduit = ut.idproduit
                                        WHERE p.iduser=:iduser');
        $req->bindParam(':iduser',$iduser);
        $req->execute();
        while ($data = $req->fetch()) {
            $result[] = $data;
        }

        return $result;
    }

    public static function Add_Utiliser($idevent,$idproduit,$iduser)
    {
        require_once('pdo.php');
        $bdheroku = connexion();



        $req = $bdheroku->prepare('INSERT INTO utiliser(idevent, idproduit, iduser, qtecommande, nbreproduit, prixtotal) VALUES (:idevent, :idproduit, :iduser, DEFAULT, DEFAULT, DEFAULT)');
        $req->bindParam(':idevent',$idevent);
        $req->bindParam(':idproduit',$idproduit);
        $req->bindParam(':iduser',$iduser);

        $req->execute();


    }

    public static function Get_Nom_Evenement($idevenement)
    {
        require_once('pdo.php');
        $bdheroku=connexion();

        $req = $bdheroku->prepare('SELECT nomevenement FROM evenement WHERE idevenement=:idevenement');

        $req->bindParam(':idevenement', $idevenement);
        $req->execute();

        $data=$req->fetch();

        return $data[0];
    }

    public static function Select($idevenement,$idboisson) {
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('SELECT * FROM utiliser u INNER JOIN produit p ON p.idproduit = u.idproduit
                                        INNER JOIN boissonss b ON b.idboisson = u.idproduit
                                        INNER JOIN typeboisson t ON t.idtype = b.typeboisson
                                        WHERE idevent=:idevenement AND idproduit=:idboisson ');
        $req->bindParam(':idevenement', $idevenement);
        $req->bindParam(':idboisson', $idboisson);
        $req->execute();

        while($data=$req->fetch())
        {
            $result[] = $data;
        }

        return $result;

    }

    public static function Update_Nbre_Produit($idproduit, $nbreproduit, $idevent, $iduser){
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('UPDATE utiliser SET nbreproduit=:nbreproduit WHERE idproduit=:idproduit AND idevent=:idevent AND iduser=:iduser');
        $req->bindParam(':nbreproduit', $nbreproduit);
        $req->bindParam(':idproduit', $idproduit);
        $req->bindParam(':idevent', $idevent);
        $req->bindParam(':iduser', $iduser);
        $req->execute();
    }

    public static function Update_Qte_Commande($idproduit, $qtecommande, $idevent, $iduser){
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('UPDATE utiliser SET qtecommande=:qtecommande WHERE idproduit=:idproduit AND idevent=:idevent AND iduser=:iduser');
        $req->bindParam(':qtecommande', $qtecommande);
        $req->bindParam(':idproduit', $idproduit);
        $req->bindParam(':idevent', $idevent);
        $req->bindParam(':iduser', $iduser);
        $req->execute();
    }

    public static function Update_Prix_Total($idproduit, $prixtotal, $idevent, $iduser)
    {
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('UPDATE utiliser SET prixtotal=:prixtotal WHERE idproduit=:idproduit AND idevent=:idevent AND iduser=:iduser');
        $req->bindParam(':prixtotal', $prixtotal);
        $req->bindParam(':idproduit', $idproduit);
        $req->bindParam(':idevent', $idevent);
        $req->bindParam(':iduser', $iduser);
        $req->execute();
    }

    public static function Delete_Utiliser($idevent,$idboisson,$iduser)
    {
        require_once('pdo.php');
        $bdheroku = connexion();

        $req = $bdheroku->prepare('DELETE FROM utiliser WHERE idevent=:idevent AND idproduit=:idproduit AND iduser=:iduser');
        $req->bindParam(':idevent',$idevent);
        $req->bindParam(':idproduit',$idboisson);
        $req->bindParam(':iduser', $iduser);

        $req->execute();
    }
}

?>
