<?php
/**
 * Página: Prof. Daniel Rodrigues
 * Curso de Fotografia — Edição Caesb
 */
require_once __DIR__ . '/includes/bootstrap.php';

$pagina = $site['prof_daniel'] ?? [
    'titulo' => 'Prof. Daniel Rodrigues',
    'subtitulo' => 'Jornalista e motion designer com mais de 10 anos de experiência em fotografia e produção audiovisual.',
    'paragrafos' => [
        'Daniel trabalha com fotografia, cinematografia, edição de vídeo, motion design e produção audiovisual. Sua experiência abrange conteúdos jornalísticos, institucionais, documentais, culturais e digitais.',
        'Ao longo da carreira, atuou no Metrópoles.com e na CNA, além de trabalhar por 10 anos em produção audiovisual independente. Participa de diferentes etapas dos projetos: pesquisa e planejamento, captação, entrevistas, edição, pós-produção e entrega.',
        'No Curso de Fotografia — Edição Caesb, essa vivência se transforma em prática: observar a luz, escolher o enquadramento e contar histórias com a câmera ou o celular, no seu próprio ritmo.'
    ],
    'citacao' => 'A técnica qualquer um aprende com o tempo. Mas o olhar atento, a paciência e a alegria de registrar a vida pertencem a quem se permite desacelerar e contemplar.',
    'destaques' => [
        'Fotografia e cinematografia para projetos jornalísticos, institucionais e documentais',
        'Da pesquisa e captação à edição, pós-produção e entrega',
        'Motion design e narrativa visual para diferentes públicos e plataformas'
    ],
    'experiencias' => [
        ['organizacao' => 'Metrópoles.com', 'cargo' => 'Editor de vídeo e motion designer', 'descricao' => 'Produção audiovisual em ambiente jornalístico, integrando contexto editorial, captação de imagens, narrativa visual, edição e conteúdo para o site e as redes sociais.'],
        ['organizacao' => 'CNA — Confederação da Agricultura e Pecuária do Brasil', 'cargo' => 'Editor e motion designer', 'descricao' => 'Criação e edição de conteúdo audiovisual para comunicação institucional, em colaboração com jornalistas e equipes de comunicação, incluindo atividades ligadas à COP30 (Zona Verde).'],
        ['organizacao' => 'Produção audiovisual independente', 'cargo' => 'Direção de fotografia, edição e motion design · 10 anos', 'descricao' => 'Projetos corporativos, documentários, conteúdo promocional, eventos culturais, entrevistas e pós-produção, da concepção à entrega, incluindo trabalhos com financiamento público e Lei Rouanet.']
    ],
    'formacao' => 'Bacharelado em Audiovisual — Cinema, Universidade Uninabuco Digital (2024–2025).',
    'idiomas' => ['Português — nativo', 'Espanhol — avançado', 'Inglês — leitura profissional e técnica'],
    'certificacoes' => [
        'texto' => 'Mais de 90 certificações profissionais em audiovisual e jornalismo investigativo.',
        'url' => 'https://drive.google.com/drive/folders/1CzAd2TRzlszizv5Tpz7VWMGog4B78gaL?usp=sharing'
    ],
    'cta' => 'Falar com o Prof. Daniel no WhatsApp'
];

$pageTitle = $pagina['titulo'];
$pageDesc = $pagina['subtitulo'];

include __DIR__ . '/includes/header.php';
?>

<section class="cabecalho-pagina">
    <div class="envoltorio scroll-reveal">
        <h1><?= e($pagina['titulo']) ?></h1>
        <p class="cabecalho-subtitulo"><?= e($pagina['subtitulo']) ?></p>
    </div>
</section>

<section class="secao">
    <div class="envoltorio">
        <div class="duas-colunas">
            <figure class="foto-professor scroll-reveal-left">
                <img src="Daniel.png" alt="Professor Daniel Rodrigues em retrato" loading="lazy">
                <figcaption><?= e($config['professor']) ?></figcaption>
            </figure>

            <div class="texto-professor scroll-reveal-right">
                <?php foreach ($pagina['paragrafos'] as $paragrafo): ?>
                    <p class="texto-grande"><?= e($paragrafo) ?></p>
                <?php endforeach; ?>

                <blockquote class="citacao">
                    “<?= e($pagina['citacao']) ?>”
                    <cite>— <?= e($config['professor']) ?></cite>
                </blockquote>

                <?php if (!empty($pagina['destaques'])): ?>
                    <section class="curriculo-bloco" aria-labelledby="areas-professor">
                        <h2 id="areas-professor">Áreas de atuação</h2>
                        <ul class="lista-destaques">
                            <?php foreach ($pagina['destaques'] as $destaque): ?>
                                <li><?= e($destaque) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </section>
                <?php endif; ?>

                <?php if (!empty($pagina['experiencias'])): ?>
                    <section class="curriculo-bloco" aria-labelledby="trajetoria-professor">
                        <h2 id="trajetoria-professor">Experiência profissional</h2>
                        <ol class="lista-experiencias">
                            <?php foreach ($pagina['experiencias'] as $experiencia): ?>
                                <li>
                                    <h3><?= e($experiencia['organizacao']) ?></h3>
                                    <p class="experiencia-cargo"><?= e($experiencia['cargo']) ?></p>
                                    <p><?= e($experiencia['descricao']) ?></p>
                                </li>
                            <?php endforeach; ?>
                        </ol>
                    </section>
                <?php endif; ?>

                <div class="curriculo-detalhes">
                    <?php if (!empty($pagina['formacao'])): ?>
                        <section class="curriculo-bloco" aria-labelledby="formacao-professor">
                            <h2 id="formacao-professor">Formação</h2>
                            <p><?= e($pagina['formacao']) ?></p>
                        </section>
                    <?php endif; ?>

                    <?php if (!empty($pagina['idiomas'])): ?>
                        <section class="curriculo-bloco" aria-labelledby="idiomas-professor">
                            <h2 id="idiomas-professor">Idiomas</h2>
                            <ul class="lista-idiomas">
                                <?php foreach ($pagina['idiomas'] as $idioma): ?>
                                    <li><?= e($idioma) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </section>
                    <?php endif; ?>
                </div>

                <?php if (!empty($pagina['certificacoes']['url'])): ?>
                    <p class="certificacoes-link">
                        <?= e($pagina['certificacoes']['texto']) ?>
                        <a href="<?= e($pagina['certificacoes']['url']) ?>" target="_blank" rel="noopener noreferrer">Consultar certificados</a>
                    </p>
                <?php endif; ?>

                <div class="hero-acoes">
                    <a class="botao botao-primario" href="<?= e(whatsapp_url('Olá, Prof. Daniel! Vim pelo site do Curso de Fotografia.')) ?>"
                       target="_blank" rel="noopener noreferrer"><?= e($pagina['cta']) ?></a>
                    <a class="botao botao-secundario" href="<?= e($config['instagram']) ?>" target="_blank" rel="noopener noreferrer">
                        <?= e($config['instagram_txt']) ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="secao secao-clara scroll-reveal">
    <div class="envoltorio envoltorio-estreito" style="text-align: center;">
        <h2 class="secao-titulo">Um convite do professor</h2>
        <p class="texto-grande">
            Fotografar é um prazer que não tem idade. Se ficou com qualquer dúvida, mande uma mensagem
            no WhatsApp — será um enorme prazer conversar e acompanhar o seu aprendizado.
        </p>
        <div class="hero-acoes" style="justify-content: center; margin-top: 2rem;">
            <a class="botao botao-primario" href="<?= e(whatsapp_url('Olá, Prof. Daniel! Quero tirar uma dúvida sobre o curso.')) ?>" target="_blank" rel="noopener noreferrer">
                Conversar no WhatsApp
            </a>
            <a class="botao botao-secundario" href="material.php">
                Baixar o material
            </a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
