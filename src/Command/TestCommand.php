<?php declare(strict_types=1);

namespace Ihor\Frame\Command;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'ihor_frame:test', description: 'Hello PhpStorm')]
class TestCommand extends Command
{
    private EntityRepository $testRepo;

    public function __construct(
        EntityRepository $testRepo,
        ?string $name = null
    ) {
        parent::__construct($name);
        $this->testRepo = $testRepo;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $context = Context::createCLIContext();
        $te = $this->testRepo->create([], $context);

        var_dump($te->string);

        return Command::SUCCESS;
    }
}