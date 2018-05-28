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

use Gpupo\BrazilianBankingAutomation\Cnab400\ReturnFile\Trailer;
use Gpupo\Tests\BrazilianBankingAutomation\AbstractTestCase;

/**
 * @coversNothing
 */
class TrailerTest extends AbstractTestCase
{
    public function testFormat()
    {
        $provider = [
          'tipo_de_registro' => ['original' => 9, 'formatted' => '9'],
          'codigo_de_retorno' => ['original' => 2, 'formatted' => '2'],
          'codigo_de_servico' => ['original' => 1, 'formatted' => '01'],
          'codigo_do_banco' => ['original' => '341', 'formatted' => '341'],
          'numero_sequencial' => ['original' => 98, 'formatted' => '000098'],
          'qtdede_titulos' => ['original' => 0, 'formatted' => '00000000'],
          'valor_total' => ['original' => 0, 'formatted' => '00000000000000'],
          'aviso_bancario' => ['original' => '', 'formatted' => '        '],
          'qtdede_titulos_dup' => ['original' => 0, 'formatted' => '00000000'],
          'valor_total_dup' => ['original' => 0, 'formatted' => '00000000000000'],
          'aviso_bancario_dup' => ['original' => '', 'formatted' => '        '],
          //'brancos03' => ['original' => 0, 'formatted' => '                                                  000000000000000000000000000000          '],
          'qtdede_titulos_dup2' => ['original' => 0, 'formatted' => '00000000'],
          'valor_total_dup2' => ['original' => 0, 'formatted' => '00000000000000'],
          'aviso_bancario_dup2' => ['original' => '', 'formatted' => '        '],
          'controle_do_arquivo' => ['original' => 266, 'formatted' => '00266'],
          'qtde_de_detalhes' => ['original' => 96, 'formatted' => '00000096'],
          'vlr_total_informado' => ['original' => 33338.0, 'formatted' => '00000003333800'],
          //'brancos09' => ['original' => 0, 'formatted' => '       '],
        ];

        $attrs = [];
        foreach ($provider as $k => $v) {
            $attrs[$k] = $v['original'];
        }

        $item = new Trailer($attrs);

        foreach ($provider as $k => $v) {
            $this->assertSame($v['formatted'], $item->formatted($k));
        }
    }
}
