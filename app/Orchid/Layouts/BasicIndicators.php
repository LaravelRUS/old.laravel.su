<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Layouts\Chart;

class BasicIndicators extends Chart
{
    /**
     * Add a title to the Chart.
     *
     * @var string
     */
    protected $title = 'Basic Indicators';

    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the chart.
     *
     * @var string
     */
    protected $target = 'basicIndicators';

    /**
     * @var int
     */
    protected $height = 340;

    /**
     * Configuring line.
     *
     * @var array
     */
    protected $lineOptions = [
        'regionFill' => 1,
        'hideDots'   => 0,
        'hideLine'   => 0,
        'heatline'   => 0,
        'dotSize'    => 4,
        'spline'     => 1,
    ];
}
