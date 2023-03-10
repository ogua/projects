<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->Route('home');
});

Auth::routes();

Route::get('/home', [
    'uses' => 'WebController@index',
    'as' => 'home'
]);

Route::get('/loadmenu', [
    'uses' => 'WebController@menu',
    'as' => 'menu'
]);


Route::get('/about-us', [
    'uses' => 'WebController@about',
    'as' => 'about'
]);



Route::get('/student', [
    'uses' => 'WebController@student',
    'as' => 'student-login'
]);



Route::get('/lecturer', [
    'uses' => 'WebController@lecturer',
    'as' => 'lecturer-login'
]);



Route::group(['prefix'=> 'Admission'], function(){

   Route::get('/purchse-OSN-Code', [
    'uses' => 'AdmissionController@index',
    'as' => 'onscode'
]);


   Route::post('/osn-purchase', [
    'uses' => 'AdmissionController@purchase_osn',
    'as' => 'purchase-osn-code'
]);

   Route::get('/osn-payment', [
    'uses' => 'AdmissionController@osn_payment',
    'as' => 'osn-payment'
]);


   Route::get('/osn-code-generate', [
    'uses' => 'AdmissionController@osn_code_gen',
    'as' => 'osn-code-generate'
]);

   Route::get('/online-admission', [
    'uses' => 'AdmissionController@online_admission',
    'as' => 'online-admission-login'
]);

   Route::post('/login-online-admission', [
    'uses' => 'AdmissionController@admission_loign',
    'as' => 'admission-login'
]);

});




Route::group(
    ['prefix'=> 'Admission','middleware' => 'sessionavailable'], function(){

       Route::get('/online-admission-personal-information', [
        'uses' => 'AdmissionController@admission_personal_info',
        'as' => 'admission-personal-info'
    ]); 


       Route::post('/save-online-personal-info', [
        'uses' => 'AdmissionController@save_per_info',
        'as' => 'save-personal-info'
    ]);


       Route::get('/online-admission-personal-results', [
        'uses' => 'AdmissionController@admission_personal_results',
        'as' => 'admission-personal-results'
    ]);

       Route::post('/save-results', [
        'uses' => 'AdmissionController@save_results',
        'as' => 'save-result'
    ]);

       Route::post('/save-results2', [
        'uses' => 'AdmissionController@save_results2',
        'as' => 'save-result2'
    ]);

       Route::post('/save-results3', [
        'uses' => 'AdmissionController@save_results3',
        'as' => 'save-result3'
    ]);


       Route::get('/online-admission-personal-school-attended', [
        'uses' => 'AdmissionController@admission_personal_school',
        'as' => 'admission-personal-school'
    ]);

       Route::post('/save-online-admission-personal-school-attended', [
        'uses' => 'AdmissionController@admission_personal_school_save',
        'as' => 'admission-personal-school-save'
    ]);




       Route::get('/online-admission-personal-app-information', [
        'uses' => 'AdmissionController@admission_app_info',
        'as' => 'admission-app-info'
    ]);

       Route::post('/save-admission-personal-app-information', [
        'uses' => 'AdmissionController@admission_app_info_save',
        'as' => 'admission-app-info-save'
    ]);  




       Route::get('/online-admission-personal-guidian-information', [
        'uses' => 'AdmissionController@admission_guidian_info',
        'as' => 'admission-guidian-info'
    ]);


       Route::post('/save-guidian-information', [
        'uses' => 'AdmissionController@admission_guid_save',
        'as' => 'admission-app-gurd-save'
    ]); 



       Route::get('/online-admission-personal-supporting-documents', [
        'uses' => 'AdmissionController@admission_sup_doc',
        'as' => 'admission-sup-doc'
    ]);


       Route::post('/online-admission-personal-supporting-documents-save', [
        'uses' => 'AdmissionController@admission_sup_doc_save',
        'as' => 'submit-sup-doc'
    ]);

       Route::post('/doc-delete/{id}', [
        'uses' => 'AdmissionController@admission_sup_doc_delete',
        'as' => 'doc-delete'
    ]);


       Route::get('/online-admission-personal-upload-profile-image', [
        'uses' => 'AdmissionController@admission_profile_image',
        'as' => 'admission-prof-img'
    ]);


       Route::post('/submit-profile-image', [
        'uses' => 'AdmissionController@admission_submit_img',
        'as' => 'profile-img-submit'
    ]); 


       Route::post('/submit-application-now/{id}', [
        'uses' => 'AdmissionController@submit_appliaction',
        'as' => 'sub-application-now'
    ]);

   });

Route::get('/logout-user', [
    'uses' => 'AdmissionController@user_logout',
    'as' => 'admission-logout'
]); 

Route::get('/admission-complete', [
    'uses' => 'AdmissionController@adm_complete',
    'as' => 'admission-completed'
]);

Route::get('/admission-complete-print', [
    'uses' => 'AdmissionController@adm_complete_print',
    'as' => 'admission-completed-print'
]);







Route::group(['prefix'=> 'LatestAdmission',  'middleware' => 'auth'], function(){

    Route::get('/all-admissions-submitted', [
        'uses' => 'AppSubmittedController@index',
        'as' => 'admissions-home'
    ]);


    Route::get('/all-get-admission-all', [
        'uses' => 'AppSubmittedController@admission_all',
        'as' => 'admissions-all'
    ]);



    Route::post('/admission-update-programme', [
        'uses' => 'AppSubmittedController@admission_update_program',
        'as' => 'admissions-update-programme'
    ]);



    Route::post('/approve/admission', [
        'uses' => 'AppSubmittedController@admission_approve_admission',
        'as' => 'admissions-approve-admission'
    ]);



     Route::get('/admission-all-view/{id}', [
        'uses' => 'AppSubmittedController@admission_view',
        'as' => 'admissions-all-view'
    ]);




    Route::get('/all-get-admission-all-level-100', [
        'uses' => 'AppSubmittedController@admission_all_level100',
        'as' => 'admissions-home-level-100'
    ]);

     Route::get('/all-get-admission-all-level1', [
        'uses' => 'AppSubmittedController@admission_all_level1',
        'as' => 'admissions-all-level1'
    ]);



    Route::get('/all-get-admission-all-level-100-approved', [
        'uses' => 'AppSubmittedController@admission_all_level100_app',
        'as' => 'admissions-home-level-100-app'
    ]);

     Route::get('/all-get-admission-all-level1-approved', [
        'uses' => 'AppSubmittedController@admission_all_level1_app',
        'as' => 'admissions-all-level1-app'
    ]);




    Route::get('/all-get-admission-all-level-200', [
        'uses' => 'AppSubmittedController@admission_all_level200',
        'as' => 'admissions-home-level-200'
    ]);

     Route::get('/all-get-admission-all-level2', [
        'uses' => 'AppSubmittedController@admission_all_level2',
        'as' => 'admissions-all-level2'
    ]);



    Route::get('/all-get-admission-all-level-200-approved', [
        'uses' => 'AppSubmittedController@admission_all_level200_app',
        'as' => 'admissions-home-level-200-app'
    ]);

     Route::get('/all-get-admission-all-level2-approved', [
        'uses' => 'AppSubmittedController@admission_all_level2_app',
        'as' => 'admissions-all-level2-app'
    ]);




    Route::get('/all-get-admission-all-level-300', [
        'uses' => 'AppSubmittedController@admission_all_level300',
        'as' => 'admissions-home-level-300'
    ]);

     Route::get('/all-get-admission-all-level3', [
        'uses' => 'AppSubmittedController@admission_all_level3',
        'as' => 'admissions-all-level3'
    ]);



    Route::get('/all-get-admission-all-level-300-approved', [
        'uses' => 'AppSubmittedController@admission_all_level300_app',
        'as' => 'admissions-home-level-300-app'
    ]);

     Route::get('/all-get-admission-all-level3-approved', [
        'uses' => 'AppSubmittedController@admission_all_level3_app',
        'as' => 'admissions-all-level3-app'
    ]);



     //confirm student Admission
     Route::get('/student-admission-confirm', [
        'uses' => 'AppSubmittedController@admission_confirm',
        'as' => 'admissions-confirm'
     ]);

     Route::get('/all-student-gain-admission-confirm', [
        'uses' => 'AppSubmittedController@admission_confirm_students',
        'as' => 'admissions-all-confirm'
    ]);

    Route::post('/all-student-gain-admission-confirm-now', [
        'uses' => 'AppSubmittedController@admission_confirm_students_now',
        'as' => 'admissions-all-confirm-now'
    ]);


    Route::get('/student-admission-confirm-appointment-letter/{num}', [
        'uses' => 'AppSubmittedController@admission_confirm_letter',
        'as' => 'admissions-confirm-letter'
     ]);


    //confirmed admission
     Route::get('/student-admission-confirm-all', [
        'uses' => 'AppSubmittedController@admission_confirm_all',
        'as' => 'admissions-confirm-all'
     ]);

     Route::get('/student-admission-confirm-all-data', [
        'uses' => 'AppSubmittedController@admission_confirm_all_data',
        'as' => 'admissions-confirm-all-data'
     ]);


     //confirmed admission
     Route::get('/student-admission-unconfirm-all', [
        'uses' => 'AppSubmittedController@admission_unconfirm_all',
        'as' => 'admissions-unconfirm-all'
     ]);

     Route::get('/student-admission-unconfirm-all-data', [
        'uses' => 'AppSubmittedController@admission_unconfirm_all_data',
        'as' => 'admissions-unconfirm-all-data'
     ]);



     //add student / register new student

   Route::get('/registerStudent', [
        'uses' => 'AdmissionController@newStudent',
        'as' => 'add-students'
    ]);


    Route::post('/registerStudent/add-details', [
        'uses' => 'AdmissionController@newStudent_register',
        'as' => 'add-students-save'
    ]);



});









Route::group(['prefix'=> 'OSMS',  'middleware' => 'auth'], function(){

    Route::get('/dashboard', [
        'uses' => 'DashboardController@index',
        'as' => 'dashboard'
    ]);


});








Route::group(['prefix'=> 'AcademicYear',  'middleware' => 'auth'], function(){

    Route::get('/add-academic-year-osms', [
        'uses' => 'AcademicController@create',
        'as' => 'add-academic-year'
    ]);

    Route::post('/add-academic-update-staus', [
        'uses' => 'AcademicController@updatestatus',
        'as' => 'academic-year-update-status'
    ]);

    Route::get('/add-academic-year-edit/{id}', [
        'uses' => 'AcademicController@edit',
        'as' => 'academic-year-edit'
    ]);

    Route::post('/add-academic-update-year', [
        'uses' => 'AcademicController@update',
        'as' => 'academic-year-update-year'
    ]);


});






Route::group(['prefix'=> 'Allstudents',  'middleware' => 'auth'], function(){

    Route::get('/all-students-information', [
        'uses' => 'StudentsController@allstudents',
        'as' => 'all-students'
    ]);

    Route::get('/all-students-information-date', [
        'uses' => 'StudentsController@allstudents_data',
        'as' => 'all-students-data'
    ]);


    Route::get('/all-students-informationl1', [
        'uses' => 'StudentsController@allstudentsl1',
        'as' => 'all-studentsl1'
    ]);

    Route::get('/all-students-information-datel1', [
        'uses' => 'StudentsController@allstudents_datal1',
        'as' => 'all-students-datal1'
    ]);


    Route::get('/all-students-informationl2', [
        'uses' => 'StudentsController@allstudentsl2',
        'as' => 'all-studentsl2'
    ]);

    Route::get('/all-students-information-datel2', [
        'uses' => 'StudentsController@allstudents_datal2',
        'as' => 'all-students-datal2'
    ]);



   Route::get('/all-students-informationl3', [
        'uses' => 'StudentsController@allstudentsl3',
        'as' => 'all-studentsl3'
    ]);

    Route::get('/all-students-information-datel3', [
        'uses' => 'StudentsController@allstudents_datal3',
        'as' => 'all-students-datal3'
    ]);

    Route::get('/all-students-informationl4', [
        'uses' => 'StudentsController@allstudentsl4',
        'as' => 'all-studentsl4'
    ]);

    Route::get('/all-students-information-datel4', [
        'uses' => 'StudentsController@allstudents_datal4',
        'as' => 'all-students-datal4'
    ]);
   

   Route::get('/student-information-view/{id}', [
        'uses' => 'StudentsController@studentinfo_view',
        'as' => 'students-info-view'
    ]);


    Route::get('/student-profile-view', [
        'uses' => 'StudentsController@studentinfo_profileview',
        'as' => 'students-profile-info-view'
    ]);

    Route::get('/student-assigment/view', [
        'uses' => 'StudentsController@student_assignments',
        'as' => 'students-assignment-views'
    ]);


     Route::get('/student-assigment/view/{id}', [
        'uses' => 'StudentsController@student_assignment_view',
        'as' => 'students-assignment-view'
    ]);

      Route::post('/student-assigment/submit', [
        'uses' => 'StudentsController@student_assignment_submit',
        'as' => 'students-assignment-submit'
    ]);




});








Route::group(['prefix'=> 'Programmes',  'middleware' => 'auth'], function(){

    Route::get('/addprogramme', [
        'uses' => 'ProgrammeController@index',
        'as' => 'add-programme'
    ]);

    Route::get('/addprogramme-edit/{id}', [
        'uses' => 'ProgrammeController@editprogramme',
        'as' => 'edit-programme'
    ]);


    Route::post('/addprogramme-update', [
        'uses' => 'ProgrammeController@update',
        'as' => 'update-programme'
    ]);



    Route::get('/addFaculty', [
        'uses' => 'ProgrammeController@faculty',
        'as' => 'add-faculty'
    ]);

     Route::post('/addFaculty/save', [
        'uses' => 'ProgrammeController@faculty_save',
        'as' => 'add-faculty-save'
    ]);


     Route::get('/delete/faculty/{id}', [
        'uses' => 'ProgrammeController@faculty_delete',
        'as' => 'add-faculty-delete'
    ]);


});









Route::group(['prefix'=> 'CourseManagement',  'middleware' => 'auth'], function(){

    Route::get('/programmme/code/register/degree', [
        'uses' => 'CourseController@pro_degree',
        'as' => 'add-course-degreel1'
    ]);

    Route::get('/programmme/code/register/degree/edit/{id}', [
        'uses' => 'CourseController@pro_degree_update1',
        'as' => 'add-course-degreel1-edit'
    ]);


    Route::post('/programmme/code/edit/100', [
        'uses' => 'CourseController@pro_degree_update1_save',
        'as' => 'add-course-degreel1-save'
    ]);



    //level 200
     Route::get('/programmme/code/register/degree/200', [
        'uses' => 'CourseController@pro_degree_200',
        'as' => 'add-course-degreel2'
    ]);

    Route::get('/programmme/code/register/degree2/edit/{id}', [
        'uses' => 'CourseController@pro_degree_update2',
        'as' => 'add-course-degreel2-edit'
    ]);


    Route::post('/programmme/code/edit/200', [
        'uses' => 'CourseController@pro_degree_update2_save',
        'as' => 'add-course-degreel2-save'
    ]);


    //300
     Route::get('/programmme/code/register/degree/300', [
        'uses' => 'CourseController@pro_degree_300',
        'as' => 'add-course-degreel3'
    ]);

    Route::get('/programmme/code/register/degree3/edit/{id}', [
        'uses' => 'CourseController@pro_degree_update3',
        'as' => 'add-course-degreel3-edit'
    ]);


    Route::post('/programmme/code/edit/300', [
        'uses' => 'CourseController@pro_degree_update3_save',
        'as' => 'add-course-degreel3-save'
    ]);



    //400
     Route::get('/programmme/code/register/degree/400', [
        'uses' => 'CourseController@pro_degree_400',
        'as' => 'add-course-degreel4'
    ]);

    Route::get('/programmme/code/register/degree4/edit/{id}', [
        'uses' => 'CourseController@pro_degree_update4',
        'as' => 'add-course-degreel4-edit'
    ]);


    Route::post('/programmme/code/edit/400', [
        'uses' => 'CourseController@pro_degree_update4_save',
        'as' => 'add-course-degreel4-save'
    ]);



    //diploma courses


    //level 100
    Route::get('/programmme/code/register/diploma/100', [
        'uses' => 'CourseController@pro_diploma',
        'as' => 'add-course-diploma1'
    ]);

    Route::get('/programmme/code/register/diploma/100/edit/{id}', [
        'uses' => 'CourseController@pro_diploma_update1',
        'as' => 'add-course-diploma1-edit'
    ]);


    Route::post('/programmme/code/edit/100', [
        'uses' => 'CourseController@pro_diploma_update1_save',
        'as' => 'add-course-diploma1-save'
    ]);


    // level 200
    Route::get('/programmme/code/register/diploma/200', [
        'uses' => 'CourseController@pro_diploma2',
        'as' => 'add-course-diploma2'
    ]);

    Route::get('/programmme/code/register/diploma/200/edit/{id}', [
        'uses' => 'CourseController@pro_diploma_update2',
        'as' => 'add-course-diploma2-edit'
    ]);


    Route::post('/programmme/code/edit/200', [
        'uses' => 'CourseController@pro_diploma_update2_save',
        'as' => 'add-course-diploma2-save'
    ]);





    //programme course Assignment

    //level 100 first Semester for BPRM
    Route::get('/programmme/course/assignment/first/semsester/{code}', [
        'uses' => 'CourseController@firstsemster_bprm',
        'as' => 'add-course-programme-BPRM-first'
    ]);


    Route::post('/programmme/course/assignment/first/semsester/{code}/save', [
        'uses' => 'CourseController@firstsemster_bprm_save',
        'as' => 'add-course-programme-BPRM-first-save'
    ]);


    Route::post('/programmme/course/delete/first/semsester/BPRM/{id}', [
        'uses' => 'CourseController@firstsemster_bprm_delete',
        'as' => 'course-remove-first-BPRM'
    ]);




    //level 100 Second Semester for BPRM
    Route::get('/programmme/course/assignment/second/semsester/{code}', [
        'uses' => 'CourseController@secondsemster_bprm',
        'as' => 'add-course-programme-BPRM-second'
    ]);


    Route::post('/programmme/course/assignment/second/semsester/{code}/save', [
        'uses' => 'CourseController@secondsemster_bprm_save',
        'as' => 'add-course-programme-BPRM-second-save'
    ]);


    Route::post('/programmme/course/delete/second/semsester/BPRM/{id}', [
        'uses' => 'CourseController@secondsemster_bprm_delete',
        'as' => 'course-remove-second-BPRM'
    ]);



    //level 200 first Semester for BPRM
    Route::get('/programmme/course/assignment/first/semsester/{code}/l200', [
        'uses' => 'CourseController@firstsemster_bprml2',
        'as' => 'add-course-programme-BPRM-first-l2'
    ]);


    Route::post('/programmme/course/assignment/first/semsester/{code}/save/200', [
        'uses' => 'CourseController@firstsemster_bprm_savel2',
        'as' => 'add-course-programme-BPRM-first-save-l2'
    ]);


    Route::post('/programmme/course/delete/first/semsester/BPRM/200/{id}', [
        'uses' => 'CourseController@firstsemster_bprm_deletel2',
        'as' => 'course-remove-first-BPRM-l2'
    ]);


    //level 200 second semester
     Route::get('/programmme/course/assignment/second/semsester/{code}/l200', [
        'uses' => 'CourseController@secondsemster_bprml2',
        'as' => 'add-course-programme-BPRM-second-l2'
    ]);


    Route::post('/programmme/course/assignment/second/semsester/{code}/save/200', [
        'uses' => 'CourseController@secondsemster_bprm_savel2',
        'as' => 'add-course-programme-BPRM-second-save-l2'
    ]);


    Route::post('/programmme/course/delete/firsecondst/semsester/BPRM/200/{id}', [
        'uses' => 'CourseController@secondsemster_bprm_deletel2',
        'as' => 'course-remove-second-BPRM-l2'
    ]);





    //level 300 first Semester for BPRM
    Route::get('/programmme/course/assignment/first/semsester/{code}/l300', [
        'uses' => 'CourseController@firstsemster_bprml3',
        'as' => 'add-course-programme-BPRM-first-l3'
    ]);


    Route::post('/programmme/course/assignment/first/semsester/{code}/save/300', [
        'uses' => 'CourseController@firstsemster_bprm_savel3',
        'as' => 'add-course-programme-BPRM-first-save-l3'
    ]);


    Route::post('/programmme/course/delete/first/semsester/BPRM/300/{id}', [
        'uses' => 'CourseController@firstsemster_bprm_deletel3',
        'as' => 'course-remove-first-BPRM-l3'
    ]);


    //level 300 second semester
     Route::get('/programmme/course/assignment/second/semsester/{code}/l300', [
        'uses' => 'CourseController@secondsemster_bprml3',
        'as' => 'add-course-programme-BPRM-second-l3'
    ]);


    Route::post('/programmme/course/assignment/second/semsester/{code}/save/300', [
        'uses' => 'CourseController@secondsemster_bprm_savel3',
        'as' => 'add-course-programme-BPRM-second-save-l3'
    ]);


    Route::post('/programmme/course/delete/firsecondst/semsester/BPRM/l300/{id}', [
        'uses' => 'CourseController@secondsemster_bprm_deletel3',
        'as' => 'course-remove-second-BPRM-l3'
    ]);









    //level 400 first Semester for BPRM
    Route::get('/programmme/course/assignment/first/semsester/{code}/l400', [
        'uses' => 'CourseController@firstsemster_bprml4',
        'as' => 'add-course-programme-BPRM-first-l4'
    ]);


    Route::post('/programmme/course/assignment/first/semsester/{code}/save/400', [
        'uses' => 'CourseController@firstsemster_bprm_savel4',
        'as' => 'add-course-programme-BPRM-first-save-l4'
    ]);


    Route::post('/programmme/course/delete/first/semsester/BPRM/400/{id}', [
        'uses' => 'CourseController@firstsemster_bprm_deletel4',
        'as' => 'course-remove-first-BPRM-l4'
    ]);


    //level 300 second semester
     Route::get('/programmme/course/assignment/second/semsester/{code}/l400', [
        'uses' => 'CourseController@secondsemster_bprml4',
        'as' => 'add-course-programme-BPRM-second-l4'
    ]);


    Route::post('/programmme/course/assignment/second/semsester/{code}/save/400', [
        'uses' => 'CourseController@secondsemster_bprm_savel4',
        'as' => 'add-course-programme-BPRM-second-save-l4'
    ]);


    Route::post('/programmme/course/delete/firsecondst/semsester/BPRM/300/{id}', [
        'uses' => 'CourseController@secondsemster_bprm_deletel4',
        'as' => 'course-remove-second-BPRM-l4'
    ]);




    //all Degree Courses
    //level 300 second semester
     Route::get('/programmme/course/all/degree/courses/registered', [
        'uses' => 'CourseController@alldegreecourse',
        'as' => 'all-degree-course-registered-view'
    ]);


    Route::get('/programmme/course/all/diploma/courses/registered', [
        'uses' => 'CourseController@alldiplomacourse',
        'as' => 'all-diploma-course-registered-view'
    ]);

    Route::post('/programmme/course/delete/course/regsitered/{id}', [
        'uses' => 'CourseController@delcourse',
        'as' => 'all-deg-dip-delete'
    ]);


});








Route::group(['prefix'=> 'Booking',  'middleware' => 'auth'], function(){

    Route::get('/new-appointment-booking', [
        'uses' => 'BookingController@create',
        'as' => 'new-booking'
    ]);
    
    Route::post('/new-booking-create', [
        'uses' => 'BookingController@store',
        'as' => 'book-now'
    ]);
    
    Route::get('/all-booking', [
        'uses' => 'BookingController@index',
        'as' => 'all-booking'
    ]);
    
    Route::get('/Edit-booking/{id}', [
        'uses' => 'BookingController@edit',
        'as' => 'edit-booking'
    ]);

    Route::post('/Update-booking', [
        'uses' => 'BookingController@update',
        'as' => 'Update-booking'
    ]);


    Route::post('/delete-booking/{id}', [
        'uses' => 'BookingController@destroy',
        'as' => 'delete-booking'
    ]);   


});








//Roles and Permssions Configuration


Route::group(['prefix'=> 'UserManagement',  'middleware' => 'auth'], function(){

    Route::get('/adduserRole', [
        'uses' => 'UserRoleController@addrole',
        'as' => 'add-user-role'
    ]);


    Route::post('/adduserRole/save/user/role', [
        'uses' => 'UserRoleController@addrole_save',
        'as' => 'user-role-save'
    ]);


     Route::post('/adduserRole/save/user/permission', [
        'uses' => 'UserRoleController@addpermission_save',
        'as' => 'user-permission-save'
    ]);



    Route::post('/adduserRole/edit/role/{id}', [
        'uses' => 'UserRoleController@edit_role_per',
        'as' => 'edit-role-perm'
    ]);


    Route::post('/adduserRole/edit/roles/update', [
        'uses' => 'UserRoleController@edit_role_save',
        'as' => 'edit-role-update'
    ]);

    Route::post('/adduserRole/edit/permsission/update', [
        'uses' => 'UserRoleController@edit_per_save',
        'as' => 'edit-perm-update'
    ]);


    
    Route::get('/adduserRole/assign/role/permission/{id}', [
        'uses' => 'UserRoleController@assignrole_to_permission',
        'as' => 'assingn-role-to-permission'
    ]);

    Route::post('/adduserRole/assign/role/permission/save', [
        'uses' => 'UserRoleController@assignrole_to_permission_save',
        'as' => 'assingn-role-to-permission-save'
    ]);


    Route::post('/adduserRole/assign/role/edit/permission/{id}', [
        'uses' => 'UserRoleController@edit_permission',
        'as' => 'edit-role-assign-to-permission'
    ]);

    

    //user and their roles

    Route::get('/users/roles/display/rolesandUsers', [
        'uses' => 'UserRoleController@user_roles_display',
        'as' => 'users-roles-display'
    ]);


    //forcelogout

    Route::get('/users/force/logout', [
        'uses' => 'UserRoleController@user_force_logout',
        'as' => 'logout-user-force'
    ]);

    Route::post('/users/force/logout/{id}', [
        'uses' => 'UserRoleController@user_force_logout_update',
        'as' => 'logout-user-force-update'
    ]);

    Route::post('/users/force/logout/{id}/enableuser', [
        'uses' => 'UserRoleController@user_force_logout_enable',
        'as' => 'logout-user-force-enable'
    ]);



    Route::get('/set-locale/{lang}', [
        'uses' => 'UserRoleController@user_set_locale',
        'as' => 'setLocale'
    ]);


});



//Lock Screen User

    Route::get('/users/confirm-password', [
        'uses' => 'UserRoleController@lockscreen',
        'as' => 'passconfirm'    
    ]);






Route::group(['prefix'=> 'Notifications',  'middleware' => 'auth'], function(){

    Route::post('/markallasRead', [
        'uses' => 'NotificationController@markallasread',
        'as' => 'mark-all-as-read'
    ]);

    Route::post('/DeleteAllNotifications', [
        'uses' => 'NotificationController@DeleteAllNotifications',
        'as' => 'delete-all-notification'
    ]);



});







Route::group(['prefix'=> 'CourseRegistration',  'middleware' => 'auth'], function(){

    Route::get('/student/register/course', [
        'uses' => 'CouserRegController@register_course_user',
        'as' => 'student-reg-course'
    ]);


     Route::post('/student/register/course/now/{prog}/{currentlevel}/{semester}/{academicyear}', [
        'uses' => 'CouserRegController@register_course_user_now',
        'as' => 'student-reg-course-now'
    ]);


      Route::get('/student/print/course/registration/{prog}/{currentlevel}/{semester}/{academicyear}', [
        'uses' => 'CouserRegController@print_course_user',
        'as' => 'student-print-course'
    ]);


      Route::get('/student/results/', [
        'uses' => 'CouserRegController@results_display',
        'as' => 'student-results'
    ]);

    


});








Route::group(['prefix'=> 'Lecturer',  'middleware' => 'auth'], function(){

    Route::get('/register', [
        'uses' => 'LecturerController@register_lecturer',
        'as' => 'lecturer-reg-lecturer'
    ]);


     Route::post('/register/save', [
        'uses' => 'LecturerController@register_lecturer_save',
        'as' => 'lecturer-reg-lecturer-save'
    ]);


    Route::get('/all', [
        'uses' => 'LecturerController@all_lecturer',
        'as' => 'lecturer-all'
    ]);


    Route::get('/edit/lecturer/{id}', [
        'uses' => 'LecturerController@edit_lecturer',
        'as' => 'edit-lecturer'
    ]);


    Route::post('/edit/update/lecturer', [
        'uses' => 'LecturerController@register_lecturer_update',
        'as' => 'update-lecturer-info'
    ]);



    Route::get('/students/results', [
        'uses' => 'LecturerController@lecturer_enter_results',
        'as' => 'lecturer-student-results'
    ]);


     Route::post('/students/results/get/fullname', [
        'uses' => 'LecturerController@lecturer_get_fullname',
        'as' => 'lecturer-student-fullname'
    ]);

     Route::post('/students/results/save', [
        'uses' => 'LecturerController@lecturer_save_results',
        'as' => 'lecturer-student-results-save'
    ]);

//reenter student results
     Route::get('/students/results/reEnter', [
        'uses' => 'LecturerController@lecturer_enter_results_reenter',
        'as' => 'lecturer-student-results-reenter'
    ]);


    //resave
    Route::post('/students/results/resave', [
        'uses' => 'LecturerController@lecturer_resave_results',
        'as' => 'lecturer-student-results-resave'
    ]);



    //online assignment
     Route::get('/students/assignment', [
        'uses' => 'LecturerController@lecturer_post_assignment',
        'as' => 'lecturer-student-assignment'
    ]);

    Route::post('/students/assignment/post', [
        'uses' => 'LecturerController@lecturer_assignment_save',
        'as' => 'lecturer-student-assignment-post'
    ]);


    Route::get('/students/assignment/view', [
        'uses' => 'LecturerController@lecturer_assignment_view',
        'as' => 'lecturer-student-assignment-view'
    ]);

    Route::get('/students/assignment/edit/{id}', [
        'uses' => 'LecturerController@lecturer_assignment_edit',
        'as' => 'lecturer-student-assignment-edit'
    ]);

    Route::post('/students/assignment/post/update', [
        'uses' => 'LecturerController@lecturer_assignment_update',
        'as' => 'lecturer-student-assignment-update'
    ]);


    Route::get('/students/assignment/post/delete/{id}', [
        'uses' => 'LecturerController@lecturer_assignment_delete',
        'as' => 'lecturer-student-assignment-delete'
    ]);



    Route::get('/students/assignment/submiited/{id}', [
        'uses' => 'LecturerController@lecturer_assignment_submiited',
        'as' => 'lecturer-student-assignment-submiited'
    ]);



    Route::post('/lecturer/assign-course', [
        'uses' => 'LecturerController@lecturer_assign_course',
        'as' => 'lecturer-assign-course'
    ]);


    Route::post('/lecturer/remove-assign-course', [
        'uses' => 'LecturerController@lecturer_remove_assign_course',
        'as' => 'lecturer-remove-assign-course'
    ]);

    

});






Route::group(['prefix'=> 'Polls',  'middleware' => 'auth'], function(){

    Route::get('/add-polls', [
        'uses' => 'PollsController@add_pols',
        'as' => 'add-polls'
    ]);


    Route::post('/add-polls/save', [
        'uses' => 'PollsController@save_polls',
        'as' => 'save-polls'
    ]);

    Route::post('/polls-confirm-status', [
        'uses' => 'PollsController@status_confirm',
        'as' => 'confirm-polls'
    ]);

    Route::post('/polls-confirm-vote-start', [
        'uses' => 'PollsController@vote_confirm',
        'as' => 'start-vote-polls'
    ]);

    Route::get('/edit-polls/{id}', [
        'uses' => 'PollsController@edit_pols',
        'as' => 'edit-polls'
    ]);

    Route::post('/update-polls/savepoll', [
        'uses' => 'PollsController@update_pols',
        'as' => 'update-polls'
    ]);


    Route::get('/manage-candidates', [
        'uses' => 'PollsController@manage_polls',
        'as' => 'manage-candidates'
    ]);


     Route::post('/save/positions', [
        'uses' => 'PollsController@save_position',
        'as' => 'save-position'
    ]);



    Route::get('/manage-candidates/edit/{id}', [
        'uses' => 'PollsController@edit_positions',
        'as' => 'edit-position'
    ]);


     Route::post('/update/position', [
        'uses' => 'PollsController@update_position',
        'as' => 'update-position'
    ]);


    Route::get('/user/manage-candidates/', [
        'uses' => 'PollsController@add_candidates',
        'as' => 'add-candidates'
    ]);


    Route::post('/add/candidate', [
        'uses' => 'PollsController@save_candidate',
        'as' => 'add-candidates-save'
    ]);


    Route::get('/edit/candidates/info/{id}', [
        'uses' => 'PollsController@edit_candidates',
        'as' => 'edit-candidates'
    ]);


    Route::post('/update/cnadidate/info', [
        'uses' => 'PollsController@update_candidate_info',
        'as' => 'update-candidate-info'
    ]);



     Route::get('/vote', [
        'uses' => 'PollsController@start_vote',
        'as' => 'start-vote'
    ]);

     Route::post('/vote', [
        'uses' => 'PollsController@start_votes',
        'as' => 'start-votes'
    ]);


    Route::get('/start/vote/', [
        'uses' => 'PollsController@start_vote_now',
        'as' => 'start-vote-now'
    ]);


    Route::post('/start/vote/nextvote', [
        'uses' => 'PollsController@vote_next',
        'as' => 'vote-next'
    ]);


     Route::post('/start/vote/previousvote', [
        'uses' => 'PollsController@vote_previous',
        'as' => 'vote-previous'
    ]);


     Route::post('/submit/user/vote', [
        'uses' => 'PollsController@vote_save',
        'as' => 'vote-save'
    ]);

    
     Route::get('/results', [
        'uses' => 'PollsController@result_polls',
        'as' => 'poll-results'
    ]);


     Route::post('/get/results/all', [
        'uses' => 'PollsController@get_results',
        'as' => 'gets-results-polls'
    ]);

});





Route::group(['prefix'=> 'OnlineExamination',  'middleware' => 'auth'], function(){

    Route::get('/addExams', [
        'uses' => 'ExaminationController@add_exams',
        'as' => 'add-exams'
    ]);

    Route::get('/ExamsView', [
        'uses' => 'ExaminationController@all_exams',
        'as' => 'all-exams'
    ]);

    Route::post('/examination/save', [
        'uses' => 'ExaminationController@save_exams',
        'as' => 'save-exams'
    ]);


    Route::get('/addExams/edit/{id}', [
        'uses' => 'ExaminationController@edit_exams',
        'as' => 'edit-exams'
    ]);

    Route::post('/addExams/update', [
        'uses' => 'ExaminationController@update_exams',
        'as' => 'update-exams'
    ]);


    Route::get('/addQuestion/{id}', [
        'uses' => 'ExaminationController@add_questions',
        'as' => 'add-questions'
    ]);


     Route::get('/addQuestion/more/{quanty}/{examid}', [
        'uses' => 'ExaminationController@more_questions',
        'as' => 'more-questions'
    ]);

    Route::post('/exams/questions/save/{totalquestions}', [
        'uses' => 'ExaminationController@save_questions',
        'as' => 'save-questions'
    ]);


     Route::get('/view/exams/uploaded', [
        'uses' => 'ExaminationController@view_exams',
        'as' => 'view-exams'
    ]);


     Route::get('/student/examinations', [
        'uses' => 'ExaminationController@start_exams',
        'as' => 'start-exmas'
    ]);


    Route::get('/student/examinations/start/{id}', [
        'uses' => 'ExaminationController@start_exams_now',
        'as' => 'start-exmas-now'
    ]);


    Route::get('/student/examinations/fetch/{studentname}/{examid}/{examtotal}/{mins}', [
        'uses' => 'ExaminationController@student_exams_start',
        'as' => 'student_exams_start'
    ]);


     Route::post('/student/exmaination/submit', [
        'uses' => 'ExaminationController@submit_exams',
        'as' => 'submit-exams'
    ]);


     Route::get('/student/examinations/viewscore/{id}', [
        'uses' => 'ExaminationController@view_exams_score',
        'as' => 'start-exmas-score'
    ]);


    Route::get('/lecturer/examinations/view/{id}', [
        'uses' => 'ExaminationController@lect_exam_view',
        'as' => 'lecturer-exam-view'
    ]);


    Route::get('/Student/Retry/Examination/{id}', [
        'uses' => 'ExaminationController@retry_exam_results',
        'as' => 'student-exam-retry-result'
    ]);


     Route::get('/lecturer/questions/edit/{id}', [
        'uses' => 'ExaminationController@lect_question_edit',
        'as' => 'lecturer-question-edit'
    ]);


    Route::post('/lecturer/update/questions/{totalquestions}', [
        'uses' => 'ExaminationController@update_questions',
        'as' => 'update-questions'
    ]);




});






//Lecture Hall Add

Route::group(['prefix'=> 'LectureHall',  'middleware' => 'auth'], function(){

    Route::get('/add-view', [
        'uses' => 'LectureHall@add_view_lecture_hall',
        'as' => 'add-view-lecture-hall'
    ]);


    Route::post('/add-view/save', [
        'uses' => 'LectureHall@add_view_lecture_hall_save',
        'as' => 'add-view-lecture-hall-save'
    ]);



    Route::get('/edit/hall/{id}', [
        'uses' => 'LectureHall@edit_hall',
        'as' => 'edit-hall'
    ]);



    Route::post('/add-view/update/{id}', [
        'uses' => 'LectureHall@update_lect_hall',
        'as' => 'update-lec-hall'
    ]);



    Route::get('/delete/hall/{id}', [
        'uses' => 'LectureHall@delete_hall',
        'as' => 'delete-hall'
    ]);


});







//Timetable Management

Route::group(['prefix'=> 'Timetable',  'middleware' => 'auth'], function(){

    Route::get('/add-timetable', [
        'uses' => 'TimetableController@add_timetable',
        'as' => 'add-timetable'
    ]);

    Route::post('/get-courses', [
        'uses' => 'TimetableController@getcources',
        'as' => 'courses-timetable'
    ]);

    Route::post('/get-courses-by-level', [
        'uses' => 'TimetableController@getcources_bylevel',
        'as' => 'courses-timetable-bylevel'
    ]);

    Route::post('/get-total-students', [
        'uses' => 'TimetableController@gettotal_students',
        'as' => 'total-students-by-cousre'
    ]);

    Route::get('/get-lectures', [
        'uses' => 'TimetableController@get_lectures',
        'as' => 'getall-lecturers'
    ]);

    Route::get('/sub-number', [
        'uses' => 'TimetableController@sub_number',
        'as' => 'substr-number'
    ]);


    Route::post('/save-information', [
        'uses' => 'TimetableController@save_timetable',
        'as' => 'save-timetable-save'
    ]);



    Route::get('/genearte-timetable', [
        'uses' => 'TimetableController@generate_timetable',
        'as' => 'generate-timetable'
    ]);



    Route::post('/timetable-genarate-view', [
        'uses' => 'TimetableController@gentimetable_view',
        'as' => 'timetable-gen-view'
    ]);


    Route::get('/upload-timetable', [
        'uses' => 'TimetableController@upload_timetable',
        'as' => 'upload-timetable'
    ]);


    Route::post('/save-timetable', [
        'uses' => 'TimetableController@save_generated_timetable',
        'as' => 'save-timetable'
    ]);

    Route::get('/delete/timetable/{id}', [
        'uses' => 'TimetableController@delete_timetable',
        'as' => 'delete-timetable'
    ]);


    Route::get('/edit/timetable/{id}', [
        'uses' => 'TimetableController@edit_timetable',
        'as' => 'edit-timetable'
    ]);


    Route::post('/updatetime/uploaded', [
        'uses' => 'TimetableController@update_timetable',
        'as' => 'update-timetable'
    ]);


    Route::get('/student/timetable/view', [
        'uses' => 'TimetableController@student_timetable',
        'as' => 'student-timetable'
    ]);


    Route::get('/lecturer/timetable/view', [
        'uses' => 'TimetableController@gen_timetable_lecturer',
        'as' => 'gen_timetable_lecturer'
    ]);

    Route::post('/lecturer/timetable/view', [
        'uses' => 'TimetableController@lecturer_timetable',
        'as' => 'lecturer_timetable'
    ]);

    


});




Route::group(['prefix'=> 'LiveClasses',  'middleware' => 'auth'], function(){

    Route::get('/createMeeting', [
        'uses' => 'ZoomController@index',
        'as' => 'create-meeting'
    ]);

    Route::post('/save-meeting', [
        'uses' => 'ZoomController@save_meeting',
        'as' => 'save-meeting'
    ]);


    Route::get('/getmeetinginfo', [
        'uses' => 'ZoomController@all_meeting',
        'as' => 'all-meeting'
    ]);

    Route::post('/del-meeting', [
        'uses' => 'ZoomController@del_meeting',
        'as' => 'del-meeting'
    ]);


    Route::get('/student/join-meeting', [
        'uses' => 'ZoomController@join_meeting',
        'as' => 'join-meeting'
    ]);


    Route::get('/getmeetinginfo/student', [
        'uses' => 'ZoomController@student_all_meeting',
        'as' => 'student-all-meeting'
    ]);


    Route::get('/Staffmeeting', [
        'uses' => 'ZoomController@staff_meeting',
        'as' => 'create-staff-meeting'
    ]);

    Route::post('/lecmeeting/save', [
        'uses' => 'ZoomController@staff_meeting_save',
        'as' => 'staff-meeting-save'
    ]);


     Route::get('/allStaffcmeeting', [
        'uses' => 'ZoomController@all_staff_meeting',
        'as' => 'all-staff-meeting'
    ]);

     Route::post('/del-meeting-staff', [
        'uses' => 'ZoomController@del_meeting_staff',
        'as' => 'del-meeting-staff'
    ]);


});





Route::group(['prefix'=> 'Log',  'middleware' => 'auth'], function(){

    Route::get('/systemLogs', [
        'uses' => 'LogController@viewlogs',
        'as' => 'view-system-logs'
    ]);

});




Route::group(['prefix'=> 'Promote/Student',  'middleware' => 'auth'], function(){

    Route::get('/all', [
        'uses' => 'StudentPromotionController@promotestudent',
        'as' => 'promote-student'
    ]);


    Route::get('/all-graduating-to-graduated', [
        'uses' => 'StudentPromotionController@gradtatingtograduated',
        'as' => 'graduating-to-graduated'
    ]);


    Route::get('/all-400-to-graduating', [
        'uses' => 'StudentPromotionController@l400tograduating',
        'as' => '400-to-graduating'
    ]);


    Route::get('/all-300-to-400', [
        'uses' => 'StudentPromotionController@l300to400',
        'as' => '300-to-400'
    ]);

    Route::get('/all-200-to-300', [
        'uses' => 'StudentPromotionController@l200to300',
        'as' => '200-to-300'
    ]);

    Route::get('/all-100-to-200', [
        'uses' => 'StudentPromotionController@l100to200',
        'as' => '100-to-200'
    ]);




});



Route::group(['prefix'=> 'Student-Punishment',  'middleware' => 'auth'], function(){

    Route::get('/addfine', [
        'uses' => 'StudentfineController@addfine',
        'as' => 'add-fine'
    ]);

    Route::get('/finestudent', [
        'uses' => 'StudentfineController@fine_student',
        'as' => 'fine-student'
    ]);

    Route::get('/cancel-student-results', [
        'uses' => 'StudentfineController@cancel_student_results',
        'as' => 'cancel-student-results'
    ]);

});




Route::group(['prefix'=> 'Front-Desk',  'middleware' => 'auth'], function(){

    Route::get('/record-enquiry', [
        'uses' => 'FrontDeskController@addenquiry',
        'as' => 'add-enquiry'
    ]);

    Route::post('/save-enquiry', [
        'uses' => 'FrontDeskController@saveenquiry',
        'as' => 'save-enquiry'
    ]);


    Route::get('/edit-enquiry/{id}', [
        'uses' => 'FrontDeskController@editenquiry',
        'as' => 'edit-enquiry'
    ]);


    Route::get('/delete-enquiry/{id}', [
        'uses' => 'FrontDeskController@deleteenquiry',
        'as' => 'delete-enquiry'
    ]);



    /*
        Visitors Script
    */

    Route::get('/add-visitor', [
        'uses' => 'FrontDeskController@addvisitor',
        'as' => 'add-visitor'
    ]);

    Route::post('/save-visitor', [
        'uses' => 'FrontDeskController@savevisitor',
        'as' => 'save-visitor'
    ]);

    Route::get('/edit-visitor/{id}', [
        'uses' => 'FrontDeskController@editvisitor',
        'as' => 'edit-visitor'
    ]);

    Route::get('/add-visitor/{id}', [
        'uses' => 'FrontDeskController@deletevisitor',
        'as' => 'delete-visitor'
    ]);




    /*
        Call Log
    */

     Route::get('/add-call', [
        'uses' => 'FrontDeskController@addcall',
        'as' => 'add-call'
    ]);

    Route::post('/save-call', [
        'uses' => 'FrontDeskController@savecall',
        'as' => 'save-call'
    ]); 

    Route::get('/edit-call/{id}', [
        'uses' => 'FrontDeskController@editcall',
        'as' => 'edit-call'
    ]); 

    Route::get('/delete-call/{id}', [
        'uses' => 'FrontDeskController@deletecall',
        'as' => 'delete-call'
    ]);    





    /*
        Postal Dispatch
    */

    Route::get('/add-postal-dispatch', [
        'uses' => 'FrontDeskController@addpostalDispatch',
        'as' => 'add-postal-dispatch'
    ]); 


    Route::post('/save-postal-dispatch', [
        'uses' => 'FrontDeskController@savepostalDispatch',
        'as' => 'save-postal-dispatch'
    ]); 


    Route::get('/edit-postal-dispatch/{id}', [
        'uses' => 'FrontDeskController@editpostalDispatch',
        'as' => 'edit-postal-dispatch'
    ]); 


    Route::get('/delete-postal-dispatch/{id}', [
        'uses' => 'FrontDeskController@deletepostalDispatch',
        'as' => 'delete-postal-dispatch'
    ]);   



    /*
        Postal Receive
    */

    Route::get('/add-postal-receive', [
        'uses' => 'FrontDeskController@addpostalreceive',
        'as' => 'add-postal-receive'
    ]); 


    Route::post('/save-postal-receive', [
        'uses' => 'FrontDeskController@savepostalreceive',
        'as' => 'save-postal-receive'
    ]); 


    Route::get('/edit-postal-receive/{id}', [
        'uses' => 'FrontDeskController@editpostalreceive',
        'as' => 'edit-postal-receive'
    ]); 


    Route::get('/delete-postal-receive/{id}', [
        'uses' => 'FrontDeskController@deletepostalreceive',
        'as' => 'delete-postal-receive'
    ]);   



    /*
        Postal Receive
    */

    

});



/*  
************************
*
Accounts Management

***********************/


Route::group(['prefix'=> 'Accounts',  'middleware' => 'auth'], function(){

    Route::get('/add-mandatory-fees', [
        'uses' => 'AccountController@create',
        'as' => 'add-mandatory-fees'
    ]);


    Route::post('/save-mandatory-fees', [
        'uses' => 'AccountController@store',
        'as' => 'save-mandatory-fees'
    ]);


     Route::get('/edit-mandatory-fees/{id}', [
        'uses' => 'AccountController@editmandatory',
        'as' => 'edit-mandatory-fees'
    ]);


    Route::get('/delete-mandatory-fees/{id}', [
        'uses' => 'AccountController@deletemandatory',
        'as' => 'delete-mandatory-fees'
    ]);




    /**************
    ****
    ****
    ****  Other Services Fees
    ****
    ****
    */


    Route::get('/add-other-services-fees', [
        'uses' => 'AccountController@add_other_services',
        'as' => 'add_other_services'
    ]);

    Route::post('/save-other-services-fees', [
        'uses' => 'AccountController@save_other_services',
        'as' => 'save_other_services'
    ]);

    Route::get('/edit-other-services-fees/{id}', [
        'uses' => 'AccountController@edit_other_services',
        'as' => 'edit_other_services'
    ]);

    Route::get('/delete-other-services-fees/{id}', [
        'uses' => 'AccountController@delete_other_services',
        'as' => 'delete_other_services'
    ]);




    /**************
    ****
    ****
    ****   Fees Master
    ****
    ****
    */


    Route::get('/add_fees_master', [
        'uses' => 'AccountController@add_fees_master',
        'as' => 'add_fees_master'
    ]);

    Route::get('/view_fees_master/level100', [
        'uses' => 'AccountController@view_fees_level100',
        'as' => 'view_fees_level100'
    ]);

    Route::get('/view_fees_master/level200', [
        'uses' => 'AccountController@view_fees_level200',
        'as' => 'view_fees_level200'
    ]);

    Route::get('/view_fees_master/level300', [
        'uses' => 'AccountController@view_fees_level300',
        'as' => 'view_fees_level300'
    ]);

    Route::get('/view_fees_master/level400', [
        'uses' => 'AccountController@view_fees_level400',
        'as' => 'view_fees_level400'
    ]);


    Route::post('/save_fees_master/mandatory', [
        'uses' => 'AccountController@save_fees_master_man',
        'as' => 'save_fees_master_man'
    ]);

    Route::post('/save_fees_master/otherservices', [
        'uses' => 'AccountController@save_fees_master_otherservice',
        'as' => 'save_fees_master_otherservice'
    ]);



    Route::get('/delete_fees_master/{id}', [
        'uses' => 'AccountController@delete_fees_master',
        'as' => 'delete_fees_master'
    ]);


    Route::get('/edit_fees_master/{id}', [
        'uses' => 'AccountController@edit_fees_master',
        'as' => 'edit_fees_master'
    ]);


    Route::post('/update_fees_master/{id}', [
        'uses' => 'AccountController@update_fees_master',
        'as' => 'update_fees_master'
    ]);


    Route::get('/dispatch-fees', [
        'uses' => 'AccountController@dispatch_fees',
        'as' => 'dispatch_fees'
    ]);


     Route::get('/dispatch-fees/now', [
        'uses' => 'AccountController@dispatch_fees_now',
        'as' => 'dispatch_fees_now'
    ]);





     /**************
    ****
    ****
    ****   Student Script
    ****
    ****
    */


     Route::get('/search-student', [
        'uses' => 'AccountController@search_student',
        'as' => 'search_student'
     ]);


     Route::get('/search-student/studentfess/{indexnumber}', [
        'uses' => 'AccountController@view_student_fees',
        'as' => 'view_student_fees'
     ]);


     Route::get('/search-student/payfees/{indexnumber}', [
        'uses' => 'AccountController@pay_students_fes',
        'as' => 'pay_students_fes'
     ]);


     Route::get('/studentinfo/fees/{id}', [
        'uses' => 'AccountController@getstudentfees_view',
        'as' => 'getstudentfees_view'
     ]);


     Route::get('/studentinfo/payfees/{id}', [
        'uses' => 'AccountController@paystudentfees_view',
        'as' => 'paystudentfees_view'
     ]);

     Route::post('/debit-student/wallet/information', [
        'uses' => 'AccountController@debit_wallet',
        'as' => 'debit-wallet'
     ]);


     Route::get('/alltransactions', [
        'uses' => 'AccountController@all_transactions',
        'as' => 'all_transactions'
     ]);


     Route::get('/gettransactions', [
        'uses' => 'AccountController@get_transactions',
        'as' => 'get_transactions'
     ]);


     Route::get('/gettransactions/{start}/{end}', [
        'uses' => 'AccountController@get_transactions_bydate',
        'as' => 'get_transactions_bydate'
     ]);




     Route::get('/makepayment/cash', [
        'uses' => 'AccountController@makepayment',
        'as' => 'makepayment'
     ]);





    /**************
    ****
    ****
    ****  Student Online Payment
    ****
    ****
    */

    Route::get('/pay-mandatory-fees-student', [
        'uses' => 'AccountController@pay_mandatory_fees',
        'as' => 'pay_mandatory_fees'
     ]);

    Route::post('/pay-mandatory-fee-student', [
        'uses' => 'AccountController@pay_mandatory_student',
        'as' => 'pay_mandatory_student'
    ]);

    Route::get('/other-services-student', [
        'uses' => 'AccountController@other_services_fees',
        'as' => 'other_services_fees'
     ]);

    Route::post('/other-services-request', [
        'uses' => 'AccountController@request_services',
        'as' => 'request_services'
    ]);


    Route::get('/pay-other-services-student', [
        'uses' => 'AccountController@pay_other_services_fees',
        'as' => 'pay_other_services_fees'
     ]);

    Route::post('/remove-services-request', [
        'uses' => 'AccountController@remove_request_services',
        'as' => 'remove_request_services'
    ]);


     Route::get('/other-services-student/submitted', [
        'uses' => 'AccountController@submiited_other_services_fees',
        'as' => 'submiited_other_services_fees'
     ]);

     Route::get('/print-statement', [
        'uses' => 'AccountController@print_statement',
        'as' => 'print_statement'
     ]);

     Route::get('/transaction-history/student', [
        'uses' => 'AccountController@transaction_history_student',
        'as' => 'transaction_history_student'
     ]);




     /**************
    ****
    ****
    ****  Set Payment Deadline
    ****
    ****
    */


     Route::post('/setpayment-deadlne', [
        'uses' => 'AccountController@payment_deadline',
        'as' => 'payment_deadline'
     ]);















   

});


















Route::group(['prefix'=> 'OSMS/Chat',  'middleware' => 'auth'], function(){

   Route::get('/public-chat', [
        'uses' => 'ChatController@public_chat',
        'as' => 'public_chat'
     ]);

});



Route::group(['prefix'=> 'OSMS/Communicate',  'middleware' => 'auth'], function(){

    Route::get('/send-mail', [
        'uses' => 'CommunicateController@send_mail',
        'as' => 'send_mail'
     ]);


    Route::post('/send-mail/send', [
        'uses' => 'CommunicateController@send_mail_now',
        'as' => 'send_mail_now'
     ]);


    Route::get('/send-sms', [
        'uses' => 'CommunicateController@send_sms',
        'as' => 'send_sms'
     ]);

    Route::post('/send-sms/send', [
        'uses' => 'CommunicateController@send_sms_now',
        'as' => 'send_sms_now'
     ]);


    
   

});





Route::group(['prefix'=> 'Support-Tickets',  'middleware' => 'auth'], function(){

   Route::get('/all-tickets', [
        'uses' => 'SupportTicketController@all_tickets',
        'as' => 'all_tickets'
   ]);


   Route::get('/view-support-tickets/{id}', [
        'uses' => 'SupportTicketController@view_tickets',
        'as' => 'view_tickets'
   ]);


   Route::get('/create-new-ticket', [
        'uses' => 'SupportTicketController@create_ticket',
        'as' => 'create_ticket'
   ]);

   Route::post('/create-new-tickets/save', [
        'uses' => 'SupportTicketController@post_ticket',
        'as' => 'post_ticket'
   ]);

   Route::post('/post-basic-info', [
        'uses' => 'SupportTicketController@post_basicinfo',
        'as' => 'post_basicinfo'
   ]);


   Route::post('/reply-ticket', [
        'uses' => 'SupportTicketController@reply_ticket',
        'as' => 'reply_ticket'
   ]);


   Route::post('/post-ticket-file', [
        'uses' => 'SupportTicketController@post_ticket_file',
        'as' => 'post_ticket_file'
   ]);



Route::post('/ticket-system-delete', [
        'uses' => 'SupportTicketController@delete_ticket',
        'as' => 'delete_ticket'
]);


Route::post('/ticket-system-delete-file', [
        'uses' => 'SupportTicketController@delete_ticket_file',
        'as' => 'delete_ticket_file'
]);

Route::post('/ticket-system-download', [
        'uses' => 'SupportTicketController@download_ticket_file',
        'as' => 'download_ticket_file'
]);

Route::get('/ticket-system-download/{id}', [
        'uses' => 'SupportTicketController@dwn_ticket_file',
        'as' => 'dwn_ticket_file'
]);







/*
*   Student Support Ticket
*
*/

 Route::get('/create-new-ticket-student', [
        'uses' => 'SupportTicketController@create_ticket_student',
        'as' => 'create_ticket_student'
]);


 Route::get('/all-tickets-student', [
        'uses' => 'SupportTicketController@all_tickets_student',
        'as' => 'all_tickets_student'
   ]);

Route::get('/view-support-tickets/student/{id}', [
        'uses' => 'SupportTicketController@view_tickets_student',
        'as' => 'view_tickets_student'
   ]);

Route::post('/create-new-tickets-student/save', [
        'uses' => 'SupportTicketController@post_ticket_student',
        'as' => 'post_ticket_student'
   ]);


 Route::post('/reply-ticket-student', [
        'uses' => 'SupportTicketController@reply_ticket_student',
        'as' => 'reply_ticket_student'
   ]);

 Route::post('/post-ticket-file-student', [
        'uses' => 'SupportTicketController@post_ticket_file_student',
        'as' => 'post_ticket_file_student'
   ]);





});


Route::group(['prefix'=> 'Empty',  'middleware' => 'auth'], function(){

   

});




















































