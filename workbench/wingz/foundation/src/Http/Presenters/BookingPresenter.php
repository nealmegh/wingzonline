<?php namespace Wingz\Foundation\Http\Presenters;

use Orchestra\Html\Form\Fieldset;
use Wingz\Foundation\Model\Booking as Eloquent;
use Illuminate\Contracts\Config\Repository;
use Orchestra\Contracts\Html\Form\Grid as FormGrid;
use Orchestra\Contracts\Html\Table\Grid as TableGrid;
use Orchestra\Contracts\Html\Form\Factory as FormFactory;
use Orchestra\Contracts\Html\Table\Builder as TableBuilder;
use Orchestra\Contracts\Html\Table\Factory as TableFactory;
use Wingz\Foundation\Model\Companies;

class BookingPresenter extends Presenter
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
            $table->searchable(['aircraft_model']);

            $table->layout('orchestra/foundation::components.table');

            // Add columns.
            $table->column('Date Booked', 'date_added');
            $table->column('Pick Up Date', 'pick_up_date');
            $table->column('Pick Up Time', 'pick_up_time');
            $table->column('Return Date', 'return_date');
            $table->column('Return Time', 'return_time');
            $table->column('Company', 'company');
            $table->column('Airport', 'airport');
            $table->column('Aircraft Make', 'aircraft_make');
            $table->column('Aircraft Model', 'aircraft_model');
            $table->column('Price', 'price');
            $table->column('Status', 'status');
            $table->column('Customer Email', 'customer_email');

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

        $form = $this->form->of('wingz.aircraft', function (FormGrid $form) use ($model)  {

            $form->setup($this, 'orchestra::wingz/booking', $model);

            $form->fieldset(function ($form) {
                $form->control('input:date', 'date_added')->label('Date Booked:');
                $form->control('input:text', 'pick_up_date')->label('Pick Up Date:');
                $form->control('input:text', 'pick_up_time')->label('Pick Up Time:');
                $form->control('input:text', 'return_date')->label('Return Date:');
                $form->control('input:text', 'return_time')->label('Return Time:');
                $form->control('input:text', 'company')->label('Company:');
                $form->control('input:text', 'airport')->label('Airport:');
                $form->control('input:text', 'aircraft_make')->label('Aircraft Make:');
                $form->control('input:text', 'aircraft_model')->label('Aircraft Model:');
                $form->control('input:text', 'price')->label('Price:');
                $form->control('input:select', 'status')->label('Status:')->options(['Booked'=>'Booked'])->attributes(['class'=>'form-control']);
                $form->control('input:text', 'customer_email')->label('Customer Email:');

                $form->control('input:text',function($control) {
                    $control->field(function ($row) {
                        return '<a href="#">Customer Detail</a>';
                    });
                });

            });
        });
        return view('wingz/foundation::admin.form', compact('form'));


    }
}
