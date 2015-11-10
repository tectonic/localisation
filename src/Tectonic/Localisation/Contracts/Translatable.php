<?php
namespace Tectonic\Localisation\Contracts;

interface Translatable
{
    /**
     * Returns the id for the record implementing the interface.
     *
     * @return integer
     */
    public function getId();

    /**
     * Returns an array of field names that can be translated.
     *
     * @return array
     */
    public function getTranslatableFields();

    /**
     * Returns the name of the resource that this object represents.
     *
     * @return string
     */
    public function getResourceName();

    /**
     * Add a translation to the model or entity.
     *
     * @param string $language
     * @param string $key
     * @param mixed $value
     */
    public function addTranslation($language, $key, $value);
}
