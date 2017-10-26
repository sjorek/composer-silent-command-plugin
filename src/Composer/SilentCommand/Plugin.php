<?php
namespace Sjorek\Composer\SilentCommand;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\IO\IOInterface;
use Composer\Plugin\CommandEvent;
use Composer\Plugin\PluginInterface;
use Composer\Plugin\PluginEvents;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Silent Command Composer Plugin
 *
 * @author Stephan Jorek <stephan.jorek@gmail.com>
 */
class Plugin implements PluginInterface, EventSubscriberInterface
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
     * @see \Composer\EventDispatcher\EventSubscriberInterface::getSubscribedEvents()
     */
    public static function getSubscribedEvents()
    {
        return array(
            PluginEvents::COMMAND => array(
                array('onExecuteCommand', 0)
            ),
        );
    }

    /**
     * @param CommandEvent $event
     */
    public function onExecuteCommand(CommandEvent $event)
    {
        $event->getOutput()->writeln(
            sprintf(
                '<info>is silent? => %d</info>',
                $event->getInput()->hasParameterOption('-qq', true)
            ),
            OutputInterface::OUTPUT_NORMAL | OutputInterface::VERBOSITY_QUIET
        );
    }
}

