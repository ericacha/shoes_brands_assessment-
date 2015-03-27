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

      function singleDelete()
      {
          $GLOBALS['DB']->exec("DELETE FROM stores WHERE id {$this->getId()};");
      }

      static function findId($id_search)
      {
          $statement = $GLOBALS['DB']->query("SELECT * FROM stores WHERE id = {$id_search};");
          $return_array = $statement->fetchAll(PDO::FETCH_ASSOC);
          $found_id = null;

          foreach($return_array as $ids)
          {
            $name = $ids['name'];
            $id = $ids['id'];
            $found_id = new Store($name, $id);

          }
          return $found_id;
      }


      static function findName($search_name)
      {
        $statement = $GLOBALS['DB']->query("SELECT * FROM stores WHERE name = '{$search_name}';");
        $return_array = $statement->fetchAll(PDO::FETCH_ASSOC);
        $found_name = null;

        foreach($return_array as $stores)
        {
          $name = $stores['name'];
          $id = $stores['id'];
          $found_name = new Store($name, $id);

        }
        return $found_name;
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
