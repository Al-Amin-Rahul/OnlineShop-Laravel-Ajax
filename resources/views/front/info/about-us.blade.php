@extends('front.master')

@section('title')
    HalalGhor - About Us
@endsection

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
@endsection
 
@section('body')
    <section>
        <div class="container pt-5 pb-5">
            <div class="alert alert-gray c-blue font-weight-bold">
                About Us
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <span class="text-justify">আসসালামুআলাইকুম ওয়ারহমাতুল্লাহি ওয়াবারাকাতুহু। halalghor.com হালাল ঘর ডট কম একটি ইকমার্স সাইট, যেখানে ইসলামিক প্রায় সকল ধরনের হালাল পণ্য সামগ্রী বিক্রয় করা হয়। যেমনঃ হালাল ফুড, হালাল পারফিউম, ইসলামিক বই এছাড়াও একটি পরিবারের জন্য প্রয়োজনীয় হালাল পণ্যসামগ্রী যেমনঃ মুসলিম ছেলেদের ফ্যাশান, মুসলিম বোনদের ফ্যাশান, গৃহসজ্জা, গ্যাজেট ইত্যাদি অতন্ত্য স্বল্প মূল্যে বিক্রয় করা হয়।</span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6 text-center">
                    <span><br><br><span class="text-success font-weight-bold">আমাদের বৈশিষ্ট সমূহঃ</span> <br><br>
                    <span class="badge badge-dark">১</span> সম্পূর্ন হালাল প্রডাক্ট <br>
                    <span class="badge badge-dark">২</span> শতভাগ খাটি<br>
                    <span class="badge badge-dark">৩ </span> সাশ্রয়ী পণ্য মূল্য<br>
                    <span class="badge badge-dark">৪</span> দ্রুত পণ্য ডেলিভারি<br>
                    <span class="badge badge-dark">৫</span> ৭ দিনের মধ্যে অব্যবহিত পণ্য ফেরৎ</span>
                </div>
            </div>
        </div>
    </section>
@endsection