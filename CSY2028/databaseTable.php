<?php
namespace CSY2028;
class DatabaseTable {
    private $pdo;
    private $table;
    private $primaryKey;

    public function __construct($pdo, $table, $primaryKey){
        $this->pdo = $pdo;
        $this->table = $table;
        $this->primaryKey = $primaryKey;
    }

    public function find($field, $value){
        $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' = :value');

        $criteria = [
            'value' => $value
        ];
        $stmt->execute($criteria);

        return $stmt->fetchAll();
    }

    public function findAll(){
        $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table );
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function insert($record){
        // generic insert function that should work for any table/ schema
        $keys = array_keys($record);
    
        $values = implode(', ', $keys);
        $placeholderValues = implode(', :', $keys);
    
        $query = 'INSERT INTO ' . $this->table . ' (' . $values . ') VALUES (:' . $placeholderValues . ')';
        $stmt = $this->pdo->prepare($query);
    
        $stmt->execute($record);
    }

    public function update($record){
        $query = 'UPDATE ' . $this->table . ' SET ';
    
        $parameters = []; // will store the key values (column name, placeholder, data)
        foreach ($record as $key => $value){
            $parameters[] = $key . ' = :' . $key;
        }
    
        $query .= implode(', ', $parameters);
        $query .= ' WHERE ' . $this->primaryKey . '= :primaryKey';
    
        $record['primaryKey'] = $record[$this->primaryKey];
    
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($record);
    }
    
    public function save($record) {
        // combine insert & update functions using try/catch
        // this will always run the insert function, if that fails (record exists) then it will run the update function
        try {
            $this->insert($record);
        }
        catch (\Exception $e) {
            $this->update($record);
        }
    }

    public function delete($id){
        $stmt = $this->pdo->prepare('DELETE FROM ' . $this->table . ' WHERE ' . $this->primaryKey . ' = :id');
        $values = [
            'id' => $id
        ];
        $stmt->execute($values);
    }


}