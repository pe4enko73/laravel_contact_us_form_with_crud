<?php

namespace App\Http\Controllers;

use App\Models\Contactlist;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Storage;
use Faker\Provider\File;
use Illuminate\Support\Facades\Mail;

class ContactusController extends Controller
{
    public function index()
    {

        $data=[
            'title'=>'Contact Us Form',
            'pagetitle'=>'Свяжитесь со мной',

        ];
        return view('pages.contacts.index')->with($data);
    }
    public function index_db()
    {

        $data=[
            'title'=>'Contact Us Form',
            'pagetitle'=>'Обращения',
            'contacts'=>Contactlist::latest()->paginate(4),
            'count'=>Contactlist::count()
        ];
        return view('pages.contacts._items')->with($data);
    }
    public function contact_view($id)
    {
        $cnt = Contactlist::find($id);
        $filename=$cnt->filename;

        $data=[
            'title'=>'Contact Us Form',
            'pagetitle'=>'Обращения',

        ];

        return view('pages.contacts.contact_id',['data'=>$cnt->find($id)])->with($data);
    }
    public function submit(TaskRequest  $request)
    {
        /*dd($request->all());*/
        $cnt = new Contactlist();
        $cnt->name =$request->input('name');
        $cnt->email =$request->input('email');
        $cnt->gender =$request->input('gender');
        $cnt->country =$request->input('select_country');
        $cnt->description =$request->input('description');
        if($request->hasFile('upload_file')) {
            $file = $request->file('upload_file');
            $mine=$file->getMimeType();
            $fileName = time().'.'.$request->file('upload_file')->getClientOriginalExtension();
            $filePath = $request->file('upload_file')->storeAs('uploads', $fileName, 'public');
            $request->file('upload_file')->move(public_path('uploads'), $fileName);
            $cnt->filename = $fileName;

        }
        else
        {
            $cnt->filename=$fileName='-';
            $filePath='-';
            $mine='-';
        }
        if($request->input('sendtoemail')==='1')
        {
            $cnt->sendtoemail =1;
            $ste=1;
        }
        else
        {
            $cnt->sendtoemail =0;
            $ste=0;
        }

        Mail::send('pages.contacts.contact_email',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'gender' =>$request->input('gender'),
                'country' =>$request->input('select_country'),
                'description' =>$request->input('description'),
            ), function($message) use ($request,$filePath,$fileName,$mine,$ste)
            {
                if($request->hasFile('upload_file'))
                {
                    $file = $request->file('upload_file');
                    $message->attach($filePath,array(
                            'as' => $fileName,
                            'mime' => $mine)
                    );
                    $message->from('eldarsimstudent@yandex.ru');
                    $message->to('eldarsimstudent@yandex.ru');
                    if( $ste===1){
                        $message->to($request->get('email'));
                    }
                }
                else
                {
                    $message->from('eldarsimstudent@yandex.ru');
                    $message->to('eldarsimstudent@yandex.ru');
                    if( $ste===1){
                        $message->to($request->get('email'));
                    }
                }
            });
        $cnt->save();
        return redirect()->route('home')->with('message','Успешно Выполнено');
    }
    public function edit($id)
    {
        $data=[
            'title'=>'Contact Us Form',
            'pagetitle'=>'Редактирование обращения',
        ];
        $cnt = new Contactlist();
        return view('pages.contacts.edit',['data'=>$cnt->find($id)])->with($data);
    }

    public function update_submit($id ,TaskRequest  $request)

    {

        $cnt = Contactlist::find($id);
        $cnt->name = $request->input('name');
        $cnt->email = $request->input('email');
        $cnt->gender = $request->input('gender');
        $cnt->country = $request->input('select_country');
        $cnt->description = $request->input('description');
        $delete = $request->get('delete_cur_file');

        if ($delete == 1 )
        {
            if($request->hasFile('upload_file'))
            {
                if (file_exists(public_path('uploads/') . $cnt->filename)) {
                    unlink(public_path('uploads/') . $cnt->filename);
                }
                $file = $request->file('upload_file');
                $fileName = time() . '.' . $request->file('upload_file')->getClientOriginalExtension();
                $filePath = $request->file('upload_file')->storeAs('uploads', $fileName, 'public');
                $request->file('upload_file')->move(public_path('uploads'), $fileName);
                $cnt->filename = $fileName;
            }
            else
            {
                if(file_exists(public_path('uploads/') .$cnt->filename ))
                {
                    unlink(public_path('uploads/') . $cnt->filename);
                }
                $cnt->filename ='-';
            }
        }

       /* if($request->input('sendtoemail')==='1')
        {
            $cnt->sendtoemail =1;
        }
        else
        {
            $cnt->sendtoemail =0;
        }*/
        $cnt->save();
        return redirect()->route('contacts_db')->with('message','Успешно Обновлено');
    }


    public function delete_contact($id )
    {
        $cnt = Contactlist::find($id);
        if($cnt->filename!=='-') {
            if(file_exists(public_path('uploads/') .$cnt->filename ))
            {
                unlink(public_path('uploads/') . $cnt->filename);
            }
            Contactlist::find($id)->delete();
        }
        else
        {
            Contactlist::find($id)->delete();
        }

        return redirect()->route('contacts_db')->with('message','Успешно Удалено');;

    }
}

