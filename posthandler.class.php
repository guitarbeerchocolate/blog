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
    header('Location:'.$auth->login($this->postObject->username, $this->postObject->password));
  }

  function savemessage()
  { 
    $this->blog->setSessionId($this->postObject->sessionid);
    $this->blog->setRefId($this->postObject->refid);
    $this->blog->setUserId($this->postObject->userid);
    $this->blog->setTitle($this->postObject->title);
    $this->blog->setContent($this->postObject->content);
    $this->blog->saveEntry();
    header('Location:private.php?sessionid='.$this->postObject->sessionid);
  }
}
new posthandler($_POST);
?>