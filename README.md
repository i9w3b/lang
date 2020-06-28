<p align="center" class="text-center" style="text-align:center;"><a href="https://i9w3b.github.io" target="_blank"><img src="https://i9w3b.github.io/i9w3b.png" width="200"></a></p>
<p align="center" class="text-center" style="text-align:center;">
<a href="https://github.com/i9w3b/lang/blob/master/LICENSE.md"><img src="https://img.shields.io/github/license/i9w3b/lang" alt="License"></a>
<a href="https://github.com/i9w3b/lang"><img src="https://img.shields.io/github/languages/count/i9w3b/lang" alt="GitHub Language Count"></a>
<a href="https://github.com/i9w3b/lang"><img src="https://img.shields.io/github/repo-size/i9w3b/lang" alt="GitHub Repo Size"></a>
<a href="https://github.com/i9w3b/lang/releases"><img src="https://img.shields.io/github/v/release/i9w3b/lang" alt="GitHub Release"></a>
<a href="https://github.com/i9w3b/lang"><img src="https://img.shields.io/github/downloads/i9w3b/lang/total" alt="Total Downloads"></a>
</p>

# Lang

Laravel Multilíngue

## Instalação

Execute o seguinte comando:

```bash
composer require i9w3b/lang
```

Opcional:
```bash
php artisan vendor:publish --tag=multilingual-views
```

## Como Usar

```blade
@include('multilingual::menu')
```

#### Configurar timezone/idioma padrão para pt-BR

<code>// Altere locale e timezone no arquivo config/app.php para:
'timezone' => 'America/Sao_Paulo',
'locale' => 'pt_BR',
</code>

## Dúvidas/Sugestões

Se encontrar erros ou tiver sugestões de melhorias, acesse: [issues](https://github.com/i9w3b/lang/issues/new)

## Licença

[MIT](https://github.com/i9w3b/lang/blob/master/LICENSE.md) © [i9W3b](https://github.com/i9w3b)
