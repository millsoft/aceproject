<?php

namespace Millsoft\AceProject;

class Message extends AceProject {

// Deletes the message for the calling user.
// http://api.aceproject.com/explorer/?fct=deletemessage
	public static function DeleteMessage( $params = array() ) {

		$default_params = array(
			'fct'       => "deletemessage",
			'messageid' => 0,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Retrieves list of messages from or to the calling user.
// http://api.aceproject.com/explorer/?fct=getmessages
	public static function GetMessages( $params = array() ) {

		$default_params = array(
			'fct'        => "getmessages",
			'messageid'  => null,
			'importance' => null,
			'received'   => false,
			'fromuserid' => null,
			'unreadonly' => false,
			'sent'       => false,
			'touserid'   => null,
			'sortorder'  => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Saves and sends a new message to one or multiple users.
// http://api.aceproject.com/explorer/?fct=savemessage
	public static function SaveMessage( $params = array() ) {

		$default_params = array(
			'fct'                => "savemessage",
			'recipientlist'      => null,
			'recipientprojectid' => null,
			'importance'         => 1,
			'subject'            => "###",
			'body'               => null,
			'isbodyplaintext'    => false,
			'notify'             => true,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}


}