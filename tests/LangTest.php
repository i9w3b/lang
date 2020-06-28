<?php

declare(strict_types=1);

namespace I9w3b\Lang;

use PHPUnit\Framework\TestCase;

class LangTest extends TestCase
{
    /**
     * @var Lang
     */
    protected $lang;

    protected function setUp() : void
    {
        $this->lang = new Lang;
    }

    public function testIsInstanceOfLang() : void
    {
        $actual = $this->lang;
        $this->assertInstanceOf(Lang::class, $actual);
    }

}
