<?php
namespace Tectonic\Localisation\Contracts;

interface TranslatableInterface
{
    /**
     * Apply the translation to this particular object.
     *
     * @param string $languageCode
     * @param string $field
     * @param mixed $value
     */
    public function applyTranslation($languageCode, $field, $value);
}
