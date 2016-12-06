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

        $this->assertEquals('transformation complete', $this->translator->translate($objectInQuestion));
        $this->assertEquals('shallow transformation complete', $this->translator->shallow($objectInQuestion));
    }

    public function testOnlyInvalidTransformers()
    {
        $invalidTransformer = new InvalidTransformerStub;
        $objectInQuestion = m::mock('whatever');

        $this->translator->registerTransformer($invalidTransformer);

        $this->assertEquals($objectInQuestion, $this->translator->translate($objectInQuestion));
    }
}
