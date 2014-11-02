<?php
namespace Tectonic\Localisation\Translator;

trait Translatable
{
    /**
     * Stores the translations for each locale, field and value. Arrays look like so:
     *
     *  ['en_GB' => ['field' => 'value']];
     *
     * @var array
     */
    private $translations = [];

    /**
     * Applies a given translation to the localised attributes on the entity.
     *
     * @param string $languageCode
     * @param string $field
     * @param string $value
     */
    public function applyTranslation($languageCode, $field, $value)
    {
        $this->translations[$languageCode][$field] = $value;
    }

    /**
     * By default, returns all translations for the object. If a valid language code is provided,
     * then it will return only the translations for the required language.
     *
     * @param string|null $languageCode
     * @return array
     */
    public function getTranslations($languageCode = null)
    {
        if (!is_null($languageCode)) {
            return @$this->translations[$languageCode];
        }

        return $this->translations;
    }
}
