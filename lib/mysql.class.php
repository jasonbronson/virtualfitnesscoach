<?php
/**
 *
 * added by Jason Bronson
 * 09/04/2007
 */

class mysqlclass
{

  //DEFAULT VARIABLES CAN BE OVERRIDEN

  var $query;
  var $rowstoreturn;
  var $database;
  var $user;
  var $pass;
  var $host;
  var $results = "";
  var $rows_expected = "";
  var $link = ""; //database Link
  var $num_rows = "";
  var $errorclass;

  /**
   * default constructor called
   *
   * @return nothing except errors on execution
   */
  function __construct() {

    $mysql_array = sfYaml::load(SF_ROOT_DIR.'/config/mysql.yml');
    //print_r($mysql_array);
    $this->database = $mysql_array['database']['databasename'];
    $this->user = $mysql_array['database']['username'];
    $this->pass = $mysql_array['database']['password'];
    $this->host = $mysql_array['database']['hostname'];
    $this->environment = $mysql_array['database']['environment'];

    $this->mysqlconnect(); //connect to database
    $this->mysqlselectdb(); //select database to use

    $this->getInstance = sfContext::getInstance();

  }

  function __destruct(){

    if(is_resource($this->results['mysqlresults']))
    mysql_free_result($this->results['mysqlresults']);

    $this->results = ""; //safety net
  }


  /**
   *
   * HOWTO: $mysqlclass->query($query, $rows_expected_return);
   *        $mysqlclass->query("select * from test", 1);
   * set $this->$query
   *
   * @return results
   */
  public function mysqlquery($query, $rows_expected='', $responseexpected = false){

    $logger = sfLogger::getInstance();

    $results = mysql_query($query); //run query 
	
    
    if(stripos($query, "SELECT") !== false){
    	$rows = mysql_num_rows($results);
    	$logdata = " *ROWS RETURNED* $rows*";
    }
    
    if(!$results)
        $logdata .= " \n ERROR ".mysql_error($results);
    
    $logger->log("$query $logdata ", SF_LOG_DEBUG);
   
    
    //LOG QUERY
  /*  $logquery = addslashes($query);
  $lookfor = array("insert", "update", "delete");
  foreach($lookfor as $value){
   if(strpos(strtolower($query), $value) !== FALSE){
    $log_results = mysql_query("INSERT INTO log SET dt=now(), logmessage='$logquery'");
    $logger->log("********* LOGGING **************************");
   }
  }*/


    $counter = 0;

    if($rows_expected){ //we are expected to return rows
      /*if($rows_expected != mysql_num_rows($results)) //check rows match or error
      throw new Exception("ROWS DO NOT MATCH... Total rows returned Total " . $results['num_rows'] . " & Expected were : $rows_expected ", 9);*/
      $logger->log("ERROR: Mysql ROWS DO NOT MATCH", SF_LOG_DEBUG);
    }

    $rows = mysql_num_rows($results);
    
        $ticket = rand(9,912345);
        $timestamp = date("d-m-Y H:i");
      $modulename = $this->getInstance->getModuleName();
      $actionname = $this->getInstance->getActionName();

      if(!$results){
        $logger->log("TICKET $ticket MYSQL ERROR.  $query ".mysql_error(), SF_LOG_ERR);
        mail("jasonbronson@gmail.com","ERROR ticket $ticket AT $timestamp {$this->environment}", "Module:$modulename Action:$actionname \n SQL $query \n ".mysql_error());

        /*die("An SQL Error has occured please don't be alarmed
        <br>I've emailed this to the webmaster automatically for review
        <b>Module:$modulename Action:$actionname </b><br>$query<br> ".mysql_error());*/

        if($responseexpected == true)
        return "false";
      }else{
       //$logger->log("Response from MYSQL QUERY WAS SUCCESSFUL \n $query", SF_LOG_DEBUG);
       if($responseexpected == true)
         return "true";
      }



	
    return $results;

  }


  /**
   * connects our database function
   * creates a $this->Link resource
   * @return unknown
   */
  private function mysqlconnect(){
    $this->link = mysql_connect($this->host, $this->user, $this->pass);
    if(!$this->link)
      die("Could not connect: " . mysql_error());
  }

  /**
   * select which database we need
   *
   * @return unknown
   */
  private function mysqlselectdb(){
    $selectdb = mysql_select_db($this->database);

    if(!$selectdb)
    die("Could not select database :".$this->database);
  }

}

