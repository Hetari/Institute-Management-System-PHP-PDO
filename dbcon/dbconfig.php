<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


$dsn = 'mysql:host=localhost;dbname=ims';
$user = 'root';
$pass = '';
$option = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

try {
    $con = new PDO($dsn, $user, $pass, $option);
} catch (PDOException $e) {
    echo $e->getMessage();
}

function queries($statement)
{
    global $con;
    $stat = $con->prepare($statement);
    $stat->execute();
    $result = $stat->fetchAll();
    return $result;
}


/**
 * Adds a new row to the specified table with the given column-value pairs.
 *
 * @param string $table The name of the table to add the row to.
 * @param mixed ...$args The column-value pairs to insert into the table.
 * @return bool Returns true if the row was successfully added, false otherwise.
 */
function add($table, ...$args)
{
    try {
        global $con;

        // Separate the columns and values from the given arguments
        $columns = array();
        $values = array();
        $index = 0;
        foreach ($args as $key => $value) {
            if ($index % 2 == 0)
                array_push($columns, $value);
            else
                array_push($values, $value);
            $index++;
        }

        // Prepare the SQL statement
        $columns = implode(', ', $columns);
        $placeholders = rtrim(str_repeat('?, ', count($values)), ', ');
        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";
        $stmt = $con->prepare($sql);

        // Execute the statement with the values array
        $stmt->execute(array_values($values));

        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

/**
 * Selects data from a database table based on given conditions.
 *
 * @param string $table The name of the table to select from.
 * @param array $conditions An array of conditions to filter the selection. Each condition is an associative array with the column name as the key and the value or an array of [operator, value] as the value.
 * @param string|array $columns The columns to select. Defaults to '*' to select all columns.
 *
 * @return array|false Returns an array of selected rows as associative arrays, or an empty array if no rows are found. Returns false if there was an error.
 */
function select($table, $conditions = array(), $columns = '*')
{
    try {
        global $con;

        // Build the WHERE clause
        $where = '';
        $values = array();
        if (!empty($conditions)) {
            $where = 'WHERE ';
            $conditionsArr = array();
            foreach ($conditions as $condition) {
                $column = key($condition);
                $value = $condition[$column];

                // Handle different comparison operators
                $operator = '=';
                if (is_array($value)) {
                    [$operator, $value] = $value;
                }

                $conditionsArr[] = "{$column} {$operator} ?";
                $values[] = $value;
            }
            $where .= implode(' AND ', $conditionsArr);
        }

        // Build the SQL statement
        $sql = "SELECT {$columns} FROM {$table} {$where}";
        $stmt = $con->prepare($sql);

        // Execute the statement with the values array
        $stmt->execute($values);

        if ($stmt->rowCount())
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        return array();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}


/**
 * Updates a record in the specified table.
 *
 * @param string $tableName The name of the table.
 * @param array $data An associative array containing the column names as keys and the corresponding values to update.
 * @param int $id The ID of the record to update.
 * @return bool True if the update was successful, false otherwise.
 */
function update($tableName, $data, $id)
{
    global $con;

    try {
        // Prepare the update query
        $updateQuery = "UPDATE {$tableName} SET ";
        $updateValues = array();

        // Build the set clause
        foreach ($data as $column => $value) {
            $updateValues[] = "{$column} = :{$column}";
        }

        $updateQuery .= implode(', ', $updateValues);
        $updateQuery .= " WHERE id = :id";

        // Prepare the statement
        $stmt = $con->prepare($updateQuery);

        // Bind the values
        foreach ($data as $column => $value) {
            $stmt->bindValue(":{$column}", $value);
        }

        $stmt->bindValue(":id", $id);

        // Execute the update query
        $result = $stmt->execute();

        // Check if the update was successful
        if ($result) {
            return true;
        }
        return false;
    } catch (PDOException $e) {
        return false;
    }
}


/**
 * Deletes a record from the specified table with the given ID.
 *
 * @param string $tableName The name of the table to delete from.
 * @param int $id The ID of the record to delete.
 * @return bool True if the deletion was successful, false otherwise.
 */
function delete($tableName, $id)
{
    global $con;
    try {
        // Prepare the delete query
        $deleteQuery = "DELETE FROM {$tableName} WHERE id = ?";
        // Prepare the statement
        $stmt = $con->prepare($deleteQuery);
        // Bind the value
        $values = [$id];
        $stmt->execute($values); // Execute the statement with the values array
        // Execute the delete query
        $result = $stmt->execute();
        // Return true if the deletion was successful, false otherwise
        return $result;
    } catch (PDOException $e) {
        // Print the error message
        echo "Error: " . $e->getMessage();
    }
    return false;
}
