<?php namespace Wingz\Foundation\Http\Presenters;

use Orchestra\Html\Form\Fieldset;
use Wingz\Foundation\Model\FlightSchedules as Eloquent;
use Illuminate\Contracts\Config\Repository;
use Orchestra\Contracts\Html\Form\Grid as FormGrid;
use Orchestra\Contracts\Html\Table\Grid as TableGrid;
use Orchestra\Contracts\Html\Form\Factory as FormFactory;
use Orchestra\Contracts\Html\Table\Builder as TableBuilder;
use Orchestra\Contracts\Html\Table\Factory as TableFactory;
use Wingz\Foundation\Model\Companies;

class FlightSchedulesPresenter extends Presenter
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
        return $this->table->of('wingz.flightSchedules', function (TableGrid $table) use ($model) {
            // attach Model and set pagination option to true.
            $table->with($model)->paginate(true);

            $table->sortable();
            $table->searchable(['aircraft_model']);

            $table->layout('orchestra/foundation::components.table');

            // Add columns.
            $table->column('Date Added', 'date_added');
            $table->column('Aircraft Make', 'aircraft_make');
            $table->column('Aircraft Model', 'aircraft_model');
            $table->column('Tail#', 'tail_no');
            $table->column('Airport', 'airport');
            $table->column('Company', 'company');
            $table->column('View', 'view');

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
                ->label('')
                ->escape(false)
                ->attributes(function () {
                    return ['class' => 'th-action'];
                })
                ->value(function ($row) {
                    $html = [
                        app('html')->link(
                            handles("orchestra::wingz/aircraft/{$row->id}/edit"),
                            trans('orchestra/foundation::label.edit'),
                            ['class' => 'btn btn-mini btn-warning']
                        ),
                    ];

                    $roles = [
                        (int) $this->config->get('orchestra/foundation::roles.admin'),
                        (int) $this->config->get('orchestra/foundation::roles.member'),
                    ];

                    if (! in_array((int) $row->id, $roles)) {
                        $html[] = app('html')->link(
                            handles("orchestra::wingz/aircraft/{$row->id}/delete", ['csrf' => true]),
                            trans('orchestra/foundation::label.delete'),
                            ['class' => 'btn btn-mini btn-danger']
                        );
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
    public function form(Eloquent $model)
    {

        $form = $this->form->of('wingz.flightSchedules', function (FormGrid $form) use ($model)  {

            $form->setup($this, 'orchestra::wingz/flight-schedule', $model);

            $form->fieldset(function ($form) {
                $form->control('input:date', 'time_start')->label('Time Start:');
                $form->control('input:time', 'time_end')->label('Time End:');
                $form->control('input:text', 'day')->label('Day:');

                $companies = Companies::lists('company_name', 'company_id');

                $form->control('input:select', 'company_id')->label('Company:')->options($companies)->attributes(['class'=>'select2', 'id'=>'company']);
                $form->control('input:text', 'airport_id')->label('Airport:');
                $form->control('input:text', 'aircraft_id')->label('Aircraft Id:');

                $form->control('input:tsxt', 'aircraft_status_id')->label('Aircraft Status Id :');
                $form->control('input:text', 'instructor_id')->label('Instructor ID:');
                $form->control('input:text', 'price')->label('Price:')->attributes(['class'=>'form-control']);



                $form->control('input:text',function($control) {
                    $control->field(function ($row) {
                        return "Requirement";
                    })->inlineHelp('Hint: The Password should be least seven cherecter long');
                });

            });
        });
        return view('wingz/foundation::admin.form', compact('form'));


    }
}
