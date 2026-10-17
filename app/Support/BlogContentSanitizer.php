<?php

namespace App\Support;

class BlogContentSanitizer
{
    private const ALLOWED = ['p', 'br', 'h2', 'h3', 'h4', 'ul', 'ol', 'li', 'strong', 'b', 'em', 'i', 'u', 'blockquote', 'a', 'img', 'hr', 'pre', 'code'];

    public function clean(string $html): string
    {
        $document = new \DOMDocument('1.0', 'UTF-8');
        $previous = libxml_use_internal_errors(true);
        $document->loadHTML('<?xml encoding="utf-8" ?><div id="blog-content">'.$html.'</div>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        libxml_use_internal_errors($previous);

        $container = $document->getElementById('blog-content');
        if (! $container) return '';

        $this->sanitizeChildren($container);
        $output = '';
        foreach ($container->childNodes as $child) $output .= $document->saveHTML($child);

        return $output;
    }

    private function sanitizeChildren(\DOMNode $parent): void
    {
        foreach (iterator_to_array($parent->childNodes) as $node) {
            if ($node instanceof \DOMElement) {
                $tag = strtolower($node->tagName);
                if (! in_array($tag, self::ALLOWED, true)) {
                    if (in_array($tag, ['script', 'style', 'iframe', 'object', 'svg', 'math', 'form'], true)) {
                        $node->parentNode?->removeChild($node);
                    } else {
                        while ($node->firstChild) $node->parentNode?->insertBefore($node->firstChild, $node);
                        $node->parentNode?->removeChild($node);
                    }
                    continue;
                }

                $allowedAttributes = match ($tag) { 'a' => ['href', 'title'], 'img' => ['src', 'alt'], default => [] };
                foreach (iterator_to_array($node->attributes) as $attribute) {
                    if (! in_array(strtolower($attribute->name), $allowedAttributes, true)
                        || (($attribute->name === 'href' || $attribute->name === 'src') && ! $this->safeUrl($attribute->value, $tag))) {
                        $node->removeAttribute($attribute->name);
                    }
                }
                $this->sanitizeChildren($node);
            }
        }
    }

    private function safeUrl(string $url, string $tag): bool
    {
        $url = trim($url);
        if ($url === '' || str_starts_with($url, '//')) return false;
        if (str_starts_with($url, '/')) return $tag === 'a' || str_starts_with($url, '/storage/blog/');
        $scheme = strtolower((string) parse_url($url, PHP_URL_SCHEME));
        return in_array($scheme, $tag === 'a' ? ['', 'http', 'https', 'mailto'] : ['http', 'https'], true);
    }
}
