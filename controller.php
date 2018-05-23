<?php
/**
* Base Controller 
*/
class BaseController 
{
	

	/*SQL Credentials*/
	private $user;
	private $host;
	private $password;
	private $database;
	/*SQL Connect*/
	private $mysql;
	function __construct()
	{
		/*SQL Credentials*/
		$this->user ='root';
		$this->database ='trainebrain';
		$this->host= 'localhost';
		$this->password = 'root';
		$this->mysql = $this->dataBaseConnect();
	}

	/**
	*database connect
	*/
	protected  function dataBaseConnect()
	{
		    $dbh = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->user, $this->password);

		return $dbh;

	}


	/**
	* all users selects
	*/
	public function getAllUsers()
	{

		return  $this->mysql->query('SELECT * FROM users');	
	}

	/*
	* Insert into table `users` data 
	*/
	public function setUserFromData()
	{
		$statement = $this->mysql->prepare("INSERT INTO users(name, email, password)
   						 VALUES(:name, :email, :password)");

		$statement->execute([
    					"name" => $_POST['name'],
    					"email" =>  $_POST['email'],
    					"password" => $_POST['password']
    	]);

	}



}

$DataController = new BaseController();

if (!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['email'])) {

	$DataController->setUserFromData();
	echo 'Hello '. $_POST['name']. '!';
}else{
	echo "fill all fields!";
}


?>