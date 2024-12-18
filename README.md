
# Homenagem Final

Este é o repositório para o projeto **Homenagem Final**. Aqui encontrarás todas as instruções necessárias para configurar o ambiente de desenvolvimento e colaborar neste projeto.

---

## 🚀 Instalação

### 1. Pré-requisitos
Certifica-te de que tens os seguintes softwares instalados no teu sistema:

- [XAMPP](https://www.apachefriends.org/index.html) (para servidor local e MySQL)
- [Composer](https://getcomposer.org/) (gestor de dependências PHP)
- [Git](https://git-scm.com/) (para clonar o repositório)
- [Node.js](https://nodejs.org/) (opcional, para gestão de assets e front-end)

### 2. Clonar o Repositório
1. Abre o terminal.
2. Navega para a pasta onde queres guardar o projeto:
   ```bash
   cd /caminho/para/a/pasta
   ```
3. Clona o repositório:
   ```bash
   git clone https://github.com/mandinho0/homenagemFinal.git tenProject
   ```
4. Entra no diretório do projeto:
   ```bash
   cd tenProject
   ```

---

### 3. Configurar o Projeto

#### 3.1 Instalar Dependências PHP
1. Certifica-te de que o **Composer** está instalado:
   ```bash
   composer --version
   ```
2. Instala as dependências:
   ```bash
   composer install
   ```

#### 3.2 Configurar Variáveis de Ambiente
1. Copia o ficheiro `.env.example` para `.env`:
   ```bash
   cp .env.example .env
   ```
2. Atualiza as configurações do `.env` com as credenciais da tua base de dados MySQL. Exemplo:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=tenproject
   DB_USERNAME=root
   DB_PASSWORD=
   ```

#### 3.3 Criar a Base de Dados
1. Abre o **phpMyAdmin** ou usa o terminal para criar uma base de dados chamada `tenproject`.
2. No terminal, executa as migrações:
   ```bash
   php artisan migrate
   ```

---

### 4. Iniciar o Servidor
1. Inicia o servidor local com o XAMPP (Apache e MySQL).
2. Corre o servidor Laravel:
   ```bash
   php artisan serve
   ```
3. Acede à aplicação no navegador:
   http://127.0.0.1:8000

---

## 🛠 Colaborar

### 1. Criar uma Nova Branch
1. Certifica-te de que estás na branch `master`:
   ```bash
   git checkout master
   ```

### 2. Fazer Commits
1. Adiciona os ficheiros alterados:
   ```bash
   git add .
   ```
2. Faz o commit com uma mensagem descritiva:
   ```bash
   git commit -m "Descrição das alterações"
   ```

### 3. Antes de Enviar as Alterações
1. Atualiza a branch remota:
   ```bash
   git pull origin master
   ```
### 4. Enviar Alterações
1. Envia as alterações para o repositório remoto:
   ```bash
   git push origin master
   ```
2. Cria um Pull Request no GitHub para revisão.

---

## 📚 Recursos Adicionais

- [Laravel Documentação](https://laravel.com/docs)
- [Composer](https://getcomposer.org/)
- [Git Documentation](https://git-scm.com/doc)
- [Node.js Documentation](https://nodejs.org/en/docs/)

---

## 📞 Suporte

Se encontrares problemas, entra em contacto com o autor deste repositório ou cria uma [issue](https://github.com/mandinho0/homenagemFinal/issues).

