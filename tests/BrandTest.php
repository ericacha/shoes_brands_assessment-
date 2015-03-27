<?php


      /**
      * @backupGlobals disabled
      * @backupStaticAttributes disabled
      */

      require_once "src/Store.php";
      require_once "src/Brand.php";

      $DB = new PDO('pgsql:host=localhost;dbname=shoes_test');

      class BrandTest extends PHPUnit_Framework_TestCase
      {
      function test_getType()
      {
        //Arrange
        $type = "Nike";
        $id = null;
        $test_brand = new Brand($type, $id);

        //Act
        $result= $test_brand->getType();

        //Assert
        $this->assertEquals("Nike", $result);
      }

      function test_setType()
      {
        //Arrange
        $type= "Eddie Bauer";
        $id = 1;
        $test_brand = new Brand($type,$id);
        $new_type= "Puma";

        //Act
        $test_brand->setType($new_type);
        $result = $test_brand->getType();

        //Assert
        $this->assertEquals("Puma", $result);

      }
      function test_getId()
    {
      //Arrange
      $type = "Prada";
      $id = 1;
      $test_brand = new Brand($type, $id);

      //Act
      $result = $test_brand->getId();

      //Arrange
      $this->assertEquals(1, $result);
      }

      function test_setId()
      {

        //Arrange
        $type = "Prada";
        $id = 4;
        $test_brand = new Brand($type, $id);
        $new_id = 6;

        //Act
        $test_brand->setId($new_id);
        $result = $test_brand->getId();

        //Assert
        $this->assertEquals(6, $result);
      }

    }
    ?>
