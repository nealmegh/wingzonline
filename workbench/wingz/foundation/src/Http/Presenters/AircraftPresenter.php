<?php namespace Wingz\Foundation\Http\Presenters;

use Orchestra\Html\Form\Fieldset;
use Wingz\Foundation\Model\Aircraft as Eloquent;
use Illuminate\Contracts\Config\Repository;
use Orchestra\Contracts\Html\Form\Grid as FormGrid;
use Orchestra\Contracts\Html\Table\Grid as TableGrid;
use Orchestra\Contracts\Html\Form\Factory as FormFactory;
use Orchestra\Contracts\Html\Table\Builder as TableBuilder;
use Orchestra\Contracts\Html\Table\Factory as TableFactory;
use Wingz\Foundation\Model\Airport;
use Wingz\Foundation\Model\Companies;

class AircraftPresenter extends Presenter
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
            $table->column('Aircraft', 'name');
            $table->column('checkbox')
                ->label('Photo')
                ->attributes(function() {
                    return ['class'=>'text-center circle-image'];
                })
                ->value(function ($row) {
                    return app('html')->image($row->image);
                });
            $table->column('Make', 'aircraft_make');
            $table->column('Model', 'aircraft_model');
            $table->column('Seat', 'number_of_seats');
            $table->column('Price Per Hr#', 'price_per_hour');
            $table->column('Date Added', 'date_added');
            $table->column('Visibility', 'view');

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
                    return ['class' => 'th-action'];
                })
                ->value(function ($row) {
                    $html = [
                        app('html')->raw('<a href="/admin/wingz/companies/aircraft/'.$row->id.'/edit"><i class="fa  fa-edit"></i></a>')
                    ];

                    $roles = [
                        (int) $this->config->get('orchestra/foundation::roles.admin'),
                        (int) $this->config->get('orchestra/foundation::roles.member'),
                    ];

                    if (! in_array((int) $row->id, $roles)) {
                        $html[] = app('html')->raw('<a href="#"><i class="fa fa-ellipsis-v""></i></a>');
                    }

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
                $url = 'orchestra::wingz/companies/aircraft/'.$model->id;
            }else {
                $url = 'orchestra::wingz/companies/aircraft';

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

                $companies = Companies::lists('name', 'id');
//                dd($companies);

                $form->control('input:select', 'company')->label('Company:')->options($companies);

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
        
        
        return view('wingz/foundation::admin.form', compact('form'));

//        return $this->form->of('wingz.aircraft', function (FormGrid $form) use ($model) {
//            $form->resource($this, 'orchestra::control/roles', $model);
//            $form->hidden('id');
//
//            $form->fieldset(function (Fieldset $fieldset) {
//                $fieldset->control('input:text', 'name')
//                    ->label(trans('orchestra/control::label.name'));
//            });
//        });
    }
}
