<?php

namespace Millsoft\Tools;

require_once( __DIR__ . "/../../vendor/autoload.php" );

use Httpful\Httpful;
use Millsoft\AceProject\AceProject;
use PHPHtmlParser\Dom;


class Tools {
    public static $out_file = __DIR__ . "/out.txt";

    public static function extractParamsFromFile( $file = 'params.txt' ) {
        $params_file = __DIR__ . "/" . $file;

        if ( ! file_exists( $params_file ) ) {
            throw new \Exception( "Params file " . $params_file . " not found" );
        }

        $str = file_get_contents( $params_file );

        self::extractParams( $str );

    }

    /**
     * Extract params from params.txt
     */
    public static function extractParams( $str ) {

        $re = '/&(.+?)=(.+ "?)([0|a-zA-Z]*)("?)\)./';
        preg_match_all( $re, $str, $matches, PREG_SET_ORDER, 0 );

        $new = array();
        foreach ( $matches as $match ) {
            $new[] = "'" . $match[1] . "' => " . $match[3];
        }

        $str = join( ",\n", $new );

        echo $str;

    }

    public static function importByUrl( $url ) {

        $response = \Httpful\Request::get( $url )
            ->send();
        $response = str_ireplace( "&amp", "&", $response );

        $dom = new Dom;

        //$dom->loadFromUrl($url, array(
        $dom->load( $response, array(
            "whitespaceTextNode" => false,
            "cleanupInput"       => true,
            "preserveLineBreaks" => true
        ) );
        $html = $dom->outerHtml;
        $pre  = $dom->find( "pre" )[0];

        $pre = $pre->innerHtml;

        $re = '/(?>code-attribute">)((?>(?>"&)(?P<key>.*?)(?>=)(?>.*code-attribute">)(?P<val>.*)(?><\/span))|(?>")(.*)(?>=)(?P<fct>.*)(?>"))/';
        preg_match_all( $re, $pre, $matches, PREG_SET_ORDER, 0 );

        //Buid the params:
        $params = array();

        foreach ( $matches as $match ) {
            if ( isset( $match['fct'] ) && ! isset( $params['fct'] ) ) {
                $params['fct'] = $match['fct'];
            }

            if ( isset( $match['key'] ) && ! empty( trim( $match['key'] ) ) ) {
                $params[ $match['key'] ] = $match['val'];
            }
        }

        if ( isset( $params['format'] ) ) {
            unset( $params['format'] );
        }

        if ( isset( $params['guid'] ) ) {
            unset( $params['guid'] );
        }

        //Function Name and Description:
        $re = '/(?>(?><\/tr>)\s*<tr>)\s*(?><td.*">)(?P<fnc>.*)(?><\/td>)\s.*(?><td.*)\s*(?><td)(?>.*;">)(?P<description>.*)(?><\/td>)/um';
        preg_match_all( $re, $html, $info, PREG_SET_ORDER, 0 );

        $info                 = $info[0];
        $function_name        = $info['fnc'];
        $function_description = $info['description'];

        //generate code:
        $code = array();

        if ( ! empty( $function_description ) ) {
            $code[] = "// " . $function_description;
        }

        $code[] = "// " . $url;
        $code[] = "public static function " . $function_name . ' ($params = array()){';
        $code[] = '';

        //Params:
        $code[] = '$default_params = array(';
        foreach ( $params as $k => $v ) {
            $val_clean = str_replace( '"', '', $v );
            $val       = $v;
            if ( strtolower( $val_clean ) == 'null' || is_integer( $val_clean ) ) {
                $val = $val_clean;
            }

            if($k == 'fct'){
                //use quotes for function names
                $val = '"' . $v . '"';
            }

            $val = strip_tags($val);

            if($val == '###'){
                $val = 0;
            }

            $code[] = "\t'$k'\t=>\t$val,";
        }
        $code[] = ');';

        $code[] = '';
        $code[] = '$params = array_merge( $default_params, $params );';
        $code[] = 'return self::sendRequestAndGetObject( $params );';
        $code[] = '';

        $code[] = "}";

        //print_r( $code );
        file_put_contents(self::$out_file, implode("\n", $code) . "\n\n", FILE_APPEND);

        //print the function:
        echo(implode("\n", $code) . "\n//------------------------\n\n");

        //self::extractParams($pre);

    }

    private static function cleanArrayVal( $ar ) {
        if ( isset( $ar['val'] ) ) {

        } else {
            return null;
        }

    }
}


/*
 * Process of importing the API from aceproject website:
 * - open the api explorer, open some category, eg. "Statistics"
 * - copy the <select><option...> and paste to html.html
 * - execute this script (php Tools.php) it will generate out.txt
 * - Copy the code generated from out.txt to the coresponding Class.
 * WARNING: This tool is not perfect but a big help when importing all the API calls.
 * I did this manually and it took me forever, this method can do this almost automatically.
 * After the import you need to check the code and rewrite it where possible.
 * For example: if the API only has one params, you don't need a $params array.
 */

//extract all arams from <select>
$re = '/(?>")(?P<fn>.+?)(?>")/';
$str = file_get_contents(__DIR__ . "/html.html");
preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);


//create new out file:
file_put_contents(Tools::$out_file, "");

foreach($matches as $match){
    $url = $match['fn'];
    $url = trim($url);
    if(empty($url)) continue;
    $url = "http://api.aceproject.com/explorer/?fct=" . $url;
    echo $url . "\n";
    Tools::importByUrl( $url);
    flush();

}

