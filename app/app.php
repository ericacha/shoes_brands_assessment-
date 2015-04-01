<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Store.php";
    require_once __DIR__."/../src/Brand.php";

    $DB = new PDO('pgsql:host=localhost;dbname=shoes');

    $app = new Silex\Application();
    $app ['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider, array('twig.path'=>__DIR__."/../views"));

    use Symfony\Component\HttpFoundation\Request;
        Request::enableHttpMethodParameterOverride();

    //GET

    $app->get('/', function() use ($app) {
      return $app['twig']->render("index.html.twig");
    });

    $app->get("stores", function () use ($app) {
      return $app['twig']->render("stores.html.twig", array('stores' => Store::getAll()));

    });

    $app->get("brands", function() use ($app) {
      return $app['twig']->render("brands.html.twig", array('brands' => Brand::getAll()));
    });

    $app->get("/stores/{id}", function() use ($app) {
      $store = Store::find($id);
      return $app['twig']->render("brand.html.twig", array('store' => $store, 'brands' => $store->getBrand(), 'all_brands' => Brand::getAll()));
    });

    //POST

    $app->post("/stores", function() use ($app) {
      $name = $_POST['name'];
      $store = new Store($name);
      $store->save();
      return $app['twig']->render('stores.html.twig', array('stores' => Store::getAll()));
    });



    return $app;

?>
