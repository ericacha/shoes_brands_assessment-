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



    }


?>
