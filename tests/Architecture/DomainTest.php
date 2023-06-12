<?php

declare(strict_types=1);

namespace Tests\Architecture;

use PHPat\Selector\Selector;
use PHPat\Test\Builder\Rule;
use PHPat\Test\PHPat;

class DomainTest
{
    public function testDomainDoesNotDependOnOtherLayers(): Rule
    {
        return PHPat::rule()
            ->classes(Selector::namespace('App\Domain'))
            ->shouldNotDependOn()
            ->classes(
                Selector::namespace('App\Application'),
                Selector::namespace('App\Infrastructure'),
            );
    }

    public function testArticleDoesNotDependOnNeighbours(): Rule
    {
        return PHPat::rule()
            ->classes(Selector::namespace('App\Domain\Article'))
            ->shouldNotDependOn()
            ->classes(
                Selector::namespace('App\Domain\Documentation')
            );
    }

    public function testDocumentationDoesNotDependOnNeighbours(): Rule
    {
        return PHPat::rule()
            ->classes(Selector::namespace('App\Domain\Documentation'))
            ->shouldNotDependOn()
            ->classes(
                Selector::namespace('App\Domain\Article')
            );
    }
}
