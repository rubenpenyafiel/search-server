<?php

/*
 * This file is part of the SearchBundle for Symfony2.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 */

declare(strict_types=1);

namespace Mmoreram\SearchBundle\Query;

/**
 * Class SortBy.
 */
class SortBy
{
    /**
     * @var array
     *
     * Sort by score
     */
    const SCORE = ['_score' => 'asc'];

    /**
     * @var array
     *
     * Sort by price ASC
     */
    const PRICE_ASC = ['real_price' => 'asc'];

    /**
     * @var array
     *
     * Sort by price DESC
     */
    const PRICE_DESC = ['real_price' => 'desc'];

    /**
     * @var array
     *
     * Sort by discount ASC
     */
    const DISCOUNT_ASC = ['discount' => 'asc'];

    /**
     * @var array
     *
     * Sort by discount DESC
     */
    const DISCOUNT_DESC = ['discount' => 'desc'];

    /**
     * @var array
     *
     * Sort by discount percentage ASC
     */
    const DISCOUNT_PERCENTAGE_ASC = ['discount_percentage' => 'asc'];

    /**
     * @var array
     *
     * Sort by discount percentage DESC
     */
    const DISCOUNT_PERCENTAGE_DESC = ['discount_percentage' => 'desc'];

    /**
     * @var array
     *
     * Sort by update at ASC
     */
    const UPDATED_AT_ASC = ['updated_at' => 'asc'];

    /**
     * @var array
     *
     * Sort by update at ASC
     */
    const UPDATED_AT_DESC = ['updated_at' => 'desc'];

    /**
     * @var array
     *
     * Sort by manufacturer ASC
     */
    const MANUFACTURER_ASC = ['manufacturer.name' => 'asc'];

    /**
     * @var array
     *
     * Sort by manufacturer DESC
     */
    const MANUFACTURER_DESC = ['manufacturer.name' => 'desc'];

    /**
     * @var array
     *
     * Sort by manufacturer ASC
     */
    const BRAND_ASC = ['brand.name' => 'asc'];

    /**
     * @var array
     *
     * Sort by manufacturer DESC
     */
    const BRAND_DESC = ['brand.name' => 'desc'];

    /**
     * @var array
     *
     * Sort by rating ASC
     */
    const RATING_ASC = ['rating' => 'asc'];

    /**
     * @var array
     *
     * Sort by rating DESC
     */
    const RATING_DESC = ['rating' => 'desc'];
}
