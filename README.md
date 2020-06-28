<p align="center" class="text-center" style="text-align:center;"><a href="https://github.com/i9w3b" target="_blank"><img src="https://cdn.jsdelivr.net/gh/i9w3b/cdn/img/logo-200px.png" width="200"></a></p>
<p align="center" class="text-center" style="text-align:center;">
<p align="center" class="text-center" style="text-align:center;">
<a href="https://github.com/i9w3b/lang/blob/master/LICENSE.md"><img src="https://img.shields.io/github/license/i9w3b/lang" alt="License"></a>
<a href="https://github.com/i9w3b/lang"><img src="https://img.shields.io/github/languages/count/i9w3b/lang" alt="GitHub Language Count"></a>
<a href="https://github.com/i9w3b/lang"><img src="https://img.shields.io/github/repo-size/i9w3b/lang" alt="GitHub Repo Size"></a>
<a href="https://github.com/i9w3b/lang/releases"><img src="https://img.shields.io/github/v/release/i9w3b/lang" alt="GitHub Release"></a>
<a href="https://packagist.org/packages/i9w3b/lang"><img alt="Packagist Downloads" src="https://img.shields.io/packagist/dt/i9w3b/lang"></a>
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

### Configurar timezone/idioma padrão para pt-BR

Alterar locale e timezone no arquivo config/app.php para:

<code>
'timezone' => 'America/Sao_Paulo',
'locale' => 'pt_BR',
</code>

## Segurança

Caso descubra algum problema relacionado à segurança, envie um e-mail para `marcelosenaonline@gmail.com` em vez de usar o rastreador de problemas.

## Licença

[MIT](https://github.com/i9w3b/lang/blob/master/LICENSE.md) © [i9W3b](https://github.com/i9w3b) | Consulte [LICENSE.md](https://github.com/i9w3b/lang/blob/master/LICENSE.md) para obter mais informações.