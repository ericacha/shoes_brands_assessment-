<?php


    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Store.php";

    $DB = new PDO('pgsql:host=localhost;dbname=shoe_test');

    class StoreTest extends PHPUnit_Framework_TestCase

    {
      protected function tearDown()
        {
            Store::deleteAll();
        }


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

        function test_getAll()
        {
          //Arrange
          $name = "Prada";
          $id = 3;
          $test_store = new Store($name, $id);
          $test_store->save();

          $name1 = "Nike";
          $id1 = 4;
          $test_store1 = new Store($name1, $id1);
          $test_store1->save();

          //Act
          $result = Store::getAll();

          //Assert
          $this->assertEquals([$test_store, $test_store1], $result);
        }

        function test_save()
        {
          //Arrange
          $name = "Louis Vutton";
          $id = 1;
          $test_store = new Store($name, $id);
          $test_store->save();


          //Act
          $result = Store::getAll();

          //Assert
          $this->assertEquals([$test_store], $result);

        }

        function test_deleteAll()
        {
          //Arrange
          $name = "Prada";
          $id = 1;
          $test_store = new Store($name, $id);
          $test_store->save();

          $name1 = "Coach";
          $id1 = 2;
          $test_store1 = new Store($name1, $id1);
          $test_store->save();

          //Act
          Store::deleteAll();
          $result = $test_store->getAll();

          //Assert
          $this->assertEquals([], $result);

        }

        function test_updateName()
        {
          //Arrange
          $name = "Coach";
          $id = 1;
          $test_store = new Store($name, $id);
          $test_store->save();

          //Act
          $new_name = "Gucci";
          $test_store->updateName($new_name);
          $result = $test_store->getName();

          //Assert
          $this->assertEquals("Gucci", $result);
        }

        function test_findName()
        {
          $name = "Gucci";
          $id = 2;
          $test_store = new Store($name, $id);
          $test_store->save();

          $name1 = "Prada";
          $id1 = 3;
          $test_store1 = new Store($name1, $id1);
          $test_store1->save();

          $name_search = "Prada";

          //Act

          $result = Store::findName($name_search);

          //Arrange
          $this->assertEquals($test_store1, $result);
        }


      }
?>
