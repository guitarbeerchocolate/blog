<?php
@session_start();
class authenticate
{
  public $id;
  private $username;
  private $password;
  private $db; 

  function __construct()
  {
    $this->db = new database;  
  } 

  function login($u, $p)
  {
    $this->username = mysql_real_escape_string($u);    
    $this->password = mysql_real_escape_string(md5($p));    
    $q = "SELECT * FROM users WHERE username='{$this->username}' AND password='{$this->password}'";  
    $result = $this->db->query($q);    
    if($result)
    {
      foreach($result as $row)
      {
        $this->id = $row['id'];
        $this->username = $row['username'];
      }      
      $this->createSession();
      return 'private.php?sessionid='.session_id();
    }
    else
    {
      $this->destroySession();   
      return 'fail';
    }  
  }

  function logout()
  {
    $this->destroySession();
  }

  private function createSession()
  {
    $_SESSION['AUTH_ID'] = $this->id;   
    $_SESSION['AUTH_USERNAME'] = $this->username;
  }

  private function destroySession()
  {
    unset($_SESSION['AUTH_ID']);
    unset($_SESSION['AUTH_USERNAME']);
    session_destroy();    
  }

  function __destruct()
  {

  }
}
?>