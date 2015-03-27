<?php

    class Store
    {

      private $name;
      private $id;

      function __construct($name, $id = null)
      {

          $this->name = $name;
          $this->id = $id;
      }


      function getName()
      {
        return $this->name;
      }

      function setName($new_name)
      {
        $this->name = $new_name;
      }

      function getId()
      {
          return $this->id;
      }

      function setId($new_id)
      {
        $this->id = $new_id;
      }

      function save()
      {
        $statement = $GLOBALS['DB']->query("INSERT INTO stores(name) VALUES ('{$this->getName()}') RETURNING id;");
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $this->setId($result['id']);


      }

      function updateName($new_name)
      {
        $GLOBALS['DB']->query("UPDATE stores SET name = '{$this->getName()}';");
        $this->setName($new_name);
      }

      static function getAll()
      {
        $statement = $GLOBALS['DB']->query("SELECT * FROM stores;");
        $store_array = $statement->fetchAll(PDO::FETCH_ASSOC);

        $return_array = array();

        foreach($store_array as $store)
        {
          $name = $store['name'];
          $id = $store['id'];
          $new_store = new Store($name,$id);
          array_push($return_array, $new_store);

        }
        return $return_array;
      }

      static function deleteAll()
      {
        $GLOBALS['DB']->exec("DELETE FROM stores *;");
      }









    }



?>
