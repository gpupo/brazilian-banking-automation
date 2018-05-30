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

namespace Gpupo\BrazilianBankingAutomation\Cnab400\ReturnFile;

class File
{
    protected $header;
    protected $items;
    protected $trailer;

    public function __construct(Header $header, Trailer $trailer)
    {
        $this->header = $header;
        $this->items = new Collection();
        $this->trailer = $trailer;
    }

    public function getContent()
    {
        $cnt = 1;
        $string = '';
        $string .= $this->getHeader()->generateString($cnt++)."\r\n";

        foreach ($this->getItems() as $item) {
            $string .= $item->generateString($cnt++)."\r\n";
        }
        $string .= $this->getTrailer()->generateString($cnt);

        return $string;
    }

    public function getHeader()
    {
        return $this->header;
    }

    public function setHeader(Header $header)
    {
        $this->header = $header;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function addItem(Item $item)
    {
        $this->items->add($item);
    }

    public function getTrailer()
    {
        return $this->trailer;
    }

    public function setTrailer(Trailer $trailer)
    {
        $this->trailer = $trailer;
    }
}
