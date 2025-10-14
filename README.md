# 🧭 Laravel Task Manager

Um sistema simples e elegante de **gerenciamento de tarefas (CRUD)** desenvolvido em **Laravel 11** com **Bootstrap 5**, incluindo **modo escuro** e **armazenamento via SQLite**.

---

## 🚀 Funcionalidades

✅ Criar novas tarefas;
✅ Adicionar ID de usuário criador;
✅ Listar todas as tarefas registradas;
✅ Editar tarefas existentes;
✅ Excluir tarefas;
✅ Dashboard com:
    ■porcentagem de tarefas por status;
    ■apresentação das últimas 5 tarefas criadas.
✅ Alternar entre **modo claro e escuro** 
✅ Interface responsiva e moderna com **Bootstrap 5**

---

## 🛠️ Tecnologias Utilizadas

- **Laravel 11** (backend e rotas)
- **Bootstrap 5.3** (frontend e responsividade)
- **SQLite** (banco de dados local)
- **Blade** (sistema de templates do Laravel)
- **Vite** (build dos assets)

---

## ⚙️ Instalação e Configuração

### 1️⃣ Clonar o repositório
```bash
git clone https://github.com/BrunoLisboaSilva/task-manager.git
cd task-manager
```

### 2️⃣ Instalar as dependências do projeto
```bash
composer install
npm install
```

### 3️⃣ Configurar o ambiente
Copie o arquivo `.env.example` e renomeie:
```bash
cp .env.example .env
```

Gere a chave da aplicação:
```bash
php artisan key:generate
```

---

## 🧩 Banco de Dados

O projeto utiliza **SQLite**, já configurado no `.env`.

Caso o arquivo não exista:
```bash
touch database/database.sqlite
```

Execute as migrações e os seeders:
```bash
php artisan migrate --seed
```

---

## 💻 Rodar o Servidor

Execute o servidor backend:
```bash
php artisan serve
```

E o servidor frontend (Vite):
```bash
npm run dev
```

Acesse em:  
👉 [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 🎨 Tema Escuro e Claro

O layout alterna entre **modo claro** e **modo escuro** com um simples clique, e a preferência do usuário é salva no navegador.

```html
<button id="themeToggle" class="btn btn-outline-secondary">
    <i class="bi bi-moon-fill"></i>
</button>
```

---

## 📁 Estrutura do Projeto

```
app/
 ├── Http/
 │   └── Controllers/
 │        ├── TaskController.php
 │        └── WebTaskController.php
 ├── Models/
 │   └── Task.php
database/
 ├── migrations/
 ├── seeders/
 └── factories/
resources/
 └── views/
      └── tasks/
          ├── index.blade.php
          ├── create.blade.php
          ├── edit.blade.php
routes/
 └── web.php
```

---

## 🧠 Conceitos Aplicados

- Arquitetura **MVC** (Model-View-Controller)  
- **Validação de formulários** com `Request->validate()`  
- **Blade Templates** para as views  
- **Eloquent ORM** para manipulação do banco de dados  
- **Bootstrap Icons** e **modo escuro persistente**  
- Uso de **seeders** e **factories** para popular o banco

---

## 🧑‍💻 Autor

**Bruno Lisboa da Silva, 23 anos, Formando em Sistemas de Informação pelo IFCE** 

---

## 📜 Licença

Este projeto está licenciado sob a licença **MIT**. 
Sinta-se livre para usar, modificar e distribuir.


---