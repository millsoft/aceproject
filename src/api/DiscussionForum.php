<?php

namespace Millsoft\AceProject;

class DiscussionForum extends AceProject {

// Deletes the discussion message.
// http://api.aceproject.com/explorer/?fct=deletediscussionmessage
	public static function DeleteDiscussionMessage( $params = array() ) {

		$default_params = array(
			'fct'                 => "deletediscussionmessage",
			'discussionmessageid' => 0,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Deletes the discussion subject.
// http://api.aceproject.com/explorer/?fct=deletediscussionsubject
	public static function DeleteDiscussionSubject( $params = array() ) {

		$default_params = array(
			'fct'                 => "deletediscussionsubject",
			'discussionsubjectid' => 0,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Retrieves list of discussion messages.
// http://api.aceproject.com/explorer/?fct=getdiscussionmessage
	public static function GetDiscussionMessage( $params = array() ) {

		$default_params = array(
			'fct'                 => "getdiscussionmessage",
			'discussionsubjectid' => null,
			'discussionmessageid' => null,
			'texttosearch'        => null,
			'sortorder'           => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Retrieves list of discussion subjects.
// http://api.aceproject.com/explorer/?fct=getdiscussionsubject
	public static function GetDiscussionSubject( $params = array() ) {

		$default_params = array(
			'fct'                 => "getdiscussionsubject",
			'projectid'           => 0,
			'discussionsubjectid' => null,
			'texttosearch'        => null,
			'sortorder'           => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Creates a discussion message.
// http://api.aceproject.com/explorer/?fct=savediscussionmessage
	public static function SaveDiscussionMessage( $params = array() ) {

		$default_params = array(
			'fct'                 => "savediscussionmessage",
			'recipientlist'       => null,
			'discussionsubjectid' => 0,
			'message'             => "###",
			'ismessageplaintext'  => false,
			'notify'              => true,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Creates a discussion subject if no DiscussionSubjectId is specified or updates an existing discussion subject when a valid DiscussionSubjectId is specified.
// http://api.aceproject.com/explorer/?fct=savediscussionsubject
	public static function SaveDiscussionSubject( $params = array() ) {

		$default_params = array(
			'fct'                 => "savediscussionsubject",
			'title'               => "###",
			'description'         => null,
			'projectid'           => 0,
			'discussionsubjectid' => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}


}