<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/brazilian-banking-automation created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\BrazilianBankingAutomation\Cnab400\ReturnFile;

use Gpupo\Common\Entity\CollectionInterface;
use Gpupo\CommonSdk\Entity\CollectionAbstract;
use Gpupo\CommonSdk\Entity\CollectionContainerInterface;

final class Collection extends CollectionAbstract implements CollectionInterface, CollectionContainerInterface
{
    public function factoryElement($data)
    {
        return new Item($data);
    }
}
