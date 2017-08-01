<?php

namespace Millsoft\AceProject;

class Expense extends AceProject {

// http://api.aceproject.com/explorer/?fct=approveexpenses
	public static function ApproveExpenses( $params = array() ) {

		$default_params = array(
			'fct'             => "approveexpenses",
			'projectid'       => null,
			'expenseid'       => "###",
			'expensestatusid' => 0,
			'message'         => null,
			'notify'          => true,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Deletes a specific expense entry.
// http://api.aceproject.com/explorer/?fct=deleteexpense
	public static function DeleteExpense( $params = array() ) {

		$default_params = array(
			'fct'       => "deleteexpense",
			'expenseid' => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Retrieves list of expenses for reporting purposes.
// http://api.aceproject.com/explorer/?fct=getexpensereport
	public static function GetExpenseReport( $params = array() ) {

		$default_params = array(
			'fct'                             => "getexpensereport",
			'expenseid'                       => null,
			'projectid'                       => null,
			'filtermyexpenses'                => true,
			'filterexpensecreatoruserid'      => null,
			'filterexpensecreatorusergroupid' => null,
			'filterexpensetypeid'             => null,
			'filterexpenselevel'              => 0,
			'filterexpensestatus'             => null,
			'filterdatefrom'                  => null,
			'filterdateto'                    => null,
			'displaycomments'                 => true,
			'filterprojecttypeid'             => null,
			'filterclientid'                  => null,
			'filtertaskid'                    => null,
			'filtertaskgroupid'               => null,
			'filtertasktypeid'                => null,
			'sortorder'                       => null,
			'asynccall'                       => false,
			'asynccallid'                     => null,
			'exportdomainevaleur'             => null,
			'exporttype'                      => null,
			'exportdelimiter'                 => null,
			'exportdecimalsymbol'             => null,
			'exportlcid'                      => 0,
			'exportonscreencolumnsonly'       => true,
			'exportview'                      => 0,
			'exportviewother'                 => null,
			'exportfieldstodisplay'           => null,
			'exportremovehtmlonly'            => true,
			'exportenablefilterxls'           => false,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Retrieves list of expenses.
// http://api.aceproject.com/explorer/?fct=getexpenses
	public static function GetExpenses( $params = array() ) {

		$default_params = array(
			'fct'             => "getexpenses",
			'forapproval'     => false,
			'expenseid'       => null,
			'projectid'       => null,
			'taskid'          => null,
			'datefrom'        => null,
			'dateto'          => null,
			'expensestatusid' => null,
			'expensetypeid'   => null,
			'projectstatus'   => null,
			'projecttypeid'   => null,
			'usergroupid'     => null,
			'userid'          => null,
			'texttosearch'    => null,
			'sortorder'       => null,
			'pagenumber'      => null,
			'rowsperpage'     => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// http://api.aceproject.com/explorer/?fct=requestexpenseapproval
	public static function RequestExpenseApproval( $params = array() ) {

		$default_params = array(
			'fct'            => "requestexpenseapproval",
			'expenseidlist'  => 0,
			'useridapproval' => 0,
			'message'        => null,
			'notify'         => true,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Creates an expense entry if no ExpenseId is specified or updates an existing expense entry when a valid ExpenseId is specified.
// http://api.aceproject.com/explorer/?fct=saveexpense
	public static function SaveExpense( $params = array() ) {

		$default_params = array(
			'fct'           => "saveexpense",
			'expenseid'     => null,
			'projectid'     => null,
			'taskid'        => null,
			'summary'       => null,
			'expensetypeid' => null,
			'expensedate'   => null,
			'amount'        => null,
			'codeofaccount' => null,
			'comments'      => null,
			'docadd'        => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

	// Deletes a specific expense status. You must be an administrator to access this function.
// http://api.aceproject.com/explorer/?fct=deleteexpensestatus
	public static function DeleteExpenseStatus( $params = array() ) {

		$default_params = array(
			'fct'             => "deleteexpensestatus",
			'expensestatusid' => 0,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Retrieves list of expense statuses. You must be an administrator to access this function.
// http://api.aceproject.com/explorer/?fct=getexpensestatus
	public static function GetExpenseStatus( $params = array() ) {

		$default_params = array(
			'fct'             => "getexpensestatus",
			'expensestatusid' => null,
			'approvallevel'   => null,
			'systemstatus'    => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Reset the order of the list of expense statuses.
// http://api.aceproject.com/explorer/?fct=resetexpensestatusorder
	public static function ResetExpenseStatusOrder() {

		$params = array(
			'fct' => "resetexpensestatusorder",
		);

		return self::sendRequestAndGetObject( $params );

	}

// Creates a expense status if no ExpenseStatusId is specified or updates an existing expense status when a valid ExpenseStatusId is specified. You must be an administrator to access this function.
// http://api.aceproject.com/explorer/?fct=saveexpensestatus
	public static function SaveExpenseStatus( $params = array() ) {

		$default_params = array(
			'fct'               => "saveexpensestatus",
			'expensestatusid'   => null,
			'expensestatusname' => null,
			'expensestatusdesc' => null,
			'myorder'           => null,
			'approvallevel'     => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

	// Deletes a specific expense type. You must be an account administrator to access this function.
// http://api.aceproject.com/explorer/?fct=deleteexpensetype
	public static function DeleteExpenseType( $params = array() ) {

		$default_params = array(
			'fct'           => "deleteexpensetype",
			'expensetypeid' => 0,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Retrieves list of expense types.
// http://api.aceproject.com/explorer/?fct=getexpensetypes
	public static function GetExpenseTypes( $params = array() ) {

		$default_params = array(
			'fct'           => "getexpensetypes",
			'expensetypeid' => null,
			'sortorder'     => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// http://api.aceproject.com/explorer/?fct=resetexpensetypeorder
	public static function ResetExpenseTypeOrder( ) {

		$params = array(
			'fct' => "resetexpensetypeorder",
		);
		return self::sendRequestAndGetObject( $params );

	}

// Creates an expense type if no ExpenseTypeId is specified or updates an existing expense type when a valid ExpenseTypeId is specified. You must be an account administrator to access this function.
// http://api.aceproject.com/explorer/?fct=saveexpensetype
	public static function SaveExpenseType( $params = array() ) {

		$default_params = array(
			'fct'             => "saveexpensetype",
			'expensetypeid'   => null,
			'expensetypename' => null,
			'expensetypedesc' => null,
			'myorder'         => null,
			'isdefault'       => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}


}