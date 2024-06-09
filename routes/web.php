<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AppointmentDoctorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConversationDoctorController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LoginDoctorController;
use App\Http\Controllers\HomeDetailController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\PatientAdminController;
use App\Http\Controllers\DoctorAdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\GalleriesController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\HealthAdminController;
use App\Http\Controllers\FacilityAdminController;
use App\Http\Controllers\TelemedicineAdminController;
use App\Http\Controllers\TelemedicineDetailController;
use App\Http\Controllers\LoginPatientController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\RegisterPatientController;
use App\Http\Controllers\ConversationController;
use Illuminate\Support\Facades\Route;

// Route untuk landing page yang tidak memerlukan login
Route::get('/', [LandingpageController::class, 'index']);
Route::post('store', [LandingpageController::class, 'store'])->name('data.store');

// Route untuk login dan register
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::get('login/admin', [LoginController::class, 'adminLogin']);
Route::get('login/patient', [LoginPatientController::class, 'patientLogin']);
Route::post('login/patient/patient', [LoginPatientController::class, 'login'])->name('login.patient');
Route::get('login/doctor', [LoginDoctorController::class, 'doctorLogin']);
Route::post('login/doctor/doctor', [LoginDoctorController::class, 'login'])->name('login.doctor');
Route::get('register', [RegisterPatientController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterPatientController::class, 'register'])->name('register.patient');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Route yang memerlukan login
Route::middleware('auth')->group(function () {
    // Route untuk admin
    Route::middleware('role:admin,superadmin')->group(function () {
        Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
        Route::resource('useradmin', UserAdminController::class);
        Route::resource('aboutDetail', AboutController::class);
        Route::resource('homeDetail', HomeDetailController::class);
        Route::resource('patientadmin', PatientAdminController::class);
        Route::resource('doctoradmin', DoctorAdminController::class);
        Route::resource('drug', DrugController::class);
        Route::resource('schedules', SchedulesController::class);
        Route::resource('consultation', ConsultationController::class);
        Route::resource('configuration', ConfigurationController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('health', HealthAdminController::class);
        Route::resource('facilitie', FacilityAdminController::class);
        Route::resource('telemedicine', TelemedicineAdminController::class);
        Route::resource('brand', BrandController::class);
        Route::resource('faq', FaqController::class);
        Route::resource('gallery', GalleriesController::class);
        Route::resource('testimon', TestimonialsController::class);
        Route::get('telemedicine/create/{consultation}', [TelemedicineAdminController::class, 'createFromConsultation'])->name('telemedicine.createFromConsultation');
        Route::post('telemedicine/storeFromConsultation', [TelemedicineAdminController::class, 'storeFromConsultation'])->name('telemedicine.storeFromConsultation');
        Route::get('telemedicine/{telemedicine}/details/create', [TelemedicineDetailController::class, 'create'])->name('telemedicine.details.create');
        Route::post('telemedicine/{telemedicine}/details', [TelemedicineDetailController::class, 'store'])->name('telemedicine.details.store');
        Route::get('telemedicinedetail', [TelemedicineDetailController::class, 'index']);
        Route::get('telemedicine/{telemedicine}/details', [TelemedicineDetailController::class, 'index'])->name('telemedicine.details');
        Route::delete('telemedicinedetails/{id}', [TelemedicineDetailController::class, 'destroy'])->name('telemedicinedetails.destroy');
        Route::get('consultation/{consultation}/telemedicines', [TelemedicineAdminController::class, 'indexByConsultation'])->name('telemedicine.indexByConsultation');
        Route::patch('/consultations/{id}/update-status', [ConsultationController::class, 'updateStatus'])->name('consultation.updateStatus');
    });

    // Route untuk pasien
    Route::middleware('role:pasien')->group(function () {
        Route::resource('patient', PatientController::class);
        Route::resource('biodata', BiodataController::class);
        Route::resource('appointment', AppointmentController::class);
        Route::resource('testimonial', TestimonialsController::class);
        Route::resource('conversations', ConversationController::class);
    });

    Route::middleware('role:dokter')->group(function () {
        Route::resource('doctor', DoctorController::class);
        Route::resource('appointmentdoctor', AppointmentDoctorController::class);
        Route::resource('conversationdoctor', ConversationDoctorController::class);
        Route::get('/consultation/{id}/status/{status}', [ConsultationController::class, 'changeStatus'])->name('consultation.status');

    });
});


