<?php
/*
 * This file is part of the Dektrium project
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */
namespace app\helpers;

use cebe\markdown\GithubMarkdown;

/**
 * Markdown helper.
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class GuideMarkdownHelper extends GithubMarkdown
{
    /**
     * @inheritdoc
     */
    protected function renderLink($block)
    {
        $result = parent::renderLink($block);
        // add special syntax for linking to the guide
        $result = preg_replace_callback('/href="([A-z0-9-.#]+).md"/i', function($match) {
            return 'href="/docs/' . $match[1] . '"';
        }, $result, 1);
        return $result;
    }
}