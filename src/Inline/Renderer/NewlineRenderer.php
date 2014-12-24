<?php

/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * Original code based on the CommonMark JS reference parser (http://bitly.com/commonmarkjs)
 *  - (c) John MacFarlane
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Inline\Renderer;

use League\CommonMark\HtmlElement;
use League\CommonMark\HtmlRenderer;
use League\CommonMark\Inline\Element\AbstractInline;
use League\CommonMark\Inline\Element\Newline;

class NewlineRenderer implements InlineRendererInterface
{
    /**
     * @param Newline $inline
     * @param HtmlRenderer $htmlRenderer
     *
     * @return HtmlElement|string
     */
    public function render(AbstractInline $inline, HtmlRenderer $htmlRenderer)
    {
        if (!($inline instanceof Newline)) {
            throw new \InvalidArgumentException('Incompatible inline type: ' . get_class($inline));
        }

        if ($inline->getType() === Newline::HARDBREAK) {
            return new HtmlElement('br', array(), '', true) . "\n";
        } else {
            return $htmlRenderer->getOption('softBreak');
        }
    }
}
