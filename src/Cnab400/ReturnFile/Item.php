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

class Item extends AbstractLine
{
    protected $schemaFileName = 'detalhe';

    /**
     * @codeCoverageIgnore
     */
    public function getSchema()
    {
        return [
          'tipo_de_registro' => 'string',
          'codigo_de_inscricao' => 'string',
          'numero_de_inscricao' => 'string',
          'uso_da_empresa' => 'string',
          'codigo_de_ocorrencia' => 'string',
          'data_de_ocorrencia' => 'string',
          'numero_do_documento' => 'string',
          'data_vencimento' => 'number',
          'valor_do_titulo' => 'number',
          'codigo_do_banco' => 'string',
          'agencia_cobradora' => 'string',
          'agencia_cobradora_dac' => 'string',
          'especie' => 'number',
          'valor_tarifa' => 'number',
          'valor_iof' => 'number',
          'valor_abatimento' => 'number',
          'valor_desconto' => 'number',
          'valor_principal' => 'number',
          'agencia' => 'string',
          'conta' => 'string',
          'dac' => 'string',
          'nosso_numero' => 'string',
          'carteira' => 'string',
          'nosso_numero_dup' => 'string',
          'dac_nosso_numero' => 'string',
          'carteira_cod' => 'string',
          'nosso_numero_dup2' => 'string',
          'valor_mora_multa' => 'number',
          'valor_outros_creditos' => 'number',
          'boleto_dda' => 'string',
          'data_credito' => 'string',
          'instr_cancelada' => 'string',
          'nome_do_sacado' => 'string',
          'erros' => 'string',
          'codigo_liquidacao' => 'string',
        ];
    }
}
