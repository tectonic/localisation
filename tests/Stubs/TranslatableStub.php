<?php
namespace Tests\Stubs;

use Tectonic\Localisation\Translator\Translatable;

class TranslatableStub
{
	use Translatable;

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
