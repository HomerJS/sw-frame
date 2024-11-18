<?php declare(strict_types=1);

namespace Ihor\Frame\Command;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;

use Shopware\Core\Framework\DataAbstractionLayer\Field\JsonField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ListField;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\OrFilter;
use Shopware\Core\Framework\Uuid\Uuid;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Serializer\Encoder\DecoderInterface;


#[AsCommand(name: 'ihor_frame:test', description: 'Hello PhpStorm')]
class TestCommand extends Command
{
    private EntityRepository $simpsons;
    private EntityRepository $simple;

    public function __construct(
        EntityRepository $simpsons,
        EntityRepository $simple,
        ?string $name = null
    ) {
        parent::__construct($name);
        $this->simpsons = $simpsons;
        $this->simple = $simple;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $context = Context::createCLIContext();
/////////////////////////////////////////////////////////////////////
//        READ
///////////////////////////////////////////////////////////////////////
//        $all = new Criteria();

//        $byId = new Criteria(['01932f94a4dd70e98e0193d678095152', ...]);

//        $byField = (new Criteria())->addFilter(new EqualsFilter('int', 456));

//        $orFilter = (new Criteria())->addFilter(
//            new OrFilter([
//                new EqualsFilter('int', 456),
//                new EqualsFilter('string', 'some string')
//            ])
//        );

//        $aggregation = (new Criteria())->addPostFilter(new EqualsFilter('int', 456));


//        $associations = new Criteria();
//        $associations->addAssociation('product');


        //associations chain get product -> get category
//        $criteria = new Criteria();
//        $criteria->addAssociation('product.categories');

//        $criteria = new Criteria();
//
//        $res = $this->simple->search($criteria ,$context);
//
//        foreach ($res as $a) {
//            var_dump($a->product->categoryIds);
//
//        }





//$this->simple->upsert([
//    [
//        'id' => '01933fb806e4713cb6535346c88ecd19',
//        'customFields' => ['asdasd', '13414']
//    ]
//], $context);




        $a = $this->simple->create([
            [
                'id' => Uuid::randomHex(),
//                'int' => 456,
//                'string' => 'some string2',
//                'text' => 'etxt etxt etxt etxt',
                'json' => ['test'=>1, 'ab'=>2],
                'productId' => '018fec75209473f1ac187726bddc9116',
                'transString' => 'de',
                'customFields' => ['swag_example_size' => 15, 'ttt' => 'asdasd']
            ]
        ], $context);
//
//        foreach ($a->getList() as $s) {
//            var_dump($s);
//        }



        return Command::SUCCESS;
    }
}