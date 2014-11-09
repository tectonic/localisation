<?php
namespace Tectonic\Localisation\Translator;

trait Translatable
{
    /**
     * Returns an array of the field names that can be used for translations.
     *
     * @return array
     */
    abstract public function getTranslatableFields();

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
}
