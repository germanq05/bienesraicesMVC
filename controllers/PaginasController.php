<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController
{
    public static function index(Router $router)
    {
        $propiedades = Propiedad::get(3);
        $inicio = true;
        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }
    public static function nosotros(Router $router)
    {
        $router->render('paginas/nosotros', []);

    }
    public static function propiedades(Router $router)
    {
        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }
    public static function propiedad(Router $router)
    {
        $id = validarORedireccionar('/propiedades');
        //Busca la propiedad
        $propiedad = Propiedad::find($id);
        $router->render('paginas/propiedad',[
            'propiedad' => $propiedad
        ]);
    }
    public static function blog(Router $router)
    {
        $router->render('paginas/blog');
    }
    public static function entrada(Router $router)
    {
        $router->render('paginas/entrada');
    }
    public static function contacto(Router $router)
    {
        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $respuestas = $_POST['contacto'];

            //Crear instancia de PHPMailer
            $mail = new PHPMailer();
            //Configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = 'c5a55378c2fdee';
            $mail->Password = 'faf1e16b44c1a1';
            $mail->SMTPSecure = 'tls';
            $mail->Port = '2525';

            //Configurar el contenido del email
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un Nuevo Mensaje';

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //Definir contenido
            $contenido = '<html>';
            $contenido .= '<p> Tienes un Nuevo Mensaje </p>';
            $contenido .= '<p> Nombre: ' . $respuestas['nombre'] . ' </p>';
          
            //Enviar de forma condicional algunos campos de email o telefono
            if($respuestas['contacto'] === 'telefono'){
                $contenido .= '<p> Eligio ser Contactado por Telfono </p>';
                $contenido .= '<p> Telefono: ' . $respuestas['telefono'] . ' </p>';
                $contenido .= '<p> Fecha de Contacto: ' . $respuestas['fecha'] . ' </p>';
                $contenido .= '<p> Hora de Contacto: ' . $respuestas['hora'] . ' </p>';
                
            }else{
                $contenido .= '<p> Eligio ser Contactado por Email </p>';
                $contenido .= '<p> Email: ' . $respuestas['email'] . ' </p>';
            }

            $contenido .= '<p> Vende o Compra: ' . $respuestas['tipo'] . ' </p>';
            $contenido .= '<p> Precio o Presupuesto: $' . $respuestas['precio'] . ' </p>';
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texo alternativo sin html';

            //Enviar el email
            if($mail->send()){
                $mensaje = "Mensaje Enviado";
            }else{
                $mensaje = "Mensaje no Enviado";
            }

        }
        $router->render('paginas/contacto',[
            'mensaje' => $mensaje
        ]);
    }
}
