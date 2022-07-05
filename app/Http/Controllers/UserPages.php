<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Subjects;
use App\Models\SubmitedForms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;
use App\Mail\NewFormSubmited;
use Illuminate\Support\Facades\Storage;

class UserPages extends Controller
{
    public function index(){
        return view('user.index');
    }

    protected function AjaxGetData(Request $request){
        $this->validate($request,[
            'action' => 'required'
        ]);

        $lang = session()->get('applocale', 'en');

        if($request['action'] == 'companies'){
            $description = Company::where('id',$request['selected'])->first("description-$lang as description");
            return $description['description'];
        }
    }

    protected function ComplianceForm(){
        $lang = session()->get('applocale', 'en');

        $data['companies'] = Company::select('id', "name", "adress", "description-$lang AS description")->get();

        return view('public.complianceForm')->with('data',$data);
    }

    protected function ComplianceFormSave(Request $request){
        $this->validate($request,[
            'company'   => 'required',
            'title'     => 'required',
            'body-text' => 'required',
            'CaptchaCode' => 'required|valid_captcha',
            'attachment.*' => 'mimes:png,jpg,jpeg,txt,doc,docx,pdf,zip'
        ]);

        $data['company_id'] = $request['company'];
        $data['title'] = $request['title'];
        $data['message'] = $request['body-text'];
        $data['country'] = $request['country'];
        $data['area'] = $request['area'];
        $data['lang'] = session()->get('applocale', 'en');

        if($request['toReply']){
            $data['anonimRenounce'] = 1;
            $data['mail-phone'] = $request['email'];
        }

        $Company = Company::where('id', $request['company'])->first(['contact','name']);

        $mailInfo = [
            'title'     => $request['title'],
            'to'        => $Company['contact'],
            'company'   => $Company['name'],
            'country'   => $request['country'],
            'area'      => $request['area'],
            'message'   => $request['body-text']
        ];

        if($request['toReply']){
            $mailInfo['mail'] = $request['email'];
        }

        if($request['attachment']){
            $files = $request->file('attachment');
            $max_size = 18*1024*1024;
            if($request->hasFile('attachment')){

                foreach($files as $key=>$file) {
                    $mailInfo['files'][$key] = Storage::putFile('public/users-upload' ,$file);
                    $max_size -= $file->getSize();
                }

                if($max_size <= 0){
                    foreach($mailInfo['files'] as $file){
                        Storage::delete(storage_path('app/'.$file));
                    }
                    return back()->withErrors('attachment', __('messages.form.file-too-big'));
                }

                $data['files'] = json_encode($mailInfo['files']);
            }
        }
        else{
            $mailInfo['files'] = false;
        }

        SubmitedForms::create($data);

        Mail::queue(new NewFormSubmited($mailInfo));

        return back()->with('success', __('messages.form.sendSucces'));
    }
}
