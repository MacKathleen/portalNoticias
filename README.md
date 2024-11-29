# Portal de Notícias em PHP

## 🎯 Objetivo

O objetivo deste projeto é desenvolver um **sistema completo de portal de notícias** em PHP, aplicando os conceitos de desenvolvimento web adquiridos ao longo da disciplina. O sistema oferece funcionalidades para o **cadastro, login e gerenciamento de usuários**, além de permitir a **criação, edição, remoção e visualização de notícias**. A proposta é fornecer uma aplicação funcional e intuitiva para gerenciar usuários e notícias de forma eficiente. 🚀

## 🔧 Funcionalidades

O sistema desenvolvido possui as seguintes funcionalidades principais:

### 1. **Autenticação de Usuários 🔑**
- **Cadastro de Usuários**: Permite o registro de novos usuários no sistema.
- **Login**: Usuários podem se autenticar para acessar a área restrita do portal.
- **Gerenciamento de Usuários**: Usuários podem alterar e excluir.

### 2. **Gerenciamento de Notícias 📰**
- **Inserir Notícias**: Permite que usuários cadastrados adicionem novas notícias ao portal.
- **Editar Notícias**: Usuários podem editar as notícias que cadastraram.
- **Excluir Notícias**: É possível remover notícias do portal.
- **Listar Notícias**: Exibe todas as notícias cadastradas com títulos e resumos.

### 3. **Interface de Visualização 📱💻**
- **Página Inicial**: Exibe uma lista das notícias publicadas, incluindo título, resumo e autor. A interface é **responsiva e intuitiva**, garantindo uma boa experiência em dispositivos móveis e desktops.

## 🛠️ Requisitos Técnicos

### 1. **Tecnologias Utilizadas**
- **PHP**: Linguagem de programação usada para desenvolver a lógica do sistema.
- **MySQL**: Banco de dados utilizado para armazenar as informações dos usuários e notícias.
- **HTML, CSS e Bootstrap**: Para criação e estilização da interface do sistema, garantindo que seja responsiva e fácil de usar.

### 2. **Estrutura do Banco de Dados**
O sistema utiliza um banco de dados MySQL com duas tabelas principais:
- **Usuários**: Contém as informações dos usuários, como nome, email, senha e outras configurações.
- **Notícias**: Armazena as notícias publicadas, com título, conteúdo, data de publicação, autor (referência ao usuário) e imagem.

### 3. **Relacionamento entre Tabelas**
A tabela de **notícias** possui uma chave estrangeira que referencia o **id** do usuário na tabela de **usuários**. Dessa forma, é possível associar cada notícia ao usuário que a cadastrou.

## 📂 Estrutura do Projeto

A estrutura do projeto foi organizada da seguinte forma:

```
/portal-de-noticias
│
├── /classes            # Contém as classes PHP para a lógica de negócios (usuarios, noticias, etc.)
│   ├── /database       # Contém os scripts para interação com o banco de dados
│   ├── /noticias       # Funções e lógicas específicas para o gerenciamento de notícias
│   └── /usuarios       # Funções e lógicas para o gerenciamento de usuários
│
├── /config             # Arquivos de configuração do sistema
│   └── config.php      # Arquivo de configuração principal do sistema
│
├── /styles             # Arquivos CSS para estilização do portal
│   ├── cadastroN.css   # Estilo para a página de cadastro de notícias
│   ├── editar.css      # Estilo para a página de edição de dados do usuário
│   ├── editarNoticias.css # Estilo para a página de edição de notícias
│   ├── gerenciador.css # Estilo para a página de gerenciamento de notícias
│   ├── index.css       # Estilo para a página inicial
│   ├── login.css       # Estilo para a página de login
│   ├── portal.css      # Estilo para o portal de exibição de notícias
│   └── registrar.css   # Estilo para a página de registro de usuário
│
├── /upload             # Pasta para armazenar imagens de notícias e outros uploads
│   └── /img            # Imagens relacionadas às notícias
│
├── /cadastroNoticias.php   # Função para cadastrar notícias
├── /deletar.php        # Função para excluir usuários
├── /deletarNoticia.php # Função para excluir notícias
├── /editar.php         # Função para editar dados do usuário
├── /editarNoticia.php  # Função para editar notícias
├── /gerenciador.php    # Função de gerenciamento de notícias
├── /index.php          # Página principal (index)
├── /login.php          # Função de login
├── /logout.php         # Função de logout
├── /portal.php         # Página de exibição das notícias
└── /registrar.php      # Função para registrar novos usuários
```

## 📝 Instruções de Uso

1. **Clone o repositório:**

   ```bash
   git clone https://github.com/SEU-USUARIO/portal-de-noticias.git
   ```

2. **Configuração do Banco de Dados:**
   - Crie um banco de dados MySQL.
   - Importe o arquivo de dump do banco de dados que está presente no repositório.
   - Configure o arquivo `config/config.php` para conectar ao banco de dados, alterando as credenciais conforme necessário.

3. **Configuração do Ambiente:**
   - Certifique-se de que você tem o PHP instalado na versão 7.4 ou superior.
   - Use um servidor web, como Apache ou Nginx, para rodar o sistema localmente.

4. **Execução do Sistema:**
   - Após configurar o ambiente, acesse a página inicial `index.php` no seu navegador para começar a utilizar o portal de notícias.

## 📝 Licença

Este projeto está licenciado sob a [MIT License](LICENSE).

## 👩‍💻 Criadora

Este projeto foi desenvolvido por **Kathleen Machado**. 👏

## 🎉 Conclusão

Este sistema de portal de notícias foi desenvolvido com o objetivo de aplicar os conceitos de desenvolvimento web em um projeto prático. Ele oferece funcionalidades essenciais de gestão de usuários e notícias, sendo uma base sólida para projetos futuros mais complexos. 💡
