<?php
namespace App\Controllers;

use App\Core\SQL;

class API extends SQL{
    public function __construct(){
        $sql = SQL::getInstance();
    }

    public function handleRequest() {
        // Allow Cross-Origin Resource Sharing (CORS) from your site
        header('Access-Control-Allow-Origin: url_site');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
        header('Access-Control-Allow-Headers: Content-Type');

        // Get the HTTP method (GET, POST, PUT, DELETE)
        $method = $_SERVER['REQUEST_METHOD'];

        // Get the requested URL and remove any query string
        $request_uri = $_SERVER['REQUEST_URI'];
        if (strpos($request_uri, '?') !== false) {
            $request_uri = substr($request_uri, 0, strpos($request_uri, '?'));
        }

        // Remove the base directory from the URL if needed
        $base_dir = dirname($_SERVER['SCRIPT_NAME']);
        $request_uri = str_replace($base_dir, '', $request_uri);

        // Remove leading and trailing slashes
        $request_uri = trim($request_uri, '/');

        // Split the URL into parts using slash as the separator
        $uri_parts = explode('/', $request_uri);

        // Process the request based on the endpoint and method
        if ($uri_parts[0] === 'users') {
            switch ($method) {
                case 'GET':
                    if (isset($uri_parts[1]) && is_numeric($uri_parts[1])) {
                        $user_id = (int)$uri_parts[1];
                        $response = $this->user->getUser($user_id);
                    } else {
                        $response = $this->user->getAllUsers();
                    }
                    break;
                case 'POST':
                    $data = json_decode(file_get_contents('php://input'), true);
                    $response = $this->user->addUser($data);
                    break;
                case 'PUT':
                    if (isset($uri_parts[1]) && is_numeric($uri_parts[1])) {
                        $user_id = (int)$uri_parts[1];
                        $data = json_decode(file_get_contents('php://input'), true);
                        $response = $this->user->updateUser($user_id, $data);
                    } else {
                        $response = ['message' => 'User ID missing in URL.'];
                        http_response_code(400); // Bad Request
                    }
                    break;
                case 'DELETE':
                    if (isset($uri_parts[1]) && is_numeric($uri_parts[1])) {
                        $user_id = (int)$uri_parts[1];
                        $response = $this->user->deleteUser($user_id);
                    } else {
                        $response = ['message' => 'User ID missing in URL.'];
                        http_response_code(400); // Bad Request
                    }
                    break;
                default:
                    $response = ['message' => 'HTTP method not supported for this resource.'];
                    http_response_code(405); // Method Not Allowed
                    break;
            }
        } else {
            $response = ['message' => 'Resource not found.'];
            http_response_code(404); // Not Found
        }

        // Display the response as JSON
        echo json_encode($response);
    }
}