<?php

use App\Http\Controllers\admin\AdminOrderController;
use App\Http\Controllers\admin\AdminResourceController;
use App\Http\Controllers\admin\ClassController;
use App\Http\Controllers\admin\CoordinatorController;
use App\Http\Controllers\admin\Dashboard;
use App\Http\Controllers\admin\ExamController;
use App\Http\Controllers\admin\ExaminerController;
use App\Http\Controllers\admin\GodownController;
use App\Http\Controllers\admin\location\CityController;
use App\Http\Controllers\admin\location\CountryController;
use App\Http\Controllers\admin\location\PincodeController;
use App\Http\Controllers\admin\location\StateController;
use App\Http\Controllers\admin\MaterialController;
use App\Http\Controllers\admin\NotificationController;
use App\Http\Controllers\admin\OfficeContactController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SchoolController;
use App\Http\Controllers\admin\StockController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\YearController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\coordinator\CoordinatorDashboard;
use App\Http\Controllers\coordinator\CoordinatorOrderController;
use App\Http\Controllers\coordinator\CoordinatorPaymentController;
use App\Http\Controllers\coordinator\coordinatorStockController;
use App\Http\Controllers\coordinator\ResultController;
use App\Http\Controllers\coordinator\SchoolMaterialEnquiryController;
use App\Http\Controllers\coordinator\ShippingAddressController;
use App\Http\Controllers\debugController;
use App\Http\Controllers\Login;
use App\Http\Controllers\school\SchoolDashboardController;
use App\Http\Controllers\school\SchoolMaterialEnquiryToCoordinatorController;
use App\Http\Controllers\school\SchoolUploadOrderController;
use App\Http\Controllers\school\StudentMaterialEnquiryController;
use App\Http\Controllers\student\MaterialEnquiryController;
use App\Http\Controllers\student\MaterialPurchaseController;
use App\Http\Controllers\student\StudentDashboardController;
use App\Http\Controllers\student\StudentExamController;
use App\Models\admin\OfficeContact;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// login and logout section of all users

Route::get('/',[ Login::class, 'login_view'])->name('login');
Route::post('/login', [Login::class, 'login_check'])->name('login.post');
Route::get('/logout',[Login::class, 'logout'])->name('logout');
Route::get('/student-login',[Login::class, 'student_login'])->name('student.login');
Route::post('/student-login',[Login::class, 'student_login_section'])->name('student.student_login_section');
Route::get('/student-logout',[Login::class, 'student_logout'])->name('student.logout');

Route::get('/debug',[debugController::class, 'index'])->name('debug');

// Route::fallback(function () {
//     return 'Still GOt SOMEwhere';
// });
Route::post('/fetch_state',[CommonController::class, 'fetch_state'])->name('common.fetch_state');
Route::post('/fetch_city',[CommonController::class, 'fetch_city'])->name('common.fetch_city');
Route::post('/fetch_examiners',[CommonController::class, 'fetch_examiners'])->name('common.fetch_examiners');
Route::post('/fetch_coordinator_schools',[CommonController::class, 'fetch_coordinator_schools'])->name('common.fetch_coordinator_schools');

Route::middleware(['auth:admins'])->group(function () {


Route::get('/dashboard',[Dashboard::class, 'dashboard_view'])->name('admin_dashboard');

Route::get('/country',[CountryController::class, 'index'])->name('country.index');
Route::post('/country',[CountryController::class, 'store'])->name('country.store');

Route::get('/pincode',[PincodeController::class, 'index'])->name('pincode.index');
Route::post('/pincode',[PincodeController::class, 'store'])->name('pincode.store');

Route::get('/state',[StateController::class, 'index'])->name('state.index');
Route::post('/state',[StateController::class, 'store'])->name('state.store');

Route::get('/city',[CityController::class, 'index'])->name('city.index');
Route::post('/city',[CityController::class, 'store'])->name('city.store');

Route::get('/class',[ClassController::class, 'index'])->name('class.index');
Route::post('/class',[ClassController::class, 'store'])->name('class.store');

Route::get('/product',[ProductController::class, 'index'])->name('product.index');
Route::post('/product',[ProductController::class, 'store'])->name('product.store');

Route::get('/school',[SchoolController::class, 'index'])->name('school.index');
Route::post('/school/fetch_state',[SchoolController::class, 'fetch_state'])->name('school.fetch_state');
Route::post('/school/fetch_city',[SchoolController::class, 'fetch_city'])->name('school.fetch_city');
Route::post('/school/fetch_school',[SchoolController::class, 'fetch_school'])->name('school.fetch_school');
Route::post('/school',[SchoolController::class, 'school_registration'])->name('school.school_registration');
Route::get('/school/registered-schools',[SchoolController::class, 'registered_schools'])->name('school.registered_schools');
Route::get('/school/download/{file}', [SchoolController::class, 'schoolDownloadFile'])->name('school.schoolDownloadFile');
Route::get('/all-schools',[SchoolController::class, 'all_schools'])->name('school.all_schools');
Route::get('/add_school',[SchoolController::class, 'add_school'])->name('school.add_school');
Route::post('/add_school',[SchoolController::class, 'add_school_store'])->name('school.add_school_store');
Route::post('/adminApproveOrDisapproveSchool',[SchoolController::class, 'adminApproveOrDisapproveSchool'])->name('school.adminApproveOrDisapproveSchool');


Route::get('/student',[StudentController::class, 'index'])->name('student.index');
Route::post('/student',[StudentController::class, 'store'])->name('student.store');
Route::post('/student/fetch_level',[StudentController::class, 'fetch_level'])->name('student.fetch_level');
Route::get('/all-students',[StudentController::class, 'all_students'])->name('student.all_students');


Route::get('/material',[MaterialController::class, 'index'])->name('material.index');
Route::post('/material',[MaterialController::class, 'store'])->name('material.store');
Route::post('/material/fetch_level',[MaterialController::class, 'fetch_level'])->name('material.fetch_level');
Route::get('/all-material',[MaterialController::class, 'all_materials'])->name('material.all_materials');

Route::get('/godown',[GodownController::class, 'index'])->name('godown.index');
Route::post('/godown',[GodownController::class, 'store'])->name('godown.store');

Route::get('/stock',[StockController::class, 'index'])->name('stock.index');
Route::post('/stock',[StockController::class, 'store'])->name('stock.store');
Route::get('/stock/selected-godown',[StockController::class, 'selectedGodown'])->name('stock.selectedGodown');
Route::get('/stock/selected-godown/source-view',[StockController::class, 'selectedGodownSourceView'])->name('stock.selectedGodownSourceView');

Route::get('/Add-stock',[StockController::class, 'addStock'])->name('stock.addStock');
Route::post('/Add-stock/fetch_level',[StockController::class, 'fetch_level'])->name('stock.fetch_level');
Route::post('/Add-stock/fetch_material',[StockController::class, 'fetch_material'])->name('stock.fetch_material');

Route::get('/year',[YearController::class, 'index'])->name('year.index');
Route::post('/year',[YearController::class, 'store'])->name('year.store');


Route::get('/mock-exam',[ExamController::class, 'mockExam'])->name('mockExam.index');
Route::post('/mock-exam/fetch_level',[ExamController::class, 'fetch_level'])->name('mockExam.fetch_level');
Route::post('/mock-exam',[ExamController::class, 'mockExamStore'])->name('mockExam.store');
Route::get('/mock-exam/list',[ExamController::class, 'mockExamList'])->name('mockExam.list');

Route::get('/final-exam',[ExamController::class, 'finalExam'])->name('finalExam.index');
Route::post('/final-exam',[ExamController::class, 'finalExamStore'])->name('finalExam.store');
Route::get('/final-exam/list',[ExamController::class, 'finalExamList'])->name('finalExam.list');

Route::get('/coordinator',[CoordinatorController::class, 'index'])->name('coordinator.index');
Route::post('/coordinator',[CoordinatorController::class, 'store'])->name('coordinator.store');
Route::get('/coordinator/all-coordinators',[CoordinatorController::class, 'allCoordinators'])->name('coordinator.allCoordinators');
Route::get('/coordinator/national-coordinator',[CoordinatorController::class, 'nationalCoordinator'])->name('coordinator.nationalCoordinator');
Route::post('/coordinator/national-coordinator',[CoordinatorController::class, 'nationalCoordinatorStore'])->name('coordinator.nationalCoordinatorStore');

Route::get('/dashboard/orders',[Dashboard::class, 'allOrders'])->name('dashboard.allOrders');
Route::get('/orders/pending-orders',[AdminOrderController::class, 'pendingOrders'])->name('dashboard.pendingOrders');
Route::get('/orders/dispatch-orders',[AdminOrderController::class, 'dispatchOrders'])->name('dashboard.dispatchOrders');
Route::get('/orders/executed-orders',[AdminOrderController::class, 'executedOrders'])->name('dashboard.executedOrders');
Route::get('/orders/received-orders',[AdminOrderController::class, 'receivedOrders'])->name('dashboard.receivedOrders');

Route::get('/dashboard/orders/pending-orders/{consolidate_order_id}',[AdminOrderController::class, 'pendingOrderById'])->name('pendingOrderById.index');
Route::post('/dashboard/orders/pending-orders',[AdminOrderController::class, 'pendingOrderSubmit'])->name('pendingOrderSubmit');

Route::get('/dashboard/orders/dispatch-orders/{consolidate_order_id}',[AdminOrderController::class, 'dispatchOrderById'])->name('dispatchOrderById.index');
Route::post('/dashboard/orders/dispatch-orders',[AdminOrderController::class, 'dispatchOrderSubmit'])->name('dispatchOrderSubmit');

Route::get('/dashboard/orders/executed-orders/{consolidate_order_id}',[AdminOrderController::class, 'executedOrderById'])->name('executedOrderById.index');
Route::get('/dashboard/orders/received-orders/{consolidate_order_id}',[AdminOrderController::class, 'executedOrderById'])->name('receivedOrderById.index');
Route::get('/dashboard/challan',[AdminOrderController::class, 'generateChallan'])->name('generateChallan');

Route::get('/all-payments',[CoordinatorPaymentController::class, 'paymentList'])->name('paymentList');
Route::post('/all-payments/confirm',[CoordinatorPaymentController::class, 'paymentConfirm'])->name('paymentConfirm');
Route::post('/all-payments/edit',[CoordinatorPaymentController::class, 'paymentEdit'])->name('paymentEdit');
Route::post('/all-payments/adminAddPayment',[CoordinatorPaymentController::class, 'store'])->name('adminAddPayment');
Route::get('/all-payments/ledger',[CoordinatorPaymentController::class, 'ledger'])->name('payment.ledger');
Route::post('/all-payments/ledger',[CoordinatorPaymentController::class, 'fetchLedger'])->name('payment.fetchLedger');

Route::get('/office-contact',[OfficeContactController::class, 'index'])->name('officeContact.index');
Route::post('/office-contact',[OfficeContactController::class, 'store'])->name('officeContact.store');

Route::get('/resource',[AdminResourceController::class, 'index'])->name('adminResource.index');
Route::post('/resource',[AdminResourceController::class, 'store'])->name('adminResource.store');

Route::get('/school-orders', [SchoolUploadOrderController::class,'adminSchoolOrderView'])->name('adminSchoolOrderView');
Route::post('/school-orders/fetch_school',[SchoolUploadOrderController::class, 'fetch_schools'])->name('adminSchoolOrderView.fetch_schools');
Route::post('/school-orders', [SchoolUploadOrderController::class,'adminSchoolOrderViewById'])->name('adminSchoolOrderView.adminSchoolOrderViewById');

Route::get('/create-notification',[NotificationController::class, 'index'])->name('notification.index');
Route::post('/create-notification/fetch_level',[NotificationController::class, 'fetch_level'])->name('notification.fetch_level');
Route::post('/create-notification',[NotificationController::class, 'store'])->name('notification.store');
Route::get('/all-notification',[NotificationController::class, 'allNotification'])->name('notification.allNotification');

Route::get('/examiner',[ExaminerController::class, 'index'])->name('examiner.index');
Route::post('/examiner',[ExaminerController::class, 'store'])->name('examiner.store');
Route::post('/examiner/fetch_city',[ExaminerController::class, 'fetch_city'])->name('examiner.fetch_city');
Route::get('/examiner/school-assign',[ExaminerController::class, 'schoolAssign'])->name('examiner.schoolAssign');
Route::post('/examiner/school-assign',[ExaminerController::class, 'schoolAssignStore'])->name('examiner.schoolAssignStore');

Route::get('/examiner/coordinator-assign',[ExaminerController::class, 'coordinatorAssign'])->name('examiner.coordinatorAssign');
Route::post('/examiner/coordinator-assign',[ExaminerController::class, 'coordinatorAssignStore'])->name('examiner.coordinatorAssignStore');


});  // end of admin middleware

// student section
Route::middleware(['auth:students'])->group(function () {

Route::get('/student-dashboard',[StudentDashboardController::class, 'dashboard_view'])->name('studentDashboard');
Route::get('/student-dashboard/student-next-level-registration',[StudentDashboardController::class, 'studentNextLevelRegistration'])->name('studentDashboard.studentNextLevelRegistration');
Route::get('/student-dashboard/next-level-registration/online',[StudentDashboardController::class, 'onlineRegistration'])->name('studentDashboard.onlineRegistration');
Route::post('/student-dashboard/next-level-registration/online/pay',[MaterialPurchaseController::class, 'materialPurchase'])->name('studentDashboard.materialPurchase');

Route::get('/material-enquiry',[MaterialEnquiryController::class, 'index'])->name('materialEnquiry.index');
Route::post('/material-enquiry',[MaterialEnquiryController::class, 'store'])->name('materialEnquiry.store');
Route::post('/material-enquiry/purchase',[MaterialEnquiryController::class, 'materialPurchase'])->name('materialEnquiry.materialPurchase');

Route::get('/student-mock-exam',[StudentExamController::class, 'mockExamNotification'])->name('mockExamNotification.index');
Route::post('/student-mock-exam',[StudentExamController::class, 'mockExamConfirm'])->name('mockExamConfirm');
Route::get('/student-final-exam',[StudentExamController::class, 'finalExamNotification'])->name('finalExamNotification.index');
Route::post('/student-final-exam',[StudentExamController::class, 'finalExamConfirm'])->name('finalExamConfirm');

Route::get('/student/profile',[StudentController::class, 'profile'])->name('student.profile');
Route::post('/student/profile',[StudentController::class, 'profileUpdate'])->name('student.profileUpdate');
Route::get('/student/office-contact',[OfficeContactController::class, 'studentOfficeContact'])->name('student.studentOfficeContact');
Route::get('/student/e-resource',[MaterialController::class, 'studentE_resource'])->name('studentres');

Route::get('/student/notification',[NotificationController::class, 'studentNotification'])->name('studentNotification');

Route::get('/student/examiner', [ExaminerController::class,'studentExaminer'])->name('studentExaminer');

}); // end of student middleware



// School section
Route::middleware(['auth:schools'])->group(function () {

Route::get('/school-dashboard',[SchoolDashboardController::class, 'dashboard_view'])->name('schoolDashboard');

Route::get('/student-material-enquiry',[StudentMaterialEnquiryController::class, 'index'])->name('studentMaterialEnquiry');
Route::post('/student-material-enquiry/available',[StudentMaterialEnquiryController::class, 'materialAvailable'])->name('studentMaterialEnquiry.materialAvailable');

Route::get('/material-enquiry-coordinator',[SchoolMaterialEnquiryToCoordinatorController::class, 'index'])->name('schoolEnquiry.index');
Route::post('/material-enquiry-coordinator/fetch_level',[SchoolMaterialEnquiryToCoordinatorController::class, 'fetch_level'])->name('schoolEnquiry.fetch_level');
Route::post('/material-enquiry-coordinator/fetch_material',[SchoolMaterialEnquiryToCoordinatorController::class, 'fetch_material'])->name('schoolEnquiry.fetch_material');
Route::post('/material-enquiry-coordinator',[SchoolMaterialEnquiryToCoordinatorController::class, 'store'])->name('schoolEnquiry.store');

Route::get('/school/student-registration',[StudentController::class, 'schoolStudentRegistration'])->name('school.studentRegistration');
Route::post('/school/student/fetch_level',[StudentController::class, 'fetch_level'])->name('school.student.fetch_level');
Route::post('/school/student-registration',[StudentController::class, 'schoolStudentCreation'])->name('school.studentRegistrationStore');
Route::get('/school/student-list',[StudentController::class, 'schoolStudentList'])->name('school.schoolStudentList');
Route::get('/resources', [AdminResourceController::class,'allResource'])->name('allResource');

Route::get('/upload-order', [SchoolUploadOrderController::class,'index'])->name('uploadOrder.index');
Route::post('/upload-order', [SchoolUploadOrderController::class,'store'])->name('uploadOrder.store');

Route::get('/school/profile', [SchoolController::class,'profile'])->name('school.schoolProfile');
Route::get('/school/exam', [ExamController::class,'examView'])->name('school.examView');
Route::get('/school/exam/mock-exam-list', [ExamController::class,'SchoolViewMockExamList'])->name('school.SchoolViewMockExamList');
Route::get('/school/exam/final-exam-list', [ExamController::class,'SchoolViewFinalExamList'])->name('school.SchoolViewFinalExamList');

Route::get('/school/notification',[NotificationController::class, 'schoolNotification'])->name('schoolNotification');


}); // end of school middleware

// Coordinator section
Route::middleware(['auth:coordinators'])->group(function ()  {

Route::get('/coordinator-dashboard',[CoordinatorDashboard::class, 'dashboard_view'])->name('coordinatorDashboard');

Route::get('/school-material-enquiry',[SchoolMaterialEnquiryController::class, 'index'])->name('schoolMaterialEnquiry');
Route::post('/school-material-enquiry/available',[SchoolMaterialEnquiryController::class, 'materialAvailable'])->name('schoolMaterialEnquiry.materialAvailable');
Route::get('/result-updation',[ResultController::class, 'index'])->name('result-updation.index');
Route::post('/result-updation',[ResultController::class, 'store'])->name('result-updation.store');
Route::get('/result-updation/mock',[ResultController::class, 'mockResultUpdation'])->name('result-updation.mockResultUpdation');
Route::get('/result-updation/final',[ResultController::class, 'finalResultUpdation'])->name('result-updation.finalResultUpdation');

Route::get('/order-taking',[CoordinatorOrderController::class, 'index'])->name('order-taking.index');
Route::post('/order-taking/fetch_level',[CoordinatorOrderController::class, 'fetch_level'])->name('order-taking.fetch_level');
Route::post('/order-taking/fetch_all_materials',[CoordinatorOrderController::class, 'fetch_all_materials'])->name('order-taking.fetch_all_materials');
Route::post('/order-taking',[CoordinatorOrderController::class, 'store'])->name('order-taking.store');
Route::post('/order-taking/delete-from-table',[CoordinatorOrderController::class, 'orderDeleteFromTable'])->name('order-taking.orderDeleteFromTable');
Route::post('/order-confirmation',[CoordinatorOrderController::class, 'orderConfirmation'])->name('orderConfirmation');
Route::get('/order-confirmation',[CoordinatorOrderController::class, 'orderConfirmationView'])->name('orderConfirmation.view');
Route::post('/order-confirmation/fetch-shipping-details',[CoordinatorOrderController::class, 'fetchShippingDetailsById'])->name('orderConfirmation.fetchShippingDetailsById');
Route::post('/order-placing',[CoordinatorOrderController::class, 'orderPlacing'])->name('orderPlacing');
Route::get('/all-orders',[CoordinatorOrderController::class, 'allOrder'])->name('allOrder');
Route::get('/all-orders/{consolidate_order_id}',[CoordinatorOrderController::class, 'consolidateOrderView'])->name('consolidateOrderView');
Route::post('/order-received',[CoordinatorOrderController::class, 'orderReceived'])->name('orderReceived');

Route::get('/mock-exam-list',[ExamController::class, 'CoordinatorViewMockExamList'])->name('coordinatorViewMockExamList');
Route::get('/final-exam-list',[ExamController::class, 'CoordinatorViewFinalExamList'])->name('coordinatorViewFinalExamList');

Route::get('coordinator/profile',[CoordinatorController::class, 'profile'])->name('coordinator.profile');
Route::post('coordinator/profile',[CoordinatorController::class, 'profileEdit'])->name('coordinator.profileEdit');

Route::get('/coordinator/school-registration',[SchoolController::class, 'coordinatorSchoolRegistration'])->name('coordinator.schoolRegistration');
Route::post('/coordinator/school-registration',[SchoolController::class, 'coordinatorSchoolRegistrationStore'])->name('coordinator.schoolRegistrationStore');
Route::get('/coordinator/all-schools',[SchoolController::class, 'allCoordinatorSchools'])->name('coordinator.allCoordinatorSchools');
Route::post('/coordinator/school/fetch_state',[SchoolController::class, 'fetch_state'])->name('coordinatorSchool.fetch_state');
Route::post('/coordinator/school/fetch_city',[SchoolController::class, 'fetch_city'])->name('coordinatorSchool.fetch_city');
Route::post('/coordinator/school/fetch_school',[SchoolController::class, 'fetch_school'])->name('coordinatorSchool.fetch_school');

Route::get('/coordinator/student-registration',[StudentController::class, 'coordinatorStudentRegistration'])->name('coordinator.studentRegistration');
Route::post('/coordinator/student/fetch_level',[StudentController::class, 'fetch_level'])->name('coordinator.school.fetch_level');
Route::post('/coordinator/student-registration',[StudentController::class, 'store'])->name('coordinator.studentRegistrationStore');
Route::get('/coordinator/student-list',[StudentController::class, 'coordinatorStudentList'])->name('coordinator.coordinatorStudentList');

Route::get('/shipping-address',[ShippingAddressController::class, 'index'])->name('shippingAddress.index');
Route::post('/shipping-address',[ShippingAddressController::class, 'store'])->name('shippingAddress.store');
Route::post('/shipping-address/fetch-state',[ShippingAddressController::class, 'fetch_state'])->name('shippingAddress.fetch_state');
Route::post('/shipping-address/fetch-city',[ShippingAddressController::class, 'fetch_city'])->name('shippingAddress.fetch_city');

Route::get('/payment',[CoordinatorPaymentController::class, 'index'])->name('payment.index');
Route::post('/payment',[CoordinatorPaymentController::class, 'store'])->name('payment.store');

Route::get('coordinator/stock',[coordinatorStockController::class, 'index'])->name('coordinator.stock');

Route::get('/school-order', [SchoolUploadOrderController::class,'coordinatorSchoolOrderView'])->name('coordinatorSchoolOrderView');
Route::post('/school-order', [SchoolUploadOrderController::class,'coordinatorSchoolOrderById'])->name('coordinatorSchoolOrderById');

Route::get('/coordinator/examiner', [ExaminerController::class,'coordinatorExaminers'])->name('coordinatorExaminers');
Route::get('/coordinator/assign-examiner', [ExaminerController::class,'coordinatorAssignExaminerToSchool'])->name('coordinatorAssignExaminerToSchool');
Route::post('/coordinator/assign-examiner', [ExaminerController::class,'coordinatorAssignExaminerToSchoolStore'])->name('coordinatorAssignExaminerToSchoolStore');

Route::get('/coordinator/examiner-meet-link', [ExaminerController::class,'examinerMeetLink'])->name('examinerMeetLink');
Route::post('/coordinator/examiner-meet-link', [ExaminerController::class,'examinerMeetLinkStore'])->name('examinerMeetLinkStore');

});   //end of coordinator middleware
 