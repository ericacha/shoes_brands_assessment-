<?php

    class Brand
    {
      private $type;
      private $id;

      function __construct($type, $id = null)
      {
          $this->type = $type;
          $this->id = $id;
      }

      function getType()
      {
        return $this->type;
      }

      function setType($new_type)
      {
        $this->type = (string) $new_type;
      }

      function getId()
      {
          return $this->id;
      }

      function setId($new_id)
      {
        $this->id = (int)$new_id;
      }

      function save()
      {
        $statement = $GLOBALS['DB']->query("INSERT INTO brand(type) VALUES ('{$this->getType()}') RETURNING id;");
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $this->setId($result['id']);
      }

      function updateType($new_type)
      {
        $GLOBALS['DB']->query("UPDATE brand SET type = '{$this->getType()}';");
        $this->setType($new_type);
      }

      function addStore($store)
      {

        if(!in_array($store, $this->getStore())){
          $GLOBALS['DB']->exec("INSERT INTO stores_brands (store_id, brand_id) VALUES ({$store->getId()}, {$this->getId()});");
        }
      }


      function getStore()
      {
        $query = $GLOBALS['DB']->query("SELECT store.* FROM brand JOIN stores_brands ON (stores_brands.brand_id = brand.id) JOIN store ON (stores_brands.store_id = store.id) WHERE brand.id = {$this->getId()};");
        $query_fetch = $query->fetchAll(PDO::FETCH_ASSOC);
        $return_array = array();

        foreach ($query_fetch as $stores)
        {
          $new_name = $stores['name'];
          $new_id = $stores['id'];
          $new_store = new Store($new_name, $new_id);
          array_push($return_array, $new_store);

        }
          return $return_array;
        }

      static function findType($search_type)
      {
        $statement = $GLOBALS['DB']->query("SELECT * FROM brand WHERE type = '{$search_type}';");
        $return_array = $statement->fetchAll(PDO::FETCH_ASSOC);
        $found_type = null;

        foreach($return_array as $brands)
        {
          $type = $brands['type'];
          $id = $brands['id'];
          $found_type = new Brand($type, $id);

        }
        return $found_type;
      }
      static function findId($id_search)
      {
          $statement = $GLOBALS['DB']->query("SELECT * FROM brand WHERE id = {$id_search};");
          $return_array = $statement->fetchAll(PDO::FETCH_ASSOC);
          $found_id = null;

          foreach($return_array as $ids)
          {
            $type = $ids['type'];
            $id = $ids['id'];
            $found_id = new Brand($type, $id);

          }
          return $found_id;
      }


      static function getAll()
      {
        $statement = $GLOBALS['DB']->query("SELECT * FROM brand;");
        $brand_array = $statement->fetchAll(PDO::FETCH_ASSOC);

        $return_array = array();

        foreach($brand_array as $brand)
        {
          $type = $brand['type'];
          $id = $brand['id'];
          $new_brand = new Brand($type,$id);
          array_push($return_array, $new_brand);

        }
        return $return_array;
      }

      static function deleteAll()
      {
        $GLOBALS['DB']->exec("DELETE FROM brand *;");
      }




    }


?>
