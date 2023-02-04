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

    public function findAllWithCategories(){
        $stmt = $this->pdo->prepare('SELECT j.*, c.name as category_name
                                     FROM job j
                                     JOIN category c ON j.categoryId = c.id
                                     ORDER BY j.closingDate DESC
                                     LIMIT 10');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    
    public function findwithCategories($categoryId = null){
        $sql = 'SELECT j.*, c.name as category_name
                FROM job j
                JOIN category c ON j.categoryId = c.id';
        if ($categoryId) {
            $sql .= ' WHERE j.categoryId = :categoryId';
        }
        $stmt = $this->pdo->prepare($sql);
        if ($categoryId) {
            $stmt->bindValue(':categoryId', $categoryId);
        }
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function runQuery($criteria) {
        $stmt = $this->pdo->prepare('INSERT INTO applicants (name, email, details, jobId, )
          VALUES (:name, :email, :details, :jobId, )');
        $stmt->execute($criteria);
      }
      
      
}