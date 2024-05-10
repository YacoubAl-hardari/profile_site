<?php

namespace App\Livewire\ContactUs;

use App\Models\User;
use App\Models\Admin;
use Livewire\Component;
use App\Models\Settings;
use App\Mail\ContactUsMail;
use App\Models\ContactForm;
use Livewire\Attributes\Validate;
use App\Models\EmailConfiguration;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;

class ShowContactUSPage extends Component
{
    #[Validate('required|min:3|max:50')]
    public $name;
    #[Validate(['required', 'numeric', 'regex:/^(?:\+|00)[0-9]{1,18}$/'])]
    public $phone;
    #[Validate('required|min:3|email|max:50')]
    public $email;
    #[Validate('required|min:3')]
    public $subject;
    #[Validate('required|min:3|max:500')]
    public $message;

//     public $captcha = 0;
 
// public function updatedCaptcha($token)
// {
//     $response = Http::post('https://www.google.com/recaptcha/api/siteverify?secret=' . env('CAPTCHA_SECRET_KEY') . '&response=' . $token);
//     $this->captcha = $response->json()['score'];
 
//     if (!$this->captcha > .3) {
//         $this->store();
//     } else {
//         return session()->flash('success', 'Google thinks you are a bot, please refresh and try again');
//     }
 
// }


    public function save()
    {

       

       
       
      

        $this->validate();
        $data = [
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ];

        try {
            // $MAIL_FROM_ADDRESS = EmailConfiguration::first()->MAIL_FROM_ADDRESS;
            // Mail::to($MAIL_FROM_ADDRESS)->send(new ContactUsMail($data));


            Notification::make()
                ->title('لديك رسالة جديدة  😊' . ' ــــ ')
                ->success()
                ->body(' مقدم الطلب / ' . ' ـــ ' .$this->name)
                ->actions([
                    Action::make('markAsRead')
                        ->label('وضع علامة مقروء')
                        ->button()
                        ->markAsRead(),
                ])
                ->sendToDatabase(Admin::all());


                ContactForm::create($data);
                flash()->addSuccess(__('trans_all_data_front_end_pages.sendMail'));

            return redirect()->route('contact-us');

        } catch (\Exception $th) {
            flash()->addError(__('trans_all_data_front_end_pages.ErrorToSendMail'));
            return redirect()->route('contact-us');
        }
    }
    
    public function render()
    {
        $setting = Settings::select('contact_title_page','contact_title_page_description')->first();
        return view('livewire.contact-us.show-contact-u-s-page',compact('setting'));
    }
}
