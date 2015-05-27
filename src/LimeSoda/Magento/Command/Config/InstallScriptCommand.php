<?php
namespace LimeSoda\Magento\Command\Config;

use N98\Magento\Command\Config\AbstractConfigCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;

class InstallScriptCommand extends AbstractConfigCommand
{
	private $_fileName = 'install-0.0.1.php';
	private $_phpStartTag = '<?php';
	
    protected function configure()
    {
        $this
            ->setName('config:installscript')
            ->addArgument('xpath', InputArgument::OPTIONAL, 'XPath to filter output', null)
            ->setDescription('Dump core_config_data as Magento install script')
        ;
    }
    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return int|null
     * @throws \InvalidArgumentException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->detectMagento($output, true);
        if ($this->initMagento()) {
        	$template = 'Mage::getConfig()->saveConfig(\'##path##\', \'##value##\');';
            $config = \Mage::getModel('core/config_data')->getCollection();
			
            if (!$config) {
                throw new \InvalidArgumentException('xpath was not found');
            }
			
			file_put_contents($this->_fileName, $this->_phpStartTag.PHP_EOL);
			
			foreach($config as $configItem) {
				
				$line = str_replace('##path##', $configItem->getPath(), $template);
				$line = str_replace('##value##', $configItem->getValue(), $line);
				
				file_put_contents($this->_fileName, $line.PHP_EOL, FILE_APPEND);
				
				$output->writeln($line, OutputInterface::OUTPUT_RAW);
			}
			
			
			/*
            $dom = new \DOMDocument();
            $dom->preserveWhiteSpace = false;
            $dom->formatOutput = true;
            $dom->loadXML($config->asXml());
			
            $output->writeln($script, OutputInterface::OUTPUT_RAW);
			
			$fs->dumpFile('install-0.0.1.php', $script);*/
        }
    }
}