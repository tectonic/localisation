<?php
namespace Tectonic\Localisation\Contracts;

use Tectonic\Localisation\Translator\ResourceCriteria;

interface TranslationRepository
{
    /**
     * When searching for translations to be applied to an entity, or a collection of entities,
     * we want to do so in the most manner possible. In this way, any repository you have
     * that searches for translations, should do so based on the ResourceCriteria object passed.
     *
     * @param ResourceCriteria $criteria
     * @return mixed
     */
    public function getByResourceCriteria(ResourceCriteria $criteria);

    /**
     * Returns a new instance of the model or entity.
     *
     * @return mixed
     */
    public function getNew();

    /**
     * Searches for any number of translations that match the given criteria.
     *
     * @param $params
     * @return mixed
     */
    public function getByCriteria($params);

    /**
     * Identical to getByCriteria, but returns the first result.
     *
     * @param $params
     * @return mixed
     */
    public function getOneByCriteria($params);
}
