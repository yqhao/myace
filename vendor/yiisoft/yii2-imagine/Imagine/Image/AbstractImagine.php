<?php

/*
 * This file is part of the Imagine package.
 *
 * (c) Bulat Shakirzyanov <mallluhuct@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace yii\imagine\Imagine\Image;

use yii\imagine\Imagine\Image\Metadata\DefaultMetadataReader;
use yii\imagine\Imagine\Image\Metadata\ExifMetadataReader;
use yii\imagine\Imagine\Image\Metadata\MetadataReaderInterface;
use yii\imagine\Imagine\Exception\InvalidArgumentException;

abstract class AbstractImagine implements ImagineInterface
{
    /** @var MetadataReaderInterface */
    private $metadataReader;

    /**
     * @param MetadataReaderInterface $metadataReader
     *
     * @return ImagineInterface
     */
    public function setMetadataReader(MetadataReaderInterface $metadataReader)
    {
        $this->metadataReader = $metadataReader;

        return $this;
    }

    /**
     * @return MetadataReaderInterface
     */
    public function getMetadataReader()
    {
        if (null === $this->metadataReader) {
            if (ExifMetadataReader::isSupported()) {
                $this->metadataReader = new ExifMetadataReader();
            } else {
                $this->metadataReader = new DefaultMetadataReader();
            }
        }

        return $this->metadataReader;
    }

    /**
     * Checks a path that could be used with ImagineInterface::open and returns
     * a proper string.
     *
     * @param string|object $path
     *
     * @return string
     *
     * @throws InvalidArgumentException In case the given path is invalid.
     */
    protected function checkPath($path)
    {
        // provide compatibility with objects such as \SplFileInfo
        if (is_object($path) && method_exists($path, '__toString')) {
            $path = (string) $path;
        }

        $handle = @fopen($path, 'r');

        if (false === $handle) {
            throw new InvalidArgumentException(sprintf('File %s does not exist.', $path));
        }

        fclose($handle);

        return $path;
    }
}
