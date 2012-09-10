<?php
class blog
{
	private $name;
	private $message;
	private $db;

	function __construct()
	{
		$this->db = new database;
	}

	function setId($id)
	{
		$this->id = $id;
	}
	
	function setMessage($m)
	{
		$this->message = $m;
	}

	function showEntries()
	{
		$q = "SELECT * FROM blog ORDER BY `datesaved` DESC";  
		$result = $this->db->query($q);    
		foreach($result as $row)
		{
			echo '<article>';
			echo $row['entry'];		
			echo '<footer>';
			echo 'Posted by '.$this->getUsername($row['userid']);
			echo '<br />on '.$row['datesaved'];			
			echo '</footer>';
			echo '</article>';
		}	
	}

	function getUsername($uid)
	{
		$q = "SELECT * FROM users WHERE `id`='{$uid} LIMIT 1'";
		$row = $this->db->singleRow($q);
		return $row['username'];
	}

	function saveEntry()
	{
		$q = "INSERT INTO blog (userid, entry) VALUES ('{$this->id}', '{$this->message}')"; 
		$result = $this->db->query($q);
		$callBack = '<article>';
		$callBack .= $this->message;		
		$callBack .= '<footer>';
		$callBack .= 'Posted by '.$this->getUsername($this->id);
		$callBack .= '<br />on '.$date = date('Y-m-d H:i:s');		
		$callBack .= '</footer>';
		$callBack .= '</article>';
		return $callBack;
	}
}
?>