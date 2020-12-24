<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/brazilian-banking-automation created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\BrazilianBankingAutomation\Cnab400\ReturnFile;

use Gpupo\BrazilianBankingAutomation\Tools\Tools;
use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

abstract class AbstractLine extends EntityAbstract implements EntityInterface
{
    public function formatted($field)
    {
        if (!$this->get('tools')) {
            $this->set('tools', new Tools());
        }

        $schema = $this->schemaFileName;

        $value = $this->get($field);
        $formatted = $this->get('tools')->getFormat($schema, $field, $value);

        return $formatted;
    }

    public function generateString($incremental = 1)
    {
        $line = '';
        foreach (array_keys($this->getSchema()) as $k) {
            $line .= $this->formatted($k);
        }

        $line .= str_pad((string) $incremental, 6, '0', STR_PAD_LEFT);

        return $line;
    }
}
