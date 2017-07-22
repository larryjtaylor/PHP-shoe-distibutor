<?php
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/Store.php';
    require_once __DIR__.'/../src/Brand.php';

    $server = 'mysql:host=localhost:8889;dbname=shoes';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app->get('/', function() use($app) {
        return $app['twig']->render('index.html.twig');
    });

    $app->get('/brands', function() use($app) {
        return $app['twig']->render('brands.html.twig', array('brands' => Brand::getAll()));
    });

    $app->post("/brands", function() use($app) {
        $brand_name = $_POST['brand_name'];
        $price = $_POST['price'];
        $id = $_POST['id'];
        $brand = new Brand($brand_name, $price, $id);
        $brand->save();
        return $app['twig']->render('brands.html.twig', array('brands' => Brand::getAll()));
    });

    $app->post("/delete_brands", function() use($app) {
        Brand::deleteAll();
        return $app['twig']->render('index.html.twig');
    });

    $app->get("/brand/{id}", function($id) use ($app) {
        $brand = Brand::find($id);
        return $app['twig']->render('brand.html.twig', array('brand' => $brand, 'stores'=>brand.getStores(), 'all_stores'=>Store::getAll()));
    });

/////////////////////////////////////////

    $app->get('/stores', function() use($app) {
        return $app['twig']->render('stores.html.twig', array('stores' => Store::getAll()));
    });

    $app->post("/stores", function() use($app) {
        $store_name = $_POST['store_name'];
        $id = $_POST['id'];
        $store = new Store($store_name, $id);
        $store->save();
        return $app['twig']->render('stores.html.twig', array('stores' => Store::getAll()));
    });

    $app->post("/delete_stores", function() use($app) {
        Store::deleteAll();
        return $app['twig']->render('index.html.twig');
    });

    $app->get("/stores/{id}", function($id) use ($app) {
       $store = Store::find($id);
       return $app['twig']->render('store.html.twig', array('store' => $store));
   });

    $app->get("/stores/{id}/edit", function($id) use ($app) {
        $store = Store::find($id);
        return $app['twig']->render('store_edit.html.twig', array('store' => $store));
    });

    $app->patch("/stores/{id}", function($id) use ($app) {
        $store_name = $_POST['store_name'];
        $store = Store::find($id);
        $store->update($store_name);
        return $app['twig']->render('store.html.twig', array('store' => $store));
    });

    $app->delete("/stores/{id}", function($id) use ($app) {
        $store = Store::find($id);
        $store->delete();
        return $app['twig']->render('stores.html.twig', array('stores' => Store::getAll()));
    });

    return $app;
?>
