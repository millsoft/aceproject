<?php namespace Millsoft\AceProject;

/**
 *  A sample class
 *
 *  Use this section to define what this class is doing, the PHPDocumentator will use this
 *  to automatically generate an API documentation using this information.
 *
 * @author yourname
 */
class AceProject {

	/**  @var string $m_SampleProperty define here what this variable is for, do this for every instance variable */
	protected $isLoggedIn = false;
	private static $GUID = null;

	private static $apiUrl = "https://api.aceproject.com";
	public static $lastError = null;

	public static $subdomain = '';
	public static $username = '';
	public static $password = '';


    /**
     * Login to aceproject
     * @param $username     - username or email
     * @param $password
     * @param $subdomain    - http://<subdomain>.aceproject.com
     * @param $forceLogin   - if set to false, GUID file will be read from guid file instead of a web request
     */
	public static function login($username, $password, $subdomain, $forceLogin = false){
        self::$username = $username;
        self::$password = $password;
        self::$subdomain = $subdomain;
        self::getGUID();
    }


	public static function getGUID() {

		//Try to read the GUID from file
		//This will save us one API call

        $GUIDfile = __DIR__ . '/../.aceproject';
        $own_guid_file = $GUIDfile . "_" . self::$subdomain;

		if ( file_exists( $own_guid_file )  ) {
		    if(filemtime($own_guid_file) < (time()-259200)){
                unlink($own_guid_file);
            }
            else {
                self::$GUID = file_get_contents($own_guid_file);
                return self::$GUID;
            }
		}

		$subdomain = self::$subdomain;
		$username = self::$username;
		$password = self::$password;

        $url = self::$apiUrl . "/?fct=login&accountid={$subdomain}&username={$username}&password={$password}&browserinfo=NULL&language=NULL&format=JSON";


        $response = \Httpful\Request::get( $url )
		                            ->addHeader('User-Agent', 'millsoft/aceproject')
		                            ->expectsJson()
		                            ->send();


        $data = json_decode( $response );

		if ( isset( $data->status ) && $data->status == 'fail' ) {
			self::$lastError = $data->results[0];

			return false;
		}



		self::$GUID = $data->results[0]->GUID;

		//Save the GUID in file:
			file_put_contents( $own_guid_file, self::$GUID );

		return self::$GUID;

	}


	/**
	 * Send the request and return the first object of array
	 *
	 * @param array $params
	 * @param string $method
	 *
	 * @return mixed|null
	 */
	public static function sendRequestAndGetObject( $params = array(), $method = "get" ) {
		$response = self::sendRequest( $params );

		return self::getFirstObject( $response );
	}

	/**
	 * Send the request to the API server
	 *
	 * @param $params - array with the params
	 * @param string $method - get / post / etc...
	 *
	 * @return false or array with objects
	 */
	public static function sendRequest( $params, $method = "get" ) {

		if(is_null(self::$GUID)){
			//try to login first or load the guid file:
			self::getGUID();
		}


		//additional params that should always be
		$additional_params = array(
			"guid"   => self::$GUID,
			"format" => "JSON",
		);

		$params = array_merge( $params, $additional_params );
		$_p     = http_build_query( $params );


		$url = self::$apiUrl . "/?" . $_p;

		$response = \Httpful\Request::$method( $url )
		                            ->addHeader('User-Agent', 'millsoft/aceproject')
		                            ->expectsJson()
		                            ->send();

		$obj_response = self::checkResponse( $response );
		if ( ! $obj_response ) {
			return false;
		}

		return $obj_response->results;

	}

	/**
	 * Check Server Response for Errors
	 *
	 * @param $response
	 *
	 * @return bool|mixed
	 */
	private static function checkResponse( $response ) {
		$data = json_decode( $response );

		if ( isset( $data->status ) && $data->status == 'fail' ) {
			//stop on errors
			self::$lastError = $data->results[0];

			return false;
		}

		return $data;
	}


	/**
	 * Get the last error
	 * @return null
	 */
	public static function getLastError() {

		if ( is_null( self::$lastError ) ) {
			return null;
		}

		return self::$lastError->ERRORDESCRIPTION;

	}

	/**
	 * Get the first object from an array
	 * (Most of the api responses return an array with only one object.)
	 *
	 * @param $array
	 *
	 * @return mixed|null
	 */
	public static function getFirstObject( $array ) {
		if ( is_array( $array ) && ! empty( $array ) && is_object( $array[0] ) ) {
			return $array[0];
		} else {
			return null;
		}
	}


	/**
	 * Upload a file to Aceproject and return a temporary name
	 *
	 * @param $filePath
	 */
	public static function uploadFile( $filePath ) {

		$params = array(
			"guid"   => self::$GUID,
			"format" => "JSON",
		);

		$_p         = http_build_query( $params );
		$upload_url = "https://" . self::$subdomain . ".aceproject.com/upload.ashx";

		if ( ! file_exists( $filePath ) ) {
			die( "File not found - " . $filePath );
		}

		$payload = array(
			'file' => $filePath
		);

		$request = \Httpful\Request::post( $upload_url );
		$request->addHeader('User-Agent', 'millsoft/aceproject');
		$request->body( $params );
		$request->attach( $payload );

		$response = $request->send();
		if ( isset( $response->body ) ) {

			//encde json to object:
			$body = json_decode( $response->body );
			$body = $body[0];

			if ( ! empty( $body->error ) ) {
				self::$lastError = $body->error;

				return false;
			}

			//return tmp name:
			return $body->name_tmp;


		} else {
			//Some error occured
			self::$lastError = "Some error occured while I tried to upload the file.";

			return false;
		}


	}


}