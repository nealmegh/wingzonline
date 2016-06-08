<?php namespace App\Http\Controllers\Admin;

use Orchestra\Routing\Controller;
use Illuminate\Support\Facades\Input;
use App\Facades\WingzFormat;

abstract class EditorController extends Controller
{
    /**
     * Editor format.
     *
     * @var string
     */
    protected $editorFormat;

    /**
     * Define middleware for the controller.
     */
    public function __construct()
    {
        $this->setupMiddleware();
    }

    /**
     * Define the middleware.
     *
     * @return void
     */
    protected function setupMiddleware()
    {
        $this->editorFormat = WingzFormat::get(Input::get('format'));

        $this->middleware('orchestra.auth');
        $this->middleware("wingz.editor:{$this->editorFormat}");
    }
}
