<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AppointmentDoctorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BiodataDoctorController;
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
use App\Http\Controllers\TransactionController;
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
use App\Http\Controllers\ReportController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\TelemedicineController;
use App\Http\Controllers\TelemedicineDetailDoctorController;
use App\Http\Controllers\DrugDoctorController;
use App\Http\Controllers\TelemedicinePatientController;
use App\Http\Controllers\TelemedicineDetailPatientController;
use App\Http\Controllers\DrugReportController;
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
Route::get('forgetpassword', [LoginPatientController::class, 'showForgetPasswordForm'])->name('forgetpassword');
Route::post('forgetpassword', [LoginPatientController::class, 'submitForgetPasswordForm']);
Route::get('resetpassword/{token}', [LoginPatientController::class, 'showResetPasswordForm'])->name('resetpassword');
Route::post('resetpassword', [LoginPatientController::class, 'submitResetPasswordForm'])->name('resetpassword');
Route::get('/verify-email/{token}', [EmailVerificationController::class, 'verify'])->name('verify.email');
Route::get('/chat', [ChatController::class, 'showChatForm'])->name('chat');
Route::post('/chat', [ChatController::class, 'handleChat']);

// Untuk redirect ke Google
Route::get('login/google/redirect', [SocialiteController::class, 'redirect'])
    ->middleware(['web', 'guest'])
    ->name('redirect');

Route::get('login/google/callback', [SocialiteController::class, 'callback'])
    ->middleware(['web', 'guest'])
    ->name('callback');

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
        Route::resource('report', ReportController::class);
        Route::resource('telemedicine', TelemedicineAdminController::class);
        Route::resource('drugreport', DrugReportController::class);
        Route::resource('transaction', TransactionController::class);
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
    Route::middleware(['auth', 'role:pasien', 'verified', 'ensure.email.verified'])->group(function () {
        Route::resource('patient', PatientController::class);
        Route::resource('biodata', BiodataController::class);
        Route::resource('appointment', AppointmentController::class);
        Route::resource('testimonial', TestimonialsController::class);
        Route::resource('conversations', ConversationController::class);
        Route::get('schedulespatient', [SchedulesController::class, 'patient']);
        Route::get('/telemedicinepatient/consultation/{consultationId}', [TelemedicinePatientController::class, 'indexByConsultation'])->name('telemedicine.indexByConsulPatient');
        Route::get('telemedicinepatient/{telemedicine}/details', [TelemedicineDetailPatientController::class, 'index'])->name('telemedicinepatient.details');
        Route::post('/telemedicines/checkout', [TelemedicinePatientController::class, 'checkout'])->name('telemedicinepatient.checkout');
        Route::post('/midtrans-callback', [TelemedicinePatientController::class, 'paymentCallback'])->name('midtrans.callback');
    });

    Route::middleware('role:dokter')->group(function () {
        Route::resource('doctor', DoctorController::class);
        Route::resource('appointmentdoctor', AppointmentDoctorController::class);
        Route::resource('conversationdoctor', ConversationDoctorController::class);
        Route::resource('biodatadoctor', BiodataDoctorController::class);
        Route::resource('drugdoctor', DrugDoctorController::class);
        Route::get('/consultation/{id}/status/{status}', [ConsultationController::class, 'changeStatus'])->name('consultation.status');
        Route::get('/telemedicinedoctor/consultation/{consultationId}', [TelemedicineController::class, 'indexByConsultation'])->name('telemedicine.indexByConsul');
        Route::get('/telemedicinedoctor/createdoctor/{consultationId}', [TelemedicineController::class, 'create'])->name('telemedicine.create');
        Route::post('/telemedicinedoctor/store', [TelemedicineController::class, 'store'])->name('telemedicine.store');
        Route::get('/telemedicinedoctor/{telemedicine}/edit', [TelemedicineController::class, 'edit'])->name('telemedicine.edit');
        Route::put('/telemedicinedoctor/{telemedicine}', [TelemedicineController::class, 'update'])->name('telemedicine.update');
        Route::delete('/telemedicinedoctor/{telemedicine}', [TelemedicineController::class, 'destroy'])->name('telemedicine.destroy');
        Route::get('telemedicinedoctor/{telemedicine}/details/create', [TelemedicineDetailDoctorController::class, 'create'])->name('telemedicinedoctor.details.create');
        Route::post('telemedicinedoctor/{telemedicine}/details', [TelemedicineDetailDoctorController::class, 'store'])->name('telemedicinedoctor.details.store');
        Route::get('telemedicinedoctor/{telemedicine}/details', [TelemedicineDetailDoctorController::class, 'index'])->name('telemedicinedoctor.details');
        Route::delete('telemedicinedoctordetails/{id}', [TelemedicineDetailDoctorController::class, 'destroy'])->name('telemedicinedoctordetails.destroy');
    });
});


