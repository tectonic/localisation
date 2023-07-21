<?php
namespace Tectonic\Localisation\Translator;

/**
 * Class ResourceCriteria
 *
 * Used by the localisation repository to search by resources and their IDs. This class basically
 * ensures that a given format is always provided and available for those search conditions (rather
 * than by passing a multi-dimensional array around.
 *
 * @package Tectonic\Shift\Modules\Localisation\Support
 */
class ResourceCriteria
{
    /**
     * Stores the resources and their affiliated IDs for searching.
     */
    private array $resources = [];

    /**
     * Register a new resource.
     */
    public function addResource(string $resource): void
    {
        if (!isset($this->resources[$resource])) {
            $this->resources[$resource] = [];
        }
    }

    /**
     * Returns true if the resource criteria is valid.
     */
    public function valid(): bool
    {
        return !empty($this->resources);
    }

    /**
     * Returns true if the resource criteria is invalid.
     */
    public function invalid(): bool
    {
        return !$this->valid();
    }

    /**
     * Register a new id for a given resource.

     * @throws \Exception
     */
    public function addId(string $resource, ?int $id): void
    {
        if (!isset($this->resources[$resource])) {
            $message = "Resource [$resource] does not exist. Make sure you've
                registered it first via ResourceCriteria::addResource('$resource').'";

            throw new \Exception($message);
        }

        $this->resources[$resource][] = $id;
    }

    /**
     * Return all resources and their ids.
     */
    public function getResources(): array
    {
        return array_keys($this->resources);
    }

    /**
     * Return all ids for a given resource.
     */
    public function getIds(string $resource): array
    {
        return $this->resources[$resource];
    }

    /**
     * Forget a given id for a given resource.
     */
    public function forgetId(string $resource, int $id): void
    {
        $key = array_search($id, $this->resources[$resource]);
        unset($this->resources[$resource][$key]);
    }

    /**
     * Forget a given id for a given resource.
     */
    public function forgetResource($resource): void
    {
        unset($this->resources[$resource]);
    }
}
