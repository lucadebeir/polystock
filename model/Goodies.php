<?php
class Goodies
{

    public static function Get_Nom_Goodies($idgoodies,$idstock,$iduser)
    {
        require_once('pdo.php');
        $bdheroku=connexion();

        $req = $bdheroku->prepare('SELECT nomproduit FROM produit WHERE idproduit=:idgoodies AND idstock=:idstock AND iduser=:iduser');

        $req->bindParam(':idgoodies', $idgoodies);
        $req->bindParam(':idstock',$idstock);
        $req->bindParam(':iduser',$iduser);
        $req->execute();

        $data=$req->fetch();

        return $data[0];
    }

    public static function Get_Nombre_Goodies($idgoodies,$idstock,$iduser)
    {
        require_once('pdo.php');
        $bdheroku=connexion();

        $req = $bdheroku->prepare('SELECT qtestock FROM produit WHERE idproduit=:idgoodies AND idstock=:idstock AND iduser=:iduser');

        $req->bindParam(':idgoodies', $idgoodies);
        $req->bindParam(':idstock',$idstock);
        $req->bindParam(':iduser',$iduser);
        $req->execute();

        $data=$req->fetch();

        return $data[0];
    }

    public static function Get_Prix_Goodies($idgoodies,$idstock,$iduser)
    {
        require_once('pdo.php');
        $bdheroku=connexion();

        $req = $bdheroku->prepare('SELECT prixproduit FROM produit WHERE idproduit=:idgoodies AND idstock=:idstock AND iduser=:iduser');

        $req->bindParam(':idgoodies', $idgoodies);
        $req->bindParam(':idstock',$idstock);
        $req->bindParam(':iduser',$iduser);
        $req->execute();

        $data=$req->fetch();

        return $data[0];
    }

    public static function Get_All_Goodies()
    {
        require_once('pdo.php');
        $bdheroku = connexion();

        $req = $bdheroku->prepare('SELECT * FROM goodies g INNER JOIN produit p ON p.idproduit=g.idgoodies
                                        ORDER BY idgoodies');

        $req->execute();
        while ($data = $req->fetch()) {
            $result[] = $data;
        }

        return $result;

    }

    public static function Get_All_Goodies_Stock($idstock)
    {
        require_once('pdo.php');
        $bdheroku = connexion();

        $req = $bdheroku->prepare('SELECT * FROM goodies g INNER JOIN produit p ON p.idproduit=g.idgoodies
                                        WHERE g.idstock=:idstock ORDER BY idgoodies');

        $req->bindParam(':idstock',$idstock);

        $req->execute();
        while ($data = $req->fetch()) {
            $result[] = $data;
        }

        return $result;
    }

    public static function Add_Goodies($nomproduit,$prixproduit,$qtestock,$idstock,$iduser)
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
        $idgoodies=$req->fetch();

        $req=$bdheroku->prepare('INSERT INTO goodies(idgoodies,idstock,iduser) VALUES (:idgoodies,:idstock2,:iduser2)');

        $req->bindParam(':idgoodies',$idgoodies[0]);
        $req->bindParam(':idstock2',$idstock);
        $req->bindParam(':iduser2',$iduser);

        $req->execute();

    }

    public static function Update_Nom_Goodies($idgoodies, $nomgoodies,$idstock,$iduser){
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('UPDATE produit SET nomproduit=:nomgoodies WHERE idproduit=:idgoodies AND idstock=:idstock AND iduser=:iduser');
        $req->bindParam(':nomgoodies', $nomgoodies);
        $req->bindParam(':idgoodies', $idgoodies);
        $req->bindParam(':idstock',$idstock);
        $req->bindParam(':iduser',$iduser);
        $req->execute();
    }

    public static function Update_Nbre_Goodies($idgoodies, $nbregoodies,$idstock,$iduser){
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('UPDATE produit SET qtestock=:nbregoodies WHERE idproduit=:idgoodies AND idstock=:idstock AND iduser=:iduser');
        $req->bindParam(':nbregoodies', $nbregoodies);
        $req->bindParam(':idgoodies', $idgoodies);
        $req->bindParam(':idstock',$idstock);
        $req->bindParam(':iduser',$iduser);
        $req->execute();
    }

    public static function Update_Prix_Goodies($idgoodies, $prixgoodies,$idstock,$iduser)
    {
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('UPDATE produit SET prixproduit=:prixgoodies WHERE idproduit=:idgoodies AND idstock=:idstock AND iduser=:iduser');
        $req->bindParam(':prixgoodies', $prixgoodies);
        $req->bindParam(':idgoodies', $idgoodies);
        $req->bindParam(':idstock',$idstock);
        $req->bindParam(':iduser',$iduser);
        $req->execute();
    }

    public static function Delete_Goodies($idgoodies,$iduser,$idstock)
    {
        require_once('pdo.php');
        $bdheroku = connexion();

        $req = $bdheroku->prepare('DELETE FROM goodies WHERE idgoodies=:idgoodies AND idstock=:idstock AND iduser=:iduser');
        $req->bindParam(':idgoodies',$idgoodies);
        $req->bindParam(':idstock',$idstock);
        $req->bindParam(':iduser',$iduser);

        $req->execute();

        $req = $bdheroku->prepare('DELETE FROM produit WHERE idproduit=:idgoodies AND iduser=:iduser2 AND idstock=:idstock2');
        $req->bindParam(':idgoodies',$idgoodies);
        $req->bindParam(':iduser2',$iduser);
        $req->bindParam(':idstock2',$idstock);

        $req->execute();
    }
}

?>
