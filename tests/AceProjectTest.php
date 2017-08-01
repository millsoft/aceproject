<?php

use Millsoft\AceProject\AceProject;
use Millsoft\AceProject\Account;
use Millsoft\AceProject\Client;
use Millsoft\AceProject\Task;
use Millsoft\AceProject\Users;

class AceProjectTest extends PHPUnit_Framework_TestCase {

	public function setUp() {
        AceProject::login("USERNAME", "PASSWORD", "SUBDOMAIN");
	}

	/**
	 * @group tested
	 */
	public function testGetUsers() {
		$users = Users::GetUsers();

		$error = AceProject::getLastError();
		$this->assertNull( $error, $error );
		$this->assertTrue( is_array( $users ) );
		$this->assertTrue( ! empty( $users ) );
	}

	/**
	 * @group tested
	 */
	public function testGetProjects() {
		$params   = array( "forcombo" => true );
		$projects = AceProject::GetProjects( $params );
		$error    = AceProject::getLastError();
		$this->assertNull( $error, $error );
	}

	/**
	 * @group tested
	 */
	public function testGetAccount() {
		$account = Account::GetAccount();
		$error   = AceProject::getLastError();
		$this->assertObjectHasAttribute( 'USERNAME', $account );
		$this->assertNull( $error, $error );
	}


	/**
	 * @group tested
	 */
	public function testGetAccountLimitation() {
		$data  = Account::GetAccountLimitation();
		$error = AceProject::getLastError();
		$this->assertNull( $error, $error );
		$this->assertObjectHasAttribute( 'USERS_LIMIT', $data );
	}

	/**
	 * @group tested
	 */
	public function testGetAccountStats() {
		$data  = Account::GetAccountStats();
		$error = AceProject::getLastError();
		$this->assertNull( $error, $error );
		$this->assertObjectHasAttribute( 'USERS_LIMIT', $data );
	}


	public function testGetAccountStructureList() {
		$data  = Account::GetAccountStructureList();
		$error = AceProject::getLastError();
		$this->assertNull( $error, $error );
		$this->assertObjectHasAttribute( 'ID', $data );
	}


	public function testGetTrackExpenseSetting() {
		$data  = Account::GetTrackExpenseSetting();
		$error = AceProject::getLastError();
		$this->assertNull( $error, $error );
		$this->assertObjectHasAttribute( 'COMPANY_ID', $data );
	}

	public function testGetTrackTimeSetting() {
		$data  = Account::GetTrackTimeSetting();
		$error = AceProject::getLastError();
		$this->assertNull( $error, $error );
		$this->assertObjectHasAttribute( 'COMPANY_ID', $data );
	}

	public function testSaveAccount() {

		$params = array(
			"accountwebsite" => "http://www.microsoft.com"
		);
		$data   = Account::SaveAccount( $params );
		$error  = AceProject::getLastError();
		$this->assertNull( $error, $error );
		$this->assertObjectHasAttribute( 'WEB_SITE_URL', $data );
		$this->assertEquals( 'http://www.microsoft.com', $data->WEB_SITE_URL );

	}


	public function testSaveTrackExpenseSetting() {

		$params = array(
			"standardentry" => 0
		);
		$data   = Account::SaveTrackExpenseSetting( $params );
		$error  = AceProject::getLastError();
		$this->assertNull( $error, $error );
		$this->assertObjectHasAttribute( 'STATUS', $data );
		$this->assertEquals( 'Success', $data->STATUS );

	}


	/**
	 * @group tested
	 */
	public function testSaveTrackTimeSetting() {

		$params = array(
			"standardentry" => 0
		);
		$data   = Account::SaveTrackTimeSetting( $params );
		$error  = AceProject::getLastError();
		$this->assertNull( $error, $error );

		$this->assertObjectHasAttribute( 'STATUS', $data );
		$this->assertEquals( 'Success', $data->STATUS );

	}


	public function testSaveClient() {


		$params = array(
			'clientname'               => "John Doe Cool",
			'clientnumber'             => 12345,
			'clientaddress'            => "Hauptstr. 123",
			'clientcity'               => "Göppingen",
			'clientcountry'            => "Germany",
			'clientzipcode'            => "73037",
			'clienturl'                => "http://www.example.com",
			'clientnote'               => "a short note",

		);
		$data   = Client::SaveClient( $params );
		$error  = AceProject::getLastError();
		$this->assertNull( $error, $error );

		$this->assertObjectHasAttribute( 'CLIENT_NUMBER', $data );
		$this->assertEquals( 12345, $data->CLIENT_NUMBER );
	}


	public function testDeleteClient() {

		//do not perform tests for deletions
		return;

		$data   = Client::DeleteClient( 2 );
		$error  = AceProject::getLastError();
		$this->assertNull( $error, $error );

		$this->assertObjectHasAttribute( 'CLIENT_NUMBER', $data );
		$this->assertEquals( 12345, $data->CLIENT_NUMBER );

	}

	/**
	 * @group tested
	 */
	public function testGetClients() {

		$params = array(
			"isforlist" => true,
			"sortorder" => "CLIENT_ID"
		);

		$data   = Client::GetClients( $params);
		$error  = AceProject::getLastError();
		$this->assertNull( $error, $error );

		$this->assertEquals( 'array', gettype($data));

	}



	public function testCreateTask() {

		$params = array(
			"projectid" => 1,
			"summary" => "Test Project"
		);

		$data   = Task::CreateTask( $params);
		$error  = AceProject::getLastError();
		$this->assertNull( $error, $error );

		$this->assertEquals( 'object', gettype($data));

	}


	/**
	 * @group tested
	 */
	public function testDeleteTask() {
		$data   = Task::DeleteTask( 8);
		$error  = AceProject::getLastError();
		$this->assertNull( $error, $error );
		$this->assertEquals( 'object', gettype($data));
		$this->assertObjectHasAttribute( 'STATUS', $data );
		$this->assertEquals( "Success", $data->STATUS );
	}


	public function testSaveTask() {
		$params = array(
			"projectid" => 1,
			"summary" => "Test Project",
			"details" => "Details!",
			"percentdone" => 6,
			"taskid" => 10
		);


		$data   = Task::SaveTask( $params);
		$error  = AceProject::getLastError();
		$this->assertNull( $error, $error );
		$this->assertEquals( 'object', gettype($data));
	}



	public function testGetTasks() {
		$params = array(
			"forcombo" => true,
		);

		$data   = Task::GetTasks( $params);
		print_r($data);
		$error  = AceProject::getLastError();
		$this->assertNull( $error, $error );
		$this->assertEquals( 'array', gettype($data));
	}






}
