<div class="row py-3">
    <div class="col-8 text-end pe-0"><img src="{{ asset('image_layout/Frame 271.png') }}" alt="" srcset=""></div>
    <div class="col-2 text-center"><img src="{{ asset('image_layout/unsplash_Fyl8sMC2j2Q.svg') }}" alt=""></div>
    <div class="col-2 ps-0">
        <div id="hello">Xin chào</div>
        <a href="{{ route('profile.edit') }}" id="name-of-user" class="text-decoration-none link-dark">{{ Auth::user()->username }}</a>
    </div>
</div>