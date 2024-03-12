<?php declare(strict_types=1);

namespace RichCongress\TestTools\Tests\Resources\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class DummyCommand
 *
 * @package   RichCongress\TestTools\Tests\Resources
 * @author    Nicolas Guilloux <nguilloux@richcongress.com>
 * @copyright 2014 - 2019 RichCongress (https://www.richcongress.com)
 */
#[AsCommand('dummy:command')]
class DummyCommand extends Command
{
    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return integer
     */
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('This is a DummyCommand');

        return 0;
    }
}
