<?php
namespace Tests\Translator\Transformers;

use Mockery as m;
use Tectonic\Localisation\Contracts\TranslationRepositoryInterface;
use Tests\Stubs\TransformerStub;
use Tests\TestCase;

class TransformerTest extends TestCase
{
    private $translationRepository;
    private $transformer;

    public function init()
    {
        $this->translationRepository = m::spy(TranslationRepositoryInterface::class);

        $this->transformer = new TransformerStub;
        $this->transformer->setTranslationRepository($this->translationRepository);
    }

    public function testMergeResources()
    {
        $resource = ['Resource' => [1, 2, 4]];
        $newResource = ['Resource' => [3], 'Another' => [2]];
        $mergedResources = $this->transformer->mergeResources($resource, $newResource);

        $this->assertArrayHasKey('Another', $mergedResources);
        $this->assertCount(4, $mergedResources['Resource']);
    }

    public function testResourceCriteriaCreation()
    {
        $resources = ['Resource' => [1, 2]];

        $this->transformer->getTranslations($resources);
        
        $this->translationRepository->shouldHaveReceived('getByResourceCriteria')->once();
    }
}
 