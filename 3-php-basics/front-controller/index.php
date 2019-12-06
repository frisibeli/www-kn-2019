<?php

class Response {
    protected $content = "";
    protected $statusCode = 200;

    public function __construct($content="", $code=200)
    {
        $this->content = $content;
        $this->statusCode = $code;
    }

    public function setCode($code=200)
    {
        $this->statusCode = $code;
    }

    public function send()
    {
        http_response_code($this->statusCode);
        echo $this->content;
    }
}

interface DatabaseInterface {
    public function query($statement, $parameters = []);
}

class DB implements DatabaseInterface{
    protected $db = null;

    public function __construct($host, $dbName, $user, $pass)
    {
        $this->db = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $user, $pass);
    }

    public function query($statement, $parameters=[])
    {
        $stmt = $this->db->prepare($statement);
        $stmt->execute($parameters);



        return $stmt->fetchALL();
    }
}

class App {
    protected $db;

    public function __construct()
    {
        $this->db = new DB("db", "test", "root", "test");
    }

    function handle()
    {
        $response = new Response("Test", 401);
        $res = $this->db->query("select * from test");
        var_dump($res);
        return $response;
    }
}
$app = new App();
$response = $app->handle();
$response->send();
