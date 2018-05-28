<?php

/*
 * This file is part of the Apisearch Server
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 * @author PuntMig Technologies
 */

declare(strict_types=1);

namespace Apisearch\Server\Console;

use Apisearch\Command\ApisearchCommand;
use Apisearch\Token\Token;
use Apisearch\Token\TokenUUID;
use Exception;
use League\Tactician\CommandBus;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CommandWithBusAndGodToken.
 */
abstract class CommandWithBusAndGodToken extends ApisearchCommand
{
    /**
     * @var CommandBus
     *
     * Message bus
     */
    protected $commandBus;

    /**
     * @var string
     *
     * God token
     */
    protected $godToken;

    /**
     * Controller constructor.
     *
     * @param CommandBus $commandBus
     * @param string     $godToken
     */
    public function __construct(
        CommandBus $commandBus,
        string $godToken
    ) {
        parent::__construct();

        $this->commandBus = $commandBus;
        $this->godToken = $godToken;
    }

    /**
     * Create token instance.
     *
     * @param string $uuid
     * @param string $appId
     *
     * @return Token
     */
    protected function createToken(
        string $uuid,
        string $appId
    ): Token {
        return new Token(
            TokenUUID::createById($uuid),
            $appId
        );
    }

    /**
     * Create god token instance.
     *
     * @param string $appId
     *
     * @return Token
     */
    protected function createGodToken(string $appId): Token
    {
        return $this->createToken(
            $this->godToken,
            $appId
        );
    }

    /**
     * Executes the current command.
     *
     * This method is not abstract because you can use this class
     * as a concrete class. In this case, instead of defining the
     * execute() method, you set the code to execute by passing
     * a Closure to the setCode() method.
     *
     * @return null|int null or 0 if everything went fine, or an error code
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->startCommand($output);
        try {
            $result = $this->dispatchDomainEvent(
                $input,
                $output
            );
            $this->printMessage(
                $output,
                $this->getHeader(),
                $this->getSuccessMessage($input, $result)
            );
        } catch (Exception $e) {
            $this->printMessageFail(
                $output,
                $this->getHeader(),
                $e->getMessage()
            );
        }

        $this->finishCommand($output);
    }

    /**
     * Dispatch domain event.
     *
     * @return string
     */
    abstract protected function getHeader(): string;

    /**
     * Dispatch domain event.
     *
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return mixed
     */
    abstract protected function dispatchDomainEvent(InputInterface $input, OutputInterface $output);

    /**
     * Get success message.
     *
     * @param InputInterface $input
     * @param mixed          $result
     *
     * @return string
     */
    abstract protected function getSuccessMessage(
        InputInterface $input,
        $result
    ): string;
}