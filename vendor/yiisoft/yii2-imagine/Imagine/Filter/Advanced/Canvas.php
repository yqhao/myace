<?php

/*
 * This file is part of the Imagine package.
 *
 * (c) Bulat Shakirzyanov <mallluhuct@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace yii\imagine\Imagine\Filter\Advanced;

use yii\imagine\Imagine\Filter\FilterInterface;
use yii\imagine\Imagine\Image\ImageInterface;
use yii\imagine\Imagine\Image\BoxInterface;
use yii\imagine\Imagine\Image\Point;
use yii\imagine\Imagine\Image\PointInterface;
use yii\imagine\Imagine\Image\Palette\Color\ColorInterface;
use yii\imagine\Imagine\Image\ImagineInterface;

/**
 * A canvas filter
 */
class Canvas implements FilterInterface
{
    /**
     * @var BoxInterface
     */
    private $size;

    /**
     * @var PointInterface
     */
    private $placement;

    /**
     * @var ColorInterface
     */
    private $background;

    /**
     * @var ImagineInterface
     */
    private $imagine;

    /**
     * Constructs Canvas filter with given width and height and the placement of the current image
     * inside the new canvas
     *
     * @param ImagineInterface $imagine
     * @param BoxInterface     $size
     * @param PointInterface   $placement
     * @param ColorInterface   $background
     */
    public function __construct(ImagineInterface $imagine, BoxInterface $size, PointInterface $placement = null, ColorInterface $background = null)
    {
        $this->imagine = $imagine;
        $this->size = $size;
        $this->placement = $placement ?: new Point(0, 0);
        $this->background = $background;
    }

    /**
     * {@inheritdoc}
     */
    public function apply(ImageInterface $image)
    {
        $canvas = $this->imagine->create($this->size, $this->background);
        $canvas->paste($image, $this->placement);

        return $canvas;
    }
}
