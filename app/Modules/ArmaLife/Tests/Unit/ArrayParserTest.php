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
        $this->assertSame(['Homer Simpson'], $aliases);
    }

    public function testUnicodeAliases()
    {
        $aliases = $this->arrayParser->aliases('"[`Mr ☃ likes snow`]"');
        $this->assertSame(['Mr ☃ likes snow'], $aliases);
    }

    public function testMultipleAliases()
    {
        $aliases = $this->arrayParser->aliases('"[`Mr cyberworks`],[`Mr broke cyberworks`]"');
        $this->assertSame(['Mr cyberworks', 'Mr broke cyberworks'], $aliases);
    }

    public function testBrokenAliases()
    {
        $aliases = $this->arrayParser->aliases('"[`Mr snowman` broke cyberworks`]"');
        $this->assertSame(['Mr snowman', ' broke cyberworks'], $aliases);

        $aliases = $this->arrayParser->aliases('"[`Mr snowman` broke `cyberworks`]"');
        $this->assertSame(['Mr snowman', ' broke ', 'cyberworks'], $aliases);
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

    public function testNewArray()
    {
        $aliases = $this->arrayParser->aliases('["Mr snowman"]');
        $this->assertSame(['Mr snowman'], $aliases);
    }
}
