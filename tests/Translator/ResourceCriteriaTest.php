<?php
namespace Tests\Translator;

use Tectonic\Localisation\Translator\ResourceCriteria;
use Tests\TestCase;

class ResourceCriteriaTest extends TestCase
{
    private $resourceCriteria;

    public function setUp()
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

    /**
     * @expectedException Exception
     */
    public function testAddingIdToNonExistentResourceShouldThrowException()
    {
        $this->resourceCriteria->addId('resource', 1);
    }
}
