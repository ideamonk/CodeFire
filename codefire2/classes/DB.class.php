<?php
class DB 
{
	
	var $conn_id = false;

	function DB(){

		$this->values = array();

}//DB

function connect() {
		
        $GLOBALS["DB"]->conn_id = mysql_connect(SQL_HOST, "root", "",1);
        mysql_select_db(SQL_DB,$GLOBALS["DB"]->conn_id);

}//connect
    
function disconnect(){
    	
    	if($GLOBALS["DB"]->conn_id)
    	@mysql_close($GLOBALS["DB"]->conn_id);
    	
}//disconnect
    

function execute($sql_query)
{    	
		
        if(!$GLOBALS["DB"]->conn_id)
            $this->connect();
        	
	$this->sql_result = mysql_query($sql_query,$GLOBALS["DB"]->conn_id);
        
        return $this->sql_result;

}//execute

    function insert($sql_query){

    	if((!$this->sql_result)||($sql_query != $this->sql_query)){

            $this->execute($sql_query);

        }//if

        $this->clean();
        return mysql_insert_id($GLOBALS["DB"]->conn_id);        

    }//insert
    
    function update($sql_query){

    	if((!$this->sql_result)||($sql_query != $this->sql_query)){

            $this->execute($sql_query);

        }//if

        $this->clean();
        return mysql_affected_rows($GLOBALS["DB"]->conn_id);        

    }//update

    function fetch($sql_query){

        if((!$this->sql_result)||($sql_query != $this->sql_query)){

            $this->execute($sql_query);

        }//if

        $this->sql_query = $sql_query;
        $result = @mysql_fetch_object($this->sql_result);
        if(!$result)
        	$this->clean();
        	
        return $result;

    }//fetch

    function row($sql_query){

        if((!$this->sql_result)||($sql_query != $this->sql_query)){

            $this->execute($sql_query);

        }//if

        $this->sql_query = $sql_query;
        $result = @mysql_fetch_assoc($this->sql_result);
        if(!$result)
        	$this->clean();
        	
        return $result;

    }//row

    function result($sql_query){

    	$ret_array = array();   	

        while($this->res = $this->row($sql_query)){
        	
            $ret_array[] = $this->res;

        }//while
         
        @mysql_free_result($this->res);       
        $this->clean();
        return $ret_array;

    }//result

    function single($sql_query){
    	
        $this->execute($sql_query);
        $this->clean();
        return @mysql_result($this->sql_result,0);

    }//single
    
    function lock($table){
    	
    	$sql_query="LOCK TABLES `".$table."` WRITE";
    	$this->execute($sql_query);
    	
    }//lock
    
    function unlock(){
    	
    	$sql_query="UNLOCK TABLES";
    	$this->execute($sql_query);
    	
    }//unlock
    
    function clean(){
    	
    	$this->sql_query = "";
    	
    }//clean

}//DB class

$DB = new DB;

?>