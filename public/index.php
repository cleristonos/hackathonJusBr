<?php
include '../vendor/autoload.php';
//include '../src/Model/DAO/Canal.php';

define('VIEW_PATH', '../views');
date_default_timezone_set('America/Bahia');

//--------------------------------------------------------------------
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

//------------------------------------------------------------------
$app = new Application();
$app['debug'] = true;
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => VIEW_PATH
));


// Conexão banco de dados
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_pgsql',
        'host'      => '192.168.0.128',
        'port'      =>'5432',
        'dbname'    => 'ongometro',
        'user'      => 'postgres',
        'password'  => 'root',
        'charset'   => 'utf8'
    ),
));

\Model\AbstractModel::setEntityManager($app['db']);
//-------------------ROTAS------------------------------------------
$app->get('/', 'Controller\Site::home2');
$app->post('/ong', 'Controller\Site::listOng');
$app->get('/ong/{uf}/{situacao}', 'Controller\Site::listOng');

$app->get('/home2/{situacao}', 'Controller\Site::home2');
$app->get('/home2', 'Controller\Site::home2');


$app->before('Controller\AbstractController::mainBefore');
//--------------------------------------------------------------------
// Para poder reescrever os métodos HTTP
Request::enableHttpMethodParameterOverride();
//--------------------------------------------------------------------
$app->run();
