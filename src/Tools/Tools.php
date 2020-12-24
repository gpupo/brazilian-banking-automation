<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/brazilian-banking-automation created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\BrazilianBankingAutomation\Tools;

use Cnab\Format\Picture;
use Symfony\Component\Yaml\Yaml;

class Tools
{
    public $map = [];

    public function __construct()
    {
        $this->initMap();
    }

    public function getFormat($schema, $field, $value)
    {
        if (!isset($this->map[$schema]) || !isset($this->map[$schema][$field])) {
            throw new \Exception('Schema or field not found.');
        }

        $rules = $this->map[$schema][$field];

        if (false !== mb_strpos($rules['picture'], '9') && !is_numeric($value)) {
            $value = (int) $value;
        }

        $value = $this->applyFormat($rules['picture'], $value);

        return $value;
    }

    public function applyFormat($picture, $value)
    {
        $result = Picture::encode($value, $picture, []);

        return $result;
    }

    public function initMap()
    {
        $cnab = 'cnab400';
        $banks = ['generic', '341'];
        $type = 'retorno';
        $schemas = ['detalhe', 'header_arquivo', 'trailer_arquivo'];

        $cnabFactory = new \Cnab\Factory();
        foreach ($banks as $bank) {
            foreach ($schemas as $schema) {
                $path = $cnabFactory::getCnabFormatPath().'/'.$cnab.'/'.$bank.'/'.$type.'/'.$schema.'.yml';
                $map = Yaml::parse(file_get_contents($path));
                if (isset($this->map[$schema])) {
                    $this->map[$schema] = array_merge($this->map[$schema], $map);
                } else {
                    $this->map[$schema] = $map;
                }
            }
        }

        return true;
    }
}
