<?php
namespace Tectonic\Shift\Modules\Localisation\Translator\Eloquent;

trait Translatable
{
    /**
     * Stores the translations for each locale, field and value. Arrays look like so:
     *
     * ['en_GB' => ['field' => 'value']];
     *
     * @var array
     */
    public $translations = [];

    /**
     * Applies a given translation to the localised attributes on the entity.
     *
     * @param string $code
     * @param string $field
     * @param string $value
     */
    public function applyTranslation($code, $field, $value)
    {
        $this->translations[$code][$field] = $value;
    }
}
