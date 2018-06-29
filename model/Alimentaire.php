<?php
class Alimentaire
{

    public static function Get_Type_Alim($idalim,$idstock,$iduser)
    {
        require_once('pdo.php');
        $bdheroku=connexion();

        $req = $bdheroku->prepare('SELECT typealim FROM alimentaire WHERE idalim=:idalim AND idstock=:idstock AND iduser=:iduser');

        $req->bindParam(':idalim', $idalim);
        $req->bindParam(':idstock', $idstock);
        $req->bindParam(':iduser', $iduser);
        $req->execute();

        $data=$req->fetch();

        return $data[0];
    }

    public static function Get_Nombre_Alim($idalim,$idstock,$iduser)
    {
        require_once('pdo.php');
        $bdheroku=connexion();

        $req = $bdheroku->prepare('SELECT qtestock FROM produit WHERE idproduit=:idalim AND idstock=:idstock AND iduser=:iduser');

        $req->bindParam(':idalim', $idalim);
        $req->bindParam(':idstock', $idstock);
        $req->bindParam(':iduser', $iduser);
        $req->execute();

        $data=$req->fetch();

        return $data[0];
    }


    public static function Get_Prix_Alim($idalim,$idstock,$iduser)
    {
        require_once('pdo.php');
        $bdheroku=connexion();

        $req = $bdheroku->prepare('SELECT prixproduit FROM produit WHERE idproduit=:idalim AND idstock=:idstock AND iduser=:iduser');

        $req->bindParam(':idalim', $idalim);
        $req->bindParam(':idstock', $idstock);
        $req->bindParam(':iduser', $iduser);
        $req->execute();

        $data=$req->fetch();

        return $data[0];
    }

    public static function Get_All_Alim()
    {
        require_once('pdo.php');
        $bdheroku = connexion();

        $req = $bdheroku->prepare('SELECT * FROM alimentaire a INNER JOIN produit p ON p.idproduit=a.idalim 
                                      INNER JOIN typealim t ON t.idtype = a.typealim
                                      ORDER BY idalim');

        $req->execute();
        while ($data = $req->fetch()) {
            $result[] = $data;
        }

        return $result;
    }

    public static function Get_All_Alim_Stock($idstock)
    {
        require_once('pdo.php');
        $bdheroku = connexion();

        $req = $bdheroku->prepare('SELECT * FROM alimentaire a INNER JOIN produit p ON p.idproduit=a.idalim 
                                      INNER JOIN typealim t ON t.idtype = a.typealim
                                      WHERE a.idstock=:idstock ORDER BY idalim');

        $req->bindParam(':idstock',$idstock);

        $req->execute();
        while ($data = $req->fetch()) {
            $result[] = $data;
        }

        return $result;
    }

    public static function Add_Alim($nomproduit,$prixproduit,$qtestock,$idtype,$referencealim,$idstock,$iduser)
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
        $idalim=$req->fetch();

        $req=$bdheroku->prepare('INSERT INTO alimentaire(idalim,idstock,iduser,typealim,referencealim) VALUES (:idalim,:idstock2,:iduser2,:typealim,:referencealim)');

        $req->bindParam(':idalim',$idalim[0]);
        $req->bindParam(':idstock2',$idstock);
        $req->bindParam(':iduser2', $iduser);
        $req->bindParam(':typealim',$idtype);
        $req->bindParam(':referencealim',$referencealim);

        $req->execute();

    }

    public static function Get_Nom_Alim($idalim,$idstock,$iduser)
    {
        require_once('pdo.php');
        $bdheroku=connexion();

        $req = $bdheroku->prepare('SELECT nomproduit FROM produit WHERE idproduit=:idalim AND idstock=:idstock AND iduser=:iduser');

        $req->bindParam(':idalim', $idalim);
        $req->bindParam(':idstock', $idstock);
        $req->bindParam(':iduser', $iduser);
        $req->execute();

        $data=$req->fetch();

        return $data[0];
    }

    function Select($idalim) {
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('SELECT * FROM alimentaire WHERE idalim=:idalim');
        $req->bindParam(':idalim', $idalim);

        $req->execute();

        while($data=$req->fetch())
        {
            $result[] = $data;
        }

        return $result;

    }

    public static function Update_Prix_Alim($idalim, $prixalim,$idstock,$iduser){
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('UPDATE produit SET prixproduit=:prixalim WHERE idproduit=:idalim AND idstock=:idstock AND iduser=:iduser');
        $req->bindParam(':prixalim', $prixalim);
        $req->bindParam(':idalim', $idalim);
        $req->bindParam(':idstock', $idstock);
        $req->bindParam(':iduser', $iduser);
        $req->execute();
    }

    public static function Update_Nbre_Alim($idalim, $nbrealim,$idstock,$iduser){
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('UPDATE produit SET qtestock=:nbrealim WHERE idproduit=:idalim AND idstock=:idstock AND iduser=:iduser');
        $req->bindParam(':nbrealim', $nbrealim);
        $req->bindParam(':idalim', $idalim);
        $req->bindParam(':idstock', $idstock);
        $req->bindParam(':iduser', $iduser);
        $req->execute();
    }

    public static function Update_Nom_Alim($idalim, $nomalim,$idstock,$iduser){
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('UPDATE produit SET nomproduit=:nomalim WHERE idproduit=:idalim AND idstock=:idstock AND iduser=:iduser');
        $req->bindParam(':nomalim', $nomalim);
        $req->bindParam(':idalim', $idalim);
        $req->bindParam(':idstock', $idstock);
        $req->bindParam(':iduser', $iduser);
        $req->execute();
    }

    public static function Delete_Alim($idalim,$iduser,$idstock)
    {
        require_once('pdo.php');
        $bdheroku = connexion();

        $req = $bdheroku->prepare('DELETE FROM alimentaire WHERE idalim=:idalim AND idstock=:idstock');
        $req->bindParam(':idalim',$idalim);
        $req->bindParam(':idstock',$idstock);

        $req->execute();

        $req = $bdheroku->prepare('DELETE FROM produit WHERE idproduit=:idalim AND iduser=:iduser');
        $req->bindParam(':idalim',$idalim);
        $req->bindParam(':iduser',$iduser);

        $req->execute();
    }
}

?>
