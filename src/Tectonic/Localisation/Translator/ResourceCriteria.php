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
     *
     * @var array
     */
    private $resources = [];

    /**
     * Register a new resource.
     *
     * @param $resource
     */
    public function addResource($resource)
    {
        if (!isset($this->resources[$resource])) {
            $this->resources[$resource] = [];
        }
    }

    /**
     * Register a new id for a given resource.
     *
     * @param $resource
     * @param $id
     */
    public function addId($resource, $id)
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
     *
     * @return array
     */
    public function getResources()
    {
        return array_keys($this->resources);
    }

    /**
     * Return all ids for a given resource.
     *
     * @param $resource
     * @return mixed
     */
    public function getIds($resource)
    {
        return $this->resources[$resource];
    }
}
