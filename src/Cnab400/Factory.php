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

namespace Gpupo\BrazilianBankingAutomation\Cnab400;

class Factory
{
    public static function factoryReturnFile(array $header = [], array $trailer = [])
    {
        $header = self::factoryReturnFileHeader($header);
        $trailer = self::factoryReturnFileTrailer($trailer);

        return new ReturnFile\File($header, $trailer);
    }

    public static function factoryReturnFileItem(array $data = [])
    {
        return new ReturnFile\Item($data);
    }

    public static function factoryReturnFileHeader(array $data = [])
    {
        return new ReturnFile\Header($data);
    }

    public static function factoryReturnFileTrailer(array $data = [])
    {
        return new ReturnFile\Trailer($data);
    }
}
