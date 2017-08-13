<?php

namespace Millsoft\AceProject;

class Timesheet extends AceProject {

	//Open a new clock (start the timer).
	public static function OpenClock( $params = array() ) {

		$default_params = array(
			"fct"        => "openclock",
			'projectid'  => null,
			'taskid'     => null,
			'timetypeid' => 1,
			'comments'   => null,
			'userip'     => null,

		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );
	}


	/**
	 * Get the clock for current user
	 * @return mixed|null
	 */
	public static function GetClock() {

		$params = array(
			"fct" => "getclock",
		);

		return self::sendRequestAndGetObject( $params );
	}

	public static function CloseClock( $params = array() ) {

		$default_params = array(
			"fct"              => "closeclock",
			"timesheetinoutid" => 1,
			'projectid'        => null,
			'taskid'           => null,
			'timetypeid'       => 1,
			'indatetime'       => null,
			'comments'         => null,
			'userip'           => null,

		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );
	}


	// http://api.aceproject.com/explorer/?fct=approvetimesheets
	public static function ApproveTimesheets( $params = array() ) {

		$default_params = array(
			'fct'                 => "approvetimesheets",
			'projectid'           => null,
			'timesheetlineid'     => null,
			'timestatusid'        => 0,
			'commentnotification' => null,
			'notify'              => true,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// http://api.aceproject.com/explorer/?fct=copytimeitems
	public static function CopyTimeItems( $params = array() ) {

		$default_params = array(
			'fct'               => "copytimeitems",
			'timesheetlineid'   => null,
			'timesheetperiodid' => null,
			'importhours'       => false,
			'importcomment'     => false,
			'dateweekstart'     => 0,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Deletes the started time clock of the calling user.
// http://api.aceproject.com/explorer/?fct=deleteclock
	public static function DeleteClock( $params = array() ) {

		$default_params = array(
			'fct' => "deleteclock",
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// http://api.aceproject.com/explorer/?fct=deleteuserclock
	public static function DeleteUserClock( $params = array() ) {

		$default_params = array(
			'fct'    => "deleteuserclock",
			'userid' => 0,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Deletes a specific time sheet entry (work item).
// http://api.aceproject.com/explorer/?fct=deleteworkitem
	public static function DeleteWorkItem( $params = array() ) {

		$default_params = array(
			'fct'               => "deleteworkitem",
			'timesheetlineid'   => null,
			'timesheetperiodid' => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// http://api.aceproject.com/explorer/?fct=getclocks
	public static function GetClocks( $params = array() ) {

		$default_params = array(
			'fct'       => "getclocks",
			'projectid' => null,
			'sortorder' => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequest( $params );

	}

// Retrieves list of time sheet weeks with total hours per day.
// http://api.aceproject.com/explorer/?fct=getmyweeks
	public static function GetMyWeeks( $params = array() ) {

		$default_params = array(
			'fct'               => "getmyweeks",
			'timesheetperiodid' => null,
			'filterdate'        => null,
			'timestatusid'      => null,
			'sortorder'         => null,
			'pagenumber'        => null,
			'rowsperpage'       => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequest( $params );

	}

// Retrieves list of time sheets for the calling user.
// http://api.aceproject.com/explorer/?fct=getmyworkitems
	public static function GetMyWorkItems( $params = array() ) {

		$default_params = array(
			'fct'               => "getmyworkitems",
			'timeperiodid'      => null,
			'timelineid'        => null,
			'timesheetdatefrom' => null,
			'timesheetdateto'   => null,
			'sortorder'         => null,
			'pagenumber'        => null,
			'rowsperpage'       => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequest( $params );

	}

// Returns all necessary information for creating a time entries such as access rights on the project and week information (time sheet period).
// http://api.aceproject.com/explorer/?fct=getnewtimesettings
	public static function GetNewTimeSettings( $params = array() ) {

		$default_params = array(
			'fct'               => "getnewtimesettings",
			'projectid'         => 0,
			'timesheetperiodid' => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Retrieves list of time sheets for reporting purposes.
// http://api.aceproject.com/explorer/?fct=gettimereport
	public static function GetTimeReport( $params = array() ) {

		$default_params = array(
			'fct'                          => "gettimereport",
			'view'                         => 0,
			'otherview'                    => null,
			'timesheetlineid'              => null,
			'projectid'                    => null,
			'filtermyworkitems'            => true,
			'filtertimecreatoruserid'      => null,
			'filtertimecreatorusergroupid' => null,
			'filtertimetypeid'             => null,
			'filtertimelevel'              => 0,
			'filtertimestatus'             => null,
			'filterdatefrom'               => null,
			'filterdateto'                 => null,
			'filterprojecttypeid'          => null,
			'filterclientid'               => null,
			'filtertaskid'                 => null,
			'filtertaskgroupid'            => null,
			'filtertasktypeid'             => null,
			'countonly'                    => false,
			'isshowtotalsonly'             => false,
			'fieldstodisplay'              => null,
			'sortorder'                    => null,
			'asynccall'                    => false,
			'asynccallid'                  => null,
			'exportdomainevaleur'          => null,
			'exporttype'                   => null,
			'exportdelimiter'              => null,
			'exportdecimalsymbol'          => null,
			'exportlcid'                   => 0,
			'exportonscreencolumnsonly'    => true,
			'exportview'                   => 0,
			'exportviewother'              => null,
			'exportfieldstodisplay'        => null,
			'exportremovehtmlonly'         => true,
			'exportenablefilterxls'        => false,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// http://api.aceproject.com/explorer/?fct=gettimesheetapprover
	public static function GetTimesheetApprover( $params = array() ) {

		$default_params = array(
			'fct'                          => "gettimesheetapprover",
			'weekstart'                    => null,
			'includeprojectsproposeditems' => false,
			'sortorder'                    => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// http://api.aceproject.com/explorer/?fct=gettimesheetstoapprove
	public static function GetTimesheetsToApprove( $params = array() ) {

		$default_params = array(
			'fct'                     => "gettimesheetstoapprove",
			'projectid'               => null,
			'filtertimesheetperiodid' => null,
			'filtertimesheetlineid'   => null,
			'filterdatefrom'          => null,
			'filterdateto'            => null,
			'filtertimestatus'        => null,
			'filterprojectstatus'     => null,
			'filterprojecttypeid'     => null,
			'filterusergroupid'       => null,
			'filterclientid'          => null,
			'filteruserid'            => null,
			'filtertimetypeid'        => null,
			'weekview'                => false,
			'sortorder'               => null,
			'pagenumber'              => null,
			'rowsperpage'             => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// http://api.aceproject.com/explorer/?fct=requesttimesheetapproval
	public static function RequestTimesheetApproval( $params = array() ) {

		$default_params = array(
			'fct'             => "requesttimesheetapproval",
			'timesheetidlist' => "###",
			'useridapproval'  => 0,
			'message'         => null,
			'notify'          => true,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// http://api.aceproject.com/explorer/?fct=savetimeitemhours
	public static function SaveTimeItemHours( $params = array() ) {

		$default_params = array(
			'fct'             => "savetimeitemhours",
			'timesheetlineid' => 0,
			'day'             => 0,
			'nbhours'         => 0,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Creates a time sheet entry (work item) if no TimesheetLineId is specified, or updates an existing time sheet entry (work item) when a valid TimesheetLineId is specified.
// http://api.aceproject.com/explorer/?fct=saveworkitem
	public static function SaveWorkItem( $params = array() ) {

		$default_params = array(
			'fct'             => "saveworkitem",
			'userid'          => null,
			'timesheetlineid' => null,
			'weekstart'       => null,
			'projectid'       => null,
			'taskid'          => null,
			'timetypeid'      => null,
			'hoursday1'       => null,
			'hoursday2'       => null,
			'hoursday3'       => null,
			'hoursday4'       => null,
			'hoursday5'       => null,
			'hoursday6'       => null,
			'hoursday7'       => null,
			'indatetime'      => null,
			'outdatetime'     => null,
			'comments'        => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}


}