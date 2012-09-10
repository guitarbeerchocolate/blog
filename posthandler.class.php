<?php
require_once 'classes/autoload.php';
class posthandler
{
  private $postObject;
  private $blog;

  function __construct($p)
  {
    $this->postObject = (object) $p;    
    $this->blog = new blog;
    if($this->postObject->method && (method_exists($this, $this->postObject->method)))
    {
      $evalStr = '$this->'.$this->postObject->method.'();';
      eval($evalStr);
    }
    else
    {
      echo 'Invalid method supplied';
    }
  }

  function login()
  { 
    $auth = new authenticate;    
    echo $auth->login($this->postObject->username, $this->postObject->password);    
  }

  function saveMessage()
  { 
    $this->blog->setId($this->postObject->myid);
    $this->blog->setMessage($this->postObject->mymessage);
    echo $this->blog->saveEntry();    
  }
}
new posthandler($_POST);
?>