<?php

namespace App\Modules\ArmaLife\Tests\Unit;

use App\Modules\ArmaLife\Services\ArrayParser;
use Tests\TestCase;

class ArrayParserTest extends TestCase
{
    /** @var ArrayParser $arrayParser */
    protected $arrayParser;

    public function setUp()
    {
        $this->arrayParser = new ArrayParser();
        parent::setUp();
    }

    public function testNormalAliases()
    {
        $aliases = $this->arrayParser->aliases('"[`Homer Simpson`]"');
        $this->assertEquals(1, count($aliases), 'Not enough aliases where given');
        $this->assertEquals('Homer Simpson', $aliases[0]);
    }

    public function testUnicodeAliases()
    {
        $aliases = $this->arrayParser->aliases('"[`Mr ☃ likes snow`]"');
        $this->assertEquals(1, count($aliases), 'Not enough aliases where given');
        $this->assertEquals('Mr ☃ likes snow', $aliases[0]);
    }

    public function testMultipleAliases()
    {
        $aliases = $this->arrayParser->aliases('"[`Mr cyberworks`],[`Mr broke cyberworks`]"');
        $this->assertEquals(2, count($aliases), 'Not enough aliases where given');
        $this->assertEquals('Mr cyberworks', $aliases[0]);
        $this->assertEquals('Mr broke cyberworks', $aliases[1]);
    }

    public function testBrokenAliases()
    {
        $aliases = $this->arrayParser->aliases('"[`Mr snowman` broke cyberworks`]"');
        $this->assertEquals(1, count($aliases), 'Not enough aliases where given');
        $this->assertEquals('Mr snowman', $aliases[0]);

        $aliases = $this->arrayParser->aliases('"[`Mr snowman` broke `cyberworks`]"');
        $this->assertEquals(2, count($aliases), 'Not enough aliases where given');
        $this->assertEquals('Mr snowman', $aliases[0]);
        $this->assertEquals('cyberworks', $aliases[1]);
    }

    public function testPositionParsing()
    {
        $position = $this->arrayParser->position('"[3,0,26]"');
        $this->assertSame([
            'x' => '3',
            'y' => '0',
            'z' => '26'
        ], $position);
    }

    public function testTimeParsing()
    {
        $position = $this->arrayParser->time('"[622,3123,123]"');
        $this->assertSame([
            'cop' => '622',
            'med' => '3123',
            'civ' => '123'
        ], $position);
    }

    public function testStatsParsing()
    {
        $position = $this->arrayParser->stats('"[432,982,412]"');
        $this->assertSame([
            'health' => '432',
            'water' => '982',
            'stamina' => '412'
        ], $position);
    }

    public function testIsEmpty()
    {
        $this->assertTrue($this->arrayParser->isEmpty('"[]"'));
        $this->assertTrue($this->arrayParser->isEmpty(''));
        $this->assertTrue($this->arrayParser->isEmpty(null));
        $this->assertFalse($this->arrayParser->isEmpty('"[312]"'));
    }
}
