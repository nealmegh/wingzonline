<?php namespace Wingz\Companies\Http\Presenters;

use Carbon\Carbon;
use Orchestra\Html\Form\Fieldset;
use Wingz\Companies\Model\Aircraft as Eloquent;
use Illuminate\Contracts\Config\Repository;
use Orchestra\Contracts\Html\Form\Grid as FormGrid;
use Orchestra\Contracts\Html\Table\Grid as TableGrid;
use Orchestra\Contracts\Html\Form\Factory as FormFactory;
use Orchestra\Contracts\Html\Table\Builder as TableBuilder;
use Orchestra\Contracts\Html\Table\Factory as TableFactory;
use Wingz\Companies\Model\Companies;

class FlightHistoryPresenter extends Presenter
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
        return $this->table->of('wingz.flight-history', function (TableGrid $table) use ($model) {
            // attach Model and set pagination option to true.
            $table->with($model)->paginate(true);

//            $table->sortable();
//            $table->searchable(['renter_id']);

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
            $table->column(function($column) {
                $column->label = 'Aircraft';
                $column->value = function ($row) {
                    return $row->aircraft->name;
                };
            });

            $table->column(function($column) {
                $column->label = 'Renter';
                $column->value = function ($row) {
                    return $row->renter->user->first_name;
                };
            });
            $table->column(function($column) {
                $column->label= 'Pick Up';
                $column->value = function($row) {
                    return Carbon::parse($row->dt_pick_up)->format('M d, Y h:i a');
                };
            });
            $table->column(function($column) {
                $column->label= 'Return';
                $column->value = function($row) {
                    return Carbon::parse($row->dt_return)->format('M d, Y h:i a');
                };
            });
            $table->column(function($column) {
                $column->label= 'Instructor';
                $column->value = function($row) {
//                    dd($row->instructor);
                    return $row->instructor->user->first_name;
                };
            });
            $table->column(function($column) {
                $column->label = 'Cost';
                $column->value = function($row) {
                    return '$'.$row->price;
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
                ->label('')
                ->escape(false)
                ->attributes(function () {
                    return ['class' => 'th-action'];
                })
                ->value(function ($row) {
                    $html = [
                        app('html')->raw('<a href="/admin/wingz/companies/aircraft/'.$row->aircraft_id.'/edit"><i class="fa fa-long-arrow-right"></i></a>')
                    ];

                    $roles = [
                        (int) $this->config->get('orchestra/foundation::roles.admin'),
                        (int) $this->config->get('orchestra/foundation::roles.member'),
                    ];

//                    if (! in_array((int) $row->id, $roles)) {
//                        $html[] = app('html')->raw('<a href="#"><i class="fa fa-ellipsis-v""></i></a>');
//                    }

                    return app('html')->create('div', app('html')->raw(implode('', $html)), ['class' => 'btn-group']);
                });
        });
    }

    
}
