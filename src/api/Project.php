<?php

namespace Millsoft\AceProject;

class Project extends AceProject {

// Creates a project based on a blank template or an existing template from the account.
// http://api.aceproject.com/explorer/?fct=createorcopyproject
	public static function CreateOrCopyProject( $params = array() ) {

		$default_params = array(
			'fct'                           => "createorcopyproject",
			'projectnumber'                 => null,
			'projectname'                   => "###",
			'projecttype'                   => null,
			'projectdesc'                   => null,
			'nexttasknumber'                => 1,
			'budgethours'                   => 0,
			'budgetcost'                    => 0,
			'estimatedstartdate'            => null,
			'estimatedenddate'              => null,
			'estimatedhours'                => 0,
			'estimatedexpenses'             => 0,
			'actualstartdate'               => null,
			'actualenddate'                 => null,
			'projectpriorityid'             => null,
			'projectstatusid'               => null,
			'projecttemplate'               => 1,
			'contactname'                   => null,
			'contactphone'                  => null,
			'contactemail'                  => null,
			'contactcell'                   => null,
			'contactfax'                    => null,
			'defaultestimatedtime'          => 0,
			'defaulttaskstartdate'          => 1,
			'defaulttaskenddate'            => 1,
			'defaulttaskactualdates'        => 2,
			'clientid'                      => null,
			'includeweekends'               => null,
			'createdefaults'                => true,
			'languagedefaults'              => "EN",
			'projecttemplateid'             => null,
			'projecttemplateidforstructure' => null,
			'keeptemplatelink'              => true,
			'copyprojectassignments'        => true,
			'copyprojectdocuments'          => true,
			'copyforumtopics'               => false,
			'copytaskrecurrences'           => false,
			'taskrecurrencedate'            => null,
			'copytasks'                     => false,
			'adjusttaskdates'               => false,
			'copytaskdocuments'             => false,
			'copytaskassignments'           => false,
			'resetstatusid'                 => null,
			'marklevel'                     => null,
			'mandatorydependency'           => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Deletes a specific client. You must be an administrator or the project's project manager to access this function for a specific project.
// http://api.aceproject.com/explorer/?fct=deleteproject
	public static function DeleteProject( $params = array() ) {

		$default_params = array(
			'fct'                    => "deleteproject",
			'projectid'              => "###",
			'deleteworkitems'        => true,
			'deleteforumdiscussions' => true,
			'deletetasks'            => true,
			'deleteprojectdocuments' => true,
			'deleteexpenses'         => true,
			'deletecompleteproject'  => true,
			'permanent'              => false,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// http://api.aceproject.com/explorer/?fct=getnewprojectsettings
	public static function GetNewProjectSettings( $params = array() ) {

		$default_params = array(
			'fct' => "getnewprojectsettings",
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Retrieves details about project user assignments.
// http://api.aceproject.com/explorer/?fct=getprojectaccess
	public static function GetProjectAccess( $params = array() ) {

		$default_params = array(
			'fct'                      => "getprojectaccess",
			'projectid'                => null,
			'assigneduserid'           => null,
			'filterprojecttypeid'      => null,
			'filterprojectpriorityid'  => null,
			'filtercompletedproject'   => null,
			'filterclientid'           => null,
			'includeinactivetemplates' => true,
			'includeinactiveusers'     => true,
			'texttosearch'             => null,
			'sortorder'                => null,
			'pagenumber'               => null,
			'rowsperpage'              => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// http://api.aceproject.com/explorer/?fct=getprojectinfo
	public static function GetProjectInfo( $params = array() ) {

		$default_params = array(
			'fct'       => "getprojectinfo",
			'projectid' => 0,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Retrieves list of projects.
// http://api.aceproject.com/explorer/?fct=getprojects
	public static function GetProjects( $params = array() ) {

		$default_params = array(
			'fct'                       => "getprojects",
			'projectid'                 => null,
			'masterprojectid'           => null,
			'filterprojectstatusid'     => null,
			'isgroupingprojectstatus'   => null,
			'filterprojecttypeid'       => null,
			'filterprojectpriorityid'   => null,
			'filtercompletedproject'    => null,
			'filterclientid'            => null,
			'projecttemplate'           => null,
			'filtercreatoruserid'       => null,
			'filterassigneduserid'      => null,
			'filtermarkedonly'          => "False",
			'filterfirstdate'           => null,
			'filterfirstdateoperator'   => null,
			'filterfirstdatevalue'      => null,
			'filterseconddate'          => null,
			'filterseconddateoperator'  => null,
			'filterseconddatevalue'     => null,
			'texttosearch'              => null,
			'sortorder'                 => null,
			'useshowhide'               => false,
			'assignedonly'              => false,
			'forgantt'                  => false,
			'ispmview'                  => null,
			'onlyprojectcanaddtask'     => false,
			'onlytimeapproval'          => false,
			'onlyexpenseapproval'       => false,
			'onlycanopenproject'        => false,
			'onlyprojectmanager'        => false,
			'forcombo'                  => false,
			'pagenumber'                => null,
			'rowsperpage'               => null,
			'deletedprojects'           => false,
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

		return self::sendRequest( $params );

	}

// http://api.aceproject.com/explorer/?fct=getprojectstructurelist
	public static function GetProjectStructureList( $params = array() ) {

		$default_params = array(
			'fct'          => "getprojectstructurelist",
			'projectid'    => 0,
			'taskgroup'    => null,
			'tasktype'     => null,
			'taskpriority' => null,
			'taskstatus'   => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequest( $params );

	}

// http://api.aceproject.com/explorer/?fct=getrecentprojects
	public static function GetRecentProjects( $params = array() ) {

		$default_params = array(
			'fct'                      => "getrecentprojects",
			'assignedprojectsonly'     => true,
			'nblatestmodifiedprojects' => 5,
			'onlyprojectcanaddtask'    => false,
			'includestatictemplate'    => false,
			'nbdaysmax'                => null,
			'sortorder'                => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequest( $params );

	}

// http://api.aceproject.com/explorer/?fct=getunassignedprojectuser
	public static function GetUnassignedProjectUser( $params = array() ) {

		$default_params = array(
			'fct'       => "getunassignedprojectuser",
			'userid'    => 0,
			'sortorder' => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// http://api.aceproject.com/explorer/?fct=getunassigneduserprojectlist
	public static function GetUnassignedUserProjectList( $params = array() ) {

		$default_params = array(
			'fct'       => "getunassigneduserprojectlist",
			'projectid' => 0,
			'sortorder' => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequest( $params );

	}

// http://api.aceproject.com/explorer/?fct=getunassigneduserprojecttable
	public static function GetUnassignedUserProjectTable( $params = array() ) {

		$default_params = array(
			'fct'       => "getunassigneduserprojecttable",
			'projectid' => 0,
			'sortorder' => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequest( $params );

	}

// http://api.aceproject.com/explorer/?fct=markproject
	public static function MarkProject( $params = array() ) {

		$default_params = array(
			'fct'               => "markproject",
			'markuserprojectid' => null,
			'projectid'         => 0,
			'marklevel'         => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// http://api.aceproject.com/explorer/?fct=restoreproject
	public static function RestoreProject( $params = array() ) {

		$default_params = array(
			'fct'       => "restoreproject",
			'projectid' => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Updates an existing project. You must be an administrator or the project's project manager to access this function for a specific project.
// http://api.aceproject.com/explorer/?fct=updateproject
	public static function UpdateProject( $params = array() ) {

		$default_params = array(
			'fct'                      => "updateproject",
			'projectid'                => 0,
			'projectnumber'            => null,
			'projectname'              => null,
			'projecttypeid'            => null,
			'projectdesc'              => null,
			'nexttasknumber'           => null,
			'budgethours'              => null,
			'budgetcost'               => null,
			'estimatedstartdate'       => null,
			'estimatedenddate'         => null,
			'estimatedprojecthours'    => null,
			'estimatedprojectexpenses' => null,
			'actualstartdate'          => null,
			'actualenddate'            => null,
			'projectpriorityid'        => null,
			'projectstatusid'          => null,
			'projecttemplate'          => null,
			'contactname'              => null,
			'contactphone'             => null,
			'contactemail'             => null,
			'contactcell'              => null,
			'contactfax'               => null,
			'defaultestimatedtime'     => null,
			'defaulttaskstartdate'     => null,
			'defaulttaskenddate'       => null,
			'defaulttaskactualdates'   => null,
			'clientid'                 => null,
			'includeweekends'          => null,
			'keeptemplatelink'         => null,
			'incompletestaskssetto'    => null,
			'timestatussetto'          => null,
			'expensestatussetto'       => null,
			'mandatorydependency'      => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

	// Deletes a specific project priority. You must be an account administrator to access this function.
// http://api.aceproject.com/explorer/?fct=deleteprojectpriority
	public static function DeleteProjectPriority( $params = array() ) {

		$default_params = array(
			'fct'               => "deleteprojectpriority",
			'projectpriorityid' => 0,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Retrieves list of project priorities.
// http://api.aceproject.com/explorer/?fct=getprojectpriorities
	public static function GetProjectPriorities( $params = array() ) {

		$default_params = array(
			'fct'               => "getprojectpriorities",
			'projectpriorityid' => null,
			'sortorder'         => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// http://api.aceproject.com/explorer/?fct=resetprojectpriorityorder
	public static function ResetProjectPriorityOrder( $params = array() ) {

		$default_params = array(
			'fct' => "resetprojectpriorityorder",
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Creates a project priority if no ProjecPriorityId is specified or updates an existing project priority when a valid ProjecPriorityId is specified. You must be an account administrator to access this function.
// http://api.aceproject.com/explorer/?fct=saveprojectpriority
	public static function SaveProjectPriority( $params = array() ) {

		$default_params = array(
			'fct'                 => "saveprojectpriority",
			'projectpriorityid'   => null,
			'projectpriorityname' => null,
			'projectprioritydesc' => null,
			'myorder'             => null,
			'isdefault'           => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Deletes a specific project status. You must be an account administrator to access this function.
// http://api.aceproject.com/explorer/?fct=deleteprojectstatus
	public static function DeleteProjectStatus( $params = array() ) {

		$default_params = array(
			'fct'             => "deleteprojectstatus",
			'projectstatusid' => 0,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Retrieves list of project statuses.
// http://api.aceproject.com/explorer/?fct=getprojectstatuses
	public static function GetProjectStatuses( $params = array() ) {

		$default_params = array(
			'fct'                    => "getprojectstatuses",
			'projectstatusid'        => null,
			'completedprojectstatus' => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// http://api.aceproject.com/explorer/?fct=resetprojectstatusorder
	public static function ResetProjectStatusOrder( $params = array() ) {

		$default_params = array(
			'fct' => "resetprojectstatusorder",
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Creates a project status if no ProjecStatusId is specified or updates an existing project status when a valid ProjecStatusId is specified. You must be an account administrator to access this function.
// http://api.aceproject.com/explorer/?fct=saveprojectstatus
	public static function SaveProjectStatus( $params = array() ) {

		$default_params = array(
			'fct'               => "saveprojectstatus",
			'projectstatusid'   => null,
			'projectstatusname' => null,
			'projectstatusdesc' => null,
			'completedstatus'   => null,
			'myorder'           => null,
			'isdefault'         => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Deletes a specific project type. You must be an account administrator to access this function.
// http://api.aceproject.com/explorer/?fct=deleteprojecttype
	public static function DeleteProjectType( $params = array() ) {

		$default_params = array(
			'fct'           => "deleteprojecttype",
			'projecttypeid' => 0,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Retrieves list of project types.
// http://api.aceproject.com/explorer/?fct=getprojecttypes
	public static function GetProjectTypes( $params = array() ) {

		$default_params = array(
			'fct'           => "getprojecttypes",
			'projecttypeid' => null,
			'sortorder'     => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// http://api.aceproject.com/explorer/?fct=resetprojecttypeorder
	public static function ResetProjectTypeOrder( $params = array() ) {

		$default_params = array(
			'fct' => "resetprojecttypeorder",
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Creates a project type if no ProjectTypeId is specified or updates an existing project type when a valid ProjectypeId is specified. You must be an account administrator to access this function.
// http://api.aceproject.com/explorer/?fct=saveprojecttype
	public static function SaveProjectType( $params = array() ) {

		$default_params = array(
			'fct'             => "saveprojecttype",
			'projecttypeid'   => null,
			'projecttypename' => null,
			'projecttypedesc' => null,
			'myorder'         => null,
			'isdefault'       => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}


}