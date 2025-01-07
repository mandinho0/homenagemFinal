<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;


class PlanCrudController extends CrudController
{

    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup(): void
    {
        CRUD::setModel(Plan::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/plan');
        CRUD::setEntityNameStrings('plan', 'plans');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('name')->label('Name')->value(function ($entry) {
            return ucwords(strtolower($entry->name));
        });
        CRUD::column('email')->label('Email');
        CRUD::column('phone')->label('Phone');
        CRUD::column('ceremony_type')->label('Ceremony Type');
        CRUD::column('location')->label('Location')->value(function ($entry) {
            return ucwords(strtolower($entry->location));
        });
        CRUD::column('status')->label('Status')->value(function ($entry) {
            return ucwords(strtolower($entry->status));
        });
        CRUD::column('created_at')->label('Created At')->type('datetime');
    }


    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::field('name')->label('Name');
        CRUD::field('birth_date')->type('date')->label('Birth Date');
        CRUD::field('email')->label('Email');
        CRUD::field('phone')->label('Phone');
        CRUD::field('estimated_value')->type('number')->label('Estimated Value');
        CRUD::field('ceremony_type')->label('Ceremony Type');
        CRUD::field('location')->label('Location');
        CRUD::field('religion')->label('Religion')->nullable();
        CRUD::field('services')->type('json')->label('Services')->nullable();
        CRUD::field('extras')->type('json')->label('Extras')->nullable();
        CRUD::field('contacts')->type('json')->label('Contacts')->nullable();
        CRUD::field('final_observations')->type('textarea')->label('Final Observations')->nullable();
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
