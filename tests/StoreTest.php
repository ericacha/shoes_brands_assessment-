<?php


    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Store.php";

    $DB = new PDO('pgsql:host=localhost;dbname=shoe_test');

    class StoreTest extends PHPUnit_Framework_TestCase

    {
      // protected function tearDown()
      //   {
      //       Store::deleteAll();
      //   }


      function test_getName()
      {
        //Arrange
        $name = "Nike";
        $id = null;
        $test_store = new Store($name, $id);

        //Act
        $result= $test_store->getName();

        //Assert
        $this->assertEquals("Nike", $result);
      }

      function test_setName()
      {
        //Arrange
        $name = "Eddie Bauer";
        $id = 1;
        $test_store = new Store($name,$id);
        $new_name = "Puma";

        //Act
        $test_store->setName($new_name);
        $result = $test_store->getName();

        //Assert
        $this->assertEquals("Puma", $result);

      }

        function test_getId()
      {
        //Arrange
        $name = "Prada";
        $id = 1;
        $test_store = new Store($name, $id);

        //Act
        $result = $test_store->getId();

        //Arrange
        $this->assertEquals(1, $result);
        }

        function test_setId()
        {

          //Arrange
          $name = "Prada";
          $id = 4;
          $test_store = new Store($name, $id);
          $new_id = 6;

          //Act
          $test_store->setId($new_id);
          $result = $test_store->getId();

          //Assert
          $this->assertEquals(6, $result);
        }

      }
?>
