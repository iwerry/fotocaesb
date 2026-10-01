# Curso de Fotografia — Edição Caesb (PHP)

Site do **Curso de Fotografia — Alfabetização do Olhar**, edição Caesb,
com o **Prof. Daniel Rodrigues**. Versão em PHP (páginas modulares),
com textos adaptados para o público **60+** e banco de dados local.

---

## Como colocar no ar

1. Envie todos os arquivos para qualquer hospedagem com **PHP 8.0 ou superior**
   (Hostinger, Locaweb, Registro.br, HostGator, etc.).
2. Pronto — não há build, nem Node.js, nem banco externo.
3. Para testar no computador, na pasta do projeto:

   ```bash
   php -S localhost:8000
   ```

   e abra <http://localhost:8000>.

> O PHP precisa apenas da extensão `json` (sempre presente) e, de preferência,
> `pdo_sqlite`. Sem SQLite, as inscrições do formulário são salvas
> automaticamente em `data/storage/newsletter.json`.

## Estrutura

```
├── index.php            Página inicial (vídeo de capa + atalhos)
├── prof-daniel.php      Prof. Daniel
├── material.php         Baixe o Material
├── camera.php           Camera (Puter + material de leitura)
├── galeria.php          Galeria (fotos do professor e dos alunos)
├── api/
│   └── newsletter.php   Inscrições (JSON → SQLite)
├── config/
│   └── config.php       Contatos, rodapé, vídeo do hero, Puter
├── data/
│   ├── site.json        Textos do site (edite sem mexer em PHP)
│   ├── materiais.json   Materiais para download
│   ├── camera.json      Material de leitura "Conheça sua Camera"
│   ├── galeria.json     Fotos da galeria
│   └── storage/         Banco local (SQLite ou JSON) — criado sozinho
├── includes/            Cabeçalho, rodapé, bolinhas e funções
└── assets/              CSS, JS, imagens e materiais
```

## O que foi alterado em relação ao projeto original (React)

- Convertido para **PHP modular** (includes + páginas).
- Menu novo, com 4 itens: **Prof. Daniel · Baixe o Material · Camera · Galeria**.
- Removidos **"Nossa Jornada"** e os **módulos (PDFs e Áudios)**.
- O vídeo de capa continua o mesmo:
  *Curso de Fotografia (Alfabetizando o olhar - Caesb)*.
- **WhatsApp e telefone** do professor nas bolinhas de rede social
  (presentes em todas as páginas) e no rodapé.
- Rodapé: `© 2026 Curso de Fotografia Edição Caesb - Prof. Daniel Rodrigues`.
- Página **Camera** integrada ao **Puter.js**: abre o APP Camera do Puter
  (com conexão da conta Puter) e traz o material "Conheça sua Camera" para leitura.
- Formulário de novidades gravando em **SQLite local** (com fallback JSON).
- Tipografia maior, alto contraste e botões grandes — pensado para 60+.

## Como editar

| Quero mudar...               | Edite...                                          |
|------------------------------|---------------------------------------------------|
| Telefone / WhatsApp / Instagram | `config/config.php`                            |
| Textos das páginas           | `data/site.json`                                  |
| Materiais para download      | `data/materiais.json` + arquivos em `assets/docs/` |
| Texto do material da Camera  | `data/camera.json`                                |
| Fotos da galeria             | `data/galeria.json` + arquivos em `assets/galeria/`|
| Rodapé e vídeo do hero       | `config/config.php`                               |

## A Camera do Puter

A página `camera.php` usa o [Puter.js](https://developer.puter.com):

1. Conecta a conta Puter do visitante (criação gratuita, na hora).
2. Abre o **APP Camera do Puter** dentro do site (`puter.ui.launchApp('camera')`).
3. Se o navegador não permitir, abre `https://puter.com/app/camera` em nova aba.
4. Alternativa final: a **camera do próprio aparelho** (sem cadastro), com
   opção de baixar a foto ou enviar pelo WhatsApp.

> Exigência do Puter: o crédito "Powered by Puter" aparece no rodapé,
> conforme os termos do <https://developer.puter.com>.

## Inscrições de novidades

- `POST /api/newsletter.php` com `{"email": "..."}`.
- Grava em `data/storage/site.sqlite` (tabela `newsletter`).
- Se o SQLite não estiver disponível, grava em `data/storage/newsletter.json`.
