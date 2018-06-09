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

class Header extends AbstractLine
{
    protected $schemaFileName = 'header_arquivo';

    /**
     * @codeCoverageIgnore
     */
    public function getSchema()
    {
        return [
          'tipo_de_registro' => 'number',
          'codigo_de_retorno' => 'string',
          'literal_de_retorno' => 'string',
          'retorno_codigo_do_servico' => 'string',
          'literal_de_servico' => 'string',
          'cobranca' => 'string',
          'zeros01' => 'number',
          'conta' => 'string',
          'dac' => 'string',
          'brancos01' => 'string',
          'nome_da_empresa' => 'string',
          'codigo_do_banco' => 'string',
          'nome_do_banco' => 'string',
          'data_de_geracao' => 'number',
          'densidade' => 'string',
          'unidade_de_densid' => 'string',
          'n_seq_arquivo_ret' => 'string',
          'data_de_credito' => 'number',
          'brancos02' => 'string',
        ];
    }
}
