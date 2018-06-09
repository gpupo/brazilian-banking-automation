---

## layout: default

[![MIT License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](https://github.com/gpupo/brazilian-banking-automation/blob/master/LICENSE)
[![Build Status](https://secure.travis-ci.org/gpupo/brazilian-banking-automation.png?branch=master)](http://travis-ci.org/gpupo/brazilian-banking-automation)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gpupo/brazilian-banking-automation/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gpupo/brazilian-banking-automation/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/gpupo/brazilian-banking-automation/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/gpupo/brazilian-banking-automation/?branch=master)

# brazilian-banking-automation

[![Paypal Donations](https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EK6F2WRKG7GNN&item_name=netshoes-sdk)

## Install

```
composer require gpupo/brazilian-banking-automation
```

## Usage

### Modo 1 - instantiating objects

```php
<?php

    $headerAttributes = [
        'tipo_de_registro' => '0',
        'codigo_de_retorno' => '2',
        //...all required fields
    ];

    $trailerAttributes = [
        'tipo_de_registro' => '9',
        'codigo_de_retorno' => '2',
        //...all required fields
    ];

    $itemAttributes = [
        'tipo_de_registro' => '001',
        'codigo_de_inscricao' => '1',
        //...all required fields
    ];

  $headerObject = new Header($headerAttributes);
  $trailerObject = new Trailer($trailerAttributes);
  $itemObject = new Item($itemAttributes);

  $file = new File($headerObject, $trailerObject);
  $file->addItem($itemObject);

  $file->getContent(); // content of file
  //...
```

### Modo 2 - using factory

```php
<?php

  $factory = new Cnab400\Factory();

  $item = $factory->factoryReturnItem($itemAttributes);
  $file = $factory->factoryfile($headerAttributes, $trailerAttributes);
  $file->addItem(item);

  $file->getContent(); // content of file
```

## Console

Generate Doctrine Yaml files

```
 ./bin/brazilian-banking-automation
```

## Requisitos para uso

- PHP >= *7.1*

- [Composer Dependency Manager](http://getcomposer.org)

  Este componente **não é uma aplicação Stand Alone** e seu objetivo é ser utilizado como biblioteca.
Sua implantação deve ser feita por desenvolvedores experientes.

  **Isto não é um Plugin!**

  As opções que funcionam no modo de comando apenas servem para depuração em modo de
desenvolvimento.

  A documentação mais importante está nos testes unitários. Se você não consegue ler os testes unitários, eu recomendo que não utilize esta biblioteca.

  
<!-- license -->


  ## Direitos autorais e de licença

  Este componente está sob a [licença MIT](https://github.com/gpupo/common-sdk/blob/master/LICENSE)

  Para a informação dos direitos autorais e de licença você deve ler o arquivo
de [licença](https://github.com/gpupo/common-sdk/blob/master/LICENSE) que é distribuído com este código-fonte.

  ### Resumo da licença

  Exigido:

- Aviso de licença e direitos autorais

  Permitido:

- Uso comercial

- Modificação

- Distribuição

- Sublicenciamento

  Proibido:

- Responsabilidade Assegurada
