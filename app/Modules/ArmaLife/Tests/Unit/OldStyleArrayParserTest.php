<?php

namespace App\Modules\ArmaLife\Tests\Unit;

use Tests\TestCase;
use App\Modules\ArmaLife\Services\ArrayParser;

class OldStyleArrayParserTest extends TestCase
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

    public function testLicenseParsing()
    {
        $licences = $this->arrayParser->licences(
            '"[[`license_civ_driver`,1],[`license_civ_air`,0],[`license_civ_oil`,0]]"'
        );
        $this->assertNotFalse($licences);
        $this->assertEquals(3, count($licences));
        $this->assertSame([
            'id' => 'license_civ_driver',
            'name' => 'license.license_civ_driver',
            'status' => 1
        ], $licences[0]);
    }

    public function testInventoryParsing()
    {
        $testString = "[`U_Rangemaster`,`V_TacVest_blk_POLICE`],``,`hgun_P07_snds_F`,[],[`30Rnd_9x21_Mag`]," .
            "[`Medikit`],[],[],[`30Rnd_9x21_Mag`,`30Rnd_9x21_Mag`],[``,``,``,``],[`muzzle_snds_L`,``,``,``]," .
            "[`life_inv_donuts`,`life_inv_handcuffkeys`]]";
        $inventory = $this->arrayParser->inventory($testString);
        $this->assertNotFalse($inventory);
        $this->assertEquals(8, count($inventory));
        $this->assertSame([
            'id' => 'U_Rangemaster',
            'name' => 'item.U_Rangemaster',
            'count' => 1
        ], $inventory[0]);

        $this->assertSame([
            'id' => '30Rnd_9x21_Mag',
            'name' => 'item.30Rnd_9x21_Mag',
            'count' => 3
        ], $inventory[3]);
    }
}
