<?php namespace Wingz\Foundation\Http\Presenters;

use Illuminate\Support\Facades\DB;
use Orchestra\Html\Form\Fieldset;
use Wingz\Foundation\Model\Airport;
use Wingz\Foundation\Model\Companies as Eloquent;
use Illuminate\Contracts\Config\Repository;
use Orchestra\Contracts\Html\Form\Grid as FormGrid;
use Orchestra\Contracts\Html\Table\Grid as TableGrid;
use Orchestra\Contracts\Html\Form\Factory as FormFactory;
use Orchestra\Contracts\Html\Table\Builder as TableBuilder;
use Orchestra\Contracts\Html\Table\Factory as TableFactory;

class CompaniesPresenter extends Presenter
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
        return $this->table->of('wingz.companies', function (TableGrid $table) use ($model) {
            // attach Model and set pagination option to true.
            $table->with($model)->paginate(true);

            $table->sortable();
//            $table->searchable(['company_name']);

            $table->layout('orchestra/foundation::components.table');


            $table->column(function ($column)
            {
                $column->label = 'User Name';
                $column->value = function ($row) {
                    
                    return $row->user->first_name;
                };
            });

            $table->column( 'Company Name', 'company_name');
            $table->column('Address', 'address');
            $table->column('City', 'city');
            $table->column('State', 'state');
            $table->column('Zip', 'zip');
            $table->column('Email', 'email');
            $table->column('Phone', 'phone');
            $table->column('Fax', 'fax');

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
    public function form($model)
    {

        $form = $this->form->of('wingz.companies', function (FormGrid $form) use ($model) {
            $form->setup($this, 'orchestra::wingz/companies', $model);

            $form->fieldset('Name',function ($fieldset) {
                $fieldset->control('input:text', function($control) {
                    $control->field(function ($row) {
                        return '<input name="username" type="text" class="form-control" id="" placeholder="Username"><span class="glyphicon glyphicon-user form-control-feedback"></span>';
                    });
                 })
                        ->label('Username:')
                        ->attributes(['placeholder'=>'Username']);
                $fieldset->control('input:text', 'first_name')->label('First Name:')->attributes(['placeholder'=>'First Name']);
                $fieldset->control('input:text', 'last_name')->label('Last Name:')->attributes(['placeholder'=>'Last Name']);

            });

            $form->fieldset('Personal Contact Info',function ($form) {
                $form->control('input:text', 'personal_email')->label('Email:')->attributes(['placeholder'=>'Email']);
                $form->control('input:text', 'personal_address')->label('Address:')->attributes(['placeholder'=>'Address']);
                $form->control('input:text', 'personal_city')->label('City:')->attributes(['placeholder'=>'City']);
                $form->control('input:text', 'personal_state')->label('State:')->attributes(['placeholder'=>'State']);
                $form->control('input:text', 'personal_zip')->label('Zip:')->attributes(['placeholder'=>'Zip']);
                $form->control('input:text', 'personal_phone')->label('Phone:')->attributes(['placeholder'=>'Phone']);
            });

            $form->fieldset('Company Info',function ($form) {
                $form->control('input:text', 'company_name')->label('Company Name:')->attributes(['placeholder'=>'Company Name']);
                $form->control('input:text', 'company_email')->label('Company Email:')->attributes(['placeholder'=>'Company Email']);
                $form->control('input:text', 'company_address')->label('Address:')->attributes(['placeholder'=>'Address']);
                $form->control('input:text', 'company_city')->label('City:')->attributes(['placeholder'=>'City']);
                $form->control('input:text', 'company_state')->label('State:')->attributes(['placeholder'=>'State']);
                $form->control('input:text', 'company_zip')->label('Zip:')->attributes(['placeholder'=>'Zip']);
                $form->control('input:text', 'company_phone')->label('Phone:')->attributes(['placeholder'=>'Phone']);
            });

//            dd($airports);

            $form->fieldset('Airport Info',function ($form) {
                $airports = Airport::lists('airport_name', 'airport_id');

                $form->control('input:select', 'airport_name')->label('Airport Name:')->options($airports)->attributes(['placeholder'=>'Airport Name', 'id'=>'airport_name']);
                $form->control('input:text', 'airport_id')->label('Airport Id:')->attributes(['placeholder'=>'Airport Id', 'disabled', 'id'=>'airport_id']);
            });

            $form->fieldset('Change Password',function ($form) {
                $form->control('input:password', 'password')->label('New Password:')->attributes(['placeholder'=>'New Password']);
                $form->control('input:password', 'confirm_password')->label('Confirm Pass:')->attributes(['placeholder'=>'Confirm Pass']);
                $form->control('input:text',function($control) {
                    $control->field(function ($row) {
                        return "Hello World";
                    })->inlineHelp('Hint: The Password should be least seven cherecter long');
                });

            });

        });

        return view('wingz/foundation::admin.form', compact('form'));
    }
}
