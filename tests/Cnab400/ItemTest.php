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

use Gpupo\BrazilianBankingAutomation\Cnab400\ReturnFile\Item;
use Gpupo\Tests\BrazilianBankingAutomation\AbstractTestCase;

/**
 * @coversNothing
 */
class ItemTest extends AbstractTestCase
{
    public function testFormat()
    {
        $provider = [
          'codigo_do_banco' => ['original' => '341', 'formatted' => '341'],
          'tipo_de_registro' => ['original' => '1', 'formatted' => '1'],
          'codigo_de_inscricao' => ['original' => '2', 'formatted' => '02'],
          'numero_de_inscricao' => ['original' => '9387410000101', 'formatted' => '09387410000101'],
          'uso_da_empresa' => ['original' => '', 'formatted' => '                         '],
          'codigo_de_ocorrencia' => ['original' => '6', 'formatted' => '06'],
          'data_de_ocorrencia' => ['original' => '280313', 'formatted' => '280313'],
          'numero_do_documento' => ['original' => '0041133', 'formatted' => '0041133   '],
          'data_vencimento' => ['original' => 0, 'formatted' => '000000'],
          'valor_do_titulo' => ['original' => 360, 'formatted' => '0000000036000'],
          'codigo_do_banco' => ['original' => '1', 'formatted' => '001'],
          'agencia_cobradora' => ['original' => '1640', 'formatted' => '1640'],
          'agencia_cobradora_dac' => ['original' => '2', 'formatted' => '2'],
          'especie' => ['original' => 0, 'formatted' => '00'],
          'valor_tarifa' => ['original' => 10.8, 'formatted' => '0000000001080'],
          'valor_iof' => ['original' => 0, 'formatted' => '0000000000000'],
          'valor_abatimento' => ['original' => 0, 'formatted' => '0000000000000'],
          'valor_desconto' => ['original' => 130.00, 'formatted' => '0000000013000'],
          'valor_principal' => ['original' => 227.10, 'formatted' => '0000000022710'],
          'agencia' => ['original' => '4826', 'formatted' => '4826'],
          'conta' => ['original' => '7427', 'formatted' => '07427'],
          'dac' => ['original' => '2', 'formatted' => '2'],
          'nosso_numero' => ['original' => '15107', 'formatted' => '00015107'],
          'carteira' => ['original' => '198', 'formatted' => '198'],
          'nosso_numero_dup' => ['original' => '15107', 'formatted' => '00015107'],
          'dac_nosso_numero' => ['original' => '2', 'formatted' => '2'],
          'carteira_cod' => ['original' => 'I', 'formatted' => 'I'],
          'nosso_numero_dup2' => ['original' => '15107', 'formatted' => '00015107'],
          'valor_mora_multa' => ['original' => 0, 'formatted' => '0000000000000'],
          'valor_outros_creditos' => ['original' => 0, 'formatted' => '0000000000000'],
          'boleto_dda' => ['original' => '', 'formatted' => ' '],
          'data_credito' => ['original' => '020413', 'formatted' => '020413'],
          'instr_cancelada' => ['original' => 0, 'formatted' => '0000'],
          'nome_do_sacado' => ['original' => '', 'formatted' => '                              '],
          'erros' => ['original' => '', 'formatted' => '        '],
          'codigo_liquidacao' => ['original' => 'B5', 'formatted' => 'B5'],
          //'numero_sequencial' => ['original' => 2, 'formatted' => '000002'],
          //'zeros01' => ['original' => 0, 'formatted' => '00'],
          //'brancos01' => ['original' => 0, 'formatted' => '        '],
          //'brancos02' => ['original' => 0, 'formatted' => '            '],
          //'brancos03' => ['original' => 0, 'formatted' => '             '],
          //'brancos04' => ['original' => 0, 'formatted' => '            '],
          //'brancos05' => ['original' => 0, 'formatted' => '00000000000000000000000000'],
          //'brancos06' => ['original' => 0, 'formatted' => '  '],
          //'brancos07' => ['original' => 0, 'formatted' => '000000'],
          //'zeros02' => ['original' => 0, 'formatted' => '0000000000000'],
          //'brancos08' => ['original' => 0, 'formatted' => '                       '],
          //'brancos09' => ['original' => 0, 'formatted' => '       '],
        ];

        $attrs = [];
        foreach ($provider as $k => $v) {
            $attrs[$k] = $v['original'];
        }

        $item = new Item($attrs);

        foreach ($provider as $k => $v) {
            $this->assertSame($v['formatted'], $item->formatted($k));
        }
    }
}
