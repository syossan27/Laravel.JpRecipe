<?php
namespace App\Controllers;

use Illuminate\Routing\Controller;

/**
 * Class BaseController
 * @package App\Controllers
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class BaseController extends Controller
{

    /** @var string  */
    protected $layout = 'layouts.default';

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = \View::make($this->layout);
        }
    }

    /**
     * view 描画
     * @param string $path
     * @param array $data
     * @return void
     */
    protected function view($path, $data = [])
    {
        $this->layout->content = \View::make($path, $data);
    }

    /**
     * @param null $string
     * @return void
     */
    protected function title($string = null)
    {
        $title = ($string) ? " | $string" : null;
        $title = \Config::get('recipe.title') . $title;
        \View::inject('title', $title);
    }

    /**
     * @access private
     * @param array $array
     * @return array
     */
    protected function setHiddenVars(array $array)
    {
        $attributes = [];
        foreach($array as $key => $value) {
            $attributes[] = \Form::hidden($key, $value);
        }
        return implode("\n", $attributes);
    }
}