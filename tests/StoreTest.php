<?php


    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Store.php";

    $DB = new PDO('pgsql:host=localhost;dbname=shoes_test');

    class StoreTest extends PHPUnit_Framework_TestCase

    {
      protected function tearDown()
        {
            Store::deleteAll();
            Brand::deleteAll();
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
          $result = Store::getAll();

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

        function test_findId()
        {
          $name = "Payless";
          $id = 2;
          $test_store = new Store($name, $id);
          $test_store->save();

          $name1 = "Prada";
          $id1 = 3;
          $test_store1 = new Store($name1, $id1);
          $test_store1->save();



          //Act
          $result = Store::findId($test_store1->getId());

          //Arrange
          $this->assertEquals($test_store1, $result);

        }

        function test_singleDelete()
        {
          //Arrange
          $name = "Gucci";
          $id = 2;
          $test_store = new Store($name, $id);
          $test_store->save();

          //Act
          $test_store->singleDelete();
          $result = Store::getAll();

          //Assert
          $this->assertEquals([$test_store], $result);
        }

        function test_addBrand()
        {
          //Arrange
          $type = "Puma";
          $test_store = new Store($type);
          $test_store->save();

          $name = "Prada";
          $id = 3;
          $test_brand = new Brand($name, $id);
          $test_brand->save();

          //Act
          $test_store->addBrand($test_brand);
          $result = $test_store->getBrand();

          //Assert
          $this->assertEquals([$test_brand], $result);
        }

        function test_getBrand()
        {
          //Arrange
          $name = "Prada";
          $id = 2;
          $test_store = new Store($name, $id);
          $test_store->save();

          $type = "Gucci";
          $id = 4;
          $test_brand = new Brand($type, $id);
          $test_brand->save();

          $type3 = "Hello";
          $id3 = 4;
          $test_brand3 = new Brand($type3,$id3);
          $test_brand3->save();

          //Act
          $test_store->addBrand($test_brand);
          $test_store->addBrand($test_brand3);
          $result = $test_store->getBrand();

          //Assert
          $this->assertEquals([$test_brand, $test_brand3], $result);

        }







      }
?>
