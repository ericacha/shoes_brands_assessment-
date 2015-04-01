<?php

    class Brand
    {
      private $type;
      private $id;

      function __construct($type, $id)
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
        $this->type = $new_type;
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
        $statement = $GLOBALS['DB']->query("INSERT INTO brand (type) VALUES ('{$this->getType()}') RETURNING id;");
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $this->setId($result['id']);

      }

      function updateType($new_type)
      {
        $GLOBALS['DB']->query("UPDATE brand SET type = '{$this->getType()}';");
        $this->setType($new_type);
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


      static function getAll()
      {
        $statement = $GLOBALS['DB']->query("SELECT * FROM brand;");
        $brand_array = $statement->fetchAll(PDO::FETCH_ASSOC);

        $return_array = array();

        foreach($brand_array as $brand)
        {
          $type = $brand['type'];
          $id = $brand['id'];
          $new_brand = new Store($type,$id);
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
