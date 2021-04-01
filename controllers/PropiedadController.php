<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;

class PropiedadController
{
    public static function index(Router $router)
    { //Se pone static ya que no es necesario instanciar la clase
        $propiedades = Propiedad::all();
        $resultado = null;
        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' =>$resultado
        ]);
    }

    public static function crear(Router $router)
    {
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores
        ]);
    }

    public static function actualizar(Router $router)
    {
        $router->render('propiedades/actualizar');
    }
}
