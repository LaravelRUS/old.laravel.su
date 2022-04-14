<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Tests\Feature;

class RoutesTestCase extends FeatureTestCase
{
    public function testHomePageIsAvailable(): void
    {
        $this->get('/')
            ->assertStatus(200)
        ;
    }

    public function testDocsWithoutVersionShouldReturnError(): void
    {
        $this->withDatabaseEmptyTable('versions');

        $this->get('/docs')
            ->assertStatus(422)
        ;
    }

    public function testDocsWithoutDocumentedVersionShouldReturnError(): void
    {
        $this->withDatabaseEmptyTable('versions')
            ->withDatabaseData('versions', [
                'title' => '42.0',
                'is_documented' => false,
            ]);

        $this->get('/docs')
            ->assertStatus(422)
        ;
    }

    public function testDocsWithVersionShouldReturnRedirect(): void
    {
        $this->withDatabaseEmptyTable('versions')
            ->withDatabaseData('versions', [
                'title' => '42.0',
                'is_documented' => true,
            ]);

        $this->get('/docs')
            ->assertStatus(302)
            ->assertRedirect('/docs/42.0')
        ;
    }

    public function testDocsWithVersionShouldReturnRedirectToMaxAvailableVersion(): void
    {
        $this->withDatabaseData('versions', [
            [
                'title' => '4.2',
                'is_documented' => true,
            ],
            [
                'title' => '5.1',
                'is_documented' => true,
            ],
            [
                'title' => '6.0',
                'is_documented' => false,
            ],
            [
                'title' => '4.3',
                'is_documented' => true,
            ]
        ]);

        $this->get('/docs')
            ->assertStatus(302)
            ->assertRedirect('/docs/5.1')
        ;
    }

    public function testDocsVersionedShouldRedirectToDefaultPage(): void
    {
        $this->withDatabaseData('versions', [
            'title' => '1.0',
            'default_page' => 'wtf_is_that',
            'is_documented' => true,
        ]);

        $this->get('/docs/1.0')
            ->assertStatus(302)
            ->assertRedirect('/docs/1.0/wtf_is_that')
        ;
    }

    public function testDocsUndocumentatedPageShouldReturnError(): void
    {
        $this->withDatabaseData('versions', ['title' => '1.0'])
            ->withDatabaseEmptyTable('docs');

        $this->get('/docs/1.0/unknown_page')
            ->assertStatus(404)
        ;
    }

    public function testDocsNonVersionedPageShouldReturnError(): void
    {
        $this->withDatabaseEmptyTable('versions')
            ->withDatabaseEmptyTable('docs');

        $this->get('/docs/1.0/unknown_page')
            ->assertStatus(422)
        ;
    }

    public function testDocsWithoutNavigationShouldReturnError(): void
    {
        $this->withDatabaseRecord('docs', [
            'version_id' => $this->withDatabaseRecord('versions', [
                'title' => '1.0',
                'default_page' => 'default_test_page',
            ]),
            'urn' => 'default_test_page',
        ]);

        $this->get('/docs/1.0/default_test_page')
            ->assertStatus(404)
        ;
    }

    public function testDocsWithoutDefaultPageShouldReturnError(): void
    {
        $this->withDatabaseRecord('docs', [
            'version_id' => $this->withDatabaseRecord('versions', [
                'title' => '1.0',
                'menu_page' => 'menu_test_page',
            ]),
            'urn' => 'menu_test_page',
        ]);

        $this->get('/docs/1.0/default_test_page')
            ->assertStatus(404)
        ;
    }

    public function testDocsWithPageShouldSuccess(): void
    {
        $version = $this->withDatabaseRecord('versions', [
            'title' => '1.0',
            'default_page' => 'default_test_page',
            'menu_page' => 'menu_test_page',
        ]);

        $this->withDatabaseData('docs', [
            [
                'version_id' => $version,
                'title' => '',
                'urn' => 'menu_test_page'
            ],
            [
                'version_id' => $version,
                'title' => '',
                'urn' => 'default_test_page'
            ],
        ]);

        $this->get('/docs/1.0/default_test_page')
            ->assertStatus(200)
        ;
    }
}
