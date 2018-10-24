<?php

define("HOST", "localhost");
define("DBNAME", "database_adi");
define("UNAME", "kullanici_adi");
define("PASSWD", "sifre");
define("CHARSET", "utf8");

class Model extends PDO
{
    public function __construct()
    {
        try {
            parent::__construct("mysql:host=" . HOST . ";dbname=" . DBNAME, UNAME, PASSWD);
            $this->query('SET CHARACTER SET ' . CHARSET);
            $this->query('SET NAMES ' . CHARSET);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $error) {
            $error->getMessage();
        }
    }

    public function fetchAll(){
        return $this->query("SELECT * FROM `tablo_adi`", PDO::FETCH_ASSOC);
    }
}
?>