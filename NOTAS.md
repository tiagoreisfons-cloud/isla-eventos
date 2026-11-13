1. Em que ficheiro estão as rotas da aplicação web?
routes/web.php

2. Em que pasta estão as views? Como se chama a view da página de boas-vindas?
resources/views
welcome.blade.php

3. Em que ficheiro está o nome da base de dados? Porque é que esse ficheiro não vai para o GitHub?
.env
O .env nunca vai para o GitHub: já está no .gitignore. Tem a APP_KEY e as credenciais da base de dados.



B2. Sem e(), /ola/<h1>Ana mostra «Ana» como título: o navegador interpreta o HTML. Um atacante pode enviar uma ligação com JavaScript (XSS). Com e() aparece o texto <h1>Ana.

B5.	/dobro/abc devolve 404: a restrição whereNumber faz com que a rota não corresponda.


# Ver rotas activas
php artisan route:list --except-vendor


## PL02

### Parte D: casos limite
- /eventos/3 → 200 (o evento existe e a view eventos.show é devolvida)
- /eventos/99 → 404 (o id é numérico, mas nenhum evento tem esse id, por isso a rota faz abort(404))
- /eventos/abc → 404 (não chega a entrar na função: whereNumber('id') só aceita dígitos, por isso o Laravel considera que a rota não corresponde ao endereço)

### Parte E: filtro por tipo
- /eventos?tipo=xpto → aparece a mensagem do @empty ("Não há eventos para mostrar.")
- /eventos?tipo=<h1>x → o <h1> aparece como texto no código-fonte, porque o {{ }} escapa o HTML.
- Diferença: o parâmetro de rota ({id}) faz parte do caminho e é obrigatório; a query string (?tipo=) vem depois do ? e é opcional, lida com request().

### Desafio: /eventos/proximos
Sem whereNumber('id') e escrita antes de /eventos/proximos, a rota /eventos/{id} apanhava o pedido, com $id = "proximos". Como a função declara int $id, daria erro em vez de mostrar os próximos eventos. As rotas são avaliadas pela ordem em que estão escritas e ganha a primeira que corresponde.

# Notas PL03

## Desafio
A rota /eventos/tipo/{tipo} não entra em conflito com /eventos/{id} porque tem um segmento a mais (/eventos/tipo/workshop tem 3 segmentos, /eventos/{id} só 2), por isso nunca correspondem ao mesmo endereço. Além disso, {id} tem whereNumber('id'), por isso só aceita números.


# PL04

## E1: {{ }} com título malicioso
Na listagem vejo o texto `<script>alert("XSS")</script>Hackathon ISLA 24h` escrito
literalmente, sem nenhum alerta. No código-fonte aparece
`&lt;script&gt;alert(&quot;XSS&quot;)&lt;/script&gt;Hackathon ISLA 24h`. O `{{ }}`
passa o valor por `htmlspecialchars`, que converte `<`, `>` e `"` em entidades HTML.
O browser mostra-as como texto e não as interpreta como código.

## E2: {!! !!} sem protecção
Na página inicial aparece a janela `alert("XSS")` e o título do cartão fica só
"Hackathon ISLA 24h". O `{!! !!}` escreve o HTML sem escapar, por isso o browser
executa o `<script>`. Num site real, um atacante podia roubar a sessão ou redireccionar
o utilizador. Por isso `{!! !!}` nunca leva dados vindos de utilizadores.

## Desafio: @push/@stack vs @section/@yield
`@section`/`@yield` define um sítio único no layout que cada página preenche com o seu
conteúdo; se duas definições usarem o mesmo nome, só uma fica. Uso para o título e
o conteúdo principal. `@push`/`@stack` acrescenta: várias views ou componentes podem
empilhar conteúdo no mesmo `@stack` sem se substituírem. Uso para CSS ou JS que só
algumas páginas precisam, como as cores das etiquetas só na página inicial.