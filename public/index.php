<?php

    /* On requiert en tout premier lieu notre autoload pour que toutes nos dépendences soient chargées en premier */
    require_once __DIR__ . './../vendor/autoload.php';

    /* On requiert notre fichier Database pour se connecter à la base de donnée */
    require_once __DIR__ .'./../app/utils/Database.php';

    /* On requiert nos controllers */
    require_once __DIR__ .'./../app/Controllers/CoreController.php';
    require_once __DIR__ .'./../app/Controllers/MainController.php';

    /* on requiert nos Modèles */
    require_once __DIR__ .'./../app/Models/CoreModel.php';
    require_once __DIR__ .'./../app/Models/CharacterModel.php';


    $router = new AltoRouter();

    $router->setBasePath($_SERVER['BASE_URI']);

    $router->map(
        'GET',
        '/',
        [
            'method' => 'home',
            'controller' => 'App\Controllers\MainController'
        ],
        'main-home'
    );

    $router->map(
        'POST',
        '/message/create',
        [
            'method' => 'newMessage',
            'controller' => 'App\Controllers\MainController'
        ],
        'message-create'
    );

    $matchingRouteInfos=$router->match();

    if( $matchingRouteInfos === false){
        http_response_code(404);
        exit("404 not found");
    }

    // Nous avons ci-dessus dans map() défini nos méthodes et controlleurs à appeller
    // Nous les appellons donc vie la clé nommé 'target' d'AltoRouter, et comme il s'agit d'un tableau
    // Il faut bien faire attention à les appeller via leur nom
    $controllerToInstantiate = $matchingRouteInfos['target']['controller'];
    $methodToCall = $matchingRouteInfos['target']['method'];

    // On instancie notre objet en fonction de notre URL
    $controller = new $controllerToInstantiate();
  
    // On appelle notre méthode en fonction de notre Objet ! Et paf des chocapics !
    $controller->$methodToCall($matchingRouteInfos['params']);