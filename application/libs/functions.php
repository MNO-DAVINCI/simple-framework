<?php

function makeDatabaseConnection()
{
	$db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS);
	return $db;
}

function render($filename, $data = null) 
{	
	require(APP. 'view/_template/header.php');
	require(APP . 'view/' . $filename . '.php');
	require(APP. 'view/_template/footer.php');
}

function loadController()
{
	global $url_controller, $url_action, $url_params;

   	$url_controller = null;
    $url_action = null;
    $url_params = array();

    splitUrl();

    if (!$url_controller) {
        
        require APP . 'controller/home.php';

    } elseif (file_exists(APP . 'controller/' . $url_controller . '.php')) {
            
            require APP . 'model/' . $url_controller . '.php';
            require APP . 'controller/' . $url_controller . '.php';

    } else {

        //error!
        echo "error!";

    }
}

function splitUrl()
{
    if (isset($_GET['url'])) {

    	global $url_controller, $url_action, $url_params;

        $url = trim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);

		$url_controller = isset($url[0]) ? $url[0] : null;
        $url_action = isset($url[1]) ? $url[1] : null;

        unset($url[0], $url[1]);

        $url_params = array_values($url);
	}
}