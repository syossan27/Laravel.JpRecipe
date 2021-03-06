---
Title:    メンテナンスモードのハンドラを登録する
Topics:   -
Code:     App::down(), App::isDownForMaintenance()
Id:       121
Position: 15
---

{problem}
アプリケーションがダウンしているときに、自動的に何かを実行したい  

`App::isDownForMaintenance()`メソッドを利用出来ますが、  
それをメンテナンス時に適切に実行出来る様なアプリケーションにします
{/problem}

{solution}
`App::down()`でハンドラを登録します。  

{php}
App::down(function()
{
    return Response::view('maintenance.mode', array(), 503);
});
{/php}

この少しのコードで、`maintenance.mode`ビューと共に、  
HTTPステータスコードの503を出力します。
{/solution}

{discussion}
アプリケーションがロードされて、起動した後に  
登録したダウンハンドラがあれば、最初に実行します

[[Understanding the Request Lifecycle]]の**Running Steps**を見れば、  
発生する場面を理解する事ができます

また[[Checking if the Application is Down for Maintenance]]も見てみるといいでしょう
{/discussion}
