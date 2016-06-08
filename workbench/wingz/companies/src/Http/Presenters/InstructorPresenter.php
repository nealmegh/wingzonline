<?php namespace Wingz\Companies\Http\Presenters;

use Orchestra\Html\Form\Fieldset;
use Orchestra\Support\Facades\Avatar;
use Wingz\Companies\Model\Companies;
use Wingz\Companies\Model\Instructors as Eloquent;
use Illuminate\Contracts\Config\Repository;
use Orchestra\Contracts\Html\Form\Grid as FormGrid;
use Orchestra\Contracts\Html\Table\Grid as TableGrid;
use Orchestra\Contracts\Html\Form\Factory as FormFactory;
use Orchestra\Contracts\Html\Table\Builder as TableBuilder;
use Orchestra\Contracts\Html\Table\Factory as TableFactory;


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
                        app('html')->raw('<a href="/admin/companies/instructors/'.$row->id.'/activate" style="color: '.$color.'"><i class="fa fa-check-circle-o"></i></a>')
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
                    return ['class' => 'th-action text-right'];
                })
                ->value(function ($row) {
                    $html = [
                        app('html')->raw('<a href="/admin/companies/instructors/'.$row->id.'/edit"><i class="fa fa-ellipsis-v"></i></a>')
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

            $form->setup($this, 'instructors', $model);
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
                $form->control('input:text', 'address')->label('')->attributes(['placeholder'=>'address']);
                $form->control('input:text', 'city')->label('')->attributes(['placeholder'=>'City']);
                $form->control('input:select', 'state')->label('')->attributes(['placeholder'=>'State'])->options(['NY' => 'New York']);
                $form->control('input:text', 'zip')->label('')->attributes(['placeholder'=>'zip']);
                $form->control('input:text', 'phone')->label('')->attributes(['placeholder'=>'phone']);
            });

            $form->fieldset('Instructor\'s Company', function ($form) {
                $companies = Companies::lists('name', 'id');

                $form->control('input:select', 'company')->label('')->attributes(['placeholder'=>'Company'])->options($companies);
            });


        });
        return view('admin.form', compact('form'));


    }
}
