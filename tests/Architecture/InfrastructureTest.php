<?php

declare(strict_types=1);

namespace Tests\Architecture;

use PHPat\Selector\Selector;
use PHPat\Test\Builder\Rule;
use PHPat\Test\PHPat;

class InfrastructureTest
{
    public function testInfrastructureDoesNotDependOnApplication(): Rule
    {
        return PHPat::rule()
            ->classes(Selector::namespace('App\Infrastructure'))
            ->shouldNotDependOn()
            ->classes(
                Selector::namespace('App\Application'),
            );
    }
}
