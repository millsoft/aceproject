AceProject API - PHP Library
=========================

![enter image description here](https://www.aceproject.com/img/aceproject-black300.png)

This library helps you connect with [AceProject.com](http://www.aceproject.com) API. AceProject is a  commercial Task- and Time Management Web app. Please note: I am not affiliated with AceProject so if you have any questions regarding the API please contact AceProject directly.

### Version
Current Version: 0.1 alpha, API Level  01.08.2017

### Motivation
I created this library because there was not a PHP Api for AceProject. I use AceProject where I work right now and using this Library I can create my own wrapper for AceProject. Not all functions are quickly to use in AceProject, with the API I can automate several tasks: for example adding a quick todo, assign it to myself and start the timer - in AceProject you need to do many steps to accomplish it, with the Api it is just a small script call.

----------

### Requirments
PHP 5.6 or higher, also enable fileinfo module in php.ini

### Installation
To install this library use composer:  

    composer require millsoft/aceproject
  
it will install also all dependencies, for example **httpful** which is a library for talking with APIs over http.
If you decide to use this aceproject library with composer, everything is already instanciated for you using vendor/autoload.php. If you prefer to use it without composer, simply require_once all the libraries you need. You always need to quire the AceProject.php library because all modules depend on it.


##Usage
To use this library, you need an aceproject account. You don't need an API key because you will use your username / password to access the API. Usually you need 2 calls to the API: first call to log in and get the so called "GUID" (a hash id assigned with the user). And the second call is the API call you wish, for example getting a list of projects.

The GUID will be received and stored in a local file when you call the AceProject::login() method. This method will check if there is already a GUID on the disk and use the credentials stored in that file. If there is no guid file a new one will be created after the library logins to the API.

The GUID file will be stored in the API folder and has the following name: .aceproject_mysubdomain where the keyword "subdomain" is your subdomain from http://mysubdomain.aceproject.com

### Security
:scream_cat: **Important**: Make sure your `.aceproject_*` file is not readbale in your browser!

##Example
In this example we will log in to aceproject and get a list of available projects:

    <?php
    
    require_once("./vendor/autoload.php");
    
    use Millsoft\AceProject\AceProject;
    use Millsoft\AceProject\Project;
    
    $ace_username = "myusername or email";
    $ace_subdomain = "mysubdomain";
    $ace_password = "mypassword";
    
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

When you call the script in the shell, you will get a similar output like this:

    λ php getprojects.php
    1       The "Getting Started" Project
    2       Testproject

The API delivers much more data, to view everything just use print_r or use your debugger. Please Note: based on your user level, you might get more or less detailed data. Some API calls are also restricted to admin only.

####Another examples
Please see the test folder to see how the API can be used. Note: Not all API calls were tested. You can also look inside the demo folder to see some examples.



## API Documentation
You can find the AceProject API documentation on the following site:
http://www.aceproject.com/help/api/

If you need more information about some API call, open the specific Link in the documentation, there is many more info, for example the key/value pairs are described (not all but it is useful) The examples there are in VB.NET but you might still find it helpful.

### How to use the library?
The API contains all the API groups stored in own classes (in the src/api folder). If you want to know how to create a user and what fields are available open the file Users.php file and search for the method you need, in that case: SaveUser.

## Limitations
There are few limitations when using the API, AceProject has the right to disable the access to your API when they think you overuse it, so please use wisely. I recommend to store the data you get from the API in your own database and cache it, request the API only if you really need it and thing the data in your AceProject has changed. If you want to know what the limits are specifically, contact AceProject for more information.

The library is still in development and might miss something. I did not implement all the API calls, for example there is no API call to get the MD5 hash, you can use the php method instead.


## Contribute
Currently the project is maintained by me only (Michael Milawski // Millsoft) If you want to help or find some error, don't hestiate to create a pull request. Or create a new issue here on github.
