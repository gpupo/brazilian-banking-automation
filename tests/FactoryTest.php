<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/brazilian-banking-automation created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\Tests\BrazilianBankingAutomation;

use Gpupo\BrazilianBankingAutomation\Cnab400\Factory;
use Gpupo\BrazilianBankingAutomation\Cnab400\ReturnFile;

/**
 * @coversNothing
 */
class FactoryTest extends AbstractTestCase
{
    public function testFactoryReturnFile()
    {
        $cnabFactory = new Factory();
        $returnFile = $cnabFactory->factoryReturnFile();

        $this->assertInstanceof(ReturnFile\File::class, $returnFile);
        $this->assertInstanceof(ReturnFile\Header::class, $returnFile->getHeader());
        $this->assertInstanceof(ReturnFile\Collection::class, $returnFile->getItems());
        $this->assertInstanceof(ReturnFile\Trailer::class, $returnFile->getTrailer());
    }

    public function testFactoryReturnFileItem()
    {
        $cnabFactory = new Factory();
        $item = $cnabFactory->factoryReturnFileItem();

        $this->assertInstanceof(ReturnFile\Item::class, $item);

        $returnFile = $cnabFactory->factoryReturnFile();
        $returnFile->addItem($item);

        $this->assertTrue($returnFile->getItems()->contains($item));
    }

    public function testFactoryReturnFileHeader()
    {
        $cnabFactory = new Factory();
        $header = $cnabFactory->factoryReturnFileHeader();

        $this->assertInstanceof(ReturnFile\Header::class, $header);

        $returnFile = $cnabFactory->factoryReturnFile();
        $returnFile->setHeader($header);

        $this->assertSame($returnFile->getHeader(), $header);
    }

    public function testFactoryReturnFileTrailer()
    {
        $cnabFactory = new Factory();
        $trailer = $cnabFactory->factoryReturnFileTrailer();

        $this->assertInstanceof(ReturnFile\Trailer::class, $trailer);

        $returnFile = $cnabFactory->factoryReturnFile();
        $returnFile->setTrailer($trailer);

        $this->assertSame($returnFile->getTrailer(), $trailer);
    }
}
