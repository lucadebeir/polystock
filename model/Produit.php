<?php
class Produit
{

    public static function Get_Nom_Produit($idproduit)
    {
        require_once('pdo.php');
        $bdheroku=connexion();

        $req = $bdheroku->prepare('SELECT nomproduit FROM produit WHERE idproduit=:idproduit');

        $req->bindParam(':idproduit', $idproduit);
        $req->execute();

        $data=$req->fetch();

        return $data[0];
    }

    public static function Get_Nombre_Produit($idproduit)
    {
        require_once('pdo.php');
        $bdheroku=connexion();

        $req = $bdheroku->prepare('SELECT qtestock FROM produit WHERE idproduit=:idproduit');

        $req->bindParam(':idproduit', $idproduit);
        $req->execute();

        $data=$req->fetch();

        return $data[0];
    }

    public static function Get_Prix_Produit($idproduit)
    {
        require_once('pdo.php');
        $bdheroku=connexion();

        $req = $bdheroku->prepare('SELECT prixproduit FROM produit WHERE idproduit=:idproduit');

        $req->bindParam(':idproduit', $idproduit);
        $req->execute();

        $data=$req->fetch();

        return $data[0];
    }

    public static function Get_All_Produit()
    {
        require_once('pdo.php');
        $bdheroku = connexion();

        $req = $bdheroku->prepare('SELECT * FROM produit ORDER BY idproduit');

        $req->execute();
        while ($data = $req->fetch()) {
            $result[] = $data;
        }

        return $result;
    }

    public static function Get_All_Produit_Utiliser($idevent,$iduser)
    {
        require_once('pdo.php');
        $bdheroku = connexion();

        $req = $bdheroku->prepare('SELECT * FROM produit p 
                                        LEFT JOIN utiliser u ON p.idproduit = u.idproduit
                                        WHERE u.idproduit IS NULL AND u.idevent=:idevent AND u.iduser=:iduser');
        $req->bindParam(':idevent',$idevent);
        $req->bindParam(':iduser',$iduser);
        $req->execute();
        while ($data = $req->fetch()) {
            $result[] = $data;
        }

        return $result;
    }


    function Select($idboisson) {
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('SELECT * FROM boisson WHERE idboisson=:idboisson');
        $req->bindParam(':idboisson', $idboisson);
        $req->execute();

        while($data=$req->fetch())
        {
            $result[] = $data;
        }

        return $result;

    }

    public static function Update_Prix_Produit($idproduit, $prixproduit){
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('UPDATE produit SET prixproduit=:prixproduit WHERE idproduit=:idproduit');
        $req->bindParam(':prixproduit', $prixproduit);
        $req->bindParam(':idproduit', $idproduit);
        $req->execute();
    }

    public static function Update_Nbre_Produit($idproduit, $nbreproduit){
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('UPDATE produit SET qtestock=:nbreproduit WHERE idproduit=:idproduit');
        $req->bindParam(':nbreproduit', $nbreproduit);
        $req->bindParam(':idproduit', $idproduit);
        $req->execute();
    }

    public static function Update_Nom_Produit($idproduit, $nomproduit){
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('UPDATE produit SET nomproduit=:nomproduit WHERE idproduit=:idproduit');
        $req->bindParam(':nomproduit', $nomproduit);
        $req->bindParam(':idproduit', $idproduit);
        $req->execute();
    }

    public static function Delete_Produit($idproduit,$iduser)
    {
        require_once('pdo.php');
        $bdheroku = connexion();

        $req = $bdheroku->prepare('DELETE FROM produit WHERE idproduit=:idproduit AND iduser=:iduser');
        $req->bindParam(':idproduit',$idproduit);
        $req->bindParam(':iduser',$iduser);

        $req->execute();
    }
}

?>
