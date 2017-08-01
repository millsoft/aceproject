<?php

/**
 * This example shows how to upload a local file to aceproject and assign it with a task.
 */

require_once(__DIR__ . "/../vendor/autoload.php");

use Millsoft\AceProject\AceProject;
use Millsoft\AceProject\Document;

$ace_username = "USERNAME";
$ace_password = "PASSWORD";
$ace_subdomain = "SUBDOMAIN";

AceProject::login($ace_username, $ace_password, $ace_subdomain);

//Prepare the parameters for the request:
$params = array(
    "taskid" => 1,
    'addcomments'         => "This is a comment",
    'iscommentsplaintext' => false,
    'uploaddate'          => null,
    'description'         => "This is a description of the file",
    'version'             => null,
    'ispublic'            => true,
    'islocked'            => false,
    'notify'              => false,
    'quickupload'         => false,
);


$fileToUpload = __DIR__ . "/php-logo.png";

$data = Document::SaveTaskDocument($params, $fileToUpload);
$error  = AceProject::getLastError();

if(!is_null($error)){
    die($error);
}

//Print all the data returned by the API
print_r($data);