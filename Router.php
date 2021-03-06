<?php

namespace MVC;

class Router
{

    public $rutasGET = [];
    public $rutasPOST = [];

    //Todas las url que van a reaccionar a un metodo get
    public function get($url, $fn)
    {
        $this->rutasGET[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->rutasPOST[$url] = $fn;
    }

    //Rutas que va a soportar nuestra app
    public function comprobarRutas()
    {
        session_start();
        $auth = $_SESSION['login'] ?? null;

        //Arreglo de rutas protegidas
        $rutas_protegidas = ['/admin', '/propiedades/crear', '/propiedades/actualizar', '/propiedades/eliminar', '/vendedores/crear','/vendedores/actualizar', '/vendedores/eliminar'];

        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if ($metodo === 'GET') {
            $fn = $this->rutasGET[$urlActual] ?? null;
        } else {
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        //Proteger las rutas
        if(in_array($urlActual, $rutas_protegidas) && !$auth){
            header('Location: /');
        }

        if ($fn) {
            //La url existe y hay una funcion asociada
            call_user_func($fn, $this); //Funcion que permite llamar a una funcion, a pesar que no sabemos como se llama
        } else {
            echo "Pagina no encontrada";
        }
    }

    //Muestra una vista
    public function render($view, $datos = [])
    {
        foreach ($datos as $key => $value) {
            $$key = $value; //Variable de Variable, mantiene el nombre y no pierde el valor
        }

        ob_start(); //Inicia un almacenamiento en memoria
        include __DIR__ . "/views/$view.php"; //En este caso almacena la vista
        $contenido = ob_get_clean(); //Limpiamos memoria

        include __DIR__ . "/views/layout.php";
    }
}
