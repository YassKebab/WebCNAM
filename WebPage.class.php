<?php
class WebPage
{
    /**
     * Texte compris entre \<head\> et \</head\>.
     *
     * @var string $head
     */
    private $head = '';

    /**
     * Texte compris entre \<title\> et \</title\>.
     *
     * @var string $title
     */
    private $title = null;

    /**
     * Texte compris entre \<body\> et \</body\>.
     *
     * @var string $body
     */
    private $body = '';

    /**
     * Constructeur.
     *
     * @param string $title Titre de la page
     */
    public function __construct(string $title = null)
    {
        if (!is_null($title)) {
            $this->setTitle($title);
        }
    }

    /**
     * Retourner le contenu de $this->body.
     *
     * @return string
     */
    public function body(): string
    {
        return $this->body;
    }

    /**
     * Retourner le contenu de $this->head.
     *
     * @return string
     */
    public function head(): string
    {
        return $this->head;
    }

    /**
     * Affecter le titre de la page.
     *
     * @param string $title Le titre
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * Ajouter un contenu dans $this->head.
     *
     * @param string $content Le contenu à ajouter
     */
    public function appendToHead(string $content): void
    {
        $this->head .= $content;
    }

    /**
     * Ajouter un contenu CSS dans head.
     *
     * @see WebPage::appendToHead(string $content) : void
     *
     * @param string $css Le contenu CSS à ajouter
     */
    public function appendCss(string $css): void
    {
        $this->appendToHead(/** @lang text */ <<<HTML
    <style type='text/css'>
    $css
    </style>

HTML
        );
    }

    /**
     * Ajouter l'URL d'un script CSS dans head.
     *
     * @see WebPage::appendToHead(string $content) : void
     *
     * @param string $url L'URL du script CSS
     */
    public function appendCssUrl(string $url): void
    {
        $this->appendToHead(/** @lang text */ <<<HTML
    <link rel="stylesheet" type="text/css" href="{$url}">

HTML
        );
    }

    /**
     * Ajouter un contenu JavaScript dans head.
     *
     * @see WebPage::appendToHead(string $content) : void
     *
     * @param string $js Le contenu JavaScript à ajouter
     */
    public function appendJs(string $js): void
    {
        $this->appendToHead(/** @lang text */ <<<HTML
    <script type='text/javascript'>
    $js
    </script>

HTML
        );
    }

    /**
     * Ajouter l'URL d'un script JavaScript dans head.
     *
     * @see WebPage::appendToHead(string $content) : void
     *
     * @param string $url L'URL du script JavaScript
     */
    public function appendJsUrl(string $url): void
    {
        $this->appendToHead(/** @lang text */ <<<HTML
    <script type='text/javascript' src='$url'></script>

HTML
        );
    }

    /**
     * Ajouter un contenu dans body.
     *
     * @param string $content Le contenu à ajouter
     */
    public function appendContent(string $content): void
    {
        $this->body .= $content;
    }

    /**
     * Produire la page Web complète.
     *
     * @return string
     *
     * @throws Exception si title n'est pas défini
     */
    public function toHTML(): string
    {
        if (is_null($this->title)) {
            throw new Exception(__CLASS__.': title not set');
        }

        return /** @lang text */ <<<HTML
<!doctype html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>{$this->title}</title>
{$this->head()}
    </head>
    <body>
        <div id='page'>
{$this->body()}
        <span id='lastmodified'>{$this->getLastModification()}</span>
        </div>
    </body>
</html>
HTML;
    }

    /**
     * Donner la date et l'heure de la dernière modification du script principal.
     *
     * @return string
     *
     * @see http://php.net/manual/en/function.getlastmod.php
     * @see http://php.net/manual/en/function.strftime.php
     */
    public function getLastModification(): string
    {
        return strftime('Dernière modification de cette page le %d/%m/%Y à %Hh%M', getlastmod());
    }

    /**
     * Protéger les caractères spéciaux pouvant dégrader la page Web.
     *
     * @param string $string La chaîne à protéger
     *
     * @return string La chaîne protégée
     *
     * @see https://www.php.net/manual/en/function.htmlspecialchars.php
     */
    public static function escapeString(string $string): string
    {
        return htmlspecialchars($string, ENT_QUOTES | ENT_HTML5, 'utf-8');
    }
}