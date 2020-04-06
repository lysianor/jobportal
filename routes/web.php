<?php

// Route::group(['middleware' => 'auth:web'], function () {
//     Route::get('/', function () {
//         return view('index');
//    });
// });

// Route::group(['middleware' => 'auth:admin'], function () {
//     Route::get('/', function () {
//         return view('index');
//    });
// });

// Verify Auth
Auth::routes();
Auth::routes(['verify' => true]);

// Public Routes
Route::get('/', 'PagesController@index');
Route::get('/about_us', 'PagesController@about_us');
Route::get('/contact_us', 'PagesController@contact_us');



Route::get('/faq', 'PagesController@faq')->name('faq');
Route::get('/privatepolicy', 'PagesController@privatepolicy')->name('privatepolicy');
Route::get('/termsandconditions', 'PagesController@termsandconditions')->name('termsandconditions');

// Find Jobs and Show All Jobs
Route::get('/findjob', 'PagesController@findjob')->name('findjob');
Route::get('/findjob/search', 'PagesController@search');
Route::get('/findjob', 'PagesController@showallJob');

// View Job Description Guest and User
Route::get('/jobs/{id}-{slug}', 'PagesController@viewjobdescription')->name('jobs.viewjobdescription');

// View Company Profile
Route::get('/company/{id}-{slug}', 'PagesController@viewcompany')->name('jobs.viewcompany');

// Reset Password Jobseeker
Route::get('passwords/reset/{token?}', 'Auth\ResetPasswordController@showResetForm');
Route::post('passwords/email', 'Auth\ResetPasswordController@sendResetLinkEmail');
Route::post('passwords/reset', 'Auth\ResetPasswordController@reset');



// Route::get('/', 'JobseekerController@index')->name('index');


// Token
Route::get('/verification/{token}', 'Auth\RegisterController@verification');
Route::post('register-store', 'Auth\RegisterController@store');

// Jobseeker Auth
Route::group(['prefix' => 'jobseeker',  'middleware' => 'auth:web'], function(){

// Store Applied Job
Route::post('/application/{id}/store', 'ApplicantController@store')->name('applicant.store');

// Show All Applied Jobs
Route::get('/applied', 'ApplicantController@appliedJobs')->name('user.appliedjobs');

Route::post('/findjob/{id}/store', 'BookmarkController@store')->name('findjob.store');

// Store Bookmark
Route::post('/bookmark/{id}/store', 'BookmarkController@store')->name('bookmark.store');

// Show All Bookmark
Route::get('/bookmark', 'BookmarkController@bookmarkJobs')->name('user.bookmark');

// Delete Bookmark
Route::DELETE('/bookmark/{bookmark}', 'BookmarkController@bookmark_destroy')->name('bookmark.destroy');

// Pages
Route::get('/about_us', 'PagesController@about_us');

// View Jobdescription via Find Jobs
Route::get('/jobs/{id}-{slug}', 'PagesController@viewjobdescription')->name('jobs.viewjobdescription');

// View Company Profile
Route::get('/company/{id}-{slug}', 'PagesController@viewcompany')->name('jobs.viewcompany');

// Find Jobs and Show All Jobs
Route::get('/findjob', 'PagesController@findjob')->name('findjob');
Route::get('/findjob', 'PagesController@showallJob');

// Change Photo Jobseeker
Route::get('/uploadphoto', 'JobseekerController@profile')->name('uploadphoto');
Route::post('/uploadphoto', 'JobseekerController@update_avatar')->name('uploadphoto.update');
Route::DELETE('/uploadphoto/{avatar}', 'JobseekerController@avatarDestroy')->name('uploadphoto.destroy');

// Change Password Jobseeker
Route::get('/changepassword', 'Auth\ChangePasswordController@index')->name('user.changepassword');
Route::post('/changepassword', 'Auth\ChangePasswordController@changepassword')->name('userchangepassword.update');

// Jobseeker Profile
// Route::get('logout', 'Auth\LoginController@logout')->name('logout')->middleware('verified');
Route::get('/dashboard', 'JobseekerController@dashboard')->name('dashboard')->middleware('verified');
Route::get('/myprofile', 'JobseekerController@myprofile')->name('myprofile')->middleware('verified');
Route::get('/editprofile', 'JobseekerController@editprofile')->name('editprofile')->middleware('verified');
Route::get('/uploadphoto', 'JobseekerController@uploadphoto')->name('uploadphoto')->middleware('verified');
Route::get('/uploadresume', 'JobseekerController@uploadresume')->name('uploadresume')->middleware('verified');

// Show All Experience
Route::get('/experience', 'ExperienceController@viewallexperience')->name('user.experience');

// Show Create Experience
Route::get('/experience/create', 'ExperienceController@createexperience')->name('user.createexperience');

// Create Experience
Route::post('/experience/create', 'ExperienceController@experience_store')->name('experience.store');

// Delete Experience
Route::DELETE('/experience/{experience}', 'ExperienceController@experience_destroy')->name('experience.destroy');

// Show Edit Education
Route::get('/experience/{experience}/edit', 'ExperienceController@editExperience')->name('user.editexperience');

// Show Update Education
Route::post('/experience/{experience}/update', 'ExperienceController@updateExperience')->name('experience.update');

// Show All Skill
Route::get('/skill', 'SkillController@viewallskill')->name('user.skill');

// Show Create Skill
Route::get('/skill/create', 'SkillController@createskill')->name('user.createskill');

// Create Skill
Route::post('/skill/create', 'SkillController@skill_store')->name('skill.store');

// Show Edit Skill
Route::get('/skill/{skill}/edit', 'SkillController@editSkill')->name('user.editskill');

// Delete Skill
Route::DELETE('/skill/{skill}', 'SkillController@skill_destroy')->name('skill.destroy');

// Show Update Skill
Route::post('/skill/{skill}/update', 'SkillController@updateSkill')->name('skill.update');

// Show All Language
Route::get('/language', 'LanguageController@viewalllanguage')->name('user.language');

// Show Create Language
Route::get('/language/create', 'LanguageController@createlanguage')->name('user.createlanguage');

// Create Language
Route::post('/language/create', 'LanguageController@language_store')->name('language.store');

// Delete Language
Route::DELETE('/language/{language}', 'LanguageController@language_destroy')->name('language.destroy');

// Show Edit Language
Route::get('/language/{language}/edit', 'LanguageController@editLanguage')->name('user.editlanguage');

// Show Update Language
Route::post('/language/{language}/update', 'LanguageController@updateLanguage')->name('language.update');



// Show All Education
Route::get('/education', 'EducationController@viewalleducation')->name('user.education');

// Show Create Education
Route::get('/education/create', 'EducationController@createeducation')->name('user.createeducation');

// Create Education
Route::post('/education/create', 'EducationController@education_store')->name('education.store');

// Show Edit Education
Route::get('/education/{education}/edit', 'EducationController@editEducation')->name('user.editeducation');

// Update Education
Route::post('/education/{education}/update', 'EducationController@updateEducation')->name('education.update');

// Delete Education
Route::DELETE('/education/{education}', 'EducationController@education_destroy')->name('education.destroy');

// Save Job
// Route::get('/savejob', 'JobseekerController@savejob')->name('savejob')->middleware('verified');


// Jobseeker Edit Profile
Route::get('/editprofile', 'JobseekerController@edit')->name('user.editprofile')->middleware('verified');
Route::post('/editprofile', 'JobseekerController@update')->name('user.update')->middleware('verified');

// Jobseeker Upload Resume
Route::get('uploadresume','FileUploadController@create')->name('uploadresume')->middleware('verified');;
Route::post('uploadresume','FileUploadController@store')->name('uploadresume.update')->middleware('verified');;


});


// Not working
Route::DELETE('/myprofile/{resume}', 'JobseekerController@ResumeDestroy')->name('user.destroy');


// Jobseeker Error 404 Message
Route::get('/home/Error404', ['as' => 'notfound', 'uses' => 'ErrorController@Error404user']);

// Admin Profile
Route::prefix('admin')->group(function (){
Route::get('/login', 'Admin\Auth\AdminLoginController@showLoginForm')->name('admin.admin-login');
Route::post('/login', 'Admin\Auth\AdminLoginController@login')->name('admin.login.submit');
// Route::post('/', 'Admin\Auth\AdminLoginController@index');
});

// Route::group(['middleware' => ['auth.admin]], function () {
//     // login protected routes.
// });

// Admin Auth
Route::group(['prefix' => 'admin',  'middleware' => 'auth:admin'], function(){

Route::get('/about_us', 'PagesController@about_us');

Route::get('/dashboard', 'Admin\AdminController@admindashboard')->name('admin.admin-dashboard');

Route::get('/myprofile', 'Admin\AdminController@adminmyprofile')->name('admin.admin-myprofile');
Route::get('/editprofile', 'Admin\AdminController@admineditprofile')->name('admin.admin-editprofile');
Route::get('/createjob', 'Admin\JobController@createjob')->name('admin.admin-createjob');
Route::get('/changelogo', 'Admin\AdminController@adminchangelogo')->name('admin.admin-changelogo');

// Show Create Job Category
Route::get('/job-category/create', 'Admin\JobCategoryController@createjobcategory')->name('admin.admin-createjobcategory');

// Show Edit Job Category
Route::get('/job-category/{jobcategory}/edit', 'Admin\JobCategoryController@editJobcategory')->name('admin.admin-editjobcategory');

// Show All Job Category
Route::get('/job-category/', 'Admin\JobCategoryController@jobcategory')->name('admin.admin-jobcategory');

// Show All Companies
Route::get('/company/', 'Admin\CompanyController@company')->name('admin.admin-company');

// Show Create Companies
Route::get('/company/create', 'Admin\CompanyController@createcompany')->name('admin.admin-createcompany');

// Create Companies
Route::post('/company/create', 'Admin\CompanyController@company_store')->name('company.store');

// Show Edit Companies
Route::get('/company/{companies}/edit', 'Admin\CompanyController@editCompany')->name('admin.admin-editcompany');

// Update Companies
Route::post('/company/{companies}/update', 'Admin\CompanyController@CompanyUpdate')->name('company.update');

// Delete Companies
Route::get('/company/delete/{companies}', 'Admin\CompanyController@CompanyDestroy');

// Create Job Category
Route::post('/job-category/create', 'Admin\JobCategoryController@job_store')->name('jobcategory.store');

// Update Job Category
Route::post('/job-category/{jobcategory}/update', 'Admin\JobCategoryController@JobcategoryUpdate')->name('jobcategory.update');

// Delete Job Category
Route::get('/job-category/delete/{jobcategory}', 'Admin\JobCategoryController@JobcategoryDestroy');

// Delete Selected Job Category
Route::post('/job-category/deleteall/', 'Admin\JobCategoryController@JobcategoryDestroyall');

// Show Create Tag
Route::get('/tag/create', 'Admin\TagController@createtag')->name('admin.admin-createtag');

// Show All Tag
Route::get('/tag', 'Admin\TagController@viewalltag')->name('admin.admin-tag');

// Update Tag
Route::post('/tag/{tag}/update', 'Admin\TagController@updateTag')->name('tag.update');

// Delete Tag
Route::get('/tag/delete/{tag}', 'Admin\TagController@destroyTag');

// Delete Selected Job Category
Route::post('/tag/deleteall/', 'Admin\TagController@TagDestroyall');

// Show Edit Tag
Route::get('/tag/{tag}/edit', 'Admin\TagController@editTag')->name('admin.admin-edittag');

// Create Tag
Route::post('/tag/create', 'Admin\TagController@tagstore')->name('tag.store');


// Find Job Admin
Route::get('/findjob', 'PagesController@findjob')->name('findjob');
Route::get('/findjob/', 'PagesController@showallJob');

// View Job Description On Admin
Route::get('/jobs/{id}-{slug}', 'PagesController@viewjobdescription')->name('jobs.viewjobdescription');

// View Company Profile
Route::get('/company/{id}-{slug}', 'PagesController@viewcompany')->name('jobs.viewcompany');

// View Manage Job
Route::get('/manage/job/', 'Admin\JobController@managejob')->name('admin.admin-managejob');

// View Job Detail to Manage
Route::get('/manage/job/{id}-{slug}', 'Admin\JobController@showJob');

// View All Jobseeker who applied per Job
Route::get('/manage/job/{id}', 'Admin\JobController@shortlist');

// Accept Jobseeker
Route::get('/manage/job/proposal/{id}/{user}/shortlistt', 'Admin\JobController@shortlistt');
Route::get('/manage/job/proposal/{id}/{user}/interview', 'Admin\JobController@interview');
Route::get('/manage/job/proposal/{id}/{user}/approved', 'Admin\JobController@approved');
Route::get('/manage/job/proposal/{id}/{user}/decline', 'Admin\JobController@decline');


// View Jobseeker Profile
Route::get('/jobseeker/view/{id}-{slug}', 'Admin\ViewJobseekerController@showProfile');

// Admin Edit Profile
Route::get('/editprofile', 'Admin\AdminController@adminEdit')->name('admin.editprofile')->middleware('verified');
Route::post('/editprofile', 'Admin\AdminController@adminUpdate')->name('admin.admin-editprofile')->middleware('verified');

	// Logout Admin
	Route::get('admin/logout', 'Admin\Auth\AdminLoginController@logout')->name('admin.logout');

	// Change Admin Password
	Route::get('/changepassword', 'Admin\Auth\ChangePasswordController@index')->name('admin.changepassword');
	Route::post('/changepassword', 'Admin\Auth\ChangePasswordController@adminchangepassword')->name('adminchangepassword.update');


	// View all Jobseeker
	Route::get('/jobseeker/view', 'Admin\ViewJobseekerController@showallJobseeker')->name('admin.admin-viewjobseeker');

	// Export Jobseeker Information
	Route::get('/jobseeker/export-users','Admin\ViewJobseekerController@exportUsers');


	// Search for Jobseeker
	Route::get('/jobseeker/search', 'Admin\ViewJobseekerController@search');


	// Change Admin Logo
	Route::get('/changelogo/{id}', 'Admin\AdminController@adminProfile')->name('changelogo');
	Route::post('/changelogo', 'Admin\AdminController@update_adminlogo')->name('changelogo.update');

	// Create Job
	Route::post('/createjob', 'Admin\JobController@createjobstore')->name('admin.admin-createjob');

	// Update Job
	Route::post('/manage/{job}/update', 'Admin\JobController@JobUpdate')->name('job.update');

	// Delete Job
	Route::DELETE('/manage/job/{jobtitle}', 'Admin\JobController@JobDestroy');

	// Show Edit Job
	Route::get('/manage/{job}/edit', 'Admin\JobController@editJob')->name('admin.admin-editjob');

});

Route::group(['middleware'=>['auth:web']],function(){

	// Logout Jobseeker
	Route::get('user/logout', 'Auth\LoginController@userLogout')->name('user.logout');

});
