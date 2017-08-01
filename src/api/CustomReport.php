<?php

namespace Millsoft\AceProject;

class CustomReport extends AceProject {

	// http://api.aceproject.com/explorer/?fct=deletecustomreport
	public static function DeleteCustomReport( $params = array() ) {

		$default_params = array(
			'fct'            => "deletecustomreport",
			'customreportid' => 0,
			'reporttype'     => 0,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// http://api.aceproject.com/explorer/?fct=getcustomreports
	public static function GetCustomReports( $params = array() ) {

		$default_params = array(
			'fct'              => "getcustomreports",
			'userid'           => null,
			'customreportid'   => null,
			'filteraccesstype' => null,
			'filtermarkedonly' => false,
			'texttosearch'     => null,
			'sortorder'        => null,
			'pagenumber'       => null,
			'rowsperpage'      => null,
			'reporttype'       => null,
			'projectmode'      => null,
			'projectid'        => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// http://api.aceproject.com/explorer/?fct=getcustomtaskreport
	public static function GetCustomTaskReport( $params = array() ) {

		$default_params = array(
			'fct'                       => "getcustomtaskreport",
			'customreportid'            => null,
			'assignedprojectsonly'      => false,
			'includeinactivetemplates'  => true,
			'taskid'                    => null,
			'getallfields'              => false,
			'sortorder'                 => null,
			'pagenumber'                => null,
			'rowsperpage'               => null,
			'asynccall'                 => false,
			'asynccallid'               => null,
			'exportdomainevaleur'       => null,
			'exporttype'                => null,
			'exportdelimiter'           => null,
			'exportdecimalsymbol'       => null,
			'exportlcid'                => 0,
			'exportonscreencolumnsonly' => true,
			'exportview'                => 0,
			'exportviewother'           => null,
			'exportfieldstodisplay'     => null,
			'exportremovehtmlonly'      => true,
			'exportenablefilterxls'     => false,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// http://api.aceproject.com/explorer/?fct=getmarkusercustomreport
	public static function GetMarkUserCustomReport( $params = array() ) {

		$default_params = array(
			'fct'                    => "getmarkusercustomreport",
			'markusercustomreportid' => null,
			'sortorder'              => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// http://api.aceproject.com/explorer/?fct=markusercustomreport
	public static function MarkUserCustomReport( $params = array() ) {

		$default_params = array(
			'fct'                    => "markusercustomreport",
			'markusercustomreportid' => null,
			'customreportid'         => null,
			'marklevel'              => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// http://api.aceproject.com/explorer/?fct=savecustomreport
	public static function SaveCustomReport( $params = array() ) {

		$default_params = array(
			'fct'                          => "savecustomreport",
			'customreportid'               => null,
			'customreportname'             => 0,
			'filteraccesstype'             => 0,
			'customreportdescription'      => null,
			'fieldstodisplay'              => 0,
			'fieldssortorder'              => null,
			'filterprojectstatusids'       => null,
			'filterprojectids'             => null,
			'filterprojectexclusion'       => null,
			'filterprojecttypeids'         => null,
			'filterprojectpriorityids'     => null,
			'filterprojectclientids'       => null,
			'filtertaskpercdone'           => null,
			'filtertaskfirstdatefield'     => null,
			'filtertaskfirstdateoperator'  => null,
			'filtertaskfirstdatevalue'     => null,
			'filtertaskseconddatefield'    => null,
			'filtertaskseconddateoperator' => null,
			'filtertaskseconddatevalue'    => null,
			'filtertaskcompletedstatusids' => null,
			'filtertaskstatusids'          => null,
			'filtertaskgroupids'           => null,
			'filtertasktypeids'            => null,
			'filtertaskpriorityids'        => null,
			'filterassignedusergroupids'   => null,
			'filterusercreatorids'         => null,
			'filteruserassignedids'        => null,
			'filteruserreviewerids'        => null,
			'texttosearch'                 => null,
			'filterreadytostartonly'       => 0,
			'marklevel'                    => null,
			'isfavoritecustomreport'       => null,
			'filtertaskmarkedtasks'        => null,
			'reporttype'                   => 1,
			'projectmode'                  => 0,
			'viewbylevel1'                 => null,
			'viewbylevel2'                 => null,
			'vieworderlevel1'              => null,
			'vieworderlevel2'              => null,
			'showtotalonly'                => null,
			'timestatusid'                 => null,
			'timetypeid'                   => null,
			'timeuserid'                   => null,
			'taskid'                       => null,
			'customreportorgid'            => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// http://api.aceproject.com/explorer/?fct=setfavoritecustomreport
	public static function SetFavoriteCustomReport( $params = array() ) {

		$default_params = array(
			'fct'            => "setfavoritecustomreport",
			'customreportid' => null,
			'reporttype'     => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}


}