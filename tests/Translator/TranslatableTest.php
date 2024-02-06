<?php

namespace Tests\Translator;

use ReflectionClass;
use ReflectionObject;
use Tests\Stubs\TranslatableStub;
use Tests\TestCase;

class TranslatableTest extends TestCase
{
    private $translatable;

    public function init()
    {
        $this->translatable = new TranslatableStub;
    }

    public function testTranslatableResource()
    {
        $this->assertEquals('TranslatableStub', $this->translatable->getResourceName());
    }

    public function testTranslatableFields()
    {
        $this->assertEquals(['title'], $this->translatable->getTranslatableFields());
    }

    public function testTranslatedIsRemovingQuot()
    {
        $this->setPrivateObjectProperty(
            $this->translatable,
            'translated',
            ['en' => ['title' => 'foo &&quot; bar']]
        );

        $this->assertEquals(
            'foo &&quot; bar',
            $this->getPrivateObjectProperty($this->translatable, 'translated') ['en']['title']
        );
        $this->assertEquals(
            'foo && bar',
            $this->translatable->translated()['en']['title']
        );
    }

    private function setPrivateObjectProperty($object, $property, $value)
    {
        $reflection = new ReflectionClass($object);
        $property = $reflection->getProperty($property);
        /** @noinspection PhpExpressionResultUnusedInspection */
        $property->setAccessible(true);
        $property->setValue($object, $value);
    }

    private function getPrivateObjectProperty($object, $property)
    {
        $reflection = new ReflectionObject($object);
        $property = $reflection->getProperty($property);
        /** @noinspection PhpExpressionResultUnusedInspection */
        $property->setAccessible(true);
        return $property->getValue($object);
    }
}
