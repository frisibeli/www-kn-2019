<?php

class Response {
    protected $statusCode = 200;
    protected $content = "";

    public function __construct($content="", $code=200)
    {
        $this->statusCode = $code;
        $this->content = $content;
    }

    public function send()
    {
        http_response_code($this->statusCode);
        echo $this->content;
    }
}

class JsonResponse extends Response {
    public function send()
    {
        header('Content-Type: application/json');
        http_response_code($this->statusCode);
        $json_string = json_encode($this->content);
        echo $json_string;
    }
}

class App {
    public function __construct()
    {
        # code...
    }

    public function handle()
    {
        // $response = new JsonResponse([
        //     'title' => "My Page",
        //     'content' => "Tes test test safdsfds"
        // ], 200);

        $response = new Response("Text");
        return $response;
    }
}

$app = new App();

$response = $app->handle();

$response->send();