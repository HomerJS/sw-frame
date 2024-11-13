<?php declare(strict_types=1);

namespace Ihor\Frame\Command;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;

use Shopware\Core\Framework\Uuid\Uuid;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Serializer\Encoder\DecoderInterface;


#[AsCommand(name: 'ihor_frame:test', description: 'Hello PhpStorm')]
class TestCommand extends Command
{
    private EntityRepository $repo;

    public function __construct(
        EntityRepository $repo,
        ?string $name = null
    ) {
        parent::__construct($name);
        $this->repo = $repo;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $context = Context::createCLIContext();

        $list = $this->repo->create([
            [
                'id' => Uuid::randomHex(),
                'int' => 123,
                'string' => 'some string',
                'text' => 'etxt etxt etxt etxt',
                'json' => ['test'=>1, 'ab'=>2]
            ],
        ], $context);


        foreach ($list->getList() as $k => $s) {
            var_dump($k);
            var_dump($s);
        }

        return Command::SUCCESS;
    }
}