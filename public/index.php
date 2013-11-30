<?php

//phpinfo();
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

////--------------------------------------------------------------------
//$app->register(new Silex\Provider\SessionServiceProvider(), array('session.storage.options' => array(
//        'name' => 'ONGometro',
//    //'id' => session_regenerate_id()
//    )
//));
//
////--------------------------------------------------------------------
//$paths = array("../src/Model/DAO");
//$isDevMode = true;
//
//$dbParams = array(
//    'driver' => 'pdo_mysql',
//    'user' => '',
//    'password' => '',
//    'dbname' => '',
//);
//
//$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
//$entityManager = EntityManager::create($dbParams, $config);
//\Model\AbstractModel::setEntityManager($entityManager);
//
//
//\Controller\AbstractController::$session = $app['session'];


//-------------------ROTAS------------------------------------------
$app->get('/', 'Controller\Site::home');

$app->before('Controller\AbstractController::mainBefore');
//--------------------------------------------------------------------
// Para poder reescrever os métodos HTTP
Request::enableHttpMethodParameterOverride();
//--------------------------------------------------------------------
$app->run();
