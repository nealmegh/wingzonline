<?php namespace Wingz\Instructors\Http\Presenters;

use Orchestra\Html\Form\Fieldset;
use Wingz\Instructors\Model\Aircraft as Eloquent;
use Illuminate\Contracts\Config\Repository;
use Orchestra\Contracts\Html\Form\Grid as FormGrid;
use Orchestra\Contracts\Html\Table\Grid as TableGrid;
use Orchestra\Contracts\Html\Form\Factory as FormFactory;
use Orchestra\Contracts\Html\Table\Builder as TableBuilder;
use Orchestra\Contracts\Html\Table\Factory as TableFactory;
use Wingz\Instructors\Model\Airport;
use Wingz\Instructors\Model\Instructors;

class TimeOffPresenter extends Presenter
{
    /**
     * Implement of config contract.
     *
     * @var \Illuminate\Contracts\Config\Repository
     */
    protected $config;

    /**
     * Create a new Role presenter.
     *
     * @param  \Illuminate\Contracts\Config\Repository  $config
     * @param  \Orchestra\Contracts\Html\Form\Factory  $form
     * @param  \Orchestra\Contracts\Html\Table\Factory  $table
     */
    public function __construct(Repository $config, FormFactory $form, TableFactory $table)
    {
        $this->config = $config;
        $this->form   = $form;
        $this->table  = $table;
    }

    /**
     * View table generator for Orchestra\Model\Role.
     *
     * @param  \Orchestra\Model\Role|\Illuminate\Pagination\Paginator  $model
     *
     * @return \Orchestra\Contracts\Html\Table\Builder
     */
    public function table($model)
    {

        return $this->table->of('wingz.time-off', function (TableGrid $table) use ($model) {
            // attach Model and set pagination option to true.
            $table->with($model)->paginate(true);


            $table->layout('orchestra/foundation::components.table');

            $table->column('checkbox')
                ->label(app('html')->create('input',  ['type'=>'checkbox', 'name'=>'check_all','id'=>'check_all', 'class'=>'flat-red']))
                ->attributes(function() {
                    return ['class'=>'text-center'];
                })
                ->escape(false)
                ->value(function ($row) {
                    return app('html')->create('input',  ['type'=>'checkbox', 'name'=>'check_'.$row->id, 'class'=>'flat-red']);
                });
            // Add columns.
            $table->column('Start Date', 'start_date');
            $table->column('Start Time')
                    ->value(function($row) {
                        if ($row->all_day == true) {
                            return 'All Day';
                        }else {
                            return $row->start_time;
                        }
                    });
            $table->column('End Date', 'end_date');
            $table->column('End Time')
                ->value(function($row) {
                    if ($row->all_day == true) {
                        return 'All Day';
                    }else {
                        return $row->end_time;
                    }
                });;

        });
    }

    /**
     * Table actions View Generator for Orchestra\Model\User.
     *
     * @param  \Orchestra\Contracts\Html\Table\Builder  $table
     *
     * @return \Orchestra\Contracts\Html\Table\Builder
     */
    public function actions(TableBuilder $table)
    {
        return $table->extend(function (TableGrid $table) {
            $table->column('action')
                ->label('Delete')
                ->escape(false)
                ->attributes(function () {
                    return ['class' => 'th-action text-center'];
                })
                ->value(function ($row) {
                    $html = [
                        app('html')->raw('<a href="/admin/instructors/time-off/'.$row->id.'/delete"><i class="fa fa-trash-o"></i></a>')
                    ];

                    return app('html')->create('div', app('html')->raw(implode('', $html)), ['class' => 'btn-group']);
                });
        });
    }


}
