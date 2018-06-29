<?php
class Evenements
{

    public static function Get_Type_Stock_Evenement($idevenement)
    {
        require_once('pdo.php');
        $bdheroku=connexion();

        $req = $bdheroku->prepare('SELECT typestock FROM evenement WHERE idevenement = :idevenement');

        $req->bindParam(':idevenement', $idevenement);
        $req->execute();

        $data=$req->fetch();

        return $data[0];
    }

    public static function Get_Nombre_Boisson($idboisson)
    {
        require_once('pdo.php');
        $bdheroku=connexion();

        $req = $bdheroku->prepare('SELECT nbreboisson FROM boissons WHERE idboisson = :idboisson');

        $req->bindParam(':idboisson', $idboisson);
        $req->execute();

        $data=$req->fetch();

        return $data[0];
    }

    public static function Get_Unite_Boisson($idboisson)
    {
        require_once('pdo.php');
        $bdheroku=connexion();

        $req = $bdheroku->prepare('SELECT uniteboisson FROM boissons WHERE idboisson = :idboisson');

        $req->bindParam(':idboisson', $idboisson);
        $req->execute();

        $data=$req->fetch();

        return $data[0];
    }

    public static function Get_Prix_Boisson($idboisson)
    {
        require_once('pdo.php');
        $bdheroku=connexion();

        $req = $bdheroku->prepare('SELECT prixboisson FROM boissons WHERE idboisson = :idboisson');

        $req->bindParam(':idboisson', $idboisson);
        $req->execute();

        $data=$req->fetch();

        return $data[0];
    }

    public static function Get_Date_Evenement($idevent,$iduser)
    {
        require_once('pdo.php');
        $bdheroku = connexion();

        $req = $bdheroku->prepare('SELECT dateevenement FROM event WHERE idevent=:idevent AND iduser=:iduser');
        $req->bindParam(':idevent', $idevent);
        $req->bindParam(':iduser', $iduser);
        $req->execute();
        while ($data = $req->fetch()) {
            $result[] = $data;
        }

        return $result[0];
    }

    public static function Get_All_Evenements($iduser)
    {
        require_once('pdo.php');
        $bdheroku = connexion();

        $req = $bdheroku->prepare('SELECT * FROM event WHERE iduser=:iduser ORDER BY dateevenement');
        $req->bindParam(':iduser', $iduser);

        $req->execute();
        while ($data = $req->fetch()) {
            $result[] = $data;
        }

        return $result;
    }


    public static function Get_All_Evenements_Past($iduser)
    {
        require_once('pdo.php');
        $bdheroku = connexion();

        $req = $bdheroku->prepare('SELECT * FROM event WHERE iduser=:iduser AND evenementactif = false ORDER BY dateevenement');
        $req->bindParam(':iduser', $iduser);

        $req->execute();
        while ($data = $req->fetch()) {
            $result[] = $data;
        }

        return $result;
    }

    public static function Get_All_Evenements_Futur($iduser)
    {
        require_once('pdo.php');
        $bdheroku = connexion();

        $req = $bdheroku->prepare('SELECT * FROM event WHERE iduser=:iduser AND evenementactif = true ORDER BY dateevenement');
        $req->bindParam(':iduser', $iduser);

        $req->execute();
        while ($data = $req->fetch()) {
            $result[] = $data;
        }

        return $result;
    }

    public static function Add_Evenement($nomevenement,$dateevenement,$iduser)
    {
        require_once('pdo.php');
        require_once ('../model/Utiliser.php');
        $bdheroku = connexion();

        $req = $bdheroku->prepare('INSERT INTO event(idevent, iduser, nomevent, dateevenement, evenementactif, prixtotal) VALUES (DEFAULT, :iduser, :nomevenement, :dateevenement, DEFAULT, DEFAULT)');
        $req->bindParam(':nomevenement',$nomevenement);
        $req->bindParam(':dateevenement',$dateevenement);
        $req->bindParam(':iduser', $iduser);

        $req->execute();

    }

    /*public static function Get_Id_Evenement($nomevenement)
    {
        require_once('pdo.php');
        $bdheroku=connexion();

        $req = $bdheroku->prepare('SELECT idevenement FROM evenement WHERE nomevenement = :nomevenement');

        $req->bindParam(':nomevenement', $nomevenement);
        $req->execute();

        $data=$req->fetch();

        return $data[0];
    }*/

    public static function Get_Nom_Evenement($idevent,$iduser)
    {
        require_once('pdo.php');
        $bdheroku=connexion();

        $req = $bdheroku->prepare('SELECT nomevent FROM event WHERE idevent = :idevent AND iduser=:iduser');

        $req->bindParam(':idevent', $idevent);
        $req->bindParam(':iduser', $iduser);
        $req->execute();

        $data=$req->fetch();

        return $data[0];
    }

    public static function Select($nomevent) {
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('SELECT idevent FROM event WHERE nomevent=:nomevent');
        $req->bindParam(':nomevent', $nomevent);
        $req->execute();

        $data=$req->fetch();

        return $data[0];

    }

    public static function Update_Prix_Boisson($idboisson, $prixboisson){
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('UPDATE boissons SET prixboisson=:prixboisson WHERE idboisson=:idboisson');
        $req->bindParam(':prixboisson', $prixboisson);
        $req->bindParam(':idboisson', $idboisson);
        $req->execute();
    }

    public static function Update_Nbre_Boisson($idboisson, $nbreboisson){
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('UPDATE boissons SET nbreboisson=:nbreboisson WHERE idboisson=:idboisson');
        $req->bindParam(':nbreboisson', $nbreboisson);
        $req->bindParam(':idboisson', $idboisson);
        $req->execute();
    }

    public static function Update_Nom_Boisson($idboisson, $nomboisson){
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('UPDATE boissons SET nomboisson=:nomboisson WHERE idboisson=:idboisson');
        $req->bindParam(':nomboisson', $nomboisson);
        $req->bindParam(':idboisson', $idboisson);
        $req->execute();
    }

    public static function Update_Unite_Boisson($idboisson, $uniteboisson)
    {
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('UPDATE boissons SET uniteboisson=:uniteboisson WHERE idboisson=:idboisson');
        $req->bindParam(':uniteboisson', $uniteboisson);
        $req->bindParam(':idboisson', $idboisson);
        $req->execute();
    }

    public static function Update_Date_Evenement($idevent, $date, $iduser)
    {
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('UPDATE event SET dateevenement=:dateevenement WHERE idevent=:idevent AND iduser=:iduser');
        $req->bindParam(':dateevenement', $date);
        $req->bindParam(':idevent', $idevent);
        $req->bindParam(':iduser', $iduser);
        $req->execute();
    }

    public static function Update_Nom_Evenement($idevent, $nom, $iduser)
    {
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('UPDATE event SET nomevent=:nomevent WHERE idevent=:idevent AND iduser=:iduser');
        $req->bindParam(':nomevent', $nom);
        $req->bindParam(':idevent', $idevent);
        $req->bindParam(':iduser', $iduser);
        $req->execute();
    }

    public static function Update_Actif_Evenement($idevent, $actif, $iduser)
    {
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('UPDATE event SET evenementactif=:evenementactif WHERE idevent=:idevent AND iduser=:iduser');
        $req->bindParam(':evenementactif', $actif);
        $req->bindParam(':idevent', $idevent);
        $req->bindParam(':iduser', $iduser);
        $req->execute();
    }

    public static function Delete_Evenement($idevent,$iduser)
    {
        require_once('pdo.php');
        require_once ('../model/Utiliser.php');
        $bdheroku = connexion();
        $utiliser = Utiliser::Get_All_Utiliser($idevent,$iduser);

        foreach ($utiliser as $row) {
            Utiliser::Delete_Utiliser($idevent,$row['idproduit'],$iduser);
        }

        $req = $bdheroku->prepare('DELETE FROM event WHERE idevent=:idevent AND iduser=:iduser');
        $req->bindParam(':idevent',$idevent);
        $req->bindParam(':iduser',$iduser);

        $req->execute();
    }
}

?>
