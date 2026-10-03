# Product

<!-- impeccable:product-schema 1 -->

## Platform

web

## Users

Adultos que querem aprender fotografia e consultam o site da edição Caesb para acompanhar o curso, estudar materiais e praticar no próprio ritmo.

## Product Purpose

Apoiar o Curso de Fotografia Express — Edição Caesb, com informações sobre a aula, materiais de estudo, recursos de prática e acesso ao professor. A aula tem 60 minutos e quatro módulos; o sucesso é ajudar alunos adultos a observar com intenção e aplicar os fundamentos em fotos feitas com o celular.

## Positioning

Ensinar fotografia em uma aula direta, prática e visual: sair do olhar automático para escolhas conscientes de luz, enquadramento e composição, usando o celular que o aluno já tem.

## Operating Context

O site é acessado pelo navegador. Os alunos podem consultar o perfil do professor, baixar materiais, experimentar recursos da Camera Pro, ver a galeria e entrar em contato. O responsável edita e testa as mudanças localmente e publica os arquivos manualmente por FTP.

## Capabilities and Constraints

- Site modular em PHP 8 ou superior, sem etapa de build para publicação.
- Textos e listas de conteúdo são mantidos em arquivos JSON locais.
- As páginas incluem perfil do professor, material didático, Camera Pro e galeria.
- A página Material oferece a apostila `Curso de Fotografia Express · Edição Caesb` em PDF para download e o podcast `Do olhar biológico à fotografia intencional` num player web com volume e velocidade ajustáveis.
- O podcast não tem botão de download na interface.
- A Camera Pro integra Puter.js e oferece alternativas com a câmera do aparelho.
- O formulário de novidades usa SQLite quando disponível e tem fallback em JSON.
- A hospedagem não deve depender de Node.js, de um banco externo ou de um processo de deploy automatizado.
- As alterações são preparadas localmente e enviadas manualmente via FTP.

## Brand Commitments

- Nome do programa atual: Curso de Fotografia Express.
- Edição Caesb.
- Professor: Daniel Rodrigues.
- A aula dura 60 minutos, organiza-se em quatro módulos e prioriza a prática com o celular.

## Evidence on Hand

- Páginas e conteúdo do curso: `index.php`, `prof-daniel.php`, `material.php`, `camera.php` e `galeria.php`.
- Conteúdo editável: `data/site.json`, `data/materiais.json`, `data/camera.json` e `data/galeria.json`.
- Materiais atuais em `assets/docs/`: apostila em PDF e episódio em MP3; fotos em `assets/galeria/` e `assets/img/`.
- O projeto configura canais de contato e uma integração Camera Pro/Puter.
- Não foram confirmados depoimentos, métricas de resultado ou outras provas comerciais; não inventar esses elementos.

## Product Principles

- Tornar o acesso ao curso e aos materiais claro para alunos adultos.
- Priorizar a observação e a prática fotográfica em vez da dependência de equipamento específico.
- Ensinar conceitos em linguagem simples numa aula prática de 60 minutos.
- Preservar a identidade confirmada do curso, da edição Caesb e do professor.
- Manter a publicação compatível com PHP e o fluxo manual de FTP.
