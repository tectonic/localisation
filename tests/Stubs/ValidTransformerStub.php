<?php
namespace Tests\Stubs;

use Tectonic\Localisation\Contracts\TransformerInterface;

class ValidTransformerStub implements TransformerInterface
{
    public function isAppropriateFor($object)
    {
        return true;
    }

    /**
     * Once a transformer for an object has been found, it then must do whatever work is necessary on that object.
     *
     * @param object $object
     * @return mixed
     */
    public function transform($object)
    {
        return 'transformation complete';
    }

    /**
     * Same as transform but should only translate objects one-level deep.
     *
     * @param object $object
     * @return mixed
     */
    public function shallow($object)
    {
        return 'shallow transformation complete';
    }
}
