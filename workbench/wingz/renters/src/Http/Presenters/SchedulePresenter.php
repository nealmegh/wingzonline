<?php namespace Wingz\Renters\Http\Presenters;

use Carbon\Carbon;
use Orchestra\Html\Form\Fieldset;
use Wingz\Foundation\Model\Aircraft as Eloquent;
use Illuminate\Contracts\Config\Repository;
use Orchestra\Contracts\Html\Form\Grid as FormGrid;
use Orchestra\Contracts\Html\Table\Grid as TableGrid;
use Orchestra\Contracts\Html\Form\Factory as FormFactory;
use Orchestra\Contracts\Html\Table\Builder as TableBuilder;
use Orchestra\Contracts\Html\Table\Factory as TableFactory;
use Wingz\Foundation\Model\Airport;
use Wingz\Foundation\Model\Renters;

class SchedulePresenter extends Presenter
{
    /**
     * Implement of config contract.
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

        return $this->table->of('wingz.aircraft', function (TableGrid $table) use ($model) {
            // attach Model and set pagination option to true.
            $table->with($model)->paginate(true);

            $table->sortable();
            $table->searchable(['name']);

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
            $table->column('Pick Up Date:')
                  ->value(function($row) {
                      $dt = Carbon::parse($row->dt_pick_up);
                      return $dt->toFormattedDateString();
                  });
            $table->column('Start Time:')
                ->value(function($row) {
                    $dt = Carbon::parse($row->dt_pick_up);
                    return $dt->format('h:iA');
                });
            $table->column('Company')
                  ->value(function($row) {
                      return $row->company->name;
                  });
            $table->column('Aircraft Make')
                  ->value(function($row) {
                      return $row->aircraft->aircraft_make;
                  });
            $table->column('Price Per Hr#')->value(function($row) { return '$'.$row->price; });
            $table->column('Instructor')
                  ->value(function($row) {
                      return $row->instructor->user->first_name;
                  });

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
                ->label('Actions')
                ->escape(false)
                ->attributes(function () {
                    return ['class' => 'th-action text-center'];
                })
                ->value(function ($row) {
                    $html = [
                        app('html')->raw('<a href="/admin/renters/booking/'.$row->id.'/delete"><i class="fa fa-trash-o"></i></a>')
                    ];

                    return app('html')->create('div', app('html')->raw(implode('', $html)), ['class' => 'btn-group']);
                });
        });
    }

    /**
     * View form generator for Orchestra\Model\Role.
     *
     * @param  \Orchestra\Model\Role  $model
     *
     * @return \Orchestra\Contracts\Html\Form\Builder
     */
    public function form(Eloquent $model, $method = '')
    {

        $form = $this->form->of('wingz.aircraft', function (FormGrid $form) use ($model, $method)  {

            if ($method == 'PATCH') {
                $url = 'orchestra::wingz/renters/aircraft/'.$model->id;
            }else {
                $url = 'orchestra::wingz/renters/aircraft';

            }

            $form->setup($this, $url, $model, ['method'=> $method, 'files'=>true]);

            $form->fieldset(function ($form) {
                $form->control('input:text', 'name')->label('Aircraft ID:');
                $form->control('input:date', 'date_added')->label('Date Added:');
                $form->control('input:text', 'aircraft_make')->label('Aircraft Make:');
                $form->control('input:text', 'aircraft_model')->label('Aircraft Model:');
                $form->control('input:text', 'tail_no')->label('Tail#:');
                $form->control('input:text', 'number_of_seats')->label('Seats:');
                $form->control('input:text', 'price_per_hour')->label('Price Per Hour:');

                $renters = Renters::lists('name', 'id');

                $form->control('input:select', 'company')->label('Company:')->options($renters);

                $airports = Airport::lists('name', 'id');
                $form->control('input:select', 'airport')->label('Airport:')->options($airports);
                $form->control('input:select', 'view')->label('View:')->options(['Visible'=>'Visible', 'Hidden'=>'Hidden'])->attributes(['class'=>'form-control']);
                $form->control('input:file', 'image')->label('Image:');



                $form->control('input:text',function($control) {
                    $control->field(function ($row) {
                        return "Requirement";
                    })->inlineHelp('Hint: The Password should be least seven cherecter long');
                });

            });
        });
        
        
        return view('wingz/renters::admin.form', compact('form'));


    }
}
