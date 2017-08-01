<?php

namespace Millsoft\AceProject;

class Document extends AceProject {

// http://api.aceproject.com/explorer/?fct=deletedocument
	public static function DeleteDocument( $params = array() ) {

		$default_params = array(
			'fct'         => "deletedocument",
			'documentids' => null,
			'notify'      => true,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// http://api.aceproject.com/explorer/?fct=deleteexpensedocument
	public static function DeleteExpenseDocument( $params = array() ) {

		$default_params = array(
			'fct'        => "deleteexpensedocument",
			'expenseid'  => null,
			'documentid' => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// http://api.aceproject.com/explorer/?fct=deletefolder
	public static function DeleteFolder( $params = array() ) {

		$default_params = array(
			'fct'              => "deletefolder",
			'projectid'        => 0,
			'folderid'         => 0,
			'pathtofiles'      => null,
			'pathtorecyclebin' => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// http://api.aceproject.com/explorer/?fct=downloaddocument
	public static function DownloadDocument( $params = array() ) {

		$default_params = array(
			'fct'               => "downloaddocument",
			'accountid'         => "sampleaccount",
			'documentid'        => 0,
			'securitycheck'     => "###",
			'forvalidationonly' => false,
			'inline'            => true,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// http://api.aceproject.com/explorer/?fct=getdocuments
	public static function GetDocuments( $params = array() ) {

		$default_params = array(
			'fct'                        => "getdocuments",
			'projectid'                  => null,
			'taskid'                     => null,
			'expenseid'                  => null,
			'documentid'                 => null,
			'getprojectdocuments'        => true,
			'gettaskdocuments'           => true,
			'getexpensedocuments'        => true,
			'filterprojecttypeid'        => null,
			'filterassignedprojectsonly' => false,
			'filteruploaduserid'         => null,
			'filterlocked'               => null,
			'filterpublic'               => null,
			'filterfolderid'             => null,
			'commentid'                  => null,
			'includeinactivetemplates'   => true,
			'texttosearch'               => null,
			'sortorder'                  => null,
			'pagenumber'                 => null,
			'rowsperpage'                => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// http://api.aceproject.com/explorer/?fct=getfolderinfos
	public static function GetFolderInfos( $params = array() ) {

		$default_params = array(
			'fct'       => "getfolderinfos",
			'projectid' => 0,
			'folderid'  => 0,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// http://api.aceproject.com/explorer/?fct=getfolders
	public static function GetFolders( $params = array() ) {

		$default_params = array(
			'fct'       => "getfolders",
			'projectid' => 0,
			'folderid'  => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Lock/unlock a document. Obsolete, replaced by UpdateDocumentInfos function
// http://api.aceproject.com/explorer/?fct=lockdocument
	public static function LockDocument( $params = array() ) {

		$default_params = array(
			'fct'          => "lockdocument",
			'documentid'   => 0,
			'lockdocument' => true,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// http://api.aceproject.com/explorer/?fct=savefolder
	public static function SaveFolder( $params = array() ) {

		$default_params = array(
			'fct'            => "savefolder",
			'projectid'      => 0,
			'folderid'       => null,
			'foldername'     => "###",
			'folderparentid' => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// http://api.aceproject.com/explorer/?fct=saveprojectdocument
	public static function SaveProjectDocument( $params = array() ) {

		$default_params = array(
			'fct'        => "saveprojectdocument",
			'projectid'  => 0,
			'userid'     => null,
			'folderid'   => null,
			'filesinfos' => null,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params, "post" );

	}

	//Upload a file and assign it to a task
// http://api.aceproject.com/explorer/?fct=savetaskdocument
	public static function SaveTaskDocument( $params = array() , $filePath) {


		//upload the file and get the temporary file name:
		$filenametemp = AceProject::uploadFile($filePath);

		$default_params = array(
			'fct'                 => "savetaskdocument",
			'taskid'              => 0,
			'addcomments'         => null,
			'iscommentsplaintext' => false,
			'filesinfos'          => null,
			'uploaddate'          => null,
			'description'         => null,
			'version'             => null,
			'ispublic'            => false,
			'islocked'            => false,
			'notify'              => false,
			'quickupload'         => false,
		);

		$params = array_merge( $default_params, $params );

		//these params will be changed by script and should not be changed by the user:
		$params['filenametemp'] = $filenametemp;
		$params['filename'] = basename($filePath);


		return self::sendRequestAndGetObject( $params , "post");

	}

// Set document public / private. Obsolete, replaced by UpdateDocumentInfos function
// http://api.aceproject.com/explorer/?fct=setdocumentpublic
	public static function SetDocumentPublic( $params = array() ) {

		$default_params = array(
			'fct'        => "setdocumentpublic",
			'documentid' => 0,
			'ispublic'   => true,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}

// Modify the document information such as name, description, version, etc..
// http://api.aceproject.com/explorer/?fct=updatedocumentinfos
	public static function UpdateDocumentInfos( $params = array() ) {

		$default_params = array(
			'fct'         => "updatedocumentinfos",
			'documentid'  => 0,
			'filename'    => null,
			'description' => null,
			'version'     => null,
			'public'      => null,
			'lock'        => null,
			'notify'      => false,
		);

		$params = array_merge( $default_params, $params );

		return self::sendRequestAndGetObject( $params );

	}


}