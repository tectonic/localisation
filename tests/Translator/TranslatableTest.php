<?php
namespace Tests\Translator;

use Tests\Stubs\TranslatableStub;
use Tests\TestCase;

class TranslatableTest extends TestCase
{
    private TranslatableStub $translatable;

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
        $this->assertEquals(['title', 'options'], $this->translatable->getTranslatableFields());
    }

    public function testAddTranslation()
    {
        $this->translatable->addTranslation('en_GB', 'title', 'The title');
        $this->assertArrayHasKey('en_GB', $this->translatable->translated);
        $this->assertArrayHasKey('title', $this->translatable->translated['en_GB']);
        $this->assertEquals('The title', $this->translatable->translated['en_GB']['title']);
    }
    
    public function testTranslatableSetter()
    {
        $this->translatable->addTranslation('en_GB', 'options', 'Option 1,Option2');
        $this->assertEquals(['Option 1', 'Option2'], $this->translatable->translated['en_GB']['options']);
    }
}
