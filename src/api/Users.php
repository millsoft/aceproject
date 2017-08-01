<?php

namespace Millsoft\AceProject;

class Users extends AceProject
{

// http://api.aceproject.com/explorer/?fct=adduserprojecttoopen
    public static function AddUserProjectToOpen($project_id = 0)
    {

        $params = array(
            'fct'       => "adduserprojecttoopen",
            'projectid' => $project_id,
        );


        return self::sendRequestAndGetObject($params);

    }

// Deletes a user from the account. User must not have any related data in the account. You can't delete your own account and you can't delete the last administrator of the account. You must be an account administrator to access this function.
// http://api.aceproject.com/explorer/?fct=deleteuser
    public static function DeleteUser($user_id)
    {

        $params = array(
            'fct'            => "deleteuser",
            'useridtodelete' => $user_id,
        );

        return self::sendRequestAndGetObject($params);

    }

// Deletes a user's timesheets, expenses, messages and discussion forum topics and messages. You must be an account administrator to access this function.
// http://api.aceproject.com/explorer/?fct=deleteuseritems
    public static function DeleteUserItems($params = array())
    {

        $default_params = array(
            'fct'                    => "deleteuseritems",
            'userid'                 => 0,
            'deleteworkitems'        => False,
            'deletemailboxitems'     => False,
            'deletediscussionforums' => False,
            'deleteexpenses'         => False,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=getassigneduserlist
    public static function GetAssignedUserList($params = array())
    {

        $default_params = array(
            'fct'                   => "getassigneduserlist",
            'taskid'                => null,
            'projectid'             => null,
            'ispmview'              => False,
            'includeinactivesusers' => True,
            'includesystemuser'     => False,
            'onlycanopenproject'    => False,
            'sortorder'             => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequest($params);

    }

// Retrieves totals used as information presented in the Dashboard.
// http://api.aceproject.com/explorer/?fct=gettotals
    public static function GetTotals($project_id = 0)
    {

        $params = array(
            'fct'       => "gettotals",
            'projectid' => $project_id,
        );

        return self::sendRequest($params);

    }

// http://api.aceproject.com/explorer/?fct=getuserdirectory
    public static function GetUserDirectory($params = array())
    {

        $default_params = array(
            'fct'               => "getuserdirectory",
            'filteraccesslevel' => null,
            'filteractive'      => null,
            'filterusergroupid' => null,
            'texttosearch'      => null,
            'sortorder'         => null,
            'pagenumber'        => null,
            'rowsperpage'       => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequest($params);

    }

// http://api.aceproject.com/explorer/?fct=getusermobilepreferences
    public static function GetUserMobilePreferences($filteruserid = 0 )
    {

        $params = array(
            'fct'          => "getusermobilepreferences",
            'filteruserid' => $filteruserid,
        );

        return self::sendRequestAndGetObject($params);

    }

// Retrieves a user's notepad.
// http://api.aceproject.com/explorer/?fct=getusernotepad
    public static function GetUserNotepad($params = array())
    {

        $default_params = array(
            'fct' => "getusernotepad",
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=getuserpreference
    public static function GetUserPreference($params = array())
    {

        $default_params = array(
            'fct'       => "getuserpreference",
            'contextid' => null,
            'projectid' => null,
            'controlid' => null,
            'userid'    => null,
            'sortorder' => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=getuserprojectstoopen
    public static function GetUserProjectsToOpen($params = array())
    {

        $default_params = array(
            'fct' => "getuserprojectstoopen",
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=getuserrights
    public static function GetUserRights($params = array())
    {

        $default_params = array(
            'fct'                         => "getuserrights",
            'userid'                      => null,
            'projectid'                   => null,
            'forcombo'                    => False,
            'onlyuserproject'             => False,
            'includeinactiveusers'        => False,
            'returnunassignedadminrights' => False,
            'sortorder'                   => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// Retrieves list of users.
// http://api.aceproject.com/explorer/?fct=getusers
    public static function GetUsers($params = array())
    {

        $default_params = array(
            'fct'                       => "getusers",
            'filteruserid'              => null,
            'filterfacebookid'          => null,
            'filteraccesslevel'         => null,
            'filterusergroupid'         => null,
            'filteraccessstatus'        => null,
            'filterassignedprojectid'   => null,
            'filteractive'              => null,
            'filterusername'            => null,
            'ispmview'                  => False,
            'texttosearch'              => null,
            'sortorder'                 => null,
            'forcombo'                  => null,
            'fortimesheet'              => null,
            'pagenumber'                => null,
            'rowsperpage'               => 50,
            'asynccall'                 => False,
            'asynccallid'               => null,
            'exportdomainevaleur'       => null,
            'exporttype'                => null,
            'exportdelimiter'           => null,
            'exportdecimalsymbol'       => null,
            'exportlcid'                => 0,
            'exportonscreencolumnsonly' => True,
            'exportview'                => 0,
            'exportviewother'           => null,
            'exportfieldstodisplay'     => null,
            'exportremovehtmlonly'      => True,
            'exportenablefilterxls'     => False,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequest($params);

    }

// http://api.aceproject.com/explorer/?fct=getusersettings
    public static function GetUserSettings($params = array())
    {

        $default_params = array(
            'fct'       => "getusersettings",
            'accountid' => "sampleaccount",
            'userid'    => 0,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=getuserworkload
    public static function GetUserWorkLoad($params = array())
    {

        $default_params = array(
            'fct'                         => "getuserworkload",
            'resourceloadingtypefilter'   => 1,
            'numberofweekdisplayedfilter' => 2,
            'usergroupidfilter'           => 0,
            'useridfilter'                => 0,
            'filteractive'                => null,
            'projecttypeidfilter'         => 0,
            'projectidfilter'             => 0,
            'clientidfilter'              => 0,
            'generatereportbyproject'     => False,
            'sortorder'                   => "ASC",
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

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=removeuserprojecttoopen
    public static function RemoveUserProjectToOpen($params = array())
    {

        $default_params = array(
            'fct'       => "removeuserprojecttoopen",
            'projectid' => "###",
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// Creates a user if no UserId is specified or updates an existing user when a valid UserId is specified. You must be an account administrator to access this function.
// http://api.aceproject.com/explorer/?fct=saveuser
    public static function SaveUser($params = array())
    {

        $default_params = array(
            'fct'                       => "saveuser",
            'userid'                    => null,
            'useridtoduplicate'         => null,
            'usertypeid'                => null,
            'username'                  => "sampleuser",
            'password'                  => "samplepassword",
            'passwordconfirm'           => null,
            'usergroupid'               => null,
            'email'                     => null,
            'firstname'                 => null,
            'lastname'                  => null,
            'phonenumber'               => null,
            'cellnumber'                => null,
            'faxnumber'                 => null,
            'canaddproject'             => null,
            'viewfinancialdata'         => null,
            'accessstatusid'            => null,
            'caneditemailnotifs'        => null,
            'timeentrymode'             => null,
            'expenseentrymode'          => null,
            'canapproveownexpense'      => null,
            'userdirectoryaccess'       => null,
            'helpview'                  => null,
            'emaillanguage'             => null,
            'sendemailonadd'            => null,
            'sendemailonupdatecreator'  => null,
            'sendemailonupdateassignee' => null,
            'sendemailsuccessorstart'   => null,
            'tasksperpage'              => null,
            'projectsperpage'           => null,
            'expensesperpage'           => null,
            'defaultpage'               => null,
            'defaultpagemyoffice'       => null,
            'tasksortfield'             => null,
            'tasksortorder'             => null,
            'projectsortfield'          => null,
            'projectsortorder'          => null,
            'timezone'                  => null,
            'dateformat'                => null,
            'usetypicalworkday'         => null,
            'typicalhoursworkday'       => null,
            'sendemailincludingmyself'  => null,
            'sendemailonassignproject'  => null,
            'sendemailtaskreminder'     => null,
            'typeemailtaskreminder'     => null,
            'avatarguid'                => null,
            'facebookid'                => null,
            'viewcustomreport'          => null,
            'favoritecustomreportid'    => null,
            'costtracking'              => null,
            'timetracking'              => null,
            'canmanageclient'           => null,
            'duplicateprojectassigned'  => False,
            'duplicatetaskassigned'     => False,
            'notify'                    => False,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// Save many new users with projects assignments
// http://api.aceproject.com/explorer/?fct=saveuserbatch
    public static function SaveUserBatch($params = array())
    {

        $default_params = array(
            'fct'                      => "saveuserbatch",
            'users'                    => null,
            'useridtoduplicate'        => null,
            'duplicateprojectassigned' => False,
            'duplicatetaskassigned'    => False,
            'projectid'                => null,
            'projectmanager'           => null,
            'timeapproval'             => False,
            'expenseapproval'          => False,
            'canopenproject'           => True,
            'taskeditionlevel'         => 9,
            'sendconnectioninfo'       => False,
            'notifyprojectassignment'  => False,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=saveuserfieldstodisplay
    public static function SaveUserFieldsToDisplay($params = array())
    {

        $default_params = array(
            'fct'                         => "saveuserfieldstodisplay",
            'userid'                      => "###",
            'fieldstodisplay'             => null,
            'fieldsorderby'               => null,
            'projectfieldstodisplay'      => null,
            'projectfieldsorderby'        => null,
            'ganttfieldstodisplay'        => null,
            'ganttfieldsorderby'          => null,
            'ganttprojectfieldstodisplay' => null,
            'ganttprojectfieldsorderby'   => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=saveusermobilepreferences
    public static function SaveUserMobilePreferences($params = array())
    {

        $default_params = array(
            'fct'              => "saveusermobilepreferences",
            'userid'           => 0,
            'toolbarposition'  => null,
            'tasksortfield'    => null,
            'tasksortorder'    => null,
            'projectsortfield' => null,
            'projectsortorder' => null,
            'tasksperpage'     => null,
            'projectsperpage'  => null,
            'expensesperpage'  => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// Updates a user's notepad.
// http://api.aceproject.com/explorer/?fct=saveusernotepad
    public static function SaveUserNotepad($params = array())
    {

        $default_params = array(
            'fct'                => "saveusernotepad",
            'notepad'            => null,
            'isnotepadplaintext' => False,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=saveuserpreference
    public static function SaveUserPreference($params = array())
    {

        $default_params = array(
            'fct'          => "saveuserpreference",
            'contextid'    => "###",
            'projectid'    => null,
            'controlid'    => "###",
            'userid'       => null,
            'controlvalue' => null,
            'exclusion'    => False,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=setuserprojectopenposition
    public static function SetUserProjectOpenPosition($params = array())
    {

        $default_params = array(
            'fct'       => "setuserprojectopenposition",
            'projectid' => 0,
            'position'  => 0,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=setusertutorialseen
    public static function SetUserTutorialSeen($params = array())
    {

        $default_params = array(
            'fct'        => "setusertutorialseen",
            'tutorialid' => 0,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

    // Deletes a specific user group. You must be an account administrator to access this function.
// http://api.aceproject.com/explorer/?fct=deleteusergroup
    public static function DeleteUserGroup($params = array())
    {

        $default_params = array(
            'fct'         => "deleteusergroup",
            'usergroupid' => 0,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// Retrieves list of user groups.
// http://api.aceproject.com/explorer/?fct=getusergroups
    public static function GetUserGroups($params = array())
    {

        $default_params = array(
            'fct'         => "getusergroups",
            'usergroupid' => null,
            'sortorder'   => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=resetusergrouporder
    public static function ResetUserGroupOrder($params = array())
    {

        $default_params = array(
            'fct' => "resetusergrouporder",
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// Creates a user group if no UserGroupId is specified or updates an existing user group when a valid UserGroupId is specified. You must be an account administrator to access this function.
// http://api.aceproject.com/explorer/?fct=saveusergroup
    public static function SaveUserGroup($params = array())
    {

        $default_params = array(
            'fct'           => "saveusergroup",
            'usergroupid'   => null,
            'usergroupname' => null,
            'usergroupdesc' => null,
            'myorder'       => null,
            'isdefault'     => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// Assigns a user to an existing project. You must be an administrator or the project's project manager to access this function for a specific project.
// http://api.aceproject.com/explorer/?fct=assignuserproject
    public static function AssignUserProject($params = array())
    {

        $default_params = array(
            'fct'                  => "assignuserproject",
            'userid'               => null,
            'projectid'            => "###",
            'projectmanager'       => null,
            'timeapproval'         => null,
            'expenseapproval'      => null,
            'canopenproject'       => null,
            'taskeditionlevel'     => null,
            'autoassignment'       => null,
            'myorder'              => null,
            'assignallactiveusers' => False,
            'notify'               => True,
            'notifytype'           => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=getuserproject
    public static function GetUserProject($params = array())
    {

        $default_params = array(
            'fct'                => "getuserproject",
            'projectid'          => null,
            'includetaskcreator' => True,
            'usertype'           => 0,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=resetuserprojectorder
    public static function ResetUserProjectOrder($params = array())
    {

        $default_params = array(
            'fct'       => "resetuserprojectorder",
            'projectid' => 0,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// Unassigns a user from an existing project. You must be an administrator or the project's project manager to access this function for a specific project.
// http://api.aceproject.com/explorer/?fct=unassignuserproject
    public static function UnassignUserProject($params = array())
    {

        $default_params = array(
            'fct'       => "unassignuserproject",
            'userid'    => "###",
            'projectid' => "###",
            'notify'    => True,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }


}