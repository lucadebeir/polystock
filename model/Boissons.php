<?php
class Boissons
{

    public static function Get_Type_Boisson($idboisson,$idstock,$iduser)
    {
        require_once('pdo.php');
        $bdheroku=connexion();

        $req = $bdheroku->prepare('SELECT typeboisson FROM boisson WHERE idboisson=:idboisson AND idstock=:idstock AND iduser=:iduser');

        $req->bindParam(':idboisson', $idboisson);
        $req->bindParam(':idstock', $idstock);
        $req->bindParam(':iduser', $iduser);
        $req->execute();

        $data=$req->fetch();

        return $data[0];
    }

    public static function Get_Nombre_Boisson($idboisson,$idstock,$iduser)
    {
        require_once('pdo.php');
        $bdheroku=connexion();

        $req = $bdheroku->prepare('SELECT qtestock FROM produit WHERE idproduit=:idboisson AND idstock=:idstock AND iduser=:iduser');

        $req->bindParam(':idboisson', $idboisson);
        $req->bindParam(':idstock', $idstock);
        $req->bindParam(':iduser', $iduser);
        $req->execute();

        $data=$req->fetch();

        return $data[0];
    }


    public static function Get_Unite_Boisson($idboisson,$idstock,$iduser)
    {
        require_once('pdo.php');
        $bdheroku=connexion();

        $req = $bdheroku->prepare('SELECT uniteboisson FROM boisson WHERE idboisson=:idboisson AND idstock=:idstock AND iduser=:iduser');

        $req->bindParam(':idboisson', $idboisson);
        $req->bindParam(':idstock', $idstock);
        $req->bindParam(':iduser', $iduser);
        $req->execute();

        $data=$req->fetch();

        return $data[0];
    }

    public static function Get_Prix_Boisson($idboisson,$idstock,$iduser)
    {
        require_once('pdo.php');
        $bdheroku=connexion();

        $req = $bdheroku->prepare('SELECT prixproduit FROM produit WHERE idproduit=:idboisson AND idstock=:idstock AND iduser=:iduser');

        $req->bindParam(':idboisson', $idboisson);
        $req->bindParam(':idstock', $idstock);
        $req->bindParam(':iduser', $iduser);
        $req->execute();

        $data=$req->fetch();

        return $data[0];
    }

    public static function Get_All_Boissons()
    {
        require_once('pdo.php');
        $bdheroku = connexion();

        $req = $bdheroku->prepare('SELECT * FROM boisson b INNER JOIN produit p ON p.idproduit=b.idboisson
                                      INNER JOIN typeboisson t ON t.idtype = b.typeboisson
                                      ORDER BY idboisson');

        $req->execute();
        while ($data = $req->fetch()) {
            $result[] = $data;
        }

        return $result;
    }

    public static function Get_All_Boissons_Stock($idstock)
    {
        require_once('pdo.php');
        $bdheroku = connexion();

        $req = $bdheroku->prepare('SELECT * FROM boisson b INNER JOIN produit p ON p.idproduit=b.idboisson
                                      INNER JOIN typeboisson t ON t.idtype = b.typeboisson
                                      WHERE b.idstock=:idstock ORDER BY idboisson');

        $req->bindParam(':idstock',$idstock);

        $req->execute();
        while ($data = $req->fetch()) {
            $result[] = $data;
        }

        return $result;
    }

    public static function Add_Boisson($nomproduit,$prixproduit,$qtestock,$idtype,$referenceboisson,$uniteboisson,$idstock,$iduser)
    {

        require_once('pdo.php');
        $bdheroku = connexion();

        $req=$bdheroku->prepare('INSERT INTO produit(idproduit,idstock,iduser,nomproduit,prixproduit,qtestock) VALUES (DEFAULT,:idstock,:iduser,:nomproduit,:prixproduit,:qtestock)');

        $req->bindParam(':nomproduit',$nomproduit);
        $req->bindParam(':prixproduit',$prixproduit);
        $req->bindParam(':qtestock',$qtestock);
        $req->bindParam(':idstock',$idstock);
        $req->bindParam(':iduser',$iduser);

        $req->execute();

        $req=$bdheroku->prepare('SELECT idproduit FROM produit WHERE nomproduit=:nomproduit2');
        $req->bindParam(':nomproduit2', $nomproduit);
        $req->execute();
        $idboisson=$req->fetch();

        $req=$bdheroku->prepare('INSERT INTO boisson(idboisson,idstock,iduser,typeboisson,referenceboisson,uniteboisson) VALUES (:idboisson,:idstock2,:iduser2,:typeboisson,:referenceboisson,:uniteboisson)');

        $req->bindParam(':idboisson',$idboisson[0]);
        $req->bindParam(':idstock2',$idstock);
        $req->bindParam(':iduser2',$iduser);
        $req->bindParam(':typeboisson',$idtype);
        $req->bindParam(':referenceboisson',$referenceboisson);
        $req->bindParam(':uniteboisson',$uniteboisson);

        $req->execute();

    }

    public static function Get_Nom_Boisson($idboisson,$idstock,$iduser)
    {
        require_once('pdo.php');
        $bdheroku=connexion();

        $req = $bdheroku->prepare('SELECT nomproduit FROM produit WHERE idproduit=:idboisson AND idstock=:idstock AND iduser=:iduser');

        $req->bindParam(':idboisson', $idboisson);
        $req->bindParam(':idstock', $idstock);
        $req->bindParam(':iduser', $iduser);
        $req->execute();

        $data=$req->fetch();

        return $data[0];
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

    public static function Update_Prix_Boisson($idboisson,$prixboisson,$idstock,$iduser){
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('UPDATE produit SET prixproduit=:prixboisson WHERE idproduit=:idboisson AND idstock=:idstock AND iduser=:iduser');
        $req->bindParam(':prixboisson', $prixboisson);
        $req->bindParam(':idboisson', $idboisson);
        $req->bindParam(':idstock', $idstock);
        $req->bindParam(':iduser', $iduser);
        $req->execute();
    }

    public static function Update_Nbre_Boisson($idboisson, $nbreboisson,$idstock,$iduser){
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('UPDATE produit SET qtestock=:nbreboisson WHERE idproduit=:idboisson AND idstock=:idstock AND iduser=:iduser');
        $req->bindParam(':nbreboisson', $nbreboisson);
        $req->bindParam(':idboisson', $idboisson);
        $req->bindParam(':idstock', $idstock);
        $req->bindParam(':iduser', $iduser);
        $req->execute();
    }

    public static function Update_Nom_Boisson($idboisson, $nomboisson,$idstock,$iduser){
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('UPDATE produit SET nomproduit=:nomboisson WHERE idproduit=:idboisson AND idstock=:idstock AND iduser=:iduser');
        $req->bindParam(':nomboisson', $nomboisson);
        $req->bindParam(':idboisson', $idboisson);
        $req->bindParam(':idstock', $idstock);
        $req->bindParam(':iduser', $iduser);
        $req->execute();
    }

    public static function Update_Unite_Boisson($idboisson, $uniteboisson,$idstock,$iduser)
    {
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('UPDATE boisson SET uniteboisson=:uniteboisson WHERE idboisson=:idboisson AND idstock=:idstock AND iduser=:iduser');
        $req->bindParam(':uniteboisson', $uniteboisson);
        $req->bindParam(':idboisson', $idboisson);
        $req->bindParam(':idstock', $idstock);
        $req->bindParam(':iduser', $iduser);
        $req->execute();
    }

    public static function Delete_Boisson($idboisson,$iduser,$idstock)
    {
        require_once('pdo.php');
        $bdheroku = connexion();

        $req = $bdheroku->prepare('DELETE FROM boisson WHERE idboisson=:idboisson AND idstock=:idstock');
        $req->bindParam(':idboisson',$idboisson);
        $req->bindParam(':idstock',$idstock);

        $req->execute();

        $req = $bdheroku->prepare('DELETE FROM produit WHERE idproduit=:idboisson AND iduser=:iduser');
        $req->bindParam(':idboisson',$idboisson);
        $req->bindParam(':iduser',$iduser);

        $req->execute();
    }
}

?>
