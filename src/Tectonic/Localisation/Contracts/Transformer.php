<?php
namespace Tectonic\Localisation\Contracts;

interface Transformer
{
    /**
     * Implementations should take an object as a parameter, and then respond with a boolean
     * true or false depending on whether or not they are able to transform that object.
     *
     * @param $object
     * @return mixed
     */
    public function isAppropriateFor($object);

    /**
     * Once a transformer for an object has been found, it then must do whatever work is necessary on that object.
     *
     * @param object $object
     * @param string $language If provided, should limit translation querying to the language specified.
     * @return mixed
     */
    public function transform($object, $language);

    /**
     * Same as transform but should only translate objects one-level deep.
     *
     * @param object $object
     * @param string $language If provided, should limit translation querying to the language specified.
     * @param array $fields If provided, should return only the translations for the fields required.
     * @return mixed
     */
    public function shallow($object, $language, array $fields);
}