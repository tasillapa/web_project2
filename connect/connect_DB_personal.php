<?php

class management {

    var $host = "localhost"; //ของผมใช้ localhost ครับ
    var $user = "root"; //""; //username phpmyadmin
    var $pass = "1234"; //""; //password phpmyadmin
    var $db = "dbo_personnel"; //ชื่อฐานข้อมูล//smalldev_mat
    var $Connect;

    function con_db() {
        $this->Connect = mysqli_connect($this->host, $this->user, $this->pass, $this->db)or die("Error : ไม่สามารถเชื่อมต่อฐานข้อมูลได้");
        $charset = "SET character_set_results=UTF8";
        mysqli_query($this->Connect, $charset) or die(mysqli_error($this->Connect));
        $charset = "SET character_set_client='UTF8'";
        mysqli_query($this->Connect, $charset) or die(mysqli_error($this->Connect));
        $charset = "SET character_set_connection='UTF8'";
        mysqli_query($this->Connect, $charset) or die(mysqli_error($this->Connect));
//        try {
//            $this->Connect = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
//            // set the PDO error mode to exception
//            $this->Connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//            echo "Connected successfully";
//        } catch (PDOException $e) {
//            echo "Connection failed: " . $e->getMessage();
//        }
    }

    function close_db() {
        mysqli_close($this->Connect);
        $this->Connect = null;
    }

    function select($sql) {
        $array_result = array();
        $Query = $this->Connect->query($sql);
        if ($Query) {
            while ($Row = mysqli_fetch_array($Query)) {

                array_push($array_result, $Row);
            }

            $this->Connect = null;
            unset($Query);
            unset($Row);
        } else {
            return false;
        }
        return $array_result;
    }

    function execute($sql) {
        $stmt = $this->Connect->prepare($sql);
        $ret = $stmt->execute();
        $this->Connect->commit();
        $this->Connect = null;
        return $ret;
    }

    function mysqli_num_rows($sql) {
        $Query = $this->Connect->query($sql);
        $num = mysqli_num_rows($Query);
        return $num;
    }

}

?>