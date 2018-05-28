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

use Gpupo\BrazilianBankingAutomation\Cnab400\ReturnFile\Header;
use Gpupo\Tests\BrazilianBankingAutomation\AbstractTestCase;

/**
 * @coversNothing
 */
class HeaderTest extends AbstractTestCase
{
    public function testFormat()
    {
        $provider = [
          'tipo_de_registro' => ['original' => 0, 'formatted' => '0'],
          'codigo_de_retorno' => ['original' => '2', 'formatted' => '2'],
          'literal_de_retorno' => ['original' => 'RETORNO', 'formatted' => 'RETORNO'],
          'retorno_codigo_do_servico' => ['original' => '1', 'formatted' => '01'],
          'literal_de_servico' => ['original' => 'COBRANCA', 'formatted' => 'COBRANCA       '],
          'nome_da_empresa' => ['original' => 'F E COSTA MIRANDA', 'formatted' => 'F E COSTA MIRANDA             '],
          'codigo_do_banco' => ['original' => '341', 'formatted' => '341'],
          'nome_do_banco' => ['original' => 'BANCO ITAU S.A.', 'formatted' => 'BANCO ITAU S.A.'],
          'data_de_geracao' => ['original' => '010413', 'formatted' => '010413'],
          'cobranca' => ['original' => '4826', 'formatted' => '4826'],
          'conta' => ['original' => '7427', 'formatted' => '07427'],
          'dac' => ['original' => '2', 'formatted' => '2'],
          'densidade' => ['original' => '01600', 'formatted' => '01600'],
          'unidade_de_densid' => ['original' => 'BPI', 'formatted' => 'BPI'],
          'n_seq_arquivo_ret' => ['original' => '266', 'formatted' => '00266'],
          'data_de_credito' => ['original' => '020413', 'formatted' => '020413'],
          //'zeros01' => ['original' => 0, 'formatted' => '00'],
          //'brancos01' => ['original' => 0, 'formatted' => '        '],
          //'brancos02' => ['original' => '', 'formatted' => '                                                                                                                                                                                                                                                                                   '],
          //'numero_sequencial' => ['original' => 0, 'formatted' => '000001'],
          //'brancos09' => ['original' => 0, 'formatted' => '       '],
        ];

        $attrs = [];
        foreach ($provider as $k => $v) {
            $attrs[$k] = $v['original'];
        }

        $item = new Header($attrs);

        foreach ($provider as $k => $v) {
            $this->assertSame($v['formatted'], $item->formatted($k));
        }
    }
}
