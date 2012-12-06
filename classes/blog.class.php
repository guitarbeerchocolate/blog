<?php
class blog
{
	private $userid = NULL;
	private $refid = NULL;
	private $title = NULL;
	private $sessionid = NULL;
	private $content = NULL;
	private $db;

	function __construct()
	{
		$this->db = new database;
	}

	function setRefId($refid)
	{
		$this->refid = $refid;
	}

	function setUserId($uid)
	{
		$this->userid = $uid;
	}

	function setTitle($title)
	{
		$this->title = $title;
	}

	function setContent($content)
	{
		$this->content = $content;
	}	

	function getResponse($refid)
	{
		$q = "SELECT * FROM `blog` WHERE `id`='{$refid}'";
		$row = $this->db->singleRow($q);
		echo '<article>';
		echo '<header><h3>'.$row->title.'</h3></header>';
		echo $row->content;		
		echo '<footer>';
		echo 'Posted by '.$this->getUsername($row->userid);
		echo '<br />on '.date('l jS \of F Y h:i:s A',strtotime($row->created));		
		echo '</footer>';
		echo '</article>';
	}

	function showEntries($sid)
	{
		$q = "SELECT * FROM `blog` ORDER BY `created` DESC";  
		$result = $this->db->query($q);    
		foreach($result as $row)
		{
			echo '<article>';
			echo '<header><h3>'.$row->title.'</h3></header>';
			echo $row->content;		
			echo '<footer>';
			echo 'Posted by '.$this->getUsername($row->userid);
			echo '<br />on '.date('l jS \of F Y h:i:s A',strtotime($row->created));
			echo '<br /><a href="private.php?sessionid='.$sid.'&refid='.$row->id.'">Reply</a>';
			echo '</footer>';
			echo '</article>';
		}	
	}

	function getUsername($uid)
	{
		$q = "SELECT * FROM `users` WHERE `id`='{$uid} LIMIT 1'";
		$row = $this->db->singleRow($q);
		return $row->username;
	}

	function saveEntry()
	{
		$q = "INSERT INTO `blog` (`refid`, `userid`, `title`, `content`) VALUES ('{$this->refid}','{$this->userid}','{$this->title}','{$this->content}')";		
		$result = $this->db->query($q);
	}
}
?>