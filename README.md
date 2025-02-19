## Gestão de Gastos
Este projeto é um painel de gestão financeira, para pessoas conseguirem gerar um entendimento e análise mais detalhada de sua vida financeira.
Futuramente, após a versão 1.0 completa o projeto será incluido em um servidor VPS para ser disponibilizado gratuitamente para usuários poderem gerir sua vida financeira.

### Funcionalidades
- Cruds
    - Categorias de Renda
    - Periodos
    - Rendas
    - Categorias de Despesa
    - Potes
    - Despesas

### Requisitos
- Docker

### Instalação

#### Clone o repositório:
```bash
git clone https://github.com/txrangel/gestao-gastos.git
cd gestao-gastos
```

#### Copiar Env:
```bash
cp .env.example .env
```

#### Baixar Sail:
```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php84-composer:latest \
    composer install --ignore-platform-reqs
```

#### Iniciar o servidor:
```bash
./vendor/bin/sail up --build
```

#### Instalar Dependências:
```bash
./vendor/bin/sail composer install
./vendor/bin/sail npm install
```

#### Iniciar o servidor:
```bash
./vendor/bin/sail npm run dev
```

#### Criar chave do programa (se não houver):
```bash
./vendor/bin/sail artisan key:generate
```

#### Rodar as migrações:
```bash
./vendor/bin/sail artisan migrate
```

#### Linkar base para imagens
```bash
./vendor/bin/sail artisan storage:link
```

### Coisas para fazer
- Adicionar data nas rendas
- Adicionar validação de parcelas nas despesas para criar as despesas filhas
- Adicionar data nas despesas
- Criar extrato mensal (primeiro dia do mês adiciona as rendas/despesas fixas)
- Criar rotina que gera os extratos mensais (selecionar periodo para regerar)
- Ao adicionar um usuário (registro) criar itens básicos (categoria de renda/periodos/categorias de despesa/potes)
- Ao adicionar uma despesa (ou despesa filha) regerar os extratos atuais e mensais subsequentes
- Criar "Estilo de potes" (para verificar como seria o extrato em diferentes maneiras de gestão)