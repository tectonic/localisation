<?php
namespace Tests\Translator;

use Tests\Stubs\TranslatableStub;
use Tests\TestCase;

class TranslatableTest extends TestCase
{
    private $translatable;

    public function init()
    {
        $this->translatable = new TranslatableStub;
    }

	public function testTranslatableResource()
    {
        $this->assertEquals('TranslatableStub', $this->translatable->getResourceName());
    }

    public function testTranslatableFields()
    {
        $this->assertEquals(['title'], $this->translatable->getTranslatableFields());
    }
}
 