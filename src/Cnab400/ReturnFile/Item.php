<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/brazilian-banking-automation created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\BrazilianBankingAutomation\Cnab400\ReturnFile;

class Item extends AbstractLine
{
    protected $schemaFileName = 'detalhe';

    /**
     * @codeCoverageIgnore
     */
    public function getSchema(): array
    {
        return [
          'tipo_de_registro' => 'string',
          'codigo_de_inscricao' => 'string',
          'numero_de_inscricao' => 'string',
          'agencia' => 'string',
          'zeros01' => 'string',
          'conta' => 'string',
          'dac' => 'string',
          'brancos01' => 'string',
          'uso_da_empresa' => 'string',
          'nosso_numero' => 'string',
          'brancos02' => 'string',
          'carteira' => 'string',
          'nosso_numero_dup' => 'string',
          'dac_nosso_numero' => 'string',
          'brancos03' => 'string',
          'carteira_cod' => 'string',
          'codigo_de_ocorrencia' => 'string',
          'data_de_ocorrencia' => 'string',
          'numero_do_documento' => 'string',
          'nosso_numero_dup2' => 'string',
          'brancos04' => 'string',
          'data_vencimento' => 'string',
          'valor_do_titulo' => 'number',
          'codigo_do_banco' => 'string',
          'agencia_cobradora' => 'string',
          'agencia_cobradora_dac' => 'string',
          'especie' => 'string',
          'valor_tarifa' => 'number',
          'brancos05' => 'string',
          'valor_iof' => 'number',
          'valor_abatimento' => 'number',
          'valor_desconto' => 'number',
          'valor_principal' => 'number',
          'valor_mora_multa' => 'number',
          'valor_outros_creditos' => 'number',
          'boleto_dda' => 'string',
          'brancos06' => 'string',
          'data_credito' => 'string',
          'instr_cancelada' => 'string',
          'brancos07' => 'string',
          'zeros02' => 'string',
          'nome_do_sacado' => 'string',
          'brancos08' => 'string',
          'erros' => 'string',
          'brancos09' => 'string',
          'codigo_liquidacao' => 'string',
        ];
    }
}
