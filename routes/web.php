<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\ConstructionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\SupervisionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkController;
use App\Http\Middleware\PreventBackButton;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    // Artisan::call('optimize:clear');
    return view('auth.login');
})->name('refresh');

Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::group(['middleware' => [PreventBackButton::class, 'permission:all.managerial|all.construction|all.study|all.supervision']], function() {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('prevent-back-button');
        Route::get('/construction/assignments', [DashboardController::class, 'constructionAssignments']);
    });
    Route::group(['middleware' => ['permission:all.managerial']], function() {
        Route::get('/dashboard/works', [DashboardController::class, 'works'])->name('dashboard.works');
        Route::resource('users', UserController::class)->only(['index', 'create', 'store', 'edit', 'update'])->names('admin.users');
        Route::controller(UserController::class)->group(function () {
            Route::get('users/{user}/editRole', 'editRole')->name('admin.users.editRole');
            Route::put('users/{user}/role', 'updateRole')->name('admin.users.updateRole');
        });
        Route::resource('roles', RoleController::class)->names('admin.roles');
        Route::get('cities', [CityController::class, 'index'])->name('cities.index');
        Route::get('states', [StateController::class, 'index'])->name('states.index');
        //works ADMIN
        Route::controller(WorkController::class)->group(function () {
            Route::get('/works', 'index')->name('admin.works.index');
            // Route::post('/works/export-excel', 'exportExcel')->name('admin.works.download.excel');
            Route::get('/works/create', 'create')->name('admin.works.create');
            Route::post('/works', 'store')->name('admin.works.store');
            Route::get('/works/{work}/edit', 'edit')->name('admin.works.edit');
            Route::put('/works/{work}', 'update')->name('admin.works.update');
            Route::get('/works/{work}/show', 'show')->name('admin.works.show');
        });
        //services ADMIN
        Route::get('/services', [ServiceController::class, 'index'])->name('admin.services.index');
        //construction ADMIN
        Route::get('/constructions', [ConstructionController::class, 'index'])->name('admin.construction.index');
        //studies ADMIN
        Route::get('/studies', [StudyController::class, 'index'])->name('admin.study.index');
        //supervision ADMIN
        Route::get('/supervisions', [SupervisionController::class, 'index'])->name('admin.supervision.index');
    });
    /***  ÁREA CONSTRUCCIÓN  */
    Route::group(['middleware' => ['permission:all.construction']], function() {
        Route::controller(ConstructionController::class)->group(function (){
            Route::get('/c-assignments', 'c_assignments')->name('construction.assignments');
            Route::get('/c-assignments/{construction}', 'show_assignment')->name('construction.assignments.show');
            Route::get('/c-materials', 'c_materials')->name('construction.materials.list');
            Route::get('/c-materials/{construction}', 'c_materials_construction')->name('construction.materials');
            Route::put('/c-materials/{construction}', 'update_materials_construction')->name('construction.materials.update');
        });
    });/***  END CONSTRUCCIÓN  */
    /***  ÁREA ESTUDIOS  */
    Route::group(['middleware' => ['permission:all.study']], function() {
        Route::controller(StudyController::class)->group(function (){
            Route::get('/e-assignments', 'e_assignments')->name('study.assignments');
            Route::get('/e-assignments/{study}', 'show_assignment')->name('study.assignments.show');
            Route::put('/e-assignments/{study}', 'update_typeStudies')->name('study.assignments.update');
            Route::get('/e-studies', 'e_studies')->name('study.studies');
            Route::get('/e-type-studies', 'e_type_studies')->name('study.type.studies');
            Route::get('/e-studies/documents', 'e_studies')->name('study.studies.documents');//general para ver todos los documentos de todos los estudios
            Route::get('/e-studies/{study}/upload/documents', 'e_studies_upload_documents')->name('study.studies.upload.documents');//form
            Route::post('/e-studies/{study}/upload/documents', 'e_studies_upload_documents_save')->name('study.studies.upload.documents.store');//form
            /* Route::get('/e-studies/{study}/upload/documents/{document}', [StudyController::class, 'downloadFiles'])->name('download.file'); */
            // Route::get('/e-studies/documents/{study}', [StudyController::class, 'e_studies'])->name('study.studies.documents');
        });
    });/***  END ESTUDIOS  */
    /***  ÁREA SUPERVISIÓN  */
    Route::group(['middleware' => ['permission:all.supervision']], function() {
        Route::controller(SupervisionController::class)->group(function() {
            Route::get('/s-assignments', 's_assignments')->name('supervision.assignments');
            Route::get('/s-assignments/{supervision}', 'show_assignment')->name('supervision.assignments.show');
            Route::get('/s-assignments/{supervision}/tasks', 'create_task')->name('supervision.assignments.tasks');
            Route::get('/s-tasks', 's_tasks')->name('supervision.tasks');//tareas en general
            Route::get('/s-follow-ups', 's_follow_ups')->name('supervision.followups');//seguimientos en general
            Route::delete('/s-follow-ups/{follow_up}', 'destroy')->name('supervision.destroy');//seguimientos en general
            Route::get('/s-assignments/{supervision}/follow-up', 'create_follow_up')->name('supervision.assignments.follow-ups');
            Route::post('/s-assignments/{supervision}/follow-up', 'store_follow_up')->name('supervision.follow-ups.store');
        });
    });/***  EN SUPERVISIÓN  */
    Route::controller(ProfileController::class)->group(function() {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
});
Route::post('/works/export-excel', [WorkController::class, 'exportExcel'])->name('admin.works.download.excel');
Route::post('/tmp-upload', [SupervisionController::class, 'tmpUpload'])->name('tmpUpload');
Route::delete('/tmp-delete', [SupervisionController::class, 'tmpDelete'])->name('tmpDelete');
require __DIR__.'/auth.php';