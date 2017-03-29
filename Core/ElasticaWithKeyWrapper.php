<?php

/*
 * This file is part of the Search Server Bundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 * @author PuntMig Technologies
 */

declare(strict_types=1);

namespace Puntmig\Search\Server\Core;

use Puntmig\Search\Server\Elastica\ElasticaWrapper;

/**
 * Class ElasticaWithKeyWrapper.
 */
abstract class ElasticaWithKeyWrapper
{
    /**
     * @var ElasticaWrapper
     *
     * Elastica wrapper
     */
    protected $elasticaWrapper;

    /**
     * @var string
     *
     * Key
     */
    protected $key;

    /**
     * ElasticaSearchRepository constructor.
     *
     * @param ElasticaWrapper $elasticaWrapper
     */
    public function __construct(ElasticaWrapper $elasticaWrapper)
    {
        $this->elasticaWrapper = $elasticaWrapper;
    }

    /**
     * Set key.
     *
     * @param string $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * Refresh.
     */
    protected function refresh()
    {
        $this
            ->elasticaWrapper
            ->refresh($this->key);
    }
}