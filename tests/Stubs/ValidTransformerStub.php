<?php
namespace Tests\Stubs;

use Tectonic\Localisation\Contracts\Transformer;

class ValidTransformerStub implements Transformer
{
    public function isAppropriateFor($object)
    {
        return true;
    }

    /**
     * Once a transformer for an object has been found, it then must do whatever work is necessary on that object.
     *
     * @param object $object
     * @param string $language
     * @return mixed
     */
    public function transform($object, $language)
    {
        return 'transformation complete';
    }

    /**
     * Same as transform but should only translate objects one-level deep.
     *
     * @param object $object
     * @param string $language
     * @param array $fields
     * @return mixed
     */
    public function shallow($object, $language, array $fields)
    {
        return 'shallow transformation complete';
    }
}
