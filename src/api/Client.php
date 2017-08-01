<?php

namespace Millsoft\AceProject;

class Client extends AceProject {

	//Get a list with users
	public static function SaveClient( $params = array() ) {

		$default_params = array(
			"fct"                      => "saveclient",
			'clientname'               => null,
			'clientnumber'             => null,
			'clientaddress'            => null,
			'clientcity'               => null,
			'clientprovince'           => null,
			'clientcountry'            => null,
			'clientzipcode'            => null,
			'clientphonenumber'        => null,
			'clientfaxnumber'          => null,
			'clientemail'              => null,
			'clienturl'                => null,
			'clientnote'               => null,
			'clientcontactname'        => null,
			'clientcontactphonenumber' => null,
			'clientcontactfaxnumber'   => null,
			'clientcontactemail'       => null,
			'clientcontactmobile'      => null,

		);

		$params   = array_merge( $default_params, $params );
		$response = self::sendRequest( $params );

		return self::getFirstObject( $response );
	}


	/**
	 * Deletes a specific client. You must be an account administrator to access this function.
	 *
	 * @param $client_id
	 *
	 * @return bool
	 */
	public static function DeleteClient( $clientid ) {

		$params = array(
			"fct"      => "deleteclient",
			'clientid' => $clientid,
		);

		$response = self::sendRequest( $params );

		return self::getFirstObject( $response );
	}


	public static function GetClients( $params = array() ) {

		$default_params = array(
			"fct"              => "getclients",
			'isforlist'        => false,
			'clientid'         => null,
			'texttosearch'     => null,
			'accessrestricted' => false,
			'sortorder'        => null,
			'pagenumber'       => null,
			'rowsperpage'      => null,


		);

		$params   = array_merge( $default_params, $params );
		$response = self::sendRequest( $params );
		return $response;
	}


}