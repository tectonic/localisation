# Localisation

[![Circle CI](https://circleci.com/gh/tectonic/localisation.png?style=badge)](https://circleci.com/gh/tectonic/localisation)

This package helps to setup translations and implementations for given models, entities, collections or anything else. If you know how to write a class to extend libraries, you can translate practically anything. Localisation is intended to be used as a contract and common api for all translation requests. Bridge packages are setup that support particular patterns or frameworks' way of doing things. Eg. (https://github.com/tectonic/laravel-localisation)

Localisation in reality is a very basic package, simply defining the APIs and interfaces necessary for implementing translation components.

## Installation

Installation of Localisation is done in the usual manner, using composer:

```cli
composer require tectonic/localisation
```

## Translating an object

Translation of any object is done simply by passing the object to the translation engine:

```php
<?php
$object = new TranslatableObject();

$translator = new \Tectonic\Localisation\Translator\Engine;
$translator->translate($object);
```

Default Localisation behaviour will not translate this object. Why? Because no transformer exists for a given TranslatableObject. However, you can define your own transformers that know how to translate this particular object.

## Registering transformers

Transformers that know how to manage and translate various objects can be registered with the localisation engine:

```php
<?php
$translator->registerTransformer(new MyTransformer);
```

MyTransformer should implement the TransformerInterface that is defined within the package, like so:

```php
<?php
class MyTransformer implements Transformer {
    public function isAppropriateFor($object) {}
    public function transform($object) {}
}
```

The isAppropriateFor method should return true if your transformer knows how to manage that object. If it does not, it should return false. The transform() method does the actual transformation work.

Once you've registered your transformers, you're ready to go!

## Translatable interface
Can be implemented by a Model or Entity in order to manage its `translated` property. The implementation can be fulfilled by using the `Translations` trait in conjunction with implementing the `getTranslatableFields` method in the Model or Entity.

`addTranslation` can be used to fill the `translated` property with translations loaded from the database. The trait `addTranslation` method also provides a `setter` functionality for translated properties which can be used to modify the value for the specified property as in the example:
```php
    /**
     * The database $value for the `options` property is a comma separated list.
     * This setter will be used by the `addTranslation` method 
     * so when we access the translated property `options` it will be an array of the exploded values.
     */
    protected function setTranslatedOptionsProperty($language, $key, $value): void
    {
        $this->translated[$language][$key] = explode(',', $value);
    }
```

# License

The MIT License (MIT)
[OSI Approved License]
The MIT License (MIT)

Copyright (c) 2014 Tectonic Digital

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.