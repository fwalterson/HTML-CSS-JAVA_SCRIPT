<?php

//Variáveis de acesso Db
define('DB_SERVER', 'localhost');
define('DB_NAME', 'hotel');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
//inicio da classe de conexao
class Conexao {
    var $db, $conn;
    public function __construct($server, $database, $username, $password){
        $this->conn = mysql_connect($server, $username, $password);
        $this->db = mysql_select_db($database,$this->conn);
    }

    
    private function executar($sql) { 
       $return_result = mysql_query($sql, $this->conn); 
   
       if ($return_result) { 
           return $return_result; } 
       else { $this->sql_error($sql); 
       } 
    }
    
    
    private function sql_error($sql) { 
       echo mysql_error($this->conn) . '<br>'; 
       die('error: ' . $sql); 
    }

    public function insert($tabela, $dados) {
        foreach ($dados as $key => $value) {
            $keys[] = $key;
            $insertvalues[] = '\'' . $value . '\'';
        }
        $keys = implode(',', $keys);
        $insertvalues = implode(',', $insertvalues);
        $sql = "INSERT INTO $tabela ($keys) VALUES ($insertvalues)";
        return $this->executar($sql);
    }
   
    public function update($tabela, $colunaPrimay, $id, $dados) {
        foreach ($dados as $key => $value) {
            $sets[] = $key . '=\'' . $value . '\'';
        }
        $sets = implode(',', $sets);
        $sql = "UPDATE $tabela SET $sets WHERE $colunaPrimay = '$id'";
        return $this->executar($sql); 
    }

    public function delete($tabela, $colunaPrimay, $id) {
        $sql = "DELETE FROM $tabela WHERE upper($colunaPrimay) = $id ";
        return $this->executar($sql); 
    }
    
    public function select($tabela, $colunas = "*") {
        $sql = "SELECT $colunas FROM $tabela";
        $result = $this->executar($sql);
        while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            $return[] = $row;
        }
        return $return;
    }

    public function selectUpdate($tabela, $colunaPrimay, $id) {
        
        $sql = "SELECT * FROM $tabela where $colunaPrimay = $id ";
        $result = $this->executar($sql);
        /*while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            $return[] = $row;
        }*/
        $row = mysql_fetch_array($result, MYSQL_ASSOC);
        return $row;       
    }
    
 }

?>