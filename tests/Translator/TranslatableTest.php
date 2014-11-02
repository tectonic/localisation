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
        $this->translatable->applyTranslation('en_GB', 'title', 'Colours');
        $this->translatable->applyTranslation('en_US', 'title', 'Colors');
    }

	public function testTranslationRetrievalForAllLanguages()
    {
        $translations = $this->translatable->getTranslations();

        $this->assertEquals('Colours', $translations['en_GB']['title']);
        $this->assertEquals('Colors', $translations['en_US']['title']);
    }

    public function testTranslationRetrievalForASpecificLanguage()
    {
        $translations = $this->translatable->getTranslations('en_GB');

        $this->assertEquals('Colours', $translations['title']);
    }
}
 