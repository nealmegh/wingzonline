<?php namespace Wingz\Companies;

use Illuminate\Support\Fluent;
use Orchestra\Extension\Plugin;
use Wingz\Companies\Model\Content;
use Wingz\Companies\Facades\StoryFormat;
use Illuminate\Contracts\Support\Arrayable;
use Wingz\Companies\Http\Handlers\WingzMenuHandler;
use Orchestra\Contracts\Html\Form\Builder as FormBuilder;

class CompaniesPlugin extends Plugin
{
    /**
     * Extension name.
     *
     * @var string
     */
    protected $extension = 'wingz/companies';

    /**
     * Configuration.
     *
     * @var array
     */
    protected $config = [
        'default_format' => 'wingz/companies::config.default_format',
        'default_page'   => 'wingz/companies::config.default_page',
        'per_page'       => 'wingz/companies::config.per_page',
        'page_permalink' => 'wingz/companies::config.permalink.page',
        'post_permalink' => 'wingz/companies::config.permalink.post',
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
        'permalink-help' => 'wingz/companies::widgets.help',
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
