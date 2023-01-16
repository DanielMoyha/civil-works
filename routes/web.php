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
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    Artisan::call('optimize:clear');
    return view('auth.login');
})->name('refresh');

/** Pruebas */

Route::group(['middleware' => ['prevent-back-button', 'auth', 'verified', 'permission:all.managerial|all.construction|all.study|all.supervision']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/construction/assignments', [DashboardController::class, 'constructionAssignments']);
});
Route::post('/works/export-excel', [WorkController::class, 'exportExcel'])->name('admin.works.download.excel');
Route::group(['middleware' => ['auth', 'verified', 'permission:all.managerial']], function() {
    Route::get('/dashboard/works', [DashboardController::class, 'works'])->name('dashboard.works');
    Route::resource('users', UserController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])->names('admin.users');
    Route::get('users/{user}/editRole', [UserController::class, 'editRole'])->name('admin.users.editRole');
    Route::put('users/{user}/role', [UserController::class, 'updateRole'])->name('admin.users.updateRole');
    Route::resource('roles', RoleController::class)->names('admin.roles');
    Route::get('cities', [CityController::class, 'index'])->name('cities.index');
    Route::get('states', [StateController::class, 'index'])->name('states.index');

    //works ADMIN
    Route::get('/works', [WorkController::class, 'index'])->name('admin.works.index');
    // Route::post('/works/export-excel', [WorkController::class, 'exportExcel'])->name('admin.works.download.excel');
    Route::get('/works/create', [WorkController::class, 'create'])->name('admin.works.create');
    Route::post('/works', [WorkController::class, 'store'])->name('admin.works.store');
    Route::get('/works/{work}/edit', [WorkController::class, 'edit'])->name('admin.works.edit');
    Route::put('/works/{work}', [WorkController::class, 'update'])->name('admin.works.update');
    Route::get('/works/{work}/show', [WorkController::class, 'show'])->name('admin.works.show');
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
Route::group(['middleware' => ['prevent-back-button', 'auth', 'verified', 'permission:all.construction']], function() {
    Route::get('/c-assignments', [ConstructionController::class, 'c_assignments'])->name('construction.assignments');
    Route::get('/c-assignments/{construction}', [ConstructionController::class, 'show_assignment'])->name('construction.assignments.show');
    Route::get('/c-materials', [ConstructionController::class, 'c_materials'])->name('construction.materials.list');
    Route::get('/c-materials/{construction}', [ConstructionController::class, 'c_materials_construction'])->name('construction.materials');
    Route::put('/c-materials/{construction}', [ConstructionController::class, 'update_materials_construction'])->name('construction.materials.update');
});
/***  END CONSTRUCCIÓN  ***/
/***  ÁREA ESTUDIOS  */
Route::group(['middleware' => ['prevent-back-button', 'auth', 'verified', 'permission:all.study']], function() {
    Route::get('/e-assignments', [StudyController::class, 'e_assignments'])->name('study.assignments');
    Route::get('/e-assignments/{study}', [StudyController::class, 'show_assignment'])->name('study.assignments.show');
    Route::put('/e-assignments/{study}', [StudyController::class, 'update_typeStudies'])->name('study.assignments.update');
    Route::get('/e-studies', [StudyController::class, 'e_studies'])->name('study.studies');
    Route::get('/e-type-studies', [StudyController::class, 'e_type_studies'])->name('study.type.studies');
    Route::get('/e-studies/documents', [StudyController::class, 'e_studies'])->name('study.studies.documents');//general para ver todos los documentos de todos los estudios
    Route::get('/e-studies/{study}/upload/documents', [StudyController::class, 'e_studies_upload_documents'])->name('study.studies.upload.documents');//form
    Route::post('/e-studies/{study}/upload/documents', [StudyController::class, 'e_studies_upload_documents_save'])->name('study.studies.upload.documents.store');//form
    /* Route::get('/e-studies/{study}/upload/documents/{document}', [StudyController::class, 'downloadFiles'])->name('download.file'); */
    // Route::get('/e-studies/documents/{study}', [StudyController::class, 'e_studies'])->name('study.studies.documents');
});
/***  END ESTUDIOS  */
/***  ÁREA SUPERVISIÓN  */
Route::group(['middleware' => ['prevent-back-button', 'auth', 'verified', 'permission:all.supervision']], function() {
    Route::get('/s-assignments', [SupervisionController::class, 's_assignments'])->name('supervision.assignments');
    
});
Route::get('/s-assignments/{supervision}', [SupervisionController::class, 'show_assignment'])->name('supervision.assignments.show');
Route::get('/s-assignments/{supervision}/tasks', [SupervisionController::class, 'create_task'])->name('supervision.assignments.tasks');
Route::get('/s-tasks', [SupervisionController::class, 's_tasks'])->name('supervision.tasks');//tareas en general
Route::get('/s-follow-ups', [SupervisionController::class, 's_follow_ups'])->name('supervision.followups');//seguimientos en general
Route::get('/s-assignments/{supervision}/follow-up', [SupervisionController::class, 'create_follow_up'])->name('supervision.assignments.follow-ups');
Route::post('/s-assignments/{supervision}/follow-up', [SupervisionController::class, 'store_follow_up'])->name('supervision.follow-ups.store');
/***  END SUPERVISIÓN  */
Route::post('/tmp-upload', [SupervisionController::class, 'tmpUpload'])->name('tmpUpload');
    Route::delete('/tmp-delete', [SupervisionController::class, 'tmpDelete'])->name('tmpDelete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
/* Route::get('/route-cache', function() {
	Artisan::call('optimize:clear');
    return 'Routes cache has been cleared';
}); */

require __DIR__.'/auth.php';