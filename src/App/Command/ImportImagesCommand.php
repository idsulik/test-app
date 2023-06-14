<?php

namespace App\Command;

use File\Reader\FileReaderFactory;
use File\Writer\FileWriterFactory;
use SplFileInfo;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ImportImagesCommand extends Command
{
    private const PARAM_FILEPATH = 'filepath';

    public function __construct(
        private FileReaderFactory $fileReaderFactory,
        private FileWriterFactory $fileWriterFactory,
        private SplFileInfo $outputFile,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addOption(self::PARAM_FILEPATH, null, InputOption::VALUE_REQUIRED, 'File path to import images from');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $filepath = $input->getOption(self::PARAM_FILEPATH);

        if (!file_exists($filepath)) {
            $output->writeln('File not found!');

            return 1;
        }

        $splFileInfo = new SplFileInfo($filepath);
        $fileReader = $this->fileReaderFactory->create($splFileInfo);
        $data = $fileReader->read();

        $fileWriter = $this->fileWriterFactory->create($this->outputFile);
        $fileWriter->write($data);

        $output->writeln('Success!');

        return 0;
    }
}