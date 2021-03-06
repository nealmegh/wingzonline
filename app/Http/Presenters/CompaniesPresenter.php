<?php namespace App\Http\Presenters;

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
use Wingz\Foundation\Model\State;

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
            $form->setup($this, 'company', $model);
            $form->layout('components.form');

            $form->fieldset('Register',function ($fieldset) {
                $fieldset->control('input:text', function($control) {
                    $control->field(function ($row) {
                        $username = old('username');
                        return '<input name="username" value="'.$username.'" type="text" class="form-control" id="" placeholder="Username"><span class="glyphicon glyphicon-user form-control-feedback"></span>';
                    });
                 })
                        ->label('')
                        ->attributes(['placeholder'=>'Username']);
                $fieldset->control('input:text', 'first_name')->label('')->attributes(['placeholder'=>'First Name']);
                $fieldset->control('input:text', 'last_name')->label('')->attributes(['placeholder'=>'Last Name']);

            });

            $form->fieldset('Personal Contact Info',function ($form) {
                $form->control('input:text', 'email')->label('')->attributes(['placeholder'=>'Email']);
                $form->control('input:text', 'personal_address')->label('')->attributes(['placeholder'=>'Address']);
                $form->control('input:text', 'personal_city')->label('')->attributes(['placeholder'=>'City']);

                $states = State::stateList();

                $form->control('input:select', 'personal_state')->label('')->attributes(['placeholder'=>'State', 'class'=>'select2'])->options($states);
                $form->control('input:text', 'personal_zip')->label('')->attributes(['placeholder'=>'Zip']);
                $form->control('input:text', 'personal_phone')->label('')->attributes(['placeholder'=>'Phone']);
            });

            $form->fieldset('Company Info',function ($form) {
                $form->control('input:text', 'company_name')->label('')->attributes(['placeholder'=>'Company Name']);
                $form->control('input:text', 'company_email')->label('')->attributes(['placeholder'=>'Company Email']);
                $form->control('input:text', 'company_address')->label('')->attributes(['placeholder'=>'Address']);
                $form->control('input:text', 'company_city')->label('')->attributes(['placeholder'=>'City']);
                $states = State::stateList();

                $form->control('input:select', 'company_state')->label('')->attributes(['placeholder'=>'State', 'class'=>'select2'])->options($states);
                $form->control('input:text', 'company_zip')->label('')->attributes(['placeholder'=>'Zip']);
                $form->control('input:text', 'company_phone')->label('')->attributes(['placeholder'=>'Phone']);
            });

//            dd($airports);

            $form->fieldset('Airport Info',function ($form) {
                $airports = Airport::lists('name', 'id');

                $form->control('input:select', 'airport_id')->options($airports)->label('')->attributes(['placeholder'=>'Airport Name', 'id'=>'airport_name', 'class'=>'select2']);
//                $form->control('input:text', 'id')->label('')->attributes(['placeholder'=>'Airport Id', 'disabled', 'id'=>'airport_id']);
            });

            $form->fieldset('Change Password',function ($form) {
                $form->control('input:password', 'password')->label('')->attributes(['placeholder'=>'New Password']);
                $form->control('input:password', 'confirm_password')->label('')->attributes(['placeholder'=>'Confirm Password']);
                $form->control('input:checkbox',function($control) {
                    $control->field(function ($row) {
                        return '<div id="div_terms-policy-agreementt">
                                                <p class="terms-policy-agreement">
                                                    <!-- <div class="squaredFour"> -->
                                                    <label for="terms_policy_agreement" class="error create-account-error" generated="true"></label>
                                                </p><div class="terms-policy-agreement-check">
                                                    <input type="checkbox" name="terms_policy_agreement" value="1" id="terms_policy_agreement">
                                                </div>
                                                <!-- </div> -->
                                                <div class="terms-policy-agreement-content">
                                                    I have read and accepted the <a href="terms-conditions" target="_blank">Terms of Use</a> and <a href="../privacy-policy/index.html" target="_blank">Privacy Policy</a>.
                                                </div>
                                                <p></p>
                                            </div>';
                    });
                });

            });

        });

        return view('admin.form', compact('form'));
    }
}
