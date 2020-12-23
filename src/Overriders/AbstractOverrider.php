<?php
/**
 * Copyright (c) Since 2020 Friends of Presta
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file docs/licenses/LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to infos@friendsofpresta.org so we can send you a copy immediately.
 *
 * @author    Friends of Presta <infos@friendsofpresta.org>
 * @copyright since 2020 Friends of Presta
 * @license   https://opensource.org/licenses/AFL-3.0  Academic Free License ("AFL") v. 3.0
 */
declare(strict_types=1);

namespace FOP\Console\Overriders;

use LogicException;

abstract class AbstractOverrider implements OverriderInterface
{
    /** @var bool */
    private $successful = false;

    /** @var ?string */
    private $path;

    final public function setSuccessful(): void
    {
        $this->successful = true;
    }

    // not really needed since it's false by default.
    final public function setUnsuccessful(): void
    {
        $this->successful = false;
    }

    final public function isSuccessful(): bool
    {
        return $this->successful;
    }

    final public function init(string $path): void
    {
        $this->path = $path;
    }

    final public function getPath(): string
    {
        if (is_null($this->path)) {
            throw new LogicException('Overrider not initialized. Use ->init() before usage.');
        }

        return $this->path;
    }
}
