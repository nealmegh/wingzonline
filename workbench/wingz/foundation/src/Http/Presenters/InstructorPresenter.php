<?php namespace Wingz\Foundation\Http\Presenters;

use Orchestra\Html\Form\Fieldset;
use Orchestra\Support\Facades\Avatar;
use Wingz\Foundation\Model\Companies;
use Wingz\Foundation\Model\Instructors as Eloquent;
use Illuminate\Contracts\Config\Repository;
use Orchestra\Contracts\Html\Form\Grid as FormGrid;
use Orchestra\Contracts\Html\Table\Grid as TableGrid;
use Orchestra\Contracts\Html\Form\Factory as FormFactory;
use Orchestra\Contracts\Html\Table\Builder as TableBuilder;
use Orchestra\Contracts\Html\Table\Factory as TableFactory;
use Wingz\Foundation\Model\Licenses;
use Wingz\Foundation\Model\State;


class InstructorPresenter extends Presenter
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
            $table->searchable(['first_name']);

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
            $table->column('image', function ($column)
            {
                $column->label = 'Photo';
                $column->attributes(function() {
                    return ['class'=>'text-center circle-image'];
                });
                $column->value = function ($row) {
                    $user = $row->user;
                    $avatar = Avatar::user($user)->render();
                    return app('html')->image($avatar);
                };

            });

            $table->column('first_name', function ($column)
            {
                $column->label = 'First Name';
                $column->value = function ($row) {
                    return $row->user->first_name;
                };

            });
            $table->column('last_name', function ($column)
            {
                $column->label = 'Last Name';
                $column->value = function ($row) {
                    return $row->user->last_name;
                };

            });
            $table->column('email', function ($column)
            {
                $column->label = 'Email';
                $column->value = function ($row) {
                    return $row->user->email;
                };

            });
            $table->column('address', function ($column)
            {
                $column->label = 'Address';
                $column->value = function ($row) {
                    return $row->user->address;
                };

            });
            $table->column('phone', function ($column)
            {
                $column->label = 'Phone Number';
                $column->value = function ($row) {
                    return $row->user->phone;
                };

            });
            $table->column('approve', function ($column)
            {
                $column->label = 'Approved';
                $column->value = function ($row) {
                    if ($row->status == 0) {
                        $color = '#ee475b';
                    }else {
                        $color = '#69caa7';

                    }
                    $html = [
                        app('html')->raw('<a href="/admin/wingz/companies/aircraft/'.$row->id.'/edit" style="color: '.$color.'"><i class="fa fa-check-circle-o"></i></a>')
                    ];
                    return app('html')->create('div', app('html')->raw(implode('', $html)), ['class' => 'text-center', 'style'=>'font-size: 18px;']);
                };

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
                    return ['class' => 'th-action'];
                })
                ->value(function ($row) {
                    $html = [
                        app('html')->raw('<a href="/admin/wingz/companies/instructor/'.$row->id.'/edit"><i class="fa  fa-edit"></i></a>')
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
    public function form(Eloquent $model)
    {

//        $form = $this->form->of('wingz.aircraft', function (FormGrid $form) use ($model)  {
//
//            $form->setup($this, 'orchestra::wingz/instructors', $model);
//
//            $form->fieldset(function ($form) {
//                $form->control('input:text', 'first_name')->label('First Name');
//                $form->control('input:text', 'last_name')->label('Last Name');
//                //$form->control('input:text', 'username')->label('Username');
//                //$form->control('input:password', 'password')->label('Password');
//                //$form->control('input:password', 'confirm_password')->label('Confirm Password');
//                $form->control('input:email', 'email')->label('Email');
//                $form->control('input:text', 'address')->label('address');
//                $form->control('input:text', 'city')->label('City');
//                $form->control('input:select', 'state')->label('State')->options(['NY'=>'New York'])->attributes(['class'=>'form-control']);
//                $form->control('input:text', 'zip')->label('zip');
//                $form->control('input:text', 'phone')->label('phone');
//                //$form->control('input:select', 'company')->label('Company')->options(['WO'=>'Wingz Online'])->attributes(['class'=>'form-control']);
//
//
//            });
//        });
//        return view('instructors');


    }


    public function frontendForm($model)
    {

        $form = $this->form->of('wingz.instructor', function (FormGrid $form) use ($model)  {

            $form->setup($this, 'instructor', $model);
            $form->layout('components.form');


            $form->fieldset('Register', function ($form) {
                $form->control('input:text', 'first_name')->label('')->attributes(['placeholder'=>'First Name']);
                $form->control('input:text', 'last_name')->label('')->attributes(['placeholder'=>'Last Name']);
                $form->control('input:text', 'username')->label('')->attributes(['placeholder'=>'Username']);
                $form->control('input:password', 'password')->label('')->attributes(['placeholder'=>'Password']);
                $form->control('input:password', 'confirm_password')->label('')->attributes(['placeholder'=>'Confirm Password']);
                $form->control('input:email', 'email')->label('')->attributes(['placeholder'=>'Email']);
            });

            $form->fieldset('Address', function ($form) {
                $form->control('input:text', 'personal_address')->label('')->attributes(['placeholder'=>'address']);
                $form->control('input:text', 'personal_city')->label('')->attributes(['placeholder'=>'City']);
                $states = State::stateList();

                $form->control('input:select', 'personal_state')->label('')->attributes(['placeholder'=>'State', 'class'=>'select2'])->options($states);
                $form->control('input:text', 'personal_zip')->label('')->attributes(['placeholder'=>'zip']);
                $form->control('input:text', 'personal_phone')->label('')->attributes(['placeholder'=>'phone']);
            });

            $form->fieldset('License (Optional)', function ($form) {
                $licences = Licenses::lists('name', 'id');
                $form->control('input:select', 'license_type')->label('')->attributes(['class'=>'select2'])->options($licences);
                $form->control('input:text', 'license_no')->label('')->attributes(['placeholder' => 'Flyer License #']);
                $form->control('input:text', 'issue_date')->label('')->attributes(['id'=>'issue_date', 'placeholder'=>'License Issue Date']);
                $form->control('input:text', 'expiration_date')->label('')->attributes(['id'=>'expiration_date', 'placeholder'=>'License Expiration Date']);

            });

            $form->fieldset('Instructor\'s Company', function ($form) {
                $companies = Companies::lists('name', 'id');

                $form->control('input:select', 'company_id')->label('')->label('')->attributes(['placeholder'=>'Company'])->options($companies);
                $form->control('input:text', 'last_flight_review_date')->label('')->attributes(['id'=>'last_flight_review_date', 'placeholder'=>'Last Flight Review Date']);
                $form->control('input:text', 'custom_flight_date')->label('')->attributes(['id'=>'custom_flight_date', 'placeholder'=>'Custom Flight Date']);
                $form->control('input:select', 'medical_class')->label('')->options(['First'=>'First', 'Second'=>'Second', 'Third'=>'Third']);
                $form->control('input:text', 'medical_class_date')->label('')->attributes(['id'=>'medical_class_date', 'placeholder'=>'Medical Class Date']);
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
