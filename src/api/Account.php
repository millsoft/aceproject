<?php

namespace Millsoft\AceProject;

class Account extends AceProject {

	//Get Account information for current user
	public static function GetAccount( $params = array() ) {

		$default_params = array(
			"fct" => "getaccount",
		);

		$params   = array_merge( $default_params, $params );
		$response = self::sendRequest( $params );

		return self::getFirstObject( $response );
	}


	//Get Account Limitations
	public static function GetAccountLimitation() {

		$default_params = array(
			"fct"       => "getaccountlimitation",
			"accountid" => self::$subdomain
		);

		$response = self::sendRequest( $default_params );

		return self::getFirstObject( $response );
	}


	public static function GetAccountStats() {

		$default_params = array(
			"fct" => "getaccountstats",
		);

		$response = self::sendRequest( $default_params );

		return self::getFirstObject( $response );
	}

	/**
	 * http://api.aceproject.com/explorer/?fct=getaccount
	 * @param $params
	 *
	 * @return mixed|null
	 */
	public static function GetAccountStructureList( $params = array() ) {

		$default_params = array(
			"fct"             => "getaccountstructurelist",
			"timetype"        => true,
			"expensetype"     => null,
			"projecttype"     => null,
			"projectpriority" => null,
			"projectstatus"   => null,
		);

		$params   = array_merge( $default_params, $params );
		$response = self::sendRequest( $params );

		return self::getFirstObject( $response );
	}


	/**
	 * Get Expense tracking settings from the account.
	 * @return mixed|null
	 */
	public static function GetTrackExpenseSetting() {

		$default_params = array(
			"fct" => "gettrackexpensesetting",
		);

		$response = self::sendRequest( $default_params );

		return self::getFirstObject( $response );
	}

	/**
	 * Get time tracking settings from the account.
	 * @return mixed|null
	 */
	public static function GetTrackTimeSetting() {

		$default_params = array(
			"fct" => "gettracktimesetting",

		);

		$response = self::sendRequest( $default_params );

		return self::getFirstObject( $response );
	}


	public static function SaveAccount( $params ) {

		$default_params = array(
			"fct"                   => "saveaccount",
			'timezone'              => null,
			'accountname'           => null,
			'accountaddress'        => null,
			'accountcity'           => null,
			'accountprovince'       => null,
			'accountcountry'        => null,
			'accountzipcode'        => null,
			'accountphonenumber'    => null,
			'accountfaxnumber'      => null,
			'accountwebsite'        => null,
			'contactname'           => null,
			'contactemail'          => null,
			'contactphonenumber'    => null,
			'contactfaxnumber'      => null,
			'contactmobilenumber'   => null,
			'lcid'                  => null,
			'weekmanagement'        => null,
			'typicalworkday'        => null,
			'timetracking'          => null,
			'costtracking'          => null,
			'currency'              => null,
			'defaultemail'          => null,
			'emailnotifsubject'     => null,
			'usedefaultemail'       => null,
			'startsoon'             => null,
			'soondue'               => null,
			'overdue'               => null,
			'reminderfrequency'     => null,
			'smtpusecustom'         => null,
			'smtpserver'            => null,
			'smtpport'              => null,
			'smtpusername'          => null,
			'smtppassword'          => null,
			'smtpsslrequired'       => null,
			'logoguid'              => null,
			'customuserskin'        => null,
			'workingwithrecurrency' => null,
			'strongpassword'        => null,
			'passwordexpiration'    => null,
			'bridge24enabled'       => null

		);

		$params   = array_merge( $default_params, $params );
		$response = self::sendRequest( $params );

		return self::getFirstObject( $response );
	}

	/**
	 * Save expense tracking settings from the account.
	 *
	 * @param $params
	 *
	 * @return mixed|null
	 */
	public static function SaveTrackExpenseSetting( $params = array() ) {

		$default_params = array(
			"fct"                       => "savetrackexpensesetting",
			'standardentry'             => null,
			'allowentryoncompletedtask' => null
		);

		$params   = array_merge( $default_params, $params );
		$response = self::sendRequest( $params );

		return self::getFirstObject( $response );
	}

	public static function SaveTrackTimeSetting( $params = array() ) {
		$default_params = array(
			"fct"                       => "savetracktimesetting",
			'standardentry'             => null,
			'allowentryoncompletedtask' => null,
			'timeclockentry'            => null,
			'allowinoutmodification'    => null,
			'timeclockonfirstday'       => null,
			'allownotreadytostarttask'  => null,
		);

		$params   = array_merge( $default_params, $params );
		$response = self::sendRequest( $params );

		return self::getFirstObject( $response );
	}


}