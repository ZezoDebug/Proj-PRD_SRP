# :package: Cadastro e Listagem de Produtos em PHP com SRP + PSR-4

**Cadastro de Produtos** é um projeto educacional em PHP que demonstra como aplicar os princípios de **Clean Code**, como **SRP**, **PSR-12**, **PSR-4 Autoload**, além da organização por camadas e persistência via **arquivos JSON (sem banco de dados)**.

Foi desenvolvido para rodar em **XAMPP**, com uso de **Composer** e sem frameworks externos.

---

> [!IMPORTANT]
> :scroll: Licença:
>
> Projeto desenvolvido para **fins educacionais** na disciplina de Design Patterns e Clean Code.  
> Livre para modificar, adaptar e evoluir.
>
> **Obs:** Informações sobre os colaboradores e a instituição estão no final deste READme.

---

## :dart: Objetivos de Aprendizagem

- Aplicar **SRP (Single Responsibility Principle)** na separação de responsabilidades.  
- Utilizar **Composer** e **autoload PSR-4**.  
- Organizar o projeto em camadas claras: `Application`, `Domain`, `Infra`, `public`, `storage`.  
- Persistir dados em arquivos (`.txt`) com **JSON por linha**.  
- Praticar **validações** e **regras de negócio simples**.  
- Escrever casos de teste manuais e reprodutíveis.

---

## :sparkles: Funcionalidades

- **Cadastrar Produto**
  - Valida nome (2–100 caracteres).
  - Valida preço (numérico e ≥ 0).
  - Gera ID incremental.
  - Persiste produto no arquivo `storage/products.txt` em formato JSON por linha.

- **Listar Produtos**
  - Lê todos os produtos do arquivo.
  - Exibe em tabela simples com `id`, `name` e `price`.

---

## :open_file_folder: Estrutura do Projeto

```
products-srp-demo/
├─ composer.json
├─ vendor/
├─ src/
│ ├─ Contracts/
│ │ ├─ ProductRepository.php
│ │ └─ ProductValidator.php
│ ├─ Application/
│ │ └─ ProductService.php
│ ├─ Domain/
│ │ └─ SimpleProductValidator.php
│ └─ Infra/
│ └─ FileProductRepository.php
├─ public/
│ ├─ index.php
│ ├─ create.php
│ └─ products.php
└─ storage/
└─ products.txt
```
---

## :gear: Como Executar

### Pré-requisitos
- [XAMPP](https://www.apachefriends.org/index.html) instalado.
- [Composer](https://getcomposer.org/) instalado.

### Passos
1. Clone ou copie o projeto para a pasta `htdocs` do XAMPP:
```
C:\xampp\htdocs\products-srp-demo
```
2. No terminal, dentro do projeto, rode:
```
composer dump-autoload
```
3. Inicie o Apache pelo painel do XAMPP.
4. Acesse no navegador:
```
http://localhost/products-srp-demo/public/
```

---

## :warning: Limitações

- Não há edição nem remoção de produtos.

- Sem autenticação ou ordenação/paginação.

- Persistência apenas em arquivo .txt (não há banco de dados).

---

## :white_check_mark: Boas Práticas Aplicadas
### SRP (Single Responsibility Principle)

- Cada classe tem uma única responsabilidade:

  - ProductService → orquestra cadastro e listagem.
  - FileProductRepository → leitura/escrita no arquivo.
  - impleProductValidator → valida campos de entrada.

### PSR-4 Autoload

- Estrutura organizada por namespaces e Composer.

### PSR-12

- Código limpo e formatado (uso recomendado de phpcs, phpcbf).

---

## Informacões Adicionais

- **Nome:** Felipe Souza Garcia | **RA:** 1990279 :man_technologist:
- **Nome:** José Vitor de Almida Lima | **RA:** 1994104 :man_technologist:

### Informações Acadêmicas
- **Universidade:** UNIMAR - Universidade de Marília :school:
- **Curso:** Analise e Desenvolvimento de Sistemas :mortar_board:
- **Disciplina:** Design Patterns e Clean Code :computer:
- **Docente:** Valdir Amancio Pereira Jr. :man_teacher:
