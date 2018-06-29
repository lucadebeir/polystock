<?php
class Users
{


  public static function Get_User_Id($cookiecode)
	//User_Cookie_Code => User_Id
	//données : $userCookieCode string correspondant à un code cookie
	//résultat : vérifie si un code cookie existe dans la base de données, et le cas échéant renvoie un int correspondant à l'id de l'utilisateur auquel appartient le code cookie
	{
		require_once('pdo.php');
		$bdheroku = connexion();


		$req = $bdheroku->prepare("SELECT iduser FROM users WHERE cookieuser='".$cookiecode."'");

		$req->execute();
		$data=$req->fetch();

		return $data['iduser']; //Verifier si null
	}


  public static function Get_Users_Mail($userid)
  {
    require_once('pdo.php');
    $bdheroku = connexion();

    $req = $bdheroku->prepare("SELECT mail FROM users WHERE iduser= :userid");
    $req->bindParam(':iduser',$userid);
    $req->execute();

    $data = $req->fetch();

    return $data['usersmail'];
  }


  public static function Add_User($mail,$nom,$prenom,$age,$rue,$codepostale,$ville,$telephone,$password,$cookiecode,$gender)
  {
    require_once('pdo.php');
    $bdheroku = connexion();


    $req = $bdheroku->prepare('INSERT INTO users(iduser, admin, mail, nom, prenom, age, rue, codepostale, ville, telephone, password, cookieuser, sexe) VALUES (DEFAULT, DEFAULT, :mail, :nom,:prenom, :age, :rue, :codepostale, :ville, :telephone, :password, :cookiecode, :sexe)');
    //$req->bindParam(':admin',$admin);
    $req->bindParam(':mail',$mail);
    $req->bindParam(':nom',$nom);
    $req->bindParam(':prenom',$prenom);
    $req->bindParam(':age',$age);
    $req->bindParam(':rue',$rue);
    $req->bindParam(':codepostale',$codepostale);
    $req->bindParam(':ville',$ville);
    $req->bindParam(':telephone',$telephone);
    $req->bindParam(':password',$password);
    $req->bindParam(':cookiecode',$cookiecode);
    $req->bindParam(':sexe',$gender);

    $req->execute();

  }

  public static function Get_All_Users()
  {
    require_once('pdo.php');
    $bdheroku=connexion();

    $req = $bdheroku->prepare('SELECT * FROM users ORDER BY iduser');

    $req->execute();
    while($data=$req->fetch())
		{
			$result[] = $data;
		}

		return $result;
  }

    public static function Get_One_Users($iduser)
    {
        require_once('pdo.php');
        $bdheroku=connexion();

        $req = $bdheroku->prepare('SELECT * FROM users WHERE iduser=:iduser');
        $req->bindParam(':iduser',$iduser);
        $req->execute();
        $data=$req->fetch();
        return $data;
    }


    public static function Get_User_Admin($iduser){
        require_once('pdo.php');
        $bdheroku = connexion();
        $req = $bdheroku->prepare('SELECT admin FROM users WHERE iduser=:iduser');
        $req->bindParam(':iduser',$iduser);
        $req->execute();
        $data = $req->fetch();
        return($data[0]);
    }

    public static function Get_User_Nom($iduser){
        require_once('pdo.php');
        $bdheroku = connexion();
        $req = $bdheroku->prepare('SELECT nom FROM users WHERE iduser=:iduser');
        $req->bindParam(':iduser',$iduser);
        $req->execute();
        $data = $req->fetch();
        return($data[0]);
    }

    public static function Get_User_Prenom($iduser){
        require_once('pdo.php');
        $bdheroku = connexion();
        $req = $bdheroku->prepare('SELECT prenom FROM users WHERE iduser=:iduser');
        $req->bindParam(':iduser',$iduser);
        $req->execute();
        $data = $req->fetch();
        return($data[0]);
    }

  public static function Set_User_Cookie($mail,$usercookie)
  {
    require_once('pdo.php');
    $bdheroku = connexion();

    $req = $bdheroku->prepare('UPDATE users SET cookieuser= :cookieuser WHERE mail=:mail');
    $req->bindParam(':cookieuser',$usercookie);
    $req->bindParam(':mail',$mail);

    $req->execute();
  }

  public static function checkLogin($mail,$userPassword)
  {
    require_once('pdo.php');
    $bdheroku = connexion();

    $req = $bdheroku->prepare('SELECT password FROM users WHERE mail=:mail');

    $req->bindParam(':mail',$mail);

    $data = $req->fetch();
    return($data['password']==$userPassword);
  }

  public static function Get_Userid_By_Nick($mail)
  {
    require_once('pdo.php');
    $bdheroku = connexion();

    $req = $bdheroku->prepare("SELECT iduser FROM users WHERE mail=\'".$mail."\'");
    $data = $req->fetch();

    return $data['usersid'];
  }

  public static function Check_Password($mail,$userpw)
  {
    require_once('pdo.php');
    $bdheroku = connexion();

    $req = $bdheroku->prepare("SELECT password FROM users WHERE mail= '".$mail."'");
    $req->execute();

    $data = $req->fetch();

    return(password_verify($userpw, $data['password']));
  }

  public static function Update_Admin_Users($iduser, $admin){
    require_once('pdo.php');
    $connexion = connexion();
    $req = $connexion->prepare('UPDATE users SET admin=:admin WHERE iduser=:iduser');
    $req->bindParam(':admin', $admin);
    $req->bindParam(':iduser', $iduser);
    $req->execute();
  }

    public static function Update_User_Mail($iduser,$mail)
    {
        require_once('pdo.php');
        $bdheroku = connexion();


        $req = $bdheroku->prepare('UPDATE users SET mail:mail WHERE iduser=:iduser');
        $req->bindParam(':mail',$mail);
        $req->bindParam(':iduser',$iduser);

        $req->execute();

    }

    public static function Update_User_Nom($iduser,$nom)
    {
        require_once('pdo.php');
        $bdheroku = connexion();


        $req = $bdheroku->prepare('UPDATE users SET nom=:nom WHERE iduser=:iduser');
        $req->bindParam(':nom',$nom);
        $req->bindParam(':iduser',$iduser);

        $req->execute();

    }

    public static function Update_User_Prenom($iduser,$prenom)
    {
        require_once('pdo.php');
        $bdheroku = connexion();


        $req = $bdheroku->prepare('UPDATE users SET prenom:prenom WHERE iduser=:iduser');
        $req->bindParam(':prenom',$prenom);
        $req->bindParam(':iduser',$iduser);

        $req->execute();

    }

    public static function Update_User_Age($iduser,$age)
    {
        require_once('pdo.php');
        $bdheroku = connexion();


        $req = $bdheroku->prepare('UPDATE users SET age=:age WHERE iduser=:iduser');
         $req->bindParam(':age',$age);
        $req->bindParam(':iduser',$iduser);

        $req->execute();

    }

    public static function Update_User_Rue($iduser,$rue)
    {
        require_once('pdo.php');
        $bdheroku = connexion();


        $req = $bdheroku->prepare('UPDATE users SET rue=:rue WHERE iduser=:iduser');
        $req->bindParam(':rue',$rue);
        $req->bindParam(':iduser',$iduser);

        $req->execute();

    }

    public static function Update_User_CP($iduser,$codepostale)
    {
        require_once('pdo.php');
        $bdheroku = connexion();


        $req = $bdheroku->prepare('UPDATE users SET codepostale=:codepostale WHERE iduser=:iduser');
        $req->bindParam(':codepostale',$codepostale);
        $req->bindParam(':iduser',$iduser);

        $req->execute();

    }


    public static function Update_User_Ville($iduser,$ville)
    {
        require_once('pdo.php');
        $bdheroku = connexion();


        $req = $bdheroku->prepare('UPDATE users SET ville=:ville WHERE iduser=:iduser');
        $req->bindParam(':ville',$ville);
        $req->bindParam(':iduser',$iduser);

        $req->execute();

    }

    public static function Update_User_Tel($iduser,$telephone)
    {
        require_once('pdo.php');
        $bdheroku = connexion();


        $req = $bdheroku->prepare('UPDATE users SET telephone=:telephone WHERE iduser=:iduser');
        $req->bindParam(':telephone',$telephone);
        $req->bindParam(':iduser',$iduser);

        $req->execute();

    }

    public static function Update_User_Sexe($iduser,$gender)
    {
        require_once('pdo.php');
        $bdheroku = connexion();


        $req = $bdheroku->prepare('UPDATE users SET sexe=:sexe WHERE iduser=:iduser');
        $req->bindParam(':sexe',$gender);
        $req->bindParam(':iduser',$iduser);

        $req->execute();

    }

  public static function Delete_User($iduser)
  {
    require_once('pdo.php');
    $bdheroku = connexion();

    $req = $bdheroku->prepare('DELETE FROM boisson WHERE iduser=:iduser');
    $req->bindParam(':iduser',$iduser);

    $req->execute();

    $req = $bdheroku->prepare('DELETE FROM alimentaire WHERE iduser=:iduser2');
    $req->bindParam(':iduser2',$iduser);

    $req->execute();

    $req = $bdheroku->prepare('DELETE FROM event WHERE iduser=:iduser3');
    $req->bindParam(':iduser3',$iduser);

    $req->execute();

    $req = $bdheroku->prepare('DELETE FROM goodies WHERE iduser=:iduser4');
    $req->bindParam(':iduser4',$iduser);

    $req->execute();

    $req = $bdheroku->prepare('DELETE FROM produit WHERE iduser=:iduser5');
    $req->bindParam(':iduser5',$iduser);

    $req->execute();

    $req = $bdheroku->prepare('DELETE FROM stock WHERE iduser=:iduser6');
    $req->bindParam(':iduser6',$iduser);

    $req->execute();

    $req = $bdheroku->prepare('DELETE FROM utiliser WHERE iduser=:iduser7');
    $req->bindParam(':iduser7',$iduser);

    $req->execute();

    $req = $bdheroku->prepare('DELETE FROM users WHERE iduser=:iduser8');
    $req->bindParam(':iduser8',$iduser);

    $req->execute();
  }
} ?>
