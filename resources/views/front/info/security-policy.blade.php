@extends('front.master')

@section('title')
    HalalGhor - Security Policy
@endsection

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
@endsection
 
@section('body')
    <section>
        <div class="container pt-5 pb-5">
            <div class="alert alert-gray c-blue font-weight-bold">
                Security Policy
            </div>
            <div class="row">
                <div class="col-lg-12 text-justify">
                    <p>We are committed to ensure the security of your information. We maintain suitable physical, electronic and managerial procedures to safeguard and secure your information by preventing unauthorized access. Read here how we use cookies, debit/credit cards, other websites and contents.</p>
                    <h4 class="font-weight-bold">How we use cookies:</h4 class="font-weight-bold">
                    <p>A cookie is a small file which asks permission to be placed on your computer's hard drive. Cookies allow web applications to respond to you as an individual. The web application can tailor its operations to your needs, likes and dislikes by gathering and remembering information about your preferences. We only use this information for statistical analysis purposes and then the data is removed from the system. A cookie in no way gives us access to your computer or any information about you, other than the data you choose to share with us.</p>
                    <h4 class="font-weight-bold">Links to other websites:</h4 class="font-weight-bold">
                    <p>Our website may contain links to other websites of interest. However, once you have used these links to leave our site, you should note that we do not have any control over the other websites. Therefore, we cannot be responsible for the protection and privacy of any information which you provide whilst visiting such sites. We provide security only at our website.</p>
                    <h4 class="font-weight-bold">Content you submit:</h4 class="font-weight-bold">
                    <p>You agree that any information submitted belongs to you or you have permission to submit them. Content means but is not restricted to text, graphics, photos, logos, audio/video files etc. You agree to indemnify us from all responsibility and not hold us responsible for displaying any information you submit to us.</p>
                </div>
            </div>
        </div>
    </section>
@endsection