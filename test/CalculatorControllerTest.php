<?php

class CalculatorControllerTest extends UnitTestCase {

    public function testAdd() {
        $equals = $this->class->add(1,2);
        $this->assertEquals(3,$equals);
    }
}
