# Página Brazilian Banking Automation

**A Página Brazilian Banking Automation** é estática gerada através do  ([Jekyll Repository](https://github.com/jekyll/jekyll))

Está é sobre biblioteca para automação de aplicações inseridas no mercado Brasileiro (https://github.com/gpupo/brazilian-banking-automation)  de autoria do [Gilmar Pupo](https://github.com/gpupo).



## Processo de construção



Passo 1) Fork do repositório e clone

```
git clone <url-repositorio-forked> nova-pasta && cd nova-pasta 
```

Passo 2) Criado um novo branch "gh-pages"

```
$ git checkout -b gh-pages
```

Passo 3) Apagado os arquivos do branch.

Passo 4) Install Bundler

```
gem install bundler
# Installs the Bundler gem
```

Passo 5) Como não tinha o Gemfile, o criei e inserir o seguintes dados:

```
source 'https://rubygems.org'
gem 'github-pages', group: :jekyll_plugins
```

Passo 6) Roda o código Bundle install para instalar as dependências

```
$ bundle install
Fetching gem metadata from https://rubygems.org/............
Fetching version metadata from https://rubygems.org/...
Fetching dependency metadata from https://rubygems.org/..
Resolving dependencies...
```

Passo 7) Copiei os arquivos da página de modelo [netshoes-sdk](https://github.com/gpupo/netshoes-sdk/tree/gh-pages) e colei na pasta

Passo 8) Rodei o servidor para ir visualizando as alterações

```
$ bundle exec jekyll serve
```

Passo 9) Inseri os textos do repositório do **README.md** , do master, no **index.md** . Para otimizar a estrutura da página, utilizei como referência o projeto [Jekyll-now](https://github.com/barryclark/jekyll-now).

Basicamente foquei em melhorar as metatags e deixar a estrutura mais modular com sass e injections.


