<?php

/*
 * This file is part of the Composer Silent Command Plugin project.
 *
 * (c) Stephan Jorek <stephan.jorek@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sjorek\Composer\SilentCommand;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\Capable;
use Composer\Plugin\Capability\CommandProvider;
use Composer\Plugin\PluginInterface;
use Sjorek\Composer\SilentCommand\Command\SilentCommand;

/**
 * Silent Command Composer Plugin
 *
 * @author Stephan Jorek <stephan.jorek@gmail.com>
 */
class Plugin implements PluginInterface, Capable, CommandProvider
{
    /**
     * @var Composer
     */
    protected $composer;

    /**
     * @var IOInterface
     */
    protected $io;

    /**
     * {@inheritDoc}
     * @see \Composer\Plugin\PluginInterface::activate()
     */
    public function activate(Composer $composer, IOInterface $io)
    {
        $this->composer = $composer;
        $this->io = $io;
    }

    /**
     * {@inheritDoc}
     * @see \Composer\Plugin\Capable::getCapabilities()
     */
    public function getCapabilities()
    {
        return array(
            CommandProvider::class => static::class,
        );
    }

    /**
     * {@inheritDoc}
     * @see \Composer\Plugin\Capability\CommandProvider::getCommands()
     */
    public function getCommands()
    {
        return array(
            new SilentCommand(),
        );
    }
}
