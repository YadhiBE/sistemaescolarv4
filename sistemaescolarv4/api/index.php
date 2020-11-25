<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Illuminate\Database\Capsule\Manager as DB;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/database.php';

// Instantiate app
$app = AppFactory::create();
$app->setBasePath("/sistemaescolarv4/api/index.php");

// Add Error Handling Middleware
$app->addErrorMiddleware(true, false, false);

// Add route callbacks
$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write('Hello World');
    return $response;
});

//Funcion de autentificación de usuario
$app->post('/login/{usuario}', function (Request $request, Response $response, array $args) {

    $data = json_decode($request->getBody()->getContents(), false);
    //var_dump($data);
    //return;

    $users = DB::table('usuarios')
    ->leftJoin('perfiles', 'usuarios.idperfil', '=', 'perfiles.idperfil')
    ->where('nombreusuario', $data->usuario)
    ->first();

    $msg = new stdClass();

    if ($user->contraseña == $data->contraseña){
        $msg->aceptado =  true;
        $msg->nombreperfil = $user->nombreperfil;
        $msg->idusuario = $user->idusuarios;
        $msg = "<p>Bienvenido</p> <a href='asking.php'>Entrar al sistema escolar</a>";
    }
    else {
        $msg->aceptado = false;
        $msg = "<p> Usuario y/o contaseña erroneos, por favor vuelva a identificarse </p><a href= 'index.html'>Regresar</a>";
    }

    $response->getBody()->write(json_decode($msg));
    return $response;
});

//Funcion para insertar calificaciones
$app->post('/insertar', function (Request $request, Response $response, array $args) {

    $data = json_decode($request->getBody()->getContents(), false);

    DB::table('calificacion')->insert([
        'calespañol' => $_POST['calespañol'],
        'calmate' => $_POST['calmate'],
        'calhistoria' => $_POST['calhistoria']
    ]);

    $msg = "Las calificaciones han sido guardadas exitosamente";

    $response->getBody()->write(json_decode($msg));
    return $response;
});

//Funcion para consultar los perfiles del usuario
$app->post('/consultar_perfil/{usuario}', function (Request $request, Response $response, array $args) {

    $data = json_decode($request->getBody()->getContents(), false);

    $users = DB::table('usuarios')
    ->leftJoin('perfiles', 'usuarios.idperfil', '=', 'perfiles.idperfil')
    ->where('usuarios.nombreusuario', $data->usuario)
    ->first();

    $response->getBody()->write(json_decode($msg));
    return $response;
});

//Funcion para consultar las calificaciones
$app->post('/consultar_calificacion', function (Request $request, Response $response, array $args) {

    $data = json_decode($request->getBody()->getContents(), false);
    
    $users = DB::table('calificacion')
    ->leftJoin('alumno', 'calificacion.idalumno', '=', 'alumno.idalumno')
    ->get();

    $response->getBody()->write(json_decode($msg));
    return $response;
});

//Funcion para eliminar las calificaciones
$app->post('/consultar_calificacion/{id}', function (Request $request, Response $response, array $args) {

    $data = json_decode($request->getBody()->getContents(), false);
    
    DB::table('calificacion')->where('idcalificacion', $data->id)->delete();

    $response->getBody()->write(json_decode($msg));
    return $response;
});

//Funcion para actualizar las calificaciones
$app->post('/update/{idcalificacion}{calespañol}{calmate}{calhistoria}', function (Request $request, Response $response, array $args) {

    $data = json_decode($request->getBody()->getContents(), false);
    
    DB::table('calificaciones')
    ->where('idcalificacion', $data->idcalificacion)
    ->update([
        'calespañol' => $data->calespañol,
        'calmate' => $data->calmate,
        'calhistoria' => $data->calhistoria,
    ]);

    $response->getBody()->write(json_decode($msg));
    return $response;
});


// Run application
$app->run();