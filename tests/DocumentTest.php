<?php

use Millsoft\AceProject\AceProject;
use Millsoft\AceProject\Document;

class DocumentTest extends PHPUnit_Framework_TestCase {

	public function setUp() {
		AceProject::login("USERNAME", "PASSWORD", "SUBDOMAIN");
	}


	/**
	 * @group testing
	 */
	public function testSaveTaskDocument(){


		$params = array(
			"taskid" => 1,
			'addcomments'         => "Test",
			'iscommentsplaintext' => false,
			'uploaddate'          => null,
			'description'         => null,
			'version'             => null,
			'ispublic'            => true,
			'islocked'            => false,
			'notify'              => false,
			'quickupload'         => false,
		);


		$fileToUpload = __DIR__ . "/test.png";

		$data = Document::SaveTaskDocument($params, $fileToUpload);
		$error  = AceProject::getLastError();
		$this->assertNull( $error, $error );
		$this->assertEquals( 'object', gettype($data));

	}










}
