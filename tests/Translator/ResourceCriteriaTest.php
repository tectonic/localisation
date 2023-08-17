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
    
    public function testForgetId()
    {
        $this->resourceCriteria->addResource('resource');
        $this->resourceCriteria->addId('resource', 1);
        $this->resourceCriteria->addId('resource', 3);
        $this->assertCount(2, $this->resourceCriteria->getIds('resource'));
        
        $this->resourceCriteria->forgetId('resource', 1);
        $this->assertCount(1, $resourceCriterion = $this->resourceCriteria->getIds('resource'));
        $this->assertEquals([3], array_values($resourceCriterion));
    }
    
    public function testForgetResource()
    {
        $this->resourceCriteria->addResource('resource');
        $this->resourceCriteria->addResource('another');
        $this->assertCount(2, $this->resourceCriteria->getResources());
        
        $this->resourceCriteria->forgetResource('resource');
        $this->assertCount(1, $resourceCriterion = $this->resourceCriteria->getResources());
        $this->assertEquals(['another'], array_values($resourceCriterion));
    }
    
    public function testAll()
    {
        $this->resourceCriteria->addResource('resource');
        $this->resourceCriteria->addResource('another');
        $this->resourceCriteria->addId('resource', 1);
        $this->resourceCriteria->addId('resource', 3);
        $this->resourceCriteria->addId('another', 1);
        
        $all = $this->resourceCriteria->all();
        $this->assertCount(2, $all);
        $this->assertEquals(['resource', 'another'], array_keys($all));
        $this->assertEquals([1, 3], $all['resource']);
        $this->assertEquals([1], $all['another']);
    }
    
    public function testForgetIds()
    {
        $this->resourceCriteria->addResource('resource');
        $this->resourceCriteria->addId('resource', 1);
        $this->resourceCriteria->addId('resource', 3);
        $this->resourceCriteria->addId('resource', 5);
        
        $this->resourceCriteria->forgetIds('resource', 1, 5);
        $this->assertCount(1, $ids = $this->resourceCriteria->getIds('resource'));
        $this->assertEquals([3], array_values($ids));
    }
}
