---
Title:    新しくArtisanコマンドを作りたい
Topics:   artisan
Code:     -
Id:       284
Position: 31
---

{problem}
新しいArtisanコマンドを追加したい。
{/problem}

{solution}
`php artisan command:make`コマンドが利用できます。

このコマンドは作成するコマンドの土台を設定してくれます。

{bash}
$ php artisan command:make TestCommand
Command created successfully.
{/bash}

コマンドを実行することで`app/commands`ディレクトリの中に`TestCommand.php`を生成します。
このファイルの内容は以下の通りです。

{php}
<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class TestCommand extends Command {

  /**
   * コンソールコマンド名
   *
   * @var string
   */
  protected $name = 'command:name';

  /**
   * 
   * コンソールコマンドの説明
   *
   * @var string
   */
  protected $description = 'Command description.';

  /**
   * コマンドのインスタンスを生成
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * コンソールコマンドの実行
   *
   * @return mixed
   */
  public function fire()
  {
    //
  }

  /**
   * コンソールコマンドの引数を取得
   *
   * @return array
   */
  protected function getArguments()
  {
    return array(
      array('example', InputArgument::REQUIRED, 'An example argument.'),
    );
  }

  /**
   * コンソールコマンドのオプションを取得
   *
   * @return array
   */
  protected function getOptions()
  {
    return array(
      array('example', null, InputOption::VALUE_OPTIONAL,
        'An example option.' null),
    );
  }
}
?>
{/php}

この状態から編集していく必要があります。
コマンドの詳細を記述し、`fire()`メソッドを実装していきます。
{/solution}

{discussion}
次にコマンドをArtisanに認識させます。

`app/start/artisan.php`ファイルに以下を追記してください。

{php}
Artisan::add(new TestCommand);
{/php}

プロジェクトの構造に応じて、オートローダーをダンプする必要があります。

{bash}
$ composer dump-autoload
{/bash}

コマンドが使える形で作成できました。
listコマンドを実行すると新しいコマンドが表示されていることでしょう。

{bash}
$ php artisan list
{/bash}
{/discussion}
