# Kanban para gerenciamento de tarefas (Laravel 11 + PHP 8.2 + PostgreSQL + Tailwind)

## Desenvolvido por Bruno Corral

Este projeto foi desenvolvido como parte do processo seletivo para a vaga Desenvolvedor Fullstack Laravel - Vox Tecnologia.

---

## Tecnologias utilizadas

- PHP 8.2
- Laravel 11.x
- PostgreSQL
- TailwindCSS

---

## Instalação e configuração

### Clonando o projeto
```bash
git clone https://github.com/seu-usuario/kanban_tasks
cd kanban_tasks
```

### Configurando o arquivo `.env`
```bash
cp .env.example .env
```

No `.env`, ajuste as variáveis de banco:
```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=2222
DB_DATABASE=kanban_db
DB_USERNAME=postgres
DB_PASSWORD=postgres
```

### Gerando a key da aplicação
```bash
php artisan key:generate
```

### Rodando as migrations
```bash
php artisan migrate
```

### Rodando o servidor interno do Laravel
```bash
php artisan serve
```

### Rodando o comando npm (em um outro terminal) para executar e empacotar todos os pacotes para o front-end
```bash
npm run dev
```

### Acessando a aplicação no navegador
```
http://localhost:8000
```

---

## Seguindo padrões de commits baseados do site
* https://www.conventionalcommits.org/pt-br/v1.0.0-beta.4/

---

## Sobre mim

Projeto desenvolvido por Bruno Corral como parte do processo seletivo para Desenvolvedor Fullstack Laravel - Vox Tecnologia.  
Focado em boas práticas, clareza de código e eficiência.

---

## Licença
Este projeto foi desenvolvido exclusivamente para fins de avaliação técnica.