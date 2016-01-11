<?php

namespace FinacredBundle\CronTasks;

use Doctrine\ORM\EntityManager;
use Monolog\Logger;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;



class CronTest extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('CronTest:run')
            ->setDescription('Daily send promotional offers to invoice users');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine.orm.default_entity_manager');
        //$boletoManager = $this->getContainer()->get('boleto.BoletoManager');
        $arr = array("foo" => "bar", 12 => true);

        echo $arr["foo"]; // bar
        echo $arr[12];    // 1

    }
}