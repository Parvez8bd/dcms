<?php

use App\Http\Controllers\AccountingDashboardController;
use App\Http\Controllers\CommissionController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ServicesController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\Contact\CommunicationController;
use App\Http\Controllers\Contact\AddressController;
use App\Http\Controllers\CooperativeSociety\AccountController;
use App\Http\Controllers\CooperativeSociety\CategoryController;
use App\Http\Controllers\CooperativeSociety\CooperativeSocietyDashboardController;
use App\Http\Controllers\CooperativeSociety\DipositController;
use App\Http\Controllers\CooperativeSociety\DipositWithdrawController;
use App\Http\Controllers\CooperativeSociety\MemberController;
use App\Http\Controllers\CooperativeSociety\SubCategoryController;
use App\Http\Controllers\DueCollectionController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ExpenseSubcategoryController;
use App\Http\Controllers\FineController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\InstallmentController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\InvestmentDashboardController;
use App\Http\Controllers\LabDashboardController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfitDistributionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaleDashboardController;
use App\Http\Controllers\SampleCollectionController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestGroupController;
use App\Http\Controllers\WithdrawController;
use Illuminate\Support\Facades\Artisan;
use PhpParser\Comment;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    // Services controller 
    Route::get('/', [ServicesController::class, 'index'])->name('services');
    
    //Investment-app group
    Route::prefix('reception')->group(function () {
        // Dashboard controller
        // Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        
        // Route::get('/', function () {
        //     return view('dashboard');
        // })->name('dashboard.index');

        // dashboard
        Route::get('/', [InvestmentDashboardController::class, 'index'])->name('dashboard.index');

        Route::get('/password', [PasswordController::class, 'create'])->name('password.reset');
        Route::post('/password', [PasswordController::class, 'store']);

        Route::view('/member', 'memberAdd')->name('member.add');
        
        // Resource route
        Route::resources([
            
            'contact' => ContactController::class, // contact 
            'communication' => CommunicationController::class, // contact communication 
            'address' => AddressController::class, // contact address
            'media' => MediaController::class, // media
            'patient' => PatientController::class, // patient 
            
            'profit-distribution' => ProfitDistributionController::class, // profitDistribution 
            'due-collection' => DueCollectionController::class, // due-collection 
            
            'report' => ReportController::class, // Installment 
            

            // 'diposit' => DipositController::class, // diposit 
        ]);

        // Installment Routes
        Route::get('installment/{id}/{sale_id}', [InstallmentController::class, 'details'])->name('installment.details');
        

        

        // Trash contact 
        Route::get('/contact-trash', [ContactController::class, 'trash'])->name('contact.trash');
        Route::post('/contact-trash', [ContactController::class, 'restoreOrDelete'])->name('contact.trash');
        Route::get('/contact-restore/{id}', [ContactController::class, 'restore'])->name('contact.restore');
        Route::get('/contact-permanentDelete/{id}', [ContactController::class, 'permanentDelete'])->name('contact.permanentDelete');

        // Trash investment 
        Route::get('/investment-trash', [InvestmentController::class, 'trash'])->name('investment.trash');
        Route::post('/investment-trash', [InvestmentController::class, 'restoreOrDelete'])->name('investment.trash');
        Route::get('/investment-restore/{id}', [InvestmentController::class, 'restore'])->name('investment.restore');
        Route::get('/investment-permanentDelete/{id}', [InvestmentController::class, 'permanentDelete'])->name('investment.permanentDelete');

        // Trash withdraw 
        Route::get('/withdraw-trash', [WithdrawController::class, 'trash'])->name('withdraw.trash');
        Route::post('/withdraw-trash', [WithdrawController::class, 'restoreOrDelete'])->name('withdraw.trash');
        Route::get('/withdraw-restore/{id}', [WithdrawController::class, 'restore'])->name('withdraw.restore');
        Route::get('/withdraw-permanentDelete/{id}', [WithdrawController::class, 'permanentDelete'])->name('withdraw.permanentDelete');
        
        // Trash investment 
        Route::get('/profit-distribution-trash', [ProfitDistributionController::class, 'trash'])->name('profit-distribution.trash');
        Route::post('/profit-distribution-trash', [ProfitDistributionController::class, 'restoreOrDelete'])->name('profit-distribution.trash');
        Route::get('/profit-distribution-restore/{id}', [ProfitDistributionController::class, 'restore'])->name('profit-distribution.restore');
        Route::get('/profit-distribution-permanentDelete/{id}', [ProfitDistributionController::class, 'permanentDelete'])->name('profit-distribution.permanentDelete');
        
        // Trash investment 
        Route::get('/sale-trash', [SaleController::class, 'trash'])->name('sale.trash');
        Route::post('/sale-trash', [SaleController::class, 'restoreOrDelete'])->name('sale.trash');
        Route::get('/sale-restore/{id}', [SaleController::class, 'restore'])->name('sale.restore');
        Route::get('/sale-permanentDelete/{id}', [SaleController::class, 'permanentDelete'])->name('sale.permanentDelete');

        // Trash diposit 
        Route::get('/diposit-trash', [DipositController::class, 'trash'])->name('diposit.trash');
        Route::post('/diposit-trash', [DipositController::class, 'restoreOrDelete'])->name('diposit.trash');
        Route::get('/diposit-restore/{id}', [DipositController::class, 'restore'])->name('diposit.restore');
        Route::get('/diposit-permanentDelete/{id}', [DipositController::class, 'permanentDelete'])->name('diposit.permanentDelete');

        Route::get('/installment-create', [InstallmentController::class, 'saparate_create'])->name('installment.saparate_create');
    });


    //Sale group
    Route::prefix('lab')->group(function () {
        // Dashboard controller
        // Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        
        // Route::get('/', function () {
        //     return view('dashboard');
        // })->name('dashboard.index');

        // dashboard
        Route::get('/', [LabDashboardController::class, 'index'])->name('lab.index');

        Route::get('/password', [PasswordController::class, 'create'])->name('password.reset');
        Route::post('/password', [PasswordController::class, 'store']);

        Route::view('/member', 'memberAdd')->name('member.add');
        
        // Resource route
        Route::resources([
            'project' => ProjectController::class, // project 
            'sale-lone-contact' => ContactController::class, // contact 
            // 'communication' => CommunicationController::class, // contact communication 
            // 'address' => AddressController::class, // contact address
            // 'media' => MediaController::class, // media
            // 'investment' => InvestmentController::class, // investment 
            // 'withdraw' => WithdrawController::class, // withdraw 
            // 'profit-distribution' => ProfitDistributionController::class, // profitDistribution 
            'lab-report' => ReportController::class, // sale 
            'installment' => InstallmentController::class, // Installment 
            'fine' => FineController::class, // Installment 
            'test-group' => TestGroupController::class, // test-group 
            'test' => TestController::class, // test-group 
            'sample-collection' => SampleCollectionController::class, // diposit 
        ]);

        Route::get('report-create/{id}', [ReportController::class, 'singleCreate'])->name('report.singleCreate');
        // Installment Routes
        Route::get('installment/{id}/{sale_id}', [InstallmentController::class, 'details'])->name('installment.details');

        // Trash test-group 
        Route::get('/test-group-trash', [TestGroupController::class, 'trash'])->name('test-group.trash');
        Route::post('/test-group-trash', [TestGroupController::class, 'restoreOrDelete'])->name('test-group.trash');
        Route::get('/test-group-restore/{id}', [TestGroupController::class, 'restore'])->name('test-group.restore');
        Route::get('/test-group-permanentDelete/{id}', [TestGroupController::class, 'permanentDelete'])->name('test-group.permanentDelete');

        // Trash test
        Route::get('/test-trash', [TestController::class, 'trash'])->name('test.trash');
        Route::post('/test-trash', [TestController::class, 'restoreOrDelete'])->name('test.trash');
        Route::get('/test-restore/{id}', [TestController::class, 'restore'])->name('test.restore');
        Route::get('/test-permanentDelete/{id}', [TestController::class, 'permanentDelete'])->name('test.permanentDelete');
        // Trash project 
        Route::get('/project-trash', [ProjectController::class, 'trash'])->name('project.trash');
        Route::post('/project-trash', [ProjectController::class, 'restoreOrDelete'])->name('project.trash');
        Route::get('/project-restore/{id}', [ProjectController::class, 'restore'])->name('project.restore');
        Route::get('/project-permanentDelete/{id}', [ProjectController::class, 'permanentDelete'])->name('project.permanentDelete');

        // Trash contact 
        Route::get('/salelone-contact-trash', [ContactController::class, 'trash'])->name('contact.trash');
        Route::post('/salelone-contact-trash', [ContactController::class, 'restoreOrDelete'])->name('contact.trash');
        Route::get('/salelone-contact-restore/{id}', [ContactController::class, 'restore'])->name('contact.restore');
        Route::get('/salelone-contact-permanentDelete/{id}', [ContactController::class, 'permanentDelete'])->name('contact.permanentDelete');

        // Trash investment 
        Route::get('/investment-trash', [InvestmentController::class, 'trash'])->name('investment.trash');
        Route::post('/investment-trash', [InvestmentController::class, 'restoreOrDelete'])->name('investment.trash');
        Route::get('/investment-restore/{id}', [InvestmentController::class, 'restore'])->name('investment.restore');
        Route::get('/investment-permanentDelete/{id}', [InvestmentController::class, 'permanentDelete'])->name('investment.permanentDelete');

        // Trash withdraw 
        Route::get('/withdraw-trash', [WithdrawController::class, 'trash'])->name('withdraw.trash');
        Route::post('/withdraw-trash', [WithdrawController::class, 'restoreOrDelete'])->name('withdraw.trash');
        Route::get('/withdraw-restore/{id}', [WithdrawController::class, 'restore'])->name('withdraw.restore');
        Route::get('/withdraw-permanentDelete/{id}', [WithdrawController::class, 'permanentDelete'])->name('withdraw.permanentDelete');
        
        // Trash investment 
        Route::get('/profit-distribution-trash', [ProfitDistributionController::class, 'trash'])->name('profit-distribution.trash');
        Route::post('/profit-distribution-trash', [ProfitDistributionController::class, 'restoreOrDelete'])->name('profit-distribution.trash');
        Route::get('/profit-distribution-restore/{id}', [ProfitDistributionController::class, 'restore'])->name('profit-distribution.restore');
        Route::get('/profit-distribution-permanentDelete/{id}', [ProfitDistributionController::class, 'permanentDelete'])->name('profit-distribution.permanentDelete');
        
        // Trash investment 
        Route::get('/sale-trash', [SaleController::class, 'trash'])->name('sale.trash');
        Route::post('/sale-trash', [SaleController::class, 'restoreOrDelete'])->name('sale.trash');
        Route::get('/sale-restore/{id}', [SaleController::class, 'restore'])->name('sale.restore');
        Route::get('/sale-permanentDelete/{id}', [SaleController::class, 'permanentDelete'])->name('sale.permanentDelete');

        

        Route::get('/installment-create', [InstallmentController::class, 'saparate_create'])->name('installment.saparate_create');
    });

    //Cooperative-society group
    Route::prefix('accounting')->group(function () {
        // Dashboard controller
        // Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        
        // Route::get('/', function () {
        //     return view('CooperativeSociety.dashboard');
        // })->name('Cooperative-society');

        // dashboard
        // Route::get('/', [CooperativeSocietyDashboardController::class, 'index'])->name('Cooperative-society');
        Route::get('/', [AccountingDashboardController::class, 'index'])->name('accounting');
        
        // Resource route
        Route::resources([
            'category' => CategoryController::class, // category 
            'sub-category' => SubCategoryController::class, // subcategory 
            'investment' => InvestmentController::class, // investment 
            'income' => IncomeController::class, // investment 
            'withdraw' => WithdrawController::class, // withdraw 
            'commission' => CommissionController::class, // commission 
           
        ]);

        // Expense route
        Route::resource('expense', ExpenseController::class);
        Route::get('/expense-trash', [ExpenseController::class, 'trash'])->name('expense.trash');
        Route::post('/expense-trash', [ExpenseController::class, 'restoreOrDelete'])->name('expense.trash');
        Route::get('/expense-restore/{id}', [ExpenseController::class, 'restore'])->name('expense.restore');
        Route::get('/expense-permanentDelete/{id}', [ExpenseController::class, 'permanentDelete'])->name('expense.permanentDelete');

        // Expense-category route
        Route::resource('expense-category', ExpenseCategoryController::class);
        Route::get('/expense-category-trash', [ExpenseCategoryController::class, 'trash'])->name('expense-category.trash');
        Route::post('/expense-category-trash', [ExpenseCategoryController::class, 'restoreOrDelete'])->name('expense-category.trash');
        Route::get('/expense-category-restore/{id}', [ExpenseCategoryController::class, 'restore'])->name('expense-category.restore');
        Route::get('/expense-category-permanentDelete/{id}', [ExpenseCategoryController::class, 'permanentDelete'])->name('expense-category.permanentDelete');


        // Expense-Subcategory route
        Route::resource('expense-subcategory', ExpenseSubcategoryController::class);
        Route::get('/expense-subcategory-trash', [ExpenseSubcategoryController::class, 'trash'])->name('expense-subcategory.trash');
        Route::post('/expense-subcategory-trash', [ExpenseSubcategoryController::class, 'restoreOrDelete'])->name('expense-subcategory.trash');
        Route::get('/expense-subcategory-restore/{id}', [ExpenseSubcategoryController::class, 'restore'])->name('expense-subcategory.restore');
        Route::get('/expense-subcategory-permanentDelete/{id}', [ExpenseSubcategoryController::class, 'permanentDelete'])->name('expense-subcategory.permanentDelete');

        // Trash contact 
        Route::get('/diposit-contact-trash', [ContactController::class, 'trash'])->name('contact.trash');
        Route::post('/diposit-contact-trash', [ContactController::class, 'restoreOrDelete'])->name('contact.trash');
        Route::get('/diposit-contact-restore/{id}', [ContactController::class, 'restore'])->name('contact.restore');
        Route::get('/diposit-contact-permanentDelete/{id}', [ContactController::class, 'permanentDelete'])->name('contact.permanentDelete');

        

    });

    // Developer area
    // Route::prefix('developer')->group(function() {
    //     Route::get('/', [DashboardController::class, 'index'])->name('developer');
    //     Route::resource('menu', MenuController::class);
    // });

    // axios route
    Route::prefix('axios')->group(function () {
        // Location
        Route::post('/getAllDistrictsFromDivision', [LocationController::class, 'getAllDistrictsFromDivision']);
        Route::post('/getAllUpazilasFromDistrict', [LocationController::class, 'getAllUpazilasFromDistrict']);
        Route::post('/getAllUnionsFromUpazila', [LocationController::class, 'getAllUnionsFromUpazila']);
        Route::post('/gettestById', [PatientController::class, 'gettestById']);

        // expense
        Route::post('/getSubcategoriesById', [ExpenseSubcategoryController::class, 'getSubcategoriesById']);
        Route::post('/getOpeningBalance', [ExpenseSubcategoryController::class, 'getOpeningBalance']);
        Route::post('/getAllDeducts', [ExpenseController::class, 'getAllDeducts']);

    });

});

// create storage-link
Route::get('storage-link', function () {
    Artisan::call('storage:link');
    return 'Storage Link generated';
});


