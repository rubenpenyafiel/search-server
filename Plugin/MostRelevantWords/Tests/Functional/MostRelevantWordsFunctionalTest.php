<?php

/*
 * This file is part of the Apisearch Server
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 */

declare(strict_types=1);

namespace Apisearch\Plugin\MostRelevantWords\Tests\Functional;

use Apisearch\Plugin\MostRelevantWords\MostRelevantWordsPluginBundle;
use Apisearch\Server\Tests\Functional\ServiceFunctionalTest;

/**
 * Class MostRelevantWordsFunctionalTest.
 */
abstract class MostRelevantWordsFunctionalTest extends ServiceFunctionalTest
{
    /**
     * Decorate bundles.
     *
     * @param array $bundles
     *
     * @return array
     */
    protected static function decorateBundles(array $bundles): array
    {
        $bundles[] = MostRelevantWordsPluginBundle::class;

        return $bundles;
    }
}
