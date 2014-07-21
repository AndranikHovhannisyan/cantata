<?php

namespace Cantata\MainBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ReplaceSpacesCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('cantata:delete')
            ->setDescription('Delete spaces from prod codes')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Starting ...");

        $em = $this->getContainer()->get('doctrine')->getManager();
        $prods = $em->createQuery("SELECT prd FROM CantataMainBundle:Product prd")->getResult();

        foreach($prods as $prod) {
            $prod->setCode(strtolower(str_replace(array(chr(194), chr(160), ' '), '', $prod->getCode())));
        }

        $em->flush();
        $output->writeln("Success !!!");
    }
}