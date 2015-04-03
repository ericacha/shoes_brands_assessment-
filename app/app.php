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

    //this is the main page for user
    $app->get('/', function() use ($app) {
      return $app['twig']->render('index.html.twig');
    });
    //#2 this is what the store page looks like when clicking to add/view shoe stores
    $app->get("stores", function () use ($app) {
      return $app['twig']->render('stores.html.twig', array('stores' => Store::getAll()));

    });

    //#3 this is what the brand page looks like when clicking to add/view brand shoes
    $app->get("brands", function() use ($app) {
      return $app['twig']->render('brands.html.twig', array('brands' => Brand::getAll()));
    });

    //this will  list shoe stores from the link to their individual page for Store
    $app->get("/stores/{id}", function($id) use ($app) {
      $store = Store::findId($id);
      return $app['twig']->render('store.html.twig', array('store' => $store, 'brands' => $store->getBrand(),'all_brands' => Brand::getAll()));
    });

    //this will list shoe brands from the link to their individual page for Brand
    $app->get("/brands/{id}", function($id) use ($app) {
      $brand = Brand::findId($id);
      return $app['twig']->render('brand.html.twig', array('brand' => $brand, 'stores' => $brand->getStore(), 'all_stores' => Store::getAll()));
    });

    //this will route to a page to edit category
    $app->get("/stores/{id}/edit", function($id) use ($app) {
      $store = Store::findId($id);
      return $app['twig']->render('store_edit.html.twig', array('store' => $store));
    });


    //POST

    //#2 this is where the user gets to input what store name they want to add onto page for Store
    $app->post("/stores", function() use ($app) {
      $store = new Store($_POST['name']);
      $store->save();
      return $app['twig']->render('stores.html.twig', array('stores' => Store::getAll()));
    });

    //#3 this is where the user gets to input what brand name they want to add onto page for Brand
    $app->post("/brands", function() use ($app) {
      $brand = new Brand($_POST['type']);
      $brand->save();
      return $app['twig']->render('brands.html.twig', array('brands' => Brand::getAll()));
    });

    //this will delete the list of stores
    $app->post("/delete_stores", function() use ($app) {
      Store::deleteAll();
      return $app['twig']->render('index.html.twig');
    });

    //this will delete the list of brands
    $app->post("/delete_brands", function() use ($app) {
      Brand::deleteAll();
      return $app['twig']->render('index.html.twig');
    });

    //this will add the store to the brand on brand.html.twig
    $app->post("/add_stores", function() use ($app) {
      $brand = Brand::findId($_POST['brand_id']);
      $store = Store::findId($_POST['store_id']);
      $brand->addStore($store);
      return $app['twig']->render('brand.html.twig', array('brand' =>$brand, 'brands' => Brand::getAll(), 'stores' => $brand->getStore(), 'all_stores' => Store::getAll()));
    });

    //this will add the brand to the store on store.html.twig
    $app->post("add_brands", function() use ($app) {
      $brand = Brand::findId($_POST['brand_id']);
      $store = Store::findId($_POST['store_id']);
      $store->addBrand($brand);
      return $app['twig']->render('store.html.twig', array('store' => $store, 'stores' => Store::getAll(), 'brands' => $store->getBrand(), 'all_brands' => Brand::getAll()));
    });

    $app->post("/delete_stores", function() use ($app) {
       Store::deleteAll();
       return $app['twig']->render('store.html.twig');
    });

    $app->post("/delete_brands", function() use ($app) {
       Brand::deleteAll();
       return $app['twig']->render('brand.html.twig');
    });

    //PATCH
    //update and edit a particular link
    $app->get("/stores/{id}/edit", function($id) use ($app) {
      $store = Store::findId($id);
      return $app['twig']->render('store_edit.html.twig', array('store' => $store));
    });

    $app->patch("/stores/{id}", function($id) use ($app) {
      $name = $_POST['name'];
      $store = Store::findId($id);
      $store->updateName($name);
      return $app['twig']->render('store_edit.html.twig', array('store' => $store, 'brand' => $store->getBrand()));
    });

    $app->delete("/stores/{id}", function($id) use ($app) {
      $store = Store::findId($id);
      $store->deleteAll();
      return $app['twig']->render('index.html.twig', array('stores' => Store::getAll()));
    });

    $app->patch("/updateStore/{id}", function($id) use ($app) {
      $store = Store::findId($id);
      $store->updateName($_POST['name']);
      return $app['twig']->render("store_edit.html.twig", array ('stores' => Store::getAll()));
    });

    $app->delete("/deleteStore/{id}", function($id) use ($app) {
      $store = Store::findId($id);
      $store->singeDelete($_POST['name']);
      return $app['twig']->render("stores.html.twig", array ('stores' => Store::getAll()));
    });


    return $app;

?>
