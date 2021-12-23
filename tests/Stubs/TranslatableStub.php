<?php
namespace Tests\Stubs;

use Tectonic\Localisation\Translator\Translations;

class TranslatableStub
{
	use Translations;

    /**
     * Returns an array of the field names that can be used for translations.
     */
    public function getTranslatableFields(): array
    {
        return ['title', 'options'];
    }

    /**
     * Translated property setter
     */
    protected function setTranslatedOptionsProperty($value): array
    {
        return explode(',', $value);
    }
}
