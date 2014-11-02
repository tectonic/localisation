<?php
namespace Tests\Translator;

use Mockery as m;
use Tectonic\Localisation\Translator\Engine;
use Tests\Stubs\InvalidTransformerStub;
use Tests\Stubs\ValidTransformerStub;
use Tests\TestCase;

class EngineTest extends TestCase
{
    private $translator;

    public function init()
    {
        $this->translator = new Engine;
    }

    public function testValidTransformers()
    {
        $invalidTransformer = new InvalidTransformerStub;
        $validTransformer = new ValidTransformerStub;
        $objectInQuestion = m::mock('whatever');

        $this->translator->registerTransformer($invalidTransformer, $validTransformer);

        $this->assertEquals('done', $this->translator->translate($objectInQuestion));
    }

    public function testOnlyInvalidTransformers()
    {
        $invalidTransformer = new InvalidTransformerStub;
        $objectInQuestion = m::mock('whatever');

        $this->translator->registerTransformer($invalidTransformer);

        $this->assertNull($this->translator->translate($objectInQuestion));
    }
}
