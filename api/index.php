<?php
    #CONFIGURAÇÕES######################################################################################################
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    date_default_timezone_set('America/Sao_Paulo');
    error_reporting(E_ALL);
    function __autoload($classname) {
        require strtolower($classname) . '.php';
    }
    #INCLUSOES GERAIS###################################################################################################
    require_once '../util/Conexao.php';

    #Procedimentos de configuração######################################################################################
    //session_start();
    //Util::SessionASP2PHP();

    function translateToUtf8($array){
        $rs = array();
        foreach($array as $data){
            array_walk($data, function (&$entry) {
                if(is_string($entry))
                    $entry = utf8_encode($entry);
            });
            $rs[] = $data;
        }
        return $rs;
    }

    #CONFIGURANDO API JSON MNR##########################################################################################
    $request = new Request();
    $request->url_elements = array();

    if(isset($_SERVER['PATH_INFO'])) {
        $request->url_elements = explode('/', $_SERVER['PATH_INFO']);
    }

    $request->verb = $_SERVER['REQUEST_METHOD'];
//    $request->auth_user = $_SERVER['PHP_AUTH_USER'];
//    $request->auth_pass = $_SERVER['PHP_AUTH_PW'];

    switch($request->verb) {
        case 'GET':
            $request->parameters = $_GET;
            break;
        case "POST":
            $body = parse_str(file_get_contents('php://input'), $output);
            $request->parameters = $output;
            break;
        case "PUT":
            $body = parse_str(file_get_contents('php://input'), $output);
            $request->parameters = $output;
            break;
        case "DELETE":
        default:
            $request->parameters = array();
    }

//	if($request->auth_user != null)
//    {
        if ($request->url_elements)
        {
            $controller_name = ucfirst($request->url_elements[1]) . 'Controller';
            if(class_exists($controller_name))
            {
                $controller = new $controller_name();
                $action_name = ucfirst($request->verb) . "Action";
                $response = $controller->$action_name($request);
            }
            else
            {
                header('HTTP/1.0 400 Bad Request');
                $response = "Unknown Request for " . $request->url_elements[1];
            }
        } else {
            header('HTTP/1.0 400 Bad Request');
            $response = "Unknown Request";
        }
//    }
//    else
//    {
//        header('WWW-Authenticate: Basic realm="Mercado Na Rede"');
//        header('HTTP/1.0 401 Unauthorized');
//        $response = "Unauthorized Request ";
//    }

    echo json_encode($response, JSON_NUMERIC_CHECK);

?>