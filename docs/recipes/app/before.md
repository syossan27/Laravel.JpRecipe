---
Title:    "Before"フィルターを実装する
Topics:   filters
Code:     App::before()
Id:       53
Position: 6
---

{problem}
リクエスト受信時に、コントローラーより先に実行される処理を実装・登録したい
{/problem}

{solution}
"Before"フィルターは次の様に登録出来ます

```php
App::before(function($request)
{
    if ($request->ajax())
    {
        // この例ではajaxを用いたリクエストの場合に、
        // コントローラーで実行される前にフィルターで処理をします
        return Response::json(['error' => 'AJAX not allowed']);
    }
    // 処理されるべきものが無い場合はそのまま通過し、
    // コントローラーなどが実行されます
});
```
{/solution}

{discussion}
You can movidy the request in application before filters.

`$request`は`Illuminate\Http\Request`オブジェクトです。

"before"フィルターを実装する一般的なファイルは、`app/filters.php`になりますが、  
サービスプロバイダー等で実装する事も可能です。

アプリケーション処理前に実行されるフィルターについて、理解を深める事ができます。  
[[Understanding the Request Lifecycle]] **Calls app before filters**  
の実行手順のセクションに詳細が記述されています。  
{/discussion}
