<?php
namespace Tests\Stubs;

use Tectonic\Localisation\Translator\Translations;

class TranslatableStub
{
	use Translations;

    /**
     * Returns an array of the field names that can be used for translations.
     *
     * @return array
     */
    public function getTranslatableFields()
    {
        return ['title'];
    }
}
