<?php
namespace Tests\Stubs;

use Tectonic\Localisation\Contracts\TransformerInterface;

class InvalidTransformerStub implements TransformerInterface
{
    public function isAppropriateFor($object)
    {
        return false;
    }

    public function transform($object)
    {
        // won't do anything
    }

    public function shallow($object)
    {
        // TODO: Implement shallow() method.
    }
}
 