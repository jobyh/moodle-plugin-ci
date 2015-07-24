<?php
/**
 * This file is part of the Moodle Plugin CI package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) 2015 Moodlerooms Inc. (http://www.moodlerooms.com)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace Moodlerooms\MoodlePluginCI;

/**
 * Validation of user input.
 *
 * @copyright Copyright (c) 2015 Moodlerooms Inc. (http://www.moodlerooms.com)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class Validate
{
    /**
     * Validate a directory path.
     *
     * @param string $path
     * @return string
     */
    public function directory($path)
    {
        $dir = realpath($path);
        if ($dir === false) {
            throw new \InvalidArgumentException(sprintf('Failed to run realpath(\'%s\')', $path));
        }
        if (is_file($dir)) {
            throw new \InvalidArgumentException(sprintf('The directory path is a file path: %s', $dir));
        }

        return $path;
    }
}