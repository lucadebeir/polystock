<?php
class Stock
{

    public static function Get_All_Stock($iduser)
    {
        require_once('pdo.php');
        $bdheroku = connexion();

        $req = $bdheroku->prepare('SELECT * FROM stock WHERE iduser=:iduser ORDER BY idstock');
        $req->bindParam(':iduser',$iduser);
        $req->execute();
        while ($data = $req->fetch()) {
            $result[] = $data;
        }

        return $result;
    }

    public static function Get_Nom_Stock($idstock,$iduser)
    {
        require_once('pdo.php');
        $bdheroku = connexion();

        $req = $bdheroku->prepare("SELECT nomstock FROM stock WHERE idstock=:idstock AND iduser=:iduser");
        $req->bindParam(':idstock',$idstock);
        $req->bindParam(':iduser',$iduser);
        $req->execute();

        $data = $req->fetch();

        return $data[0];
    }


    public static function Add_Stock($nomstock,$iduser,$type)
    {
        require_once('pdo.php');
        $bdheroku = connexion();


        $req = $bdheroku->prepare('INSERT INTO stock(idstock, iduser, typestock, nomstock) VALUES (DEFAULT,:iduser,:typestock,:nomstock)');
        $req->bindParam(':nomstock',$nomstock);
        $req->bindParam(':typestock', $type);
        $req->bindParam(':iduser', $iduser);

        $req->execute();

    }

    public static function Get_Stock($idstock, $iduser)
    {
        require_once('pdo.php');
        $bdheroku=connexion();

        $req = $bdheroku->prepare('SELECT nomstock FROM stock WHERE idstock = :idstock AND iduser=:iduser');

        $req->bindParam(':idstock', $idstock);
        $req->bindParam(':iduser', $iduser);
        $req->execute();

        while($data=$req->fetch())
        {
            $result[] = $data;
        }

        return $result;
    }

    function Select($idstock) {
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('SELECT * FROM stock WHERE idstock=:idstock');
        $req->bindParam(':idstock', $idstock);
        $req->execute();

        while($data=$req->fetch())
        {
            $result[] = $data;
        }

        return $result;

    }

    public static function Update_Nom_Stock($idstock, $iduser, $nomstock){
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('UPDATE stock SET nomstock=:nomstock WHERE idstock=:idstock AND iduser=:iduser');
        $req->bindParam(':nomstock', $nomstock);
        $req->bindParam(':idstock', $idstock);
        $req->bindParam(':iduser', $iduser);
        $req->execute();
    }

    public static function Delete_Stock($idstock,$iduser)
    {
        require_once('pdo.php');
        $bdheroku = connexion();

        $req = $bdheroku->prepare('DELETE FROM stock WHERE idstock= :idstock AND iduser=:iduser');
        $req->bindParam(':idstock',$idstock);
        $req->bindParam(':iduser', $iduser);

        $req->execute();
    }
}

?>
