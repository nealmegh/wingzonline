<?php namespace Wingz\Foundation;

use Illuminate\Support\Fluent;
use Orchestra\Extension\Plugin;
use Wingz\Foundation\Model\Content;
use Wingz\Foundation\Facades\StoryFormat;
use Illuminate\Contracts\Support\Arrayable;
use Wingz\Foundation\Http\Handlers\WingzMenuHandler;
use Orchestra\Contracts\Html\Form\Builder as FormBuilder;

class WingzPlugin extends Plugin
{
    /**
     * Extension name.
     *
     * @var string
     */
    protected $extension = 'wingz/foundation';

    /**
     * Configuration.
     *
     * @var array
     */
    protected $config = [
        'default_format' => 'wingz/foundation::config.default_format',
        'default_page'   => 'wingz/foundation::config.default_page',
        'per_page'       => 'wingz/foundation::config.per_page',
        'page_permalink' => 'wingz/foundation::config.permalink.page',
        'post_permalink' => 'wingz/foundation::config.permalink.post',
    ];

    /**
     * Menu handler.
     *
     * @var object|null
     */
    protected $menu = WingzMenuHandler::class;

    /**
     * Validation rules.
     *
     * @var array
     */
    protected $rules = [
        'page_permalink' => ['required'],
        'post_permalink' => ['required'],
    ];

    /**
     * Sidebar placeholders.
     *
     * @var array
     */
    protected $sidebar = [
        'permalink-help' => 'wingz/foundation::widgets.help',
    ];

    /**
     * Setup the form.
     *
     * @param  \Illuminate\Support\Fluent  $model
     * @param  \Orchestra\Contracts\Html\Form\Builder  $form
     *
     * @return void
     */
    protected function form(Fluent $model, FormBuilder $form)
    {
        $form->extend(function ($form) use ($model) {
            $form->fieldset('Page Management', function ($fieldset) {
                $pages = Content::page()->publish()->pluck('title', 'slug');

                if ($pages instanceof Arrayable) {
                    $pages = $pages->toArray();
                }

                $pages = array_merge(['_posts_' => 'Display Posts'], $pages);

                $fieldset->control('select', 'default_format')
                    ->label('Default Format')
                    ->options(StoryFormat::getParsers());

                $fieldset->control('select', 'default_page')
                    ->label('Default Page')
                    ->options($pages);

                $fieldset->control('text', 'Page Permalink', 'page_permalink');
                $fieldset->control('text', 'Post Permalink', 'post_permalink');
            });
        });
    }
}
