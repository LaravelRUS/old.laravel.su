<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

use League\CommonMark\Ext\ExternalLink\ExternalLinkExtension;
use League\CommonMark\Ext\Strikethrough\StrikethroughExtension;
use League\CommonMark\Ext\Table\TableExtension;
use League\CommonMark\Ext\TaskList\TaskListExtension;

return [

    /*
    |--------------------------------------------------------------------------
    | Markdown Extensions
    |--------------------------------------------------------------------------
    |
    | Extensions provide a way to group related parsers, renderers, etc.
    | together with pre-defined priorities, configuration settings, etc.
    | They are perfect for distributing your customizations as reusable,
    | open-source packages that others can plug into their own projects!
    |
    | @see https://commonmark.thephpleague.com/1.0/customization/extensions/
    |
    */

    'extensions' => [
        TableExtension::class,
        StrikethroughExtension::class,
        ExternalLinkExtension::class,
        TaskListExtension::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Markdown Extensions
    |--------------------------------------------------------------------------
    |
    | You can provide an array of configuration options.
    |
    | Here’s a list of currently-supported options:
    |
    |   renderer            - Array of options for rendering HTML.
    |     block_separator   - String to use for separating renderer block
    |                         elements.
    |     inner_separator   - String to use for separating inner block contents.
    |     soft_break        - String to use for rendering soft breaks.
    |   enable_em           - Disable <em> parsing by setting to false; enable
    |                         with true (default: true).
    |   enable_strong       - Disable <strong> parsing by setting to false;
    |                         enable with true (default: true).
    |   use_asterisk        - Disable parsing of * for emphasis by setting to
    |                         false; enable with true (default: true).
    |   use_underscore      - Disable parsing of _ for emphasis by setting
    |                         to false; enable with true (default: true).
    |   html_input          - How to handle HTML input. Set this option to one
    |                         of the following strings:
    |     strip             - Strip all HTML (equivalent to 'safe' => true)
    |     allow             - Allow all HTML input as-is (default value;
    |                         equivalent to `‘safe’ => false).
    |     escape            - Escape all HTML.
    |   allow_unsafe_links  - Remove risky link and image URLs by setting this
    |                         to false (default: true)
    |   max_nesting_level   - The maximum nesting level for blocks
    |                         (default: infinite). Setting this to a positive
    |                         integer can help protect against long parse times
    |                         and/or segfaults if blocks are too deeply-nested.
    |
    | @see https://commonmark.thephpleague.com/1.0/configuration/
    |
    */

    'config' => [
        'renderer'           => [
            'block_separator' => "\n",
            'inner_separator' => "\n",
            'soft_break'      => "\n",
        ],
        'allow_unsafe_links' => false,
        'html_input'         => 'allow',
    ],
];
