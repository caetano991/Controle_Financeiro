# 💰 FinançasPro

O **FinançasPro** é uma aplicação web de controle financeiro pessoal desenvolvida para ajudar usuários a gerenciarem suas receitas e despesas de forma simples e intuitiva. O projeto foi construído do zero, aplicando conceitos modernos de desenvolvimento web e arquitetura MVC.

---

## 🚀 Funcionalidades Principais

- **Dashboard Financeiro:** Visualização clara do total de Receitas, Despesas e Saldo Atual por meio de cards dinâmicos.
- **Indicador de Status:** Alerta visual baseado no saldo do usuário (ex: "Você está RICO").
- **Gerenciamento de Transações:** Cadastro simplificado de novas movimentações através de uma janela modal dedicada, contendo:
  - Tipo (Receita ou Despesa)
  - Data da transação
  - Descrição personalizada
  - Categoria (ex: Salário, Mercado)
  - Valor
- **Filtros Avançados de Busca:** Página exclusiva de buscas que permite filtrar os registros por diferentes critérios (como Data, Categoria, etc.) para uma análise mais detalhada das finanças.
- **Reset de Dados:** Opção para limpar de forma rápida os registros armazenados.

---

## 🛠️ Tecnologias Utilizadas

Este projeto foi desenvolvido utilizando as seguintes tecnologias:

- **Backend:** PHP (Framework **Laravel**)
- **Frontend:** HTML5, CSS3 / Blade Templates (Estruturação e estilização da interface)
- **Banco de Dados:** MySQL / SQLite *(ajuste aqui conforme o banco que usou)*
- **Ferramentas:** Git e GitHub (Controle de versão)

---

## 📸 Demonstração do Sistema

### 1. Tela Inicial / Dashboard
Interface principal exibindo o controle de saldo e as últimas transações cadastradas.
<img width="1919" height="969" alt="Captura de tela 2026-06-16 120855" src="https://github.com/user-attachments/assets/05e566f2-370c-425c-a222-4d387effca42" />


### 2. Cadastro de Nova Transação
Janela modal flutuante configurada para entrada de dados de receitas ou despesas.
<img width="1919" height="973" alt="Captura de tela 2026-06-16 120907" src="https://github.com/user-attachments/assets/6ed77d2a-b153-4084-a61b-cb3753549aa2" />


### 3. Sistema de Filtros e Busca
Filtros dinâmicos em ação para segmentar transações por categorias específicas.
<img width="1919" height="973" alt="Captura de tela 2026-06-16 120943" src="https://github.com/user-attachments/assets/4fdfaac6-12b9-4e2c-b64f-78b09d22fa66" />
<img width="1919" height="971" alt="Captura de tela 2026-06-16 121009" src="https://github.com/user-attachments/assets/fa39dba7-b813-4c06-9d78-ad58d3c49ee1" />

---

## 🔧 Como Executar o Projeto Localmente

### Pré-requisitos
Antes de começar, você vai precisar ter instalado em sua máquina o **PHP**, o **Composer** e um gerenciador de banco de dados (como MySQL ou o ambiente do XAMPP).

1. Clone este repositório:
   ```bash
   git clone [https://github.com/SEU_USUARIO/NOME_DO_REPOSITORIO.git](https://github.com/SEU_USUARIO/NOME_DO_REPOSITORIO.git)
   Acesse a pasta do projeto:

Bash
cd NOME_DO_REPOSITORIO
Instale as dependências do Laravel:

Bash
composer install
Crie o seu arquivo de configuração .env a partir do exemplo:

Bash
cp .env.example .env
(Configure as credenciais do seu banco de dados dentro do arquivo .env se necessário)

Gere a chave da aplicação Laravel:

Bash
php artisan key:generate
Execute as migrações para criar as tabelas no banco de dados:

Bash
php artisan migrate
Inicie o servidor embutido do PHP:

Bash
php artisan serve
Abra o seu navegador e acesse: http://127.0.0.1:8000

👨‍💻 Autor
Desenvolvido por Miguel Caetano Estudante de Análise e Desenvolvimento de Sistemas (ADS) no SENAI.
