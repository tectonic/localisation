<?php
namespace Tests\Translator;

use Tectonic\Localisation\Translator\ResourceCriteria;
use Tests\TestCase;

class ResourceCriteriaTest extends TestCase
{
    private $resourceCriteria;

    public function setUp(): void
    {
        parent::setUp();

        $this->resourceCriteria = new ResourceCriteria;
    }

    public function testResourceRegistration()
    {
        $this->resourceCriteria->addResource('resource');
        $this->resourceCriteria->addResource('another');

        $this->assertEquals(['resource', 'another'], $this->resourceCriteria->getResources());
    }

    public function testIdRegistration()
    {
        $this->resourceCriteria->addResource('resource');
        $this->resourceCriteria->addId('resource', 1);
        $this->resourceCriteria->addId('resource', 3);
        $this->resourceCriteria->addId('resource', 5);

        $this->assertEquals([1, 3, 5], $this->resourceCriteria->getIds('resource'));
    }

    public function testAddingIdToNonExistentResourceShouldThrowException()
    {
        $this->expectException(\Exception::class);
        $this->resourceCriteria->addId('resource', 1);
    }
}
