<?php

namespace Tests\Feature;

use Tests\TestCase;


class TechnicalTest extends TestCase
{

    /** @test  */
    public function array_syntax_test()
    {
        $base_64_array = [];
        $base_64_array['ID'] = 'a string';

        $this->assertEquals('a string', $base_64_array['ID']);
    }
}
