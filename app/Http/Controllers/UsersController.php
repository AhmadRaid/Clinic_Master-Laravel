<?php

namespace App\Http\Controllers;
use App\DataTables\UserDataTable;
use App\DataTables\PatientsDataTable;
use App\Http\Controllers\Controller;
use Datatables;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Booking;
use App\Models\Patient;
use App\Models\PerfectBody;
use App\Models\BodyMeasurementsPatient;
use App\Models\PatientsBody;
use App\Models\PatientsDetails;
use App\Models\PatientReports;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('users.index');
    }
    public function patient(PatientsDataTable $dataTable)
    {
        return $dataTable->render('Patients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create',['title'=>trans('admin.create_users')]);
    }
    public function addpatient()
    {
        $doctors = Doctor::all();

        return view('users.addpatient',compact('doctors'));
    }
    public function addbody(Request $request)
    {
        $id =$request->id;        
        if($id == null){
            $user ='';
            $users = User::where('roles_name','User')->get();
            return view('users.addbody',compact('users','user'));
        }elseif($id != null){
            $users ='';
            $user = User::find($id);
            return view('users.addbody',compact('users','user'));
        }
    }

    public function addphysical(Request $request)
    {
        $id =$request->id;        
        if($id == null){
            $user ='';
            $users = User::where('roles_name','User')->get();
            return view('users.addphysical',compact('users','user'));
        }elseif($id != null){
            $users ='';
            $user = User::find($id);
            return view('users.addphysical',compact('users','user'));
        }
    }
    public function addheightweight(Request $request)
    {
        $id =$request->id;        
        if($id == null){
            $user ='';
            $users = User::where('roles_name','User')->get();
            return view('users.addheightweightl',compact('users','user'));
        }elseif($id != null){
            $users ='';
            $user = User::find($id);
            return view('users.addheightweightl',compact('users','user'));
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data=$this->validate(request(),[
            'name'=>'required',
            'status'=>'required',
            'roles_name'=>'required|in:active,Inactive',
            'roles_name'=>'required|in:Admin,Supervisor,User',
            'email'=>'required|email|unique:users',
            'password'=>'sometimes|nullable|min:6',
        ],[],[
            'name'=> trans('admin.name'),
            'status'=> trans('admin.status'),
            'roles_name'=> trans('admin.level'),
            'email'=>trans('admin.email'),
            'password'=>trans('admin.password'),
        ]);
        $data['password'] = bcrypt(request('password'));
        User::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(url('users'));
    }
    public function createpatient(Request $request)
    {      
        
        $name=$request->name;
        $email=$request->email;
        $user =new User();   
        $user->name=$name;
        $user->email=$email;     
        $user->password=encrypt('secret');
        $user->roles_name='User';
        $user->status='نشط';
        $user->save();
        $phone= $request->phone;
        $mobile= $request->mobile;
        $birthday=$request->birthday;
        $age=$request->age;
        $gender=$request->gender;
        $education= $request->education;
        $job=$request->job;
        $governorate= $request->governorate;
        $city= $request->city;
        $address= $request->address;
        $Physician=$request->Physician;
        $idNumber= $request->idNumber;
        $dateOfRegistration=$request->dateOfRegistration;
        $dateLastVisit=$request->dateLastVisit;
        $numberOfVisit= $request->numberOfVisit;
        $weight= $request->weight;
        $pressure= $request->pressure;
        $sugar=$request->sugar ;
        $insulin= $request->insulin;
        $medicines=$request->medicines;
        $smoking= $request->smoking;
        $notes=$request->notes;
        $patientsdetails =new PatientsDetails();                 
        $patientsdetails->user_id=$user->id;
        $patientsdetails->phone=$phone;
        $patientsdetails->mobile=$mobile;
        $patientsdetails->birthday=$birthday;
        $patientsdetails->age=$age;
        $patientsdetails->education=$education;
        $patientsdetails->job=$job;
        $patientsdetails->gender=$gender;
        $patientsdetails->governorate=$governorate;
        $patientsdetails->city=$city;
        $patientsdetails->address=$address;
        $patientsdetails->Physician=$Physician;
        $patientsdetails->idNumber=$idNumber;
        $patientsdetails->dateOfRegistration=$dateOfRegistration;
        $patientsdetails->dateLastVisit=$dateLastVisit;
        $patientsdetails->numberOfVisit=$numberOfVisit;
        $patientsdetails->weight=$weight;
        $patientsdetails->pressure=$pressure;
        $patientsdetails->sugar =$sugar;
        $patientsdetails->insulin=$insulin;
        $patientsdetails->medicines=$medicines;
        $patientsdetails->smoking=$smoking;
        $patientsdetails->notes=$notes;
        $patientsdetails->save();
        session()->flash('success','تم اضافة المريض بنجاح');
        return redirect(url('user/patient'));
    }
    public function createbody(Request $request)
    {
        $user_id=$request->user_id;
        $bloodPressure=$request->bloodPressure;
        $heartBeats= $request->heartBeats;
        $heat= $request->heat;
        $respiratoryRate=$request->respiratoryRate;
        $insulinRatio=$request->insulinRatio;
        $weight=$request->weight;
        $length= $request->length;
        $mass=$request->mass;
        $PatientComplaint= $request->PatientComplaint;
        $diagnosePatient= $request->diagnosePatient;
        $note=$request->note;
        $patientsbody =new PatientsBody();                 
        $patientsbody->user_id=$user_id;
        $patientsbody->bloodPressure=$bloodPressure;
        $patientsbody->heartBeats=$heartBeats;
        $patientsbody->heat=$heat;
        $patientsbody->respiratoryRate=$respiratoryRate;
        $patientsbody->insulinRatio=$insulinRatio;
        $patientsbody->weight=$weight;
        $patientsbody->length=$length;
        $patientsbody->mass=$mass;
        $patientsbody->PatientComplaint=$PatientComplaint;
        $patientsbody->diagnosePatient=$diagnosePatient;
        $patientsbody->note=$note;
        $patientsbody->save();
        session()->flash('success','تم اضافة بينات الجسم بنجاح');
        return redirect(url('user/patient'));
    }
    public function createphysical(Request $request)
    {
        $user_id=$request->user_id;
        $rightHandCircumference=$request->rightHandCircumference;
        $leftHandCircumference= $request->leftHandCircumference;
        $chestCircumference= $request->chestCircumference;
        $centerCircumference=$request->centerCircumference;
        $abdominalCircumference=$request->abdominalCircumference;
        $perimeterPelvis=$request->perimeterPelvis;
        $rightThighCircumference= $request->rightThighCircumference;
        $leftThighCircumference=$request->leftThighCircumference;
        $rightCalfCircumference= $request->rightCalfCircumference;
        $leftCalfCircumference= $request->leftCalfCircumference;
        $note=$request->note;
        $bodymeasurement =new BodyMeasurementsPatient();                 
        $bodymeasurement->user_id=$user_id;
        $bodymeasurement->rightHandCircumference=$rightHandCircumference;
        $bodymeasurement->leftHandCircumference=$leftHandCircumference;
        $bodymeasurement->chestCircumference=$chestCircumference;
        $bodymeasurement->centerCircumference=$centerCircumference;
        $bodymeasurement->abdominalCircumference=$abdominalCircumference;
        $bodymeasurement->perimeterPelvis=$perimeterPelvis;
        $bodymeasurement->rightThighCircumference=$rightThighCircumference;
        $bodymeasurement->leftThighCircumference=$leftThighCircumference;
        $bodymeasurement->rightCalfCircumference=$rightCalfCircumference;
        $bodymeasurement->leftCalfCircumference=$leftCalfCircumference;
        $bodymeasurement->note=$note;
        $bodymeasurement->save();
        session()->flash('success','تم اضافة القياسات الجسم بنجاح');
        return redirect(url('user/patient'));
    }
    public function createheightweight(Request $request)
    {
        $bodyShape='';
        if($request->bodyShape != null){
            foreach ($request->bodyShape as $value){
                $bodyShape .=  $value.',';
             }
        }
        $user_id=$request->user_id;
        $length=$request->length;
        $weight= $request->weight;
        $waterRatio= $request->waterRatio;
        $fatRatio=$request->fatRatio;
        $muscleRatio=$request->muscleRatio;
        $boneRatio=$request->boneRatio;
        $fatWeight= $request->fatWeight;
        $idealWeightFirst=$request->idealWeightFirst;
        $idealWeightSecond= $request->idealWeightSecond;
        $bim= $request->bim;
        $waterRequired= $request->waterRequired;
        $proteinRequired= $request->proteinRequired;
        $salt= $request->salt;
        $burnRate= $request->burnRate;  
        $phisycalAge= $request->phisycalAge;
        $healthAss= $request->healthAss;
        $note=$request->note;
        $heightweight =new PerfectBody();                 
        $heightweight->user_id=$user_id;
        $heightweight->length=$length;
        $heightweight->weight=$weight;
        $heightweight->waterRatio=$waterRatio;
        $heightweight->muscleRatio=$muscleRatio;
        $heightweight->fatRatio=$fatRatio;
        $heightweight->boneRatio=$boneRatio;
        $heightweight->fatWeight=$fatWeight;
        $heightweight->idealWeightFirst=$idealWeightFirst;
        $heightweight->idealWeightSecond=$idealWeightSecond;
        $heightweight->bim=$bim;
        $heightweight->waterRequired=$waterRequired;
        $heightweight->proteinRequired=$proteinRequired;
        $heightweight->salt=$salt;
        $heightweight->burnRate=$burnRate;
        $heightweight->bodyShape=$bodyShape;  
        $heightweight->phisycalAge=$phisycalAge;
        $heightweight->healthAss=$healthAss;
        $heightweight->note=$note;
        $heightweight->save();
        session()->flash('success','تم اضافة القياسات الجسم بنجاح');
        return redirect(url('user/patient'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function profile($id){
        $bookings=Booking::where('patient_id' ,request()->segment(2) )->select('status' ,'date','price','time')->get();
        $reports=PatientReports::where('patient_id' , request()->segment(2) )->select('attachments','note','appointment')->get();
        $patient=User::where('id' , request()->segment(2) )->first();
        $financialYearly=Booking::whereYear('Date', '=', date('Y'))->with('service')->get();
        $pricebooking=$financialYearly->sum('price');
        $countbooking=$financialYearly->count('patient_id' , request()->segment(2));
        return view('users.profile', compact('bookings' ,'reports' ,'patient', 'countbooking','pricebooking','financialYearly') );
    }
    public function search(){
        if(!empty($_GET['search'])){
        $search=$_GET['search'];       
        $user='0';
        $users= User::where('name','LIKE', '%'.$search.'%')->orWhere('id','LIKE','%'. $search.'%')->first();            
        if($users== null){
        $users= PatientsDetails::where('mobile','LIKE', '%'.$search.'%')->first();
        if($users!= null){            
            $user = $users->id;
        }
         }elseif($users!= null){
        $user = $users->id;
         }
        if($user != '0'){
        $bookings=Booking::where('patient_id' ,$user)->select('status' ,'date','price','time')->get();
        $reports=PatientReports::where('patient_id' , $user )->select('attachments','note','appointment')->get();
        $patient=User::where('id' ,$user )->first();
        $financialYearly=Booking::whereYear('Date', '=', date('Y'))->with('service')->get();
        $pricebooking=$financialYearly->sum('price');
        $countbooking=$financialYearly->count('patient_id' ,$user);
        return view('users.profile', compact('bookings' ,'reports' ,'patient', 'countbooking','pricebooking','financialYearly') );
    }else{
        abort(404);
    }
    }else{
        abort(404);
    }
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        $title=trans('admin.edit');
        return view('users.edit',compact('users','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$this->validate(request(),[         
            'name'=>'required',
            'status'=>'required',
            'roles_name'=>'required|in:active,Inactive',
            'roles_name'=>'required|in:Admin,Supervisor,User',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'sometimes|nullable|min:6',
        ],[],[
            'name'=> trans('admin.name'),
            'status'=> trans('admin.status'),
            'roles_name'=> trans('admin.level'),
            'email'=>trans('admin.email'),
            'password'=>trans('admin.password'),
        ]);
        if (request()->has('password')) {
        }
        $data['password'] = bcrypt(request('password'));
        User::where('id',$id)->update($data);
        session()->flash('success',trans('admin.update_added'));
        return redirect(url('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        session()->flash('success',trans('admin.delete_record'));
        return redirect(url('users'));
    }
    public function anyData()
    {
        return Datatables::of(User::query())->make(true);
    }
    public function multi_delete(){
        if (is_array(request('item'))) {
            User::destroy(request('item'));
        }else{
            User::find(request('item'))->delete();
        }
        session()->flash('success',trans('admin.delete_record'));
        return redirect(url('users'));
    }

}
