<?php
namespace Tectonic\Localisation\Translator;

trait Translations
{
    /**
     * Translations stored on the object as an array.
     *
     * @var array
     */
    public $translated = [];

    /**
     * Returns an array of the field names that can be used for translations.
     *
     * @return array
     */
    abstract public function getTranslatableFields();

    /**
     * Add a translation for the model, with a key-value, based on the language.
     *
     * @param string $language
     * @param string $key
     * @param mixed $value
     */
    public function addTranslation($language, $key, $value)
    {
        if (!isset($this->translated[$language])) {
            $this->translated[$language] = [];
        }

        $this->translated[$language][$key] = $value;
    }

    /**
     * Returns the id of the model or entity in question.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the base name of the class, to be used as the resource when creating translations.
     *
     * @return string
     */
    public function getResourceName()
    {
        $object = get_class($this);
        $namespace = explode('\\', $object);

        return array_pop($namespace);
    }

    /**
     * Returns a unique cache key string that is used by the ModelTranslator to cache the model, to prevent translating
     * the same model numerous times. This is critical for complex layouts that pull in a lot of inter-related models.
     *
     * @return string
     */
    public function getTranslationCacheKey()
    {
        if ($this->exists) {
            return __CLASS__.'-'.$this->id.'-'.$this->updatedAt;
        }

        return '-new';
    }
}
