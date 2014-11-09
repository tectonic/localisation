<?php
namespace Tectonic\Localisation\Contracts;

interface TranslatableInterface
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
}
