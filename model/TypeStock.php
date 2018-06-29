<?php
class TypeStock
{

    public static function Get_All_Type_Stock()
    {
        require_once('pdo.php');
        $bdheroku = connexion();

        $req = $bdheroku->prepare('SELECT * FROM typestock');

        $req->execute();
        while ($data = $req->fetch()) {
            $result[] = $data;
        }

        return $result;
    }

}
?>