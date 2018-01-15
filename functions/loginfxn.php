<?php

class userClass{

    //Login Function
    public function userLogin($username,$password){

        try{
            $dbConn = getDB('cpe-studentportal');
            $stmt = $dbConn->prepare("SELECT position, name, id FROM administrators WHERE username=:username AND password=:password");
            $stmt->bindParam("username", $username, PDO::PARAM_STR);
            $stmt->bindParam("password", $password, PDO::PARAM_STR);
            $stmt->execute();
            $count = $stmt->rowCount();
            $data = $stmt->fetch(PDO::FETCH_OBJ);
            $dbConn = null;
            if($count){
                $_SESSION["name"] = array($data->position, $data->name, $data->id);
                return true;
            }else{
                return false;
            }
        }
        
        catch(PDOException $e){
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }

    }
	
	 //Login Function
    public function studentLogin($username,$password){

        try{
            $dbConn = getDB('cpe-studentportal');
            $stmt = $dbConn->prepare("SELECT id, surname, firstname, middlename, studnum, passcode FROM students WHERE studnum=:username AND passcode=:password");
            $stmt->bindParam("username", $username, PDO::PARAM_STR);
            $stmt->bindParam("password", $password, PDO::PARAM_STR);
            $stmt->execute();
            $count = $stmt->rowCount();
            $data = $stmt->fetch(PDO::FETCH_OBJ);
            $dbConn = null;
            if($count){
                $_SESSION["name"] = array($data->id, $data->surname, $data->firstname, $data->middlename, $data->studnum, $data->passcode);
                return true;
            }else{
                return false;
            }
        }
        
        catch(PDOException $e){
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }

    }
}
?>