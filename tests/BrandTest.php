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
          protected function tearDown()
            {
                Store::deleteAll();
                Brand::deleteAll();
            }

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

      function test_save()
      {
        //Arrange
        $type = "Louis Vutton";
        $id = 1;
        $test_brand = new Brand($type, $id);
        $test_brand->save();


        //Act
        $result = Brand::getAll();

        //Assert
        $this->assertEquals([$test_brand], $result);

      }

      function test_getAll()
      {
        //Arrange
        $type = "Coach";
        $test_brand = new Brand($type);
        $test_brand->save();

        $type1 = "Gucci";
        $test_brand1 = new Brand ($type1);
        $test_brand1->save();

        //Act
        $result = Brand::getAll();

        //Assert
        $this->assertEquals([$test_brand, $test_brand1], $result);
      }





      function test_deleteAll()
      {
        //Arrange
        $type = "Prada";
        $id = 1;
        $test_brand = new Brand($type, $id);
        $test_brand->save();

        $type1 = "Coach";
        $id1 = 2;
        $test_brand1 = new Brand($type1, $id1);
        $test_brand->save();

        //Act
        Brand::deleteAll();
        $result = Brand::getAll();

        //Assert
        $this->assertEquals([], $result);

      }

      function test_findType()
      {
        $type = "Gucci";
        $id = 2;
        $test_brand = new Brand($type, $id);
        $test_brand->save();

        $type1 = "Prada";
        $id1 = 3;
        $test_brand1 = new Brand($type1, $id1);
        $test_brand1->save();

        $type_search = "Prada";

        //Act

        $result = Brand::findType($type_search);

        //Arrange
        $this->assertEquals($test_brand1, $result);
      }

      function test_updateType()
      {
        //Arrange
        $type = "Coach";
        $id = 1;
        $test_brand = new Brand($type, $id);
        $test_brand->save();

        //Act
        $new_type= "Gucci";
        $test_brand->updateType($new_type);
        $result = $test_brand->getType();

        //Assert
        $this->assertEquals("Gucci", $result);
      }

      function test_findId()
      {
        $type = "Payless";
        $id = 2;
        $test_brand = new Brand($type, $id);
        $test_brand->save();

        $type1 = "Prada";
        $id1 = 3;
        $test_brand1 = new Brand($type1, $id1);
        $test_brand1->save();



        //Act
        $result = Brand::findId($test_brand1->getId());

        //Arrange
        $this->assertEquals($test_brand1, $result);

      }







    }
    ?>
