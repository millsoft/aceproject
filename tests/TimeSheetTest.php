<?php

use Millsoft\AceProject\AceProject;
use Millsoft\AceProject\Timesheet;
use Millsoft\AceProject\TimeType;

class TimeSheetTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
        AceProject::login("USERNAME", "PASSWORD", "SUBDOMAIN");
    }



	public function testGetTimeTypes(){
		$data = TimeType::GetTimeTypes();
		$error  = AceProject::getLastError();
		$this->assertNull( $error, $error );
		$this->assertEquals( 'array', gettype($data));
	}

	public function testOpenClock(){
		$params = array(
			"taskid" => 1
		);
		$data = Timesheet::OpenClock($params);
		$error  = AceProject::getLastError();
		$this->assertNull( $error, $error );
		$this->assertEquals( 'array', gettype($data));

		print_r($data);
	}

	/**
	 * @group tested
	 */
	public function testGetClock(){
		$data = Timesheet::GetClock();
		$error  = AceProject::getLastError();
		$this->assertNull( $error, $error );
		$this->assertEquals( 'object', gettype($data));
		print_r($data);
	}

	/**
	 * @group tested
	 */
	public function testCloseClock(){

		$params = array(

		);

		$data = Timesheet::CloseClock($params);
		$error  = AceProject::getLastError();
		$this->assertNull( $error, $error );
		$this->assertEquals( 'object', gettype($data));
		print_r($data);

	}









}
