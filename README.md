# 🍔 NXT Burguer

Sistema web para uma hamburgueria, com cardápio online, login de funcionários e área administrativa.

## Funcionalidades
- Cardápio dividido em hambúrgueres, combos, bebidas e sobremesas
- Login de funcionários com senha criptografada (`password_hash` / `password_verify`)
- Área administrativa: cadastro de funcionários e de produtos
- Perfis de acesso: administrador e usuário
- Listagem das unidades da hamburgueria

## Tecnologias
- PHP (com *prepared statements*)
- MySQL
- HTML e CSS

## Banco de dados
Tabelas principais: `unidade`, `funcionario` e `produto` (script em [`db.sql`](db.sql)).

## Como executar
1. Instale o [XAMPP](https://www.apachefriends.org/) (Apache + MySQL).
2. Clone este repositório dentro da pasta `htdocs`.
3. No phpMyAdmin, importe o arquivo `db.sql`.
4. Confira os dados de conexão em `db.php`.
5. Acesse `http://localhost/nxt_burguer`.

---
Desenvolvido por [Gustavo Baumann](https://www.linkedin.com/in/gustavo-baumann-92b1442a1/).
