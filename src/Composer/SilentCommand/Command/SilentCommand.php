<?php

/*
 * This file is part of the Composer Silent Command Plugin project.
 *
 * (c) Stephan Jorek <stephan.jorek@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sjorek\Composer\SilentCommand\Command;

use Composer\Command\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @author Jordi Boggiano <j.boggiano@seld.be>
 */
class SilentCommand extends BaseCommand
{
    /**
     * {@inheritDoc}
     * @see \Symfony\Component\Console\Command\Command::configure()
     */
    protected function configure()
    {
        $this
            ->setName('silent')
            ->setDescription('Allows running commands silently, without tampering with their exit-code.')
            ->setDefinition(array(
                new InputArgument('command-name', InputArgument::REQUIRED, ''),
                new InputArgument('args', InputArgument::IS_ARRAY | InputArgument::OPTIONAL, ''),
            ))
            ->setHelp(
                <<<EOT
Use this command as a wrapper to run other Composer commands
super silently, without tampering with their exit-code. The
only way to get output, is to enable the debug option.

EOT
            )
        ;
    }

    /**
     * {@inheritDoc}
     * @see \Symfony\Component\Console\Command\Command::run()
     * @throws \RuntimeException if the command runs interactively
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        if ($input->isInteractive()) {
            throw new \RuntimeException('The silent command must not be run interactively.');
        }

        // extract real command name
        $tokens = preg_split('{\s+}', $input->__toString());
        $args = array();
        foreach ($tokens as $token) {
            if ($token && $token[0] !== '-') {
                $args[] = $token;
                if (count($args) >= 2) {
                    break;
                }
            }
        }

        // show help for this command if no command was found
        if (count($args) < 2) {
            return parent::run($input, $output);
        }

        // create new input without "silent" command prefix
        $input = new StringInput(preg_replace('{\bs(?:i(?:l(?:e(?:n(?:t)?)?)?)?)?\b}', '', $input->__toString(), 1));
        $this->getApplication()->resetComposer();

        // Allow debugging
        if (($output->getVerbosity() & OutputInterface::VERBOSITY_DEBUG) !== OutputInterface::VERBOSITY_DEBUG) {
            $output = new NullOutput();
        }

        return $this->getApplication()->run($input, $output);
    }

    /**
     * {@inheritDoc}
     */
    public function isProxyCommand()
    {
        return true;
    }
}
