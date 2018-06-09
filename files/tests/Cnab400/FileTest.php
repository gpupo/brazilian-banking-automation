<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/brazilian-banking-automation
 * Created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <https://opensource.gpupo.com/>.
 *
 */

namespace Gpupo\Tests\BrazilianBankingAutomation\Cnab400;

use Gpupo\BrazilianBankingAutomation\Cnab400\ReturnFile\File;
use Gpupo\BrazilianBankingAutomation\Cnab400\ReturnFile\Header;
use Gpupo\BrazilianBankingAutomation\Cnab400\ReturnFile\Item;
use Gpupo\BrazilianBankingAutomation\Cnab400\ReturnFile\Trailer;
use Gpupo\Tests\BrazilianBankingAutomation\AbstractTestCase;
use Symfony\Component\Yaml\Yaml;

/**
 * @coversNothing
 */
class FileTest extends AbstractTestCase
{
    /**
     * @dataProvider provider
     */
    public function testGetContent(Header $header, Item $item, Trailer $trailer)
    {
        $file = new File($header, $trailer);
        $file->addItem($item);

        $this->assertInstanceof(File::class, $file);

        $this->assertSame($file->getContent(), trim(file_get_contents($this->getResourcesDirectory().'/fixtures/RETORNO.RET')));
    }

    public function provider()
    {
        $header = Yaml::parse(file_get_contents($this->getResourcesDirectory().'/providers/header.yaml'));
        $item = Yaml::parse(file_get_contents($this->getResourcesDirectory().'/providers/item.yaml'));
        $trailer = Yaml::parse(file_get_contents($this->getResourcesDirectory().'/providers/trailer.yaml'));

        $toAttr = function ($provider) {
            $attrs = [];
            foreach ($provider as $k => $v) {
                $attrs[$k] = $v['original'];
            }

            return $attrs;
        };

        $header = new Header($toAttr($header));
        $trailer = new Trailer($toAttr($trailer));
        $item = new Item($toAttr($item));

        return [[$header, $item, $trailer]];
    }
}
