<?php
namespace Tectonic\Shift\Modules\Localisation\Translator\Transformers;

use Tectonic\Localisation\Translator\ResourceCriteria;

abstract class Transformer
{
    /**
     * Merges two resource arrays together.
     *
     * @param $resources
     * @param $newResources
     * @return array
     */
    public function mergeResources($resources, $newResources)
    {
        foreach ($resources as $resource => $ids) {
            foreach ($newResources as $newResource => $newIds) {
                if (!isset($resources[$newResource])) {
                    $resources[$newResource] = [];
                }

                $resources = array_merge($resources[$newResource], $newResources[$newResource]);
            }
        }

        return $resources;
    }

    /**
     * Gets the translations for the resources and their associated ids.
     *
     * @param array $resources
     * @return Collection
     */
    public function getTranslations(array $resources)
    {
        $resourceCriteria = new ResourceCriteria;



        return $this->translationRepository->getByResourceCriteria($resourceCriteria);
    }
}
