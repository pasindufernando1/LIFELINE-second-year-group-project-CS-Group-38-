<?php

class Database extends PDO
{
    function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASSWORD)
    {
        parent::__construct($DB_TYPE . ':host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASSWORD);
    }

    function select($selection, $table, $condition, $param = null, $paramValue = null)
    {
        if ($selection == "*") {

            if ($condition == "Null") {
                $query = "SELECT * FROM " . $table;
            } else {
                $query = "SELECT * FROM " . $table . " " . $condition;
            }
            $stmt = $this->prepare($query);

            if (gettype($param) == 'array') {
                $k = 0;
                foreach ($param as $bindVal) {
                    $stmt->bindParam($bindVal, $paramValue[$k]);
                    $k = $k + 1;
                }
            }

            if (gettype($param) == 'string') {
                $stmt->bindParam($param, $paramValue);
            }

            $stmt->execute();
            $_SESSION['rowCount'] = $stmt->rowCount();
            $result = $stmt->fetchAll();
            return $result;
        } else if ($selection == 'count') {
            if ($condition == "Null") {
                $query = "SELECT * FROM " . $table;
            } else {
                $query = "SELECT * FROM " . $table . " " . $condition;
            }
            $stmt = $this->prepare($query);
            if (gettype($param) == 'array') {
                $k = 0;
                foreach ($param as $bindVal) {
                    $stmt->bindParam($bindVal, $paramValue[$k]);
                    $k = $k + 1;
                }
            }
            if (gettype($param) == 'string') {
                $stmt->bindParam($param, $paramValue);
            }
            $stmt->execute();
            $count = $stmt->rowCount();
            return $count;
        } else {
            if (gettype($selection) == 'array') {
                $query = "SELECT";
                foreach ($selection as $element) {
                    if ($element == $selection[count($selection) - 1]) {
                        $query = $query . " " . $element;
                    } else {
                        $query = $query . " " . $element . ",";
                    }
                }
            } else if (gettype($selection) == 'string') {
                $query = "SELECT " . $selection;
            }
            if ($condition == "Null") {
                $query .= " FROM " . $table;
            } else {
                $query .= " FROM " . $table . " " . $condition;
            }
            $stmt = $this->prepare($query);
            if (gettype($param) == 'array') {
                $k = 0;
                foreach ($param as $bindVal) {
                    $stmt->bindParam($bindVal, $paramValue[$k]);
                    $k = $k + 1;
                }
            }
            if (gettype($param) == 'string') {
                $stmt->bindParam($param, $paramValue);
            }

            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }
    }

    function insert($table, $columns, $param, $values)
    {
        $query = "INSERT INTO " . $table . "(";

        if (gettype($columns) == 'string' && gettype($param) == 'string') {
            $query .= "$columns) VALUES ($param);";
        } else {
            foreach ($columns as $element) {
                if ($element == $columns[count($columns) - 1]) {
                    $query .= $element;
                } else {
                    $query .= $element . ",";
                }
            }
            $query .= ") VALUES(";
            foreach ($param as $element) {
                if ($element == $param[count($columns) - 1]) {
                    $query .= $element ;
                } else {
                    $query .= $element . ",";
                }
            }
            $query .= ");";
        }
        $stmt = $this->prepare($query);
        if (gettype($param) == 'array') {
            $k = 0;
            foreach ($param as $bindVal) {
                $stmt->bindParam($bindVal, $values[$k]);
                $k = $k + 1;
            }
        }
        if (gettype($param) == 'string') {
            $stmt->bindParam($param, $values);
        }
        $result = $stmt->execute();

        if (!$result) {
            return $stmt->errorInfo();
        } else {
            return "Success";
        }
    }

    function update($table, $columns, $columnParam,$columnValue, $conditionParam, $conditionValue, $condition = null)
    {
        $query = "UPDATE " . $table . " SET ";

        if (gettype($columns) == 'string' && gettype($columnParam) == 'string') {
            $query .=  "$columns = $columnParam";
            
        } else if (gettype($columns) == 'array' && gettype($columnParam) == 'array') {
            for ($i = 0; $i <= count($columns) - 1; $i++) {
                if ($i == count($columns) - 1) {
                    $query .= $columns[$i] . " = " . $columnParam[$i];
                } else {
                    $query .= $columns[$i] . " = " . $columnParam[$i] . ", ";
                }
            }
        }

        $query .= " " . $condition;
        $stmt = $this->prepare($query);
       
        if (gettype($columnParam) == 'array') {
            $k = 0;
            foreach ($columnParam as $bindVal) {
                $stmt->bindParam($bindVal, $columnValue[$k]);
                $k = $k + 1;
            }
        }
        if (gettype($columnParam) == 'string') {
            $stmt->bindParam($columnParam, $columnValue);
        }

        if (gettype($conditionParam) == 'array') {
            $k = 0;
            foreach ($conditionParam as $bindVal) {
                $stmt->bindParam($bindVal, $conditionValue[$k]);
                $k = $k + 1;
            }
        }
        if (gettype($conditionParam) == 'string') {
            $stmt->bindParam($conditionParam, $conditionValue);
        }

        $result = $stmt->execute();

        if (!$result) {
            return $stmt->errorInfo();
        } else {
            return "Success";
        }
    }


    function delete($table, $condition, $param , $paramValue)
    {
        $query = "DELETE FROM " . $table . " " . $condition;
        
        $stmt = $this->prepare($query);

        if (gettype($param) == 'array') {
            $k = 0;
            foreach ($param as $bindVal) {
                $stmt->bindParam($bindVal, $paramValue[$k]);
                $k = $k + 1;
            }
        }

        if (gettype($param) == 'string') {
            $stmt->bindParam($param, $paramValue);
        }

        $result = $stmt->execute();

        if (!$result) {
            return $stmt->errorInfo();
        } else {
            return "Success";
        }
    }
}