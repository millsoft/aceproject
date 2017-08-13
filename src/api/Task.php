<?php

namespace Millsoft\AceProject;

class Task extends AceProject
{

    // http://api.aceproject.com/explorer/?fct=changetaskdates
    public static function ChangeTaskDates($params = array())
    {

        $default_params = array(
            'fct'             => "changetaskdates",
            'projectid'       => 0,
            'taskid'          => 0,
            'startdate'       => null,
            'duedate'         => null,
            'includeweekend'  => False,
            'notify'          => False,
            'gettaskinreturn' => True,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// Creates a new task.
// http://api.aceproject.com/explorer/?fct=createtask
    public static function CreateTask($params = array())
    {

        $default_params = array(
            'fct'                 => "createtask",
            'projectid'           => null,
            'tasknumber'          => null,
            'summary'             => null,
            'details'             => null,
            'statusid'            => null,
            'percentdone'         => null,
            'groupid'             => null,
            'typeid'              => null,
            'priorityid'          => null,
            'weekendallowed'      => null,
            'estimatedstartdate'  => null,
            'estimatedduedate'    => null,
            'estimatedhours'      => null,
            'estimatedexpenses'   => null,
            'actualstartdate'     => null,
            'actualduedate'       => null,
            'addcomments'         => null,
            'dividehours'         => null,
            'notify'              => null,
            'isdetailsplaintext'  => null,
            'iscommentsplaintext' => null,
            'gettaskinreturn'     => null,
            'marklevel'           => null,
            'fileinfo'            => null,
            'assigneeusername'    => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// Deletes a specific task.
// http://api.aceproject.com/explorer/?fct=deletetask
    public static function DeleteTask($task_id)
    {

        $params = array(
            'fct'    => "deletetask",
            'taskid' => $task_id,
        );

        return self::sendRequestAndGetObject($params);

    }

// Deletes a specific task comment.
// http://api.aceproject.com/explorer/?fct=deletetaskcomment
    public static function DeleteTaskComment($params = array())
    {

        $default_params = array(
            'fct'           => "deletetaskcomment",
            'taskid'        => 0,
            'taskhistoryid' => 0,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// Returns all necessary information for creating a task such as access rights on the project and default values.
// http://api.aceproject.com/explorer/?fct=getnewtasksettings
    public static function GetNewTaskSettings($project_id = null)
    {

        $params = array(
            'fct'       => "getnewtasksettings",
            'projectid' => $project_id,
        );

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=getrecenttasks
    public static function GetRecentTasks($params = array())
    {

        $default_params = array(
            'fct'                   => "getrecenttasks",
            'projectid'             => null,
            'assignedprojectsonly'  => 0,
            'nblatestmodifiedtasks' => 0,
            'includetasknull'       => False,
            'nbdaysmax'             => null,
            'sortorder'             => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequest($params);

    }

// Retrieves list of comments for specified tasks.
// http://api.aceproject.com/explorer/?fct=gettaskcomments
    public static function GetTaskComments($params = array())
    {

        $default_params = array(
            'fct'               => "gettaskcomments",
            'projectid'         => null,
            'taskids'           => null,
            'plaintext'         => FALSE,
            'maxnumbercomments' => null,
            'includedoccount'   => FALSE,
            'sortorder'         => null,
            'pagenumber'        => null,
            'rowsperpage'       => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequest($params);

    }

// Retrieves task histories.
// http://api.aceproject.com/explorer/?fct=gettaskhistory
    public static function GetTaskHistory($params = array())
    {

        $default_params = array(
            'fct'          => "gettaskhistory",
            'projectid'    => 0,
            'taskid'       => null,
            'fromdate'     => null,
            'todate'       => null,
            'sortorder'    => null,
            'pagenumber'   => null,
            'rowsperpage'  => null,
            'richtextonly' => False,
            'taskids'      => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequest($params);

    }

// http://api.aceproject.com/explorer/?fct=gettaskinfo
    public static function GetTaskInfo($task_id = 0)
    {

        $params = array(
            'fct'    => "gettaskinfo",
            'taskid' => $task_id,
        );

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=gettaskmarked
    public static function GetTaskMarked($task_id = 0)
    {

        $params = array(
            'fct'    => "gettaskmarked",
            'taskid' => $task_id,
        );

        return self::sendRequestAndGetObject($params);

    }

// Retrieves list of tasks.
// http://api.aceproject.com/explorer/?fct=gettasks
    public static function GetTasks($params = array())
    {

        $default_params = array(
            'fct'                         => "gettasks",
            'projectid'                   => null,
            'taskid'                      => null,
            'assignedprojectsonly'        => False,
            'includeinactivetemplates'    => True,
            'filtertaskgroupid'           => null,
            'filtertaskstatusid'          => null,
            'isgroupingtaskstatus'        => null,
            'filtertaskcompleted'         => null,
            'filtertasktypeid'            => null,
            'filtertaskpriorityid'        => null,
            'filtercreatoruserid'         => null,
            'filterassigneduserid'        => null,
            'filterassignedusergroupid'   => null,
            'filterrevieweruserid'        => null,
            'filteronuseridmustmeetall'   => True,
            'filterprojecttypeid'         => null,
            'filterclientid'              => null,
            'filterfirstdate'             => null,
            'filterfirstdateoperator'     => null,
            'filterfirstdatevalue'        => null,
            'filterseconddate'            => null,
            'filterseconddateoperator'    => null,
            'filterseconddatevalue'       => null,
            'filtertaskassigned'          => null,
            'filtertaskreviewers'         => null,
            'filtermarkedonly'            => False,
            'filtersoontodoonly'          => False,
            'filtersoondueonly'           => False,
            'filteroverdueonly'           => False,
            'filteroverduerecent'         => False,
            'filterrecurrencynumber'      => null,
            'filtertasksreadytostartonly' => False,
            'filtertaskswithoutdates'     => False,
            'texttosearch'                => null,
            'getplaintextvalues'          => False,
            'sortorder'                   => null,
            'useshowhide'                 => False,
            'forcombo'                    => False,
            'pagenumber'                  => null,
            'rowsperpage'                 => null,
            'asynccall'                   => False,
            'asynccallid'                 => null,
            'exportdomainevaleur'         => null,
            'exporttype'                  => null,
            'exportdelimiter'             => null,
            'exportdecimalsymbol'         => null,
            'exportlcid'                  => 0,
            'exportonscreencolumnsonly'   => True,
            'exportview'                  => 0,
            'exportviewother'             => null,
            'exportfieldstodisplay'       => null,
            'exportremovehtmlonly'        => True,
            'exportenablefilterxls'       => False,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequest($params);

    }

// http://api.aceproject.com/explorer/?fct=marktask
    public static function MarkTask($params = array())
    {

        $default_params = array(
            'fct'            => "marktask",
            'markusertaskid' => null,
            'taskid'         => 0,
            'marklevel'      => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// Moves an existing task to another project or copies an existing task to the same or another project.
// http://api.aceproject.com/explorer/?fct=moveorcopytask
    public static function MoveOrCopyTask($params = array())
    {

        $default_params = array(
            'fct'                   => "moveorcopytask",
            'fromprojectid'         => 0,
            'fromtaskid'            => 0,
            'toprojectid'           => 0,
            'move'                  => False,
            'newtasknumber'         => 0,
            'newestimatedstartdate' => null,
            'newestimatedenddate'   => null,
            'weekendsallowed'       => False,
            'newstatusid'           => 0,
            'newgroupid'            => 0,
            'newtypeid'             => 0,
            'newpriorityid'         => 0,
            'copycomments'          => False,
            'copytaskdocuments'     => False,
            'copyuserassignments'   => False,
            'gettaskinreturn'       => False,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// Creates a task if no TaskId is specified or updates an existing task when a valid TaskId is specified.
// http://api.aceproject.com/explorer/?fct=savetask
    public static function SaveTask($params = array())
    {

        $default_params = array(
            'fct'                 => "savetask",
            'projectid'           => null,
            'taskid'              => null,
            'tasknumber'          => null,
            'summary'             => null,
            'details'             => null,
            'statusid'            => null,
            'percentdone'         => null,
            'groupid'             => null,
            'typeid'              => null,
            'priorityid'          => null,
            'weekendallowed'      => null,
            'estimatedstartdate'  => null,
            'estimatedduedate'    => null,
            'estimatedhours'      => null,
            'estimatedexpenses'   => null,
            'manageactualdates'   => null,
            'actualstartdate'     => null,
            'actualduedate'       => null,
            'addcomments'         => null,
            'dividehours'         => null,
            'notify'              => null,
            'isdetailsplaintext'  => null,
            'iscommentsplaintext' => null,
            'gettaskinreturn'     => null,
            'marklevel'           => null,
            'fileinfo'            => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=savetaskbatch
    public static function SaveTaskBatch($params = array())
    {

        $default_params = array(
            'fct'                => "savetaskbatch",
            'projectid'          => null,
            'taskid'             => "###",
            'alltasks'           => False,
            'statusid'           => null,
            'percentdone'        => null,
            'groupid'            => null,
            'typeid'             => null,
            'priorityid'         => null,
            'addcomments'        => null,
            'estimateddatesmode' => null,
            'offsetdays'         => null,
            'estimatedstartdate' => null,
            'estimatedduedate'   => null,
            'keepduration'       => null,
            'notify'             => null,
            'isforcedcompletion' => False,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=sendtasknotification
    public static function SendTaskNotification($params = array())
    {

        $default_params = array(
            'fct'       => "sendtasknotification",
            'taskid'    => 0,
            'datemodif' => 0,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=deletetaskdependency
    public static function DeleteTaskDependency($taskdependencyid = 0)
    {

        $params = array(
            'fct'              => "deletetaskdependency",
            'taskdependencyid' => 0,
        );


        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=existssuccessorsincommon
    public static function ExistsSuccessorsInCommon($params = array())
    {

        $default_params = array(
            'fct'       => "existssuccessorsincommon",
            'projectid' => 0,
            'taskid'    => "###",
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=getdatestopropose
    public static function GetDatesToPropose($params = array())
    {

        $default_params = array(
            'fct'               => "getdatestopropose",
            'taskid'            => 0,
            'dependencytype'    => 0,
            'lagtime'           => 0,
            'ismandatory'       => True,
            'taskpredecessorid' => 0,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequest($params);

    }

// Retrieves list of dependencies for specified task.
// http://api.aceproject.com/explorer/?fct=gettaskdependencies
    public static function GetTaskDependencies($params = array())
    {

        $default_params = array(
            'fct'                => "gettaskdependencies",
            'taskid'             => 0,
            'getpredecessors'    => True,
            'getsuccessors'      => True,
            'getplaintextvalues' => False,
            'useshowhide'        => False,
            'sortorder'          => null,
            'pagenumber'         => null,
            'rowsperpage'        => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequest($params);

    }

// http://api.aceproject.com/explorer/?fct=gettasksforpredecessors
    public static function GetTasksForPredecessors($task_id = 0, $sortorder = null)
    {

        $params = array(
            'fct'       => "gettasksforpredecessors",
            'taskid'    => $task_id,
            'sortorder' => $sortorder,
        );

        return self::sendRequest($params);

    }

// http://api.aceproject.com/explorer/?fct=savetaskdependency
    public static function SaveTaskDependency($params = array())
    {

        $default_params = array(
            'fct'               => "savetaskdependency",
            'taskdependencyid'  => null,
            'taskidpredecessor' => null,
            'taskidsuccessor'   => null,
            'dependencytype'    => 1,
            'lagtime'           => 0,
            'ismandatory'       => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=settaskdependencymandatory
    public static function SetTaskDependencyMandatory($task_dependency_id = 0, $is_mandatory = true)
    {

        $params = array(
            'fct'              => "settaskdependencymandatory",
            'taskdependencyid' => $task_dependency_id,
            'ismandatory'      => True,
        );

        return self::sendRequestAndGetObject($params);

    }

// Deletes a specific task group. You must be a project manager or an administrator to access this function.
// http://api.aceproject.com/explorer/?fct=deletetaskgroup
    public static function DeleteTaskGroup($task_group = 0)
    {

        $params = array(
            'fct'         => "deletetaskgroup",
            'taskgroupid' => $task_group,
        );

        return self::sendRequestAndGetObject($params);

    }

// Retrieves list of task groups.
// http://api.aceproject.com/explorer/?fct=gettaskgroups
    public static function GetTaskGroups($params = array())
    {

        $default_params = array(
            'fct'         => "gettaskgroups",
            'projectid'   => null,
            'taskgroupid' => null,
            'sortorder'   => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequest($params);

    }

// http://api.aceproject.com/explorer/?fct=resettaskgrouporder
    public static function ResetTaskGroupOrder($project_id = 0)
    {

        $params = array(
            'fct'       => "resettaskgrouporder",
            'projectid' => $project_id,
        );

        return self::sendRequestAndGetObject($params);

    }

// Creates a task group if no TaskGroupId is specified or updates an existing task group when a valid TaskGroupId is specified. You must be a project manager or an administrator to access this function.
// http://api.aceproject.com/explorer/?fct=savetaskgroup
    public static function SaveTaskGroup($params = array())
    {

        $default_params = array(
            'fct'           => "savetaskgroup",
            'projectid'     => null,
            'taskgroupid'   => null,
            'taskgroupname' => null,
            'taskgroupdesc' => null,
            'myorder'       => null,
            'isdefault'     => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// Deletes a specific task priority. You must be a project manager or an administrator to access this function.
// http://api.aceproject.com/explorer/?fct=deletetaskpriority
    public static function DeleteTaskPriority($taskpriorityid = 0)
    {

        $params = array(
            'fct'            => "deletetaskpriority",
            'taskpriorityid' => $taskpriorityid,
        );


        return self::sendRequestAndGetObject($params);

    }

// Retrieves list of task priorities.
// http://api.aceproject.com/explorer/?fct=gettaskpriorities
    public static function GetTaskPriorities($params = array())
    {

        $default_params = array(
            'fct'            => "gettaskpriorities",
            'projectid'      => null,
            'taskpriorityid' => null,
            'sortorder'      => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequest($params);

    }

// http://api.aceproject.com/explorer/?fct=resettaskpriorityorder
    public static function ResetTaskPriorityOrder($project_id = 0)
    {

	    $params = array(
            'fct'       => "resettaskpriorityorder",
            'projectid' => $project_id,
        );

        return self::sendRequestAndGetObject($params);

    }

// Creates a task priority if no TaskPriorityId is specified or updates an existing task priority when a valid TaskPriorityId is specified. You must be a project manager or an administrator to access this function.
// http://api.aceproject.com/explorer/?fct=savetaskpriority
    public static function SaveTaskPriority($params = array())
    {

        $default_params = array(
            'fct'              => "savetaskpriority",
            'projectid'        => null,
            'taskpriorityid'   => null,
            'taskpriorityname' => null,
            'taskprioritydesc' => null,
            'myorder'          => null,
            'isdefault'        => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=activatingrecurrence
    public static function ActivatingRecurrence($params = array())
    {

        $default_params = array(
            'fct'              => "activatingrecurrence",
            'taskrecurrencyid' => "###",
            'startdate'        => 0,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// Copy a task recurrence or any task recurrence of a project.
// http://api.aceproject.com/explorer/?fct=copytaskrecurrence
    public static function CopyTaskRecurrence($params = array())
    {

        $default_params = array(
            'fct'                  => "copytaskrecurrence",
            'fromprojectid'        => null,
            'fromrecurrencenumber' => null,
            'toprojectid'          => 0,
            'startdate'            => null,
            'copyassignments'      => False,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// Deactivate recurrence
// http://api.aceproject.com/explorer/?fct=deactivatingrecurrence
    public static function DeactivatingRecurrence($task_recurrency_id)
    {

        $params = array(
            'fct'              => "deactivatingrecurrence",
            'taskrecurrencyid' => $task_recurrency_id,
        );

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=deleterecurrence
    public static function DeleteRecurrence($params = array())
    {

        $default_params = array(
            'fct'              => "deleterecurrence",
            'recurrencynumber' => 0,
            'modifyrecurrency' => 0,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=dissociatetaskfromrecurrency
    public static function DissociateTaskFromRecurrency($params = array())
    {

        $default_params = array(
            'fct'    => "dissociatetaskfromrecurrency",
            'taskid' => "###",
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=formatrecurrencesummary
    public static function FormatRecurrenceSummary($params = array())
    {

        $default_params = array(
            'fct'               => "formatrecurrencesummary",
            'frequency'         => null,
            'repeatevery'       => null,
            'dayincludeweekend' => null,
            'weekday'           => null,
            'monthrepeatby'     => null,
            'monthdaynumber'    => null,
            'monthrankweek'     => null,
            'monthweekday'      => null,
            'monthlastday'      => null,
            'yearmonth'         => null,
            'yearday'           => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequest($params);

    }

// http://api.aceproject.com/explorer/?fct=gettaskrecurrenceassigneduser
    public static function GetTaskRecurrenceAssignedUser($params = array())
    {

        $default_params = array(
            'fct'              => "gettaskrecurrenceassigneduser",
            'taskrecurrencyid' => 0,
            'sortorder'        => "MYORDER",
        );

        $params = array_merge($default_params, $params);

        return self::sendRequest($params);

    }

// http://api.aceproject.com/explorer/?fct=gettaskrecurrences
    public static function GetTaskRecurrences($params = array())
    {

        $default_params = array(
            'fct'                    => "gettaskrecurrences",
            'taskrecurrencyid'       => null,
            'recurrencynumber'       => null,
            'projectid'              => null,
            'filterrecurrencystatus' => 0,
            'assignedprojectsonly'   => False,
            'sortorder'              => null,
            'pagenumber'             => null,
            'rowsperpage'            => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequest($params);

    }

// http://api.aceproject.com/explorer/?fct=savetaskrecurrence
    public static function SaveTaskRecurrence($params = array())
    {

        $default_params = array(
            'fct'                   => "savetaskrecurrence",
            'taskrecurrencyid'      => null,
            'recurrencynumber'      => null,
            'recurrencyname'        => null,
            'reusenamefortask'      => null,
            'recurrencydescription' => null,
            'frequency'             => null,
            'repeatevery'           => null,
            'dayincludeweekend'     => null,
            'weekday'               => null,
            'monthrepeatby'         => null,
            'monthdaynumber'        => null,
            'monthrankweek'         => null,
            'monthweekday'          => null,
            'monthlastday'          => null,
            'yearmonth'             => null,
            'yearday'               => null,
            'startdate'             => null,
            'endrecurrency'         => null,
            'endnboccurrences'      => null,
            'enddate'               => null,
            'createdays'            => null,
            'expirationdate'        => null,
            'projectid'             => null,
            'taskgroupid'           => null,
            'tasktypid'             => null,
            'prioritytypeid'        => null,
            'taskresume'            => null,
            'taskdesccreator'       => null,
            'statustypeid'          => null,
            'percentagedone'        => null,
            'duration'              => null,
            'weekendallowed'        => null,
            'estimatedtime'         => null,
            'estimatedexpenses'     => null,
            'dividehours'           => null,
            'assigneeuserid'        => null,
            'revieweruserid'        => null,
            'modifyrecurrencyfrom'  => null,
            'lastoccurrencedate'    => null,
            'notify'                => True,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=terminatingrecurrence
    public static function TerminatingRecurrence($task_recurrency_id)
    {

        $params = array(
            'fct'              => "terminatingrecurrence",
            'taskrecurrencyid' => $task_recurrency_id,
        );

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=createtasksreminder
    public static function CreateTasksReminder($params = array())
    {

        $default_params = array(
            'fct'                   => "createtasksreminder",
            'userid'                => null,
            'startsoonnbdaysbefore' => null,
            'soonduenbdaysbefore'   => null,
            'overduenbdaysafter'    => null,
            'typeemailtaskreminder' => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// Deletes a specific task status. You must be a project manager or an administrator to access this function.
// http://api.aceproject.com/explorer/?fct=deletetaskstatus
    public static function DeleteTaskStatus($task_status_id = 0)
    {

        $params = array(
            'fct'          => "deletetaskstatus",
            'taskstatusid' => $task_status_id,
        );

        return self::sendRequestAndGetObject($params);

    }

// Retrieves list of task statuses.
// http://api.aceproject.com/explorer/?fct=gettaskstatuses
    public static function GetTaskStatuses($params = array())
    {

        $default_params = array(
            'fct'              => "gettaskstatuses",
            'projectid'        => null,
            'taskid'           => null,
            'taskstatusid'     => null,
            'filterwaiting'    => True,
            'filterinprogress' => True,
            'filtercompleted'  => True,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequest($params);

    }

// http://api.aceproject.com/explorer/?fct=resettaskstatusorder
    public static function ResetTaskStatusOrder($project_id = 0)
    {

        $params = array(
            'fct'       => "resettaskstatusorder",
            'projectid' => $project_id,
        );

        return self::sendRequestAndGetObject($params);

    }

// Creates a task status if no TaskStatusId is specified or updates an existing task status when a valid TaskStatusId is specified. You must be a project manager or an administrator to access this function.
// http://api.aceproject.com/explorer/?fct=savetaskstatus
    public static function SaveTaskStatus($params = array())
    {

        $default_params = array(
            'fct'                => "savetaskstatus",
            'projectid'          => null,
            'taskstatusid'       => null,
            'taskstatusname'     => null,
            'taskstatusdesc'     => null,
            'completedstatus'    => null,
            'myorder'            => null,
            'isdefault'          => null,
            'defaultpercentdone' => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// Deletes a specific task type. You must be a project manager or an administrator to access this function.
// http://api.aceproject.com/explorer/?fct=deletetasktype
    public static function DeleteTaskType($task_type_id = 0)
    {

        $params = array(
            'fct'        => "deletetasktype",
            'tasktypeid' => $task_type_id,
        );

        return self::sendRequestAndGetObject($params);

    }

// Retrieves list of task types.
// http://api.aceproject.com/explorer/?fct=gettasktypes
    public static function GetTaskTypes($params = array())
    {

        $default_params = array(
            'fct'        => "gettasktypes",
            'projectid'  => null,
            'tasktypeid' => null,
            'sortorder'  => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequest($params);

    }

// http://api.aceproject.com/explorer/?fct=resettasktypeorder
    public static function ResetTaskTypeOrder($project_id = 0)
    {

        $params = array(
            'fct'       => "resettasktypeorder",
            'projectid' => $project_id,
        );

        return self::sendRequestAndGetObject($params);

    }

// Creates a task type if no TaskTypeId is specified or updates an existing task type when a valid TaskTypeId is specified. You must be a project manager or an administrator to access this function.
// http://api.aceproject.com/explorer/?fct=savetasktype
    public static function SaveTaskType($params = array())
    {

        $default_params = array(
            'fct'          => "savetasktype",
            'projectid'    => null,
            'tasktypeid'   => null,
            'tasktypename' => null,
            'tasktypedesc' => null,
            'myorder'      => null,
            'isdefault'    => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// Assigns (or unassigns) a user as assignee or reviewer of a task.
// http://api.aceproject.com/explorer/?fct=assignusertask
    public static function AssignUserTask($params = array())
    {

        $default_params = array(
            'fct'              => "assignusertask",
            'taskid'           => 0,
            'userid'           => "###",
            'isassignee'       => null,
            'assignedhours'    => null,
            'isreviewer'       => null,
            'notify'           => False,
            'modifyrecurrency' => 1,
            'datemodified'     => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// Lists the tasks of a project and if the given user is assigned to each.
// http://api.aceproject.com/explorer/?fct=gettaskuser
    public static function GetTaskUser($params = array())
    {

        $default_params = array(
            'fct'             => "gettaskuser",
            'projectid'       => 0,
            'userid'          => 0,
            'completedstatus' => null,
            'forcombo'        => False,
            'sortorder'       => null,
            'pagenumber'      => null,
            'rowsperpage'     => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequest($params);

    }


}