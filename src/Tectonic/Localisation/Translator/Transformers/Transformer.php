<?php
namespace Tectonic\Localisation\Translator\Transformers;

use Tectonic\Localisation\Translator\ResourceCriteria;
use Tectonic\Localisation\Contracts\TranslationRepositoryInterface;

abstract class Transformer
{
    /**
     * Stores the repository that will be used for fetching translations.
     *
     * @var TranslationRepositoryInterface
     */
    protected $translationRepository;

    /**
     * Merges two resource arrays together.
     *
     * @param $resources
     * @param $newResources
     * @return array
     */
    public function mergeResources($resources, $newResources)
    {
        foreach ($newResources as $newResource => $newIds) {
            if (!isset($resources[$newResource])) {
                $resources[$newResource] = [];
            }

            $resources[$newResource] = array_merge($resources[$newResource], $newResources[$newResource]);
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

        foreach ($resources as $resource => $ids) {
            $resourceCriteria->addResource($resource);

            foreach ($ids as $id) {
                $resourceCriteria->addId($resource, $id);
            }
        }

        return $this->translationRepository->getByResourceCriteria($resourceCriteria);
    }

    /**
     * Sets the repository that will be used for translation retrieval.
     *
     * @param TranslationRepositoryInterface $repository
     */
    public function setTranslationRepository(TranslationRepositoryInterface $repository)
    {
        $this->translationRepository = $repository;
    }
}
