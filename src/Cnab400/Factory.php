<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/brazilian-banking-automation created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
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
