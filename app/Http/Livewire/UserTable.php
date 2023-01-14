<?php

namespace App\Http\Livewire;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class UserTable extends PowerGridComponent
{
    use ActionButton;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('usuarios')
                ->striped()
                ->type(Exportable::TYPE_XLS),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
    * PowerGrid datasource.
    *
    * @return Builder<\App\Models\User>
    */
    public function datasource(): ?Builder
    {
        // return User::query()->with('roles');
        return $user = User::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('name')
            ->addColumn('name_lower', function (User $model) {
                return strtolower(e($model->name));
            })
            ->addColumn('email')
            ->addColumn('phone', function (User $model){
                return e(`<a href="g" class="pointer">`.$model->phone . `</a>`);
            })
            ->addColumn('role', function (User $model) {
                // return e($model->roles->first()->name ?? 'Sin Rol');
                if(e($model->roles->first()) ?? null){
                    return e($model->roles->first()->name);
                }
                return '<span class="tag rounded-full border border-warning/30 bg-warning/10 text-warning hover:bg-warning/20 focus:bg-warning/20 active:bg-warning/25 text-center">'.__('SIN ROL').'</span>';
                /* $model = array_column(json_decode($model->roles, true), 'name');
                return e((implode($model ?? 'A'))); */
            })
            ->addColumn('city_id', function (User $model) {
                $state = $model->city->state->name ?? 'Sin Departamento';
                $city = $model->city->name ?? __('Sin ciudad');
                return e($state.' / '.$city);
            })
            ->addColumn('is_active', function (User $model) {
                $classesSuccess = '<div class="badge space-x-2.5 rounded-full bg-success/10 text-success dark:bg-success/15"><div class="h-2 w-2 rounded-full bg-current"></div><span>';
                $classesError = '<div class="badge space-x-2.5 rounded-full bg-error/10 text-error dark:bg-error/15"><div class="h-2 w-2 rounded-full bg-current"></div><span>';
                $close =`</span>`.`</div>`;

                return e(($model->is_active == 1)) ? $classesSuccess.__('Activo').$close : $classesError.__('Inactivo').$close;

            });
            /* ->addColumn('created_at_formatted', fn (User $model) => Carbon::parse($model->created_at)->format('d/m/Y'))
            ->addColumn('updated_at_formatted', fn (User $model) => Carbon::parse($model->updated_at)->format('d/m/Y')); */
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make('N°', 'id')
            ->sortable(),
                // ->makeInputRange(),

            Column::make('Nombre', 'name')
            ->sortable()
            ->searchable(),
                /* ->sortable()
                ->searchable()
                ->makeInputText(), */

            Column::make('Email', 'email')
            ->sortable()
            ->searchable(),
                /* ->sortable()
                ->searchable()
                ->makeInputText(), */

            Column::make('Teléfono', 'phone')
            ->sortable()
            ->searchable(),
                /* ->sortable()
                ->searchable()
                ->makeInputText(), */

            Column::make('Ciudad', 'city_id'),
                /* ->sortable()
                ->searchable()
                ->makeInputText(), */

            Column::make('Activo', 'is_active')
/*                 ->sortable()
                ->searchable()
                ->makeInputText() */
                ->bodyAttribute('text-center'),

            Column::make('Rol', 'role'),
            /* ->sortable()
            ->searchable(), */
            // ->makeInputText(),

            /* Column::make('Creado', 'created_at_formatted', 'created_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker(),

            Column::make('Actualizado', 'updated_at_formatted', 'updated_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker(), */

        ]
;
    }

     /**
     * PowerGrid User Action Buttons.
     *
     * @return array<int, Button>
     */

    public function actions(): array
    {
        $edit = '<i class="fa-solid fa-user-pen h-6.5 w-6.5"></i>';
        // $delete = '<i class="fa-solid fa-user-xmark h-6.5 w-6.5"></i>';
       return [
           Button::make('edit', $edit)
               ->class('flex w-3/5 bg-yellow-500 cursor-pointer text-white p-1 m-1 rounded fa-xl')
               ->route('admin.users.edit', ['user' => 'id'])
               ->tooltip('Modificar Datos del Usuario')
               ->target('_self'),

           /* Button::make('destroy', $delete)
               ->class('flex bg-red-500 cursor-pointer text-white p-1 m-1 rounded fa-xl')
               ->route('admin.users.destroy', ['user' => 'id'])
               ->tooltip('Eliminar Usuario')
               ->method('delete')
               ->target('_self'), */
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

     /**
     * PowerGrid User Action Rules.
     *
     * @return array<int, RuleActions>
     */

    
    public function actionRules(): array
    {
        // $usersHasWork = User::has('works')->get();
        // dd($usersHasWork);
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                // ->when(fn($user) => $user->roles->first()->permissions->first()->name === 'all.managerial')
                // ->when(fn($user) => auth()->user() === dd($user->permissions) ?? '')
                ->when(fn($user) => $user->id === 1)
                ->hide(),
            /* Rule::button('destroy')
                ->when(fn($user) => $user->id === 1)
                ->hide(),
            Rule::button('destroy')
                ->when(fn($usersHasWork) => $usersHasWork == null)
                ->hide(), */

            /* Rule::rows()
            ->when(fn($user) => $user->id === auth()->user()->id)
            ->setAttribute('class', 'bg-red-200') */
        ];
    }
}
