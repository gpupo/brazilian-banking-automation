<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/brazilian-banking-automation created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\Tests\BrazilianBankingAutomation\Cnab400;

use Gpupo\BrazilianBankingAutomation\Cnab400\ReturnFile\Item;
use Gpupo\Tests\BrazilianBankingAutomation\AbstractTestCase;
use Symfony\Component\Yaml\Yaml;

/**
 * @coversNothing
 */
class ItemTest extends AbstractTestCase
{
    public function testFormat()
    {
        $provider = Yaml::parse(file_get_contents($this->getResourcesDirectory().'/providers/item.yaml'));

        $attrs = [];
        foreach ($provider as $k => $v) {
            $attrs[$k] = $v['original'];
        }

        $item = new Item($attrs);

        foreach ($provider as $k => $v) {
            $this->assertSame($v['formatted'], $item->formatted($k), 'Test failed on '.$k);
        }

        return $item;
    }

    /**
     * @depends testFormat
     */
    public function testTestgenerateString(Item $item)
    {
        $content = file_get_contents($this->getResourcesDirectory().'/fixtures/RETORNO.RET');
        $lines = explode("\r\n", $content);

        $this->assertSame($item->generateString(2), $lines[1]);
    }
}
