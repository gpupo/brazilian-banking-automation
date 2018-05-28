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

class Trailer extends AbstractLine
{
    protected $schemaFileName = 'trailer_arquivo';

    /**
     * @codeCoverageIgnore
     */
    public function getSchema()
    {
        return [
          'tipo_de_registro' => 'number',
          'codigo_de_retorno' => 'number',
          'codigo_de_servico' => 'string',
          'codigo_do_banco' => 'string',
          'numero_sequencial' => 'string',
          'qtdede_titulos' => 'string',
          'valor_total' => 'number',
          'aviso_bancario' => 'string',
          'qtdede_titulos_dup' => 'number',
          'valor_total_dup' => 'number',
          'aviso_bancario_dup' => 'string',
          'qtdede_titulos_dup2' => 'number',
          'valor_total_dup2' => 'number',
          'aviso_bancario_dup2' => 'string',
          'controle_do_arquivo' => 'number',
          'qtde_de_detalhes' => 'number',
          'vlr_total_informado' => 'number',
        ];
    }
}
