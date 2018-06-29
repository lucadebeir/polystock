<?php
class Conf {
   
  static private $databases = array(
    // Le nom d'hote est webinfo a l'IUT
    // ou localhost sur votre machine
    'hostname' => 'eec2-54-247-89-189.eu-west-1.compute.amazonaws.com',
    // A l'IUT, vous avez une BDD nommee comme votre login
    // Sur votre machine, vous devrez creer une BDD
    'database' => 'd1l6omh6s3t8pm',
    // A l'IUT, c'est votre login
    // Sur votre machine, vous avez surement un compte 'root'
    'login' => 'fvfslbtvmndeav',
    // A l'IUT, c'est votre mdp (INE par defaut)
    // Sur votre machine personelle, vous avez creez ce mdp a l'installation
    'password' => '0b8f6c570f12c9567f1ecae01840880661d15a67cabaa4b0b2ddd2bf0ef46eab',

    'port' => '5432',
    'sslmode' => 'require'

  );
   
  static public function getLogin() {
    //en PHP l'indice d'un tableau n'est pas forcement un chiffre.
    return self::$databases['login'];
  }

  static public function getPort() {
      //en PHP l'indice d'un tableau n'est pas forcement un chiffre.
      return self::$databases['port'];
  }

  static public function getSSLMode() {
        //en PHP l'indice d'un tableau n'est pas forcement un chiffre.
      return self::$databases['sslmode'];
  }
   
  static public function getHostname() {
    //en PHP l'indice d'un tableau n'est pas forcement un chiffre.
    return self::$databases['hostname'];
  }
   
  static public function getDatabase() {
    //en PHP l'indice d'un tableau n'est pas forcement un chiffre.
    return self::$databases['database'];
  }
   
  static public function getPassword() {
    //en PHP l'indice d'un tableau n'est pas forcement un chiffre.
    return self::$databases['password'];
  }

  // la variable debug est un boolean
    static private $debug = True; 
    
    static public function getDebug() {
      return self::$debug;
    }
   
}
?>