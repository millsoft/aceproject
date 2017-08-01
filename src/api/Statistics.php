<?php

namespace Millsoft\AceProject;

class Statistics extends AceProject
{

    // http://api.aceproject.com/explorer/?fct=getgeneralstats
    public static function GetGeneralStats($project_id_filter = null)
    {

        $params = array(
            'fct'             => "getgeneralstats",
            'projectidfilter' => $project_id_filter,
        );

        $params = array_merge($params, $params);

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=gettaskgroupsstats
    public static function GetTaskGroupsStats($project_id_filter = 0)
    {

        $params = array(
            'fct'             => "gettaskgroupsstats",
            'projectidfilter' => $project_id_filter,
        );

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=gettaskprioritiesstats
    public static function GetTaskPrioritiesStats($params = array())
    {

        $default_params = array(
            'fct'             => "gettaskprioritiesstats",
            'projectidfilter' => 0,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=gettaskstatusesstats
    public static function GetTaskStatusesStats($project_id_filter = 0)
    {

        $params = array(
            'fct'             => "gettaskstatusesstats",
            'projectidfilter' => $project_id_filter,
        );

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=gettasktypesstats
    public static function GetTaskTypesStats($project_id_filter = 0)
    {

        $params = array(
            'fct'             => "gettasktypesstats",
            'projectidfilter' => $project_id_filter,
        );

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=getusersstats
    public static function GetUsersStats($params = array())
    {

        $default_params = array(
            'fct'             => "getusersstats",
            'projectidfilter' => null,
            'filteractive'    => null,
            'sortorder'       => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }


}