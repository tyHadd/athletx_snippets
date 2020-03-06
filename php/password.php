<?php
class Password {
    private $pass;
    private $hash;

    public function setPass($p){
      $this->pass = $p;
    }
    public function getPass(){
      return $this->pass;
    }
    public function setHash($h){
      $this->hash = $h;
    }
    public function getHash(){
      return $this->hash;
    }

    public function randomPassword( $length = 8 ) {
      $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
      $pd = substr( str_shuffle( $chars ), 0, $length );
      $this->setPass($pd);
      return $pd;
    }

    //Encrypt the password
    public function encryptPassword(){
        $pd = $this->getPass();
        $pd2 = password_hash($pd, PASSWORD_DEFAULT);
        return $pd2;
    }
    //decrypt the password
    public function decryptPassword(){
      $pd = $this->getPass();
      $h = $this->getHash();
      if (password_verify($pd, $h)) {
        return 'valid';
      } else {
        return 'invalid';
      }
    }
}

//ENCRYPT USER PASSWORD
$pass = new Password(); //encrypt the password
$pass->setPass($userpassword);
$up = $pass->encryptPassword();
echo $up; 

//UPDATE PASSWORD EXAMPLE
$pass = new Password();
$pass->setPass($userpassword);
$up = $pass->encryptPassword();
//update database with new password

//RANDOM PASSWORD EXAMPLE
$pass = new Password();
$ra = $pass->randomPassword(); //create a random pasword
$up = $pass->encryptPassword(); //encrypt random password
//store $up in the database on the user and then send $ra to the user

//CHECK PASSWORD EXAMPLE
$userpassword = "Athletx!2012"; //USER INPUTTED PASSWORD
$username = "bhammond@athletx.com";
$sp = "$2y$10$ng09DrISDLPoZVI17CVlLedtk/M6lDkhPhac.weLMHdcf9Dl1X6ZO"; //STORED EXAMPLE ENCRYPTED PASSWORD

$submitted = new Password(); 
$submitted->setPass($userpassword);
$submitted->setHash($sp);

$userstatus = $submitted->decryptPassword(); //produces valid or invalid
if($userstatus=="valid"){ //password matches
    print json_encode($userinfo);
    $_SESSION["email"] = $username; //store email in session
}
else { //password does not match
    print json_encode(array());
}

?>
