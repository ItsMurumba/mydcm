<?php
use Illuminate\Support\Facades\Input;
use App\Facilities;
use App\drug_disease;
use App\DiseaseType;
use App\Services;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/users/serverSide','MembersController@listmembers');

Route::get('/', function () {
    return view('login');
});

//route for register
Route::get('/registers', '\App\Http\Controllers\Auth\RegisterController@index');

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');


Route::get('/index', 'HomeController@index');
Route::post('/index', 'HomeController@saving');


//services
Route::get('/services', 'ServicesController@index');
Route::post('/services', 'ServicesController@store');

//equipment
Route::get('/equipments', function (){
    return view('equipments');
});
Route::post('/equipments', 'EquipmentsController@store');


//drugs
Route::get('/drugs', function (){
    return view('drugs');
});
Route::post('/drugs', 'DrugsController@store');

//Facility
Route::get('/facility', 'FacilitiesController@index');
Route::post('/facility','FacilitiesController@store');

//Distribution
Route::get('/distribution', function (){
    return view('distribution');
});
Route::post('/distribution','DistributionsController@store');

//estimates
Route::get('/estimates', 'EstimatesController@index');
Route::post('/estimates', 'EstimatesController@store');

//staff-category
Route::get('/staffcategories', function (){
    return view('staffcategories');
});
Route::post('/staffcategories', 'StaffCategoriesController@store');


//projection factors
Route::get('/projectionf', function (){
    return view('projectionfactors');
});
Route::post('/projectionf', 'ProjectionFactorsController@store');


//projections
Route::get('/projections', 'ProjectionController@index');
Route::post('/projections', 'ProjectionController@store');


//route for county form
Route::get('/county', function (){
    return view('county');
});
Route::post('/county', 'CountiesController@store');


//diseases
Route::get('/diseases', function (){
    return view('diseases');
});
Route::post('/diseases', 'DiseasesController@store');

//route for role form
Route::get('/role', function (){
    return view('role');
});

Route::post('/roles', 'RolesController@store');

//route for members form
Route::get('/members', 'MembersController@getIndex');

Route::post('/editmember', 'MembersController@editmember');
//datatables
Route::get('/datatables/data', array('middleware' => 'auth', 'uses' => 'DatatablesController@anyData'))->name('datatables.data');
Route::get('/datatables/index', array('middleware' => 'auth', 'uses' => 'DatatablesController@getIndex'))->name('datatables');


//datacapture route
Route::post('/datacapture', function (){
    return view('datacapture');
});


//disease costs
Route::get('/diseasecosts', 'DiseaseCostsController@index');
Route::post('/diseasecosts', 'DiseaseCostsController@store');


//drug disease
Route::get('/drugdisease','DrugDiseasesController@index');
Route::post('/drugdisease','DrugDiseasesController@store');


//dosage
Route::get('/dosage','DosageController@index');
Route::post('/dosage','DosageController@store');

//predictions
Route::post('/predictions','PredictionsController@index');
Route::post('/predictions2','PredictionsController@store');

Route::get('/predictions','PredictionsController@index');


//datasets
Route::get('/listdataset','ListdatasetController@index');

//userlevel report
Route::get('userlevel','UserLevelController@index');
Route::get('/userlevel/serverSide', 'UserLevelController@listdiseasecosts');

//Predicted userlevel report
Route::get('puserlevel',function (){
    return view('puserlevel');
});
Route::get('/puserlevel/serverSide', 'PuserLevelController@listdiseasecosts');

//countylevel
Route::get('countylevel','CountyLevelController@index');
Route::get('/countylevel/serverSide','CountyLevelController@listdiseasecosts');

//predicted County Level Report
Route::get('pcountylevel',function (){
    return view('pcountylevel');
});
Route::get('/pcountylevel/serverSide','PcountyLevelController@listdiseasecosts');


Route::get('/ajax/get_second','RegisterController@getSecond');


Route::get('api/dropdown/cities', function(){
    $county = Input::get('option');
    $cities = Facilities::where('county_id', $county)->get(array('id','facility_name'));
    return Response::json($cities, 200);
});


Route::get('api/drugs', function(){
    $diseases = Input::get('option');
    $city= DB::select(DB::raw("SELECT dr.name, dd.drug_id as id FROM drug_disease dd JOIN drug dr ON dr.id=dd.drug_id WHERE dd.disease_id=$diseases "), array(
            'diseases' => $diseases,
        ));
    return Response::json($city, 200);
});

Route::post('/predictdiseasecosts1','PredictDiseaseCostsController@index');
Route::post('/predictdiseasecosts','PredictDiseaseCostsController@store');


//pick dataset route
Route::get('/pickdataset','PickDataSetController@index');

//Route for loading graphs
Route::get('/projects/chart/data', 'ProjectsController@projectChartData');

Route::get('/userlevelchart',function (){
    return view('userlevelchart');
});

Route::get('/countylevelchart',function (){
    return view('countylevelchart');
});
Route::get('/projects/chart1/data', 'ProjectsController@projectChartData1');

Route::get('/costdiseasechart',function (){
    return view('costdiseasechart');
});
Route::get('/projects/chart2/data', 'ProjectsController@projectChartData2');


Route::get('/costcountychart',function (){
    return view('costcountychart');
});
Route::get('/projects/chart3/data', 'ProjectsController@projectChartData3');

Route::get('/pcostdiseasechart',function (){
    return view('pcostdiseasechart');
});
Route::get('/projects/chart4/data', 'ProjectsController@projectChartData4');


Route::get('/pcostcountychart',function (){
    return view('pcostcountychart');
});
Route::get('/projects/chart5/data', 'ProjectsController@projectChartData5');


Route::get('/mydatasets/serverSide','MyDataSetsController@listdatasets');
Route::get('/MyDataSets',function (){
    return view('mydatasets');
});

Route::get('gender', function (){
    return view('gender');
});
Route::post('gender','GenderController@store');


Route::get('nhifrelief', function (){
    return view('nhifrelief');
});
Route::post('nhifrelief','NhifReliefController@store');

Route::get('diseasetype','DiseaseTypeController@index');
Route::post('diseasetype','DiseaseTypeController@store');


Route::get('consultationfee', 'ConsultationFeeController@index');
Route::post('consultationfee','ConsultationFeeController@store');

Route::get('facilitylevels', function (){
    return view('facilitylevels');
});
Route::post('facilitylevels','FacilityLevelsController@store');

Route::get('api/diseasetypeM', function(){
    $disease = Input::get('optionm');
    $gender= Input::get('optiong');
    $diseasetype = DiseaseType::where('disease_id', $disease)
        ->where('gender_id',$gender)
        ->get(array('id','disease_type'));
    return Response::json($diseasetype, 200);
});

Route::get('stafftofacility','StaffToFacilityController@index');
Route::post('stafftofacility','StaffToFacilityController@store');


Route::get('api/services', function(){
    $disease = Input::get('option');
    $services = Services::where('disease_id', $disease)->get(array('cost','service_name'));
    return Response::json($services, 200);
});


Route::get('dashboard', function (){
    return view('dashboard');
});

Route::get('/myprofile','MyProfileController@index');
Route::post('/myprofile','MyProfileController@store');

Route::post('profile', 'MyProfileController@update_avatar');

Route::get('/viewdrugs', 'DrugsController@getIndex');
Route::get('drugs/serverSide','DrugsController@getdrugs');
