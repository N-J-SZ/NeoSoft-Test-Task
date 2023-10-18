<?php

    // *************************************
    // * Simple PHP REST API Backend | NSZ *
    // *************************************

    //  SET HTTP HEADER SETTINGS 
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET,POST,PATCH,DELETE');
    header('Access-Control-Allow-Headers: Content-Type');
    header('Content-Type: application/JSON; charset=utf-8;');

    // DOTENV USE
    require_once 'DotEnv.php';
    use DevCoder\DotEnv;

    (new DotEnv(__DIR__ . '/.env'))->load();
    
    // GET environment variables
    $DB_HOST = getenv('DBHOST');
    $DB_USER = getenv('DBUSER');
    $DB_PASS = getenv('DBPASS');
    $DB_NAME = getenv('DBNAME');
    $VERSION = getenv('VERSION');

    // DATABASE CONNECTION with PDO
    try {
        $db = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;", $DB_USER, $DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->exec("SET NAMES utf8");
    }
    catch(PDOException $ex){
        // when something is wrong...
        die("Error occured in database connection! [".$ex->getCode()."]");
    }

    // GET PHP INPUTS
    $data = json_decode(file_get_contents("php://input"));

    // if request body is empty get data from url params
    if (empty($data)){
        $data = (object) $_REQUEST;
    }

    // get and clean input from escape characters
    $table = isset($data->table) ? escapeshellcmd($data->table): null;
    $field = isset($data->field) ? escapeshellcmd($data->field) : null;
    $value = isset($data->value) ? escapeshellcmd($data->value) : null;
    $op = isset($data->op) ? getOperator(escapeshellcmd($data->op)) : "=";
 
    // *****************************
    // * CRUD OPERATIONS ENDPOINTS *
    // *****************************

    // HTTP METHODS
    switch ($_SERVER['REQUEST_METHOD']) {

        // HTTP GET METHOD -> SELECT 
        case 'GET': {
                if ($table == null){
                    $results = array(
                        'msg' => 'REST API by NSZ'
                    );
                }
                else
                {
                    if ($field != null)
                    {
                        // GET user(s) by field
                        try{
                            $results = $db->query("SELECT * FROM $table WHERE $field $op '$value'")->fetchAll();
                        } catch(PDOException $Exception){
                            $results = array(
                                'message' => $db->errorInfo()
                            );
                        }
                    }
                    else
                    {
                        // GET ALL users
                        try{
                            $results = $db->query("SELECT * FROM $table")->fetchAll();
                        } catch(PDOException $Exception){
                            $results = array(
                                'message' => $db->errorInfo()
                            );
                        }
                    }
                }
                break;
            }

        // HTTP POST METHOD -> INSERT
        case 'POST': { 
                $newrecord = $data->values;
                $fields = '';
                $values = '';

                foreach($newrecord as $key => $record){
                $fields .= $key.', ';
                }
                $fields = rtrim($fields, ', ');

                foreach($newrecord as $record){
                $values .= '"'.$record.'", ';
                }
                $values = rtrim($values, ', ');

                try{
                    $affectedRows = $db->exec("INSERT INTO $table ($fields) VALUES($values)"); 
                    $results = array(
                        'affectedRows' => $affectedRows,
                        'message' => "A művelet végrehajtva!"
                    );
                }
                catch(PDOException $Exception){
                    $results = array(
                        'affectedRows' => 0,
                        'message' => $db->errorInfo()
                    );
                } 

                break;
            }

        // HTTP PATCH METHOD -> UPDATE
        case 'PATCH': {
                $field = $data->field;
                $value = $data->value;
                $updrecord = $data->values;
                $str = '';
            
                foreach($updrecord as $key => $record){
                    $str .= $key.'="'.$record.'", ';
                }
        
                $str = rtrim($str, ', ');
                echo "UPDATE $table SET $str WHERE $field $op $value";
                try{
                    $affectedRows = $db->exec("UPDATE $table SET $str WHERE $field $op $value"); 
                    $results = array(
                        'affectedRows' => $affectedRows,
                        'message' => "A művelet végrehajtva!"
                    );
                }
                catch(PDOException $Exception){
                    $results = array(
                        'affectedRows' => 0,
                        'message' => $db->errorInfo()
                    );
                } 
                break;
            }

        // HTTP DELETE METHODS -> DELETE
        case 'DELETE': {
        
            if ($field != null)
            {
                // DELETE user(s) by field
                try{
                    $affectedRows = $db->exec("DELETE FROM $table WHERE $field $op '$value'");
                    $results = array(
                        'affectedRows' => $affectedRows,
                        'message' => "A művelet végrehajtva!"
                    );
                } catch(PDOException $Exception){
                    $results = array(
                        'affectedRows' => 0,
                        'message' => $db->errorInfo()
                    );
                }
            }
            else
            {
                // DELETE ALL users
                try{
                    $affectedRows = $db->exec("DELETE FROM $table");
                    $results = array(
                        'affectedRows' => $affectedRows,
                        'message' => "A művelet végrehajtva!"
                    );
                } catch(PDOException $Exception){
                    $results = array(
                        'affectedRows' => 0,
                        'message' => $db->errorInfo()
                    );
                }
            }
            break;
        }

    }

    // SEND results
    echo json_encode($results);

    // *******************
    // * OTHER FUNCTIONS *
    // *******************
    
    // GET operator from url
    function getOperator($op)
    {
        switch ($op) {
            case 'eq': {
                    $op = '=';
                    break;
                }
            case 'lt': {
                    $op = '<';
                    break;
                }
            case 'gt': {
                    $op = '>';
                    break;
                }
            case 'lte': {
                    $op = '<=';
                    break;
                }
            case 'gte': {
                    $op = '>=';
                    break;
                }
            case 'not': {
                    $op = '!=';
                    break;
                }
            case 'lk': {
                    global $value;
                    $op = 'like';
                    $value = '%'.$value.'%';
                    break;
                }
            default: {$op = '='; break;}
        }
        return $op;
    }

?>