<?php

namespace App\Http\Controllers;

use App\Mail\response;
use App\Models\Subjects;
use App\Models\SubmitedForms;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class BackPanel extends Controller
{
    protected function dashboard(){

        $lang = session()->get('applocale', 'en');

        $data = SubmitedForms::
        selectRaw('count(submited_forms.id) as counter, companies.name as name, companies.id as id')
        ->groupBy('companies.id','companies.name')
        ->where('still-going', 1)
        ->join("companies", "submited_forms.company_id", "=", "companies.id")->get();

        return view('admin.dashboard')->with('data',$data);
    }

    protected function reportShow($id = 0){
        if($id == 0 ){
            $id = Company::first('id')->id;
        }

        $data['subjects'] = Company::select('id','name as name')->get();
        $data['title'] = Company::select('name as name')->where('id',$id)->first();
        $data['content'] = SubmitedForms::where('company_id',$id)->where('still-going',1)->get();

        return view('admin.form-list-by-subject')->with('data',$data);
    }

    protected function reportEdit($id){
        $lang = session()->get('applocale', 'en');

        $data = SubmitedForms::
        select(
            'submited_forms.id as id',
            'submited_forms.created_at as registered',
            'submited_forms.title as title',
            'submited_forms.country as country',
            'submited_forms.area as area',
            'submited_forms.message as message',
            'submited_forms.anonimRenounce as anonim',
            'submited_forms.mail-phone as contact',
            'submited_forms.still-going as status',
            'companies.name as c_name',
            'submited_forms.files as files'
        )
        ->where('submited_forms.id',$id)
        ->join("companies", "submited_forms.company_id", "=", "companies.id")
        ->first();

        if($data['anonim'] !== 0){
            $data['is_mail'] = false;

            if(preg_match('([\w\d]*?\@[\w\d]*?\.[\w\d]{1,4})',$data['contact'])){
                $data['is_mail'] = true;
            }
        }

        return view('admin.form-edit')->with('data',$data);
    }

    protected function reportSave(Request $request){
        $this->validate($request,[
            'id' => 'required',
        ]);

        $returnMsg = __('messages.form.successEdit');

        if(isset($request['reject']) || $request['status'] == 'reject' ){
            SubmitedForms::where('id',$request['id'])->update(['still-going' => 2]);
            $returnMsg = __('messages.form.successRejected');
        }

        elseif(isset($request['finish']) || $request['status'] == 'finish' ){
            SubmitedForms::where('id',$request['id'])->update(['still-going' => 0]);
            $returnMsg = __('messages.form.successFinished');
        }

        if(isset($request['status']) && !$request['dont_send']){
            $lang = SubmitedForms::where('submited_forms.id',$request['id'])->first('lang');
            $data = SubmitedForms::
            select(
                'submited_forms.created_at as registered',
                'submited_forms.title as title',
                'submited_forms.country as country',
                'submited_forms.area as area',
                'submited_forms.message as message',
                'submited_forms.anonimRenounce as anonim',
                'submited_forms.mail-phone as contact',
                'submited_forms.still-going as status',
                'companies.name as c_name'
            )
            ->where('submited_forms.id',$request['id'])
            ->join("companies", "submited_forms.company_id", "=", "companies.id")
            ->first();

            if(preg_match('([\w\d]*?\@[\w\d]*?\.[\w\d]{1,4})',$data['contact'])){
                $returnMsg = __('messages.form.responseSend');

                $mailInfo['title'] =        $data['s_name'];
                $mailInfo['company'] =      $data['c_name'];
                $mailInfo['country'] =      $data['country'];
                $mailInfo['area'] =         $data['area'];
                $mailInfo['registered'] =   $data['registered'];

                $mailInfo['your_title'] =   $data['title'];
                $mailInfo['your_message'] = $data['message'];
                $mailInfo['message'] =      $request['message'];
                $mailInfo['email'] =        $data['contact'];

                $tmp = session()->get('applocale', 'en');

                App::setLocale($lang['lang']);

                Mail::queue(new response($mailInfo));

                App::setLocale($tmp);
            }
        }

        return redirect()->route('reports.show',$request['s_id'])->with('success', $returnMsg);
    }

    protected function subjectShow(){

        $lang = session()->get('applocale', 'en');
        $data = Subjects::get(['id','name-'.$lang.' as name','description-'.$lang.' as description']);
        return view('admin.subjects')->with('data',$data);
    }

    protected function subjectAdd(Request $request){
        $this->validate($request,[
            'name-ro' => 'required',
            'name-en' => 'required',
            'name-de' => 'required',
            'description-ro' => 'required',
            'description-en' => 'required',
            'description-de' => 'required',
        ]);

        $data['name-ro'] = $request['name-ro'];
        $data['name-en'] = $request['name-en'];
        $data['name-de'] = $request['name-de'];
        $data['description-ro'] = $request['description-ro'];
        $data['description-en'] = $request['description-en'];
        $data['description-de'] = $request['description-de'];

        Subjects::create($data);

        return redirect()->route('subjects.show')->with('success',__('messages.form.SubjectAddSuccess'));
    }

    protected function subjectDelete($id){
        Subjects::where('id',$id)->delete();

        return redirect()->route('subjects.show')->with('success',__('messages.form.SubjectDelSuccess'));
    }

    protected function subjectEdit(Request $request){
        $this->validate($request,['selected' => 'required']);
        $data = Subjects::where('id',$request['selected'])->first();

        return $data;
    }

    protected function subjectSave(Request $request){
        $this->validate($request,[
            'id' => 'required',
            'name-ro' => 'required',
            'name-en' => 'required',
            'name-de' => 'required',
            'description-ro' => 'required',
            'description-en' => 'required',
            'description-de' => 'required',
        ]);

        $data['name-ro'] = $request['name-ro'];
        $data['name-en'] = $request['name-en'];
        $data['name-de'] = $request['name-de'];
        $data['description-ro'] = $request['description-ro'];
        $data['description-en'] = $request['description-en'];
        $data['description-de'] = $request['description-de'];

        Subjects::where('id',$request['id'])->update($data);

        return redirect()->route('subjects.show')->with('success',__('messages.form.SubjectUpdateSuccess'));
    }

    protected function companyShow(){
        $lang = session()->get('applocale', 'en');
        $data = Company::get(['id','name','description-'.$lang.' as description','adress','contact']);
        return view('admin.company')->with('data',$data);
    }

    protected function companyAdd(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'adress' => 'required',
            'contact' => 'required',
            'description-ro' => 'required',
            'description-en' => 'required',
            'description-de' => 'required',
        ]);

        $data['name'] = $request['name'];
        $data['adress'] = $request['adress'];
        $data['contact'] = $request['contact'];
        $data['description-ro'] = $request['description-ro'];
        $data['description-en'] = $request['description-en'];
        $data['description-de'] = $request['description-de'];

        Company::create($data);

        return redirect()->route('companies.show')->with('success',__('messages.form.CompanyAddSuccess'));
    }

    protected function companyDelete($id){
        Company::where('id',$id)->delete();

        return redirect()->route('companies.show')->with('success',__('messages.form.CompanyDelSuccess'));
    }

    protected function companyEdit(Request $request){
        $this->validate($request,['selected' => 'required']);
        $data = Company::where('id',$request['selected'])->first();

        return $data;
    }

    protected function companySave(Request $request){
        $this->validate($request,[
            'id' => 'required',
            'name' => 'required',
            'adress' => 'required',
            'contact' => 'required',
            'description-ro' => 'required',
            'description-en' => 'required',
            'description-de' => 'required',
        ]);

        $data['name'] = $request['name'];
        $data['adress'] = $request['adress'];
        $data['contact'] = $request['contact'];
        $data['description-ro'] = $request['description-ro'];
        $data['description-en'] = $request['description-en'];
        $data['description-de'] = $request['description-de'];

        Company::where('id',$request['id'])->update($data);

        return redirect()->route('companies.show')->with('success',__('messages.form.CompanyUpdateSuccess'));
    }
}
