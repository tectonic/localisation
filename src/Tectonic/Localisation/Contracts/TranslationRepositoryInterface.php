<?php
namespace Tectonic\Shift\Modules\Localisation\Translator\Contracts;

interface TranslationRepositoryInterface
{
	public function getByResourceCriteria(ResourceCriteria $criteria);
}
