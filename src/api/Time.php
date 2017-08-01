<?php

namespace Millsoft\AceProject;

class Time extends AceProject
{

// Deletes a specific time status. You must be an administrator to access this function.
// http://api.aceproject.com/explorer/?fct=deletetimestatus
    public static function DeleteTimeStatus($time_status_id = 0)
    {

        $params = array(
            'fct'          => "deletetimestatus",
            'timestatusid' => $time_status_id,
        );

        return self::sendRequestAndGetObject($params);

    }

// Retrieves list of time statuses. You must be an administrator to access this function.
// http://api.aceproject.com/explorer/?fct=gettimestatus
    public static function GetTimeStatus($params = array())
    {

        $default_params = array(
            'fct'           => "gettimestatus",
            'timestatusid'  => null,
            'approvallevel' => null,
            'systemstatus'  => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// Reset the order of the list of time statuses.
// http://api.aceproject.com/explorer/?fct=resettimestatusorder
    public static function ResetTimeStatusOrder()
    {

        $params = array(
            'fct' => "resettimestatusorder",
        );

        return self::sendRequestAndGetObject($params);

    }

// Creates a time status if no TimeStatusId is specified or updates an existing time status when a valid TimeStatusId is specified. You must be an administrator to access this function.
// http://api.aceproject.com/explorer/?fct=savetimestatus
    public static function SaveTimeStatus($params = array())
    {

        $default_params = array(
            'fct'            => "savetimestatus",
            'timestatusid'   => null,
            'timestatusname' => null,
            'timestatusdesc' => null,
            'myorder'        => null,
            'approvallevel'  => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// Deletes a specific time type. You must be an account administrator to access this function.
// http://api.aceproject.com/explorer/?fct=deletetimetype
    public static function DeleteTimeType($timetype_id = 0)
    {

        $params = array(
            'fct'        => "deletetimetype",
            'timetypeid' => $timetype_id,
        );

        return self::sendRequestAndGetObject($params);

    }

// Retrieves list of time types.
// http://api.aceproject.com/explorer/?fct=gettimetypes
    public static function GetTimeTypes($params = array())
    {

        $default_params = array(
            'fct'        => "gettimetypes",
            'timetypeid' => null,
            'sortorder'  => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=resettimetypeorder
    public static function ResetTimeTypeOrder()
    {

        $params = array(
            'fct' => "resettimetypeorder",
        );

        return self::sendRequestAndGetObject($params);

    }

// Creates a time type if no TimeTypeId is specified or updates an existing time type when a valid TimeTypeId is specified. You must be an account administrator to access this function.
// http://api.aceproject.com/explorer/?fct=savetimetype
    public static function SaveTimeType($params = array())
    {

        $default_params = array(
            'fct'          => "savetimetype",
            'timetypeid'   => null,
            'timetypename' => null,
            'timetypedesc' => null,
            'myorder'      => null,
            'isdefault'    => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// http://api.aceproject.com/explorer/?fct=gettimezones
    public static function GetTimeZones($params = array())
    {

        $default_params = array(
            'fct'         => "gettimezones",
            'timezone'    => null,
            'currentdate' => null,
        );

        $params = array_merge($default_params, $params);

        return self::sendRequestAndGetObject($params);

    }

// Lists available timezones for AceProject
// http://api.aceproject.com/explorer/?fct=gettimezoneslist
    public static function GetTimeZonesList()
    {

        $params = array(
            'fct' => "gettimezoneslist",
        );

        return self::sendRequestAndGetObject($params);

    }


}