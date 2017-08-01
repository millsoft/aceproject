<?php

require_once(__DIR__ . "/../vendor/autoload.php");

use Millsoft\AceProject\AceProject;
use Millsoft\AceProject\Project;

$ace_username = "USERNAME";
$ace_password = "PASSWORD";
$ace_subdomain = "SUBDOMAIN";

AceProject::login($ace_username, $ace_password, $ace_subdomain);

$projects = Project::GetProjects();
$errors = AceProject::getLastError();

if (!empty($errors)) {
    //some error occured:
    print_r($errors);
    die();
}

foreach ($projects as $project) {
    echo $project->PROJECT_ID . "\t" . $project->PROJECT_NAME . "\n";
}
?>
