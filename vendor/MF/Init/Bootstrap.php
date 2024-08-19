<?php

namespace MF\Init;

abstract class Bootstrap{
    private $routes;

    abstract protected function initRoutes();

    public function __construct()
    {
        $this->initRoutes();
        $this->run($this->getUrl());
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function setRoutes(array $routes)
    {
        $this->routes = $routes;
    }

    protected function run($url)
    {
        //  echo "********" . $url;
        foreach ($this->getRoutes() as $key => $route) {
            //  print_r($route);
            if ($url == $route['route']) {
                $class = "App\\Controllers\\" . ucfirst($route['controller']);

                $controller = new $class;
                // $controller = new App\Controller\IndexController;
                $action = $route['action'];
                $controller->$action();
            }
        }
    }
    protected function getUrl()
    {
        // Retorno apenas o que corresponde ao Path
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }


}

?>
