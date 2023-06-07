@extends('layouts.master')
@section('content')

@if(isset($selectedItem_hidden))
<input type="hidden" id="selectedItemToShow" value="{{ $selectedItem_hidden }}">
@endif

<div class="col-10">

    <div class="row">
        <div class="col mt-3 ps-3">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="fw-bold text-decoration-none link-dark">Cấp số</a></li>

                    <li class="breadcrumb-item fw-bold" aria-current="page"><a href="{{ route('queuings.all') }}" class="fw-bold text-decoration-none link-dark">Danh sách cấp số</a></li>
                    <li class="breadcrumb-item active-breadcumb fw-bold" aria-current="page"><a href="{{ route('queuings.add') }}" class="fw-bold text-decoration-none active-breadcumb">Cấp số mới</a></li>

                </ol>
            </nav>
        </div>
        <div class="col">
            @include('components.profile')
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <p class="fw-bold text-primary ms-1 fs-4">Quản lý cấp số</p>
        </div>
    </div>
    <div class="row">

        <form class="mt-3" method="post" action="{{ route('queuings.store') }}">
            @csrf
            <input type="hidden" name="iduser_hidden" value="{{ Auth::user()->id }}">
            <input type="hidden" name="idservice_hidden" id="services_hidden">
            <input type="hidden" name="idequip_hidden" id="idequip_hidden">
            <input type="hidden" name="start_hidden" id="start_hidden">
            <input type="hidden" name="end_hidden" id="end_hidden">
            <input type="hidden" name="rsbd_hidden" id="rsbd_hidden">
            <input type="hidden" name="selectedItem_hidden" id="selectedItem_hidden">


            <div class="card ms-3 ps-0 mb-3">
                <div class="card-body row pb-5">
                    <div class="row button-container m-auto text-center">
                        <div class="mb-3">
                            <label class="form-label fw-bold text-primary ms-1 fs-3">Cấp số mới</label>
                            <p class="fw-bold ms-1 fs-5">Dịch vụ khách hàng lựa chọn</p>@if(isset($queuings))
                            <input type="hidden" value="{{ $queuings }}" id='queuings'>
                            @php
                            $queuingsToShow = App\Models\Queuing::find($queuings);
                            @endphp
                            <input type="hidden" id="orderFromDB" value="{{ $queuingsToShow->order }}">
                            <input type="hidden" id="start_dateFromDB" value="{{ $queuingsToShow->start_date }}">
                            <input type="hidden" id="end_dateFromDB" value="{{ $queuingsToShow->end_date }}">
                            <input type="hidden" id="services_idFromDB" value="{{ $queuingsToShow->services_id }}">
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header pb-0" style="border: none;">
                                            <button type="button" style="width:20px" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body pb-0" style="border: none;">
                                            <div class="row">
                                                <p class="fw-bold fs-3">Số thứ tự được cấp</p>
                                            </div>
                                            <div class="row">
                                                <p class="order" id="order">{{ $queuingsToShow->order }}</p>
                                            </div>
                                            <div class="row">
                                                <p class="service-chosen" id='service-chosen'>{{ $queuingsToShow->services_id }}</p>
                                            </div>
                                            <div class="row background-primary" style="margin: 0 -18px !important">
                                                <div class="row ms-0 fw-bold mt-3 time-stamp">
                                                    <p>Thời gian cấp: <span id="start_date">{{ $queuingsToShow->start_date }}</span></p>
                                                </div>
                                                <div class="row ms-0 fw-bold time-stamp">
                                                    <p>Hạn sử dụng: <span id="end_date">{{ $queuingsToShow->end_date }}</span></p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endif
                            <select class="form-select w-50 m-auto mb-5" name="services" id='services'>
                                <option value="0" disabled selected>Chọn dịch vụ</option>
                                @foreach($services_cate as $item)
                                <option value="{{ $item->services_id }}">{{ $item->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <a href="{{ route('queuings.all') }}" class="btn btn-outline-primary ms-auto me-2">Hủy bỏ</a>
                        <button class="btn btn-primary me-auto ms-2" type="submit">In số</button>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="serviceInfo-container d-none">
    @foreach($services_cate as $item)
    <div id="serviceInfo">
        <input type="hidden" value="{{ $item->services_id}}" id="services_id_info">
        <input type="hidden" value="{{ $item->services_id_custom }}" id="services_id_custom_info">
        <input type="hidden" value="{{ $item->name }}" id="services_name_info">
        <input type="hidden" value="{{ $item->from }}" id="from">
        <input type="hidden" value="{{ $item->to }}" id="to">
        <input type="hidden" value="{{ $item->rule }}" id="rule">
        <input type="hidden" value="{{ $item->reset_by_day }}" id="reset_by_day">
    </div>
    @endforeach


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


<script>
    document.title = 'Cấp số mới'
    const serviceInfoArray = [];

    document.querySelector('#services').addEventListener('change', (e) => {
        const date = new Date();

        let day = date.getDate();
        let month = date.getMonth() + 1;
        let year = date.getFullYear();
        let hour = date.getHours();
        let minute = date.getMinutes();


        let start_date = `${hour<10?'0'+hour:hour}:${minute<10?'0'+minute:minute} ${day<10?'0'+day:day}/${month<10?'0'+month:month}/${year}`;

        let end_date = (hour <= 22) ? `${parseInt(hour<10?'0'+hour:hour)+8}:${minute<10?'0'+minute:minute} ${day<10?'0'+day:day}/${month<10?'0'+month:month}/${year}` : `22:00 ${day<10?'0'+day:day}/${month<10?'0'+month:month}/${year}`;



        document.getElementById('end_hidden').value = end_date;
        document.getElementById('start_hidden').value = start_date;



        const selectedItem = e.target.value;
        const selectedItemInfo = serviceInfoArray.filter(a => a.id === selectedItem)

        document.getElementById('selectedItem_hidden').value = (JSON.stringify(selectedItemInfo[0]));

        document.getElementById('rsbd_hidden').value = selectedItemInfo[0].reset_by_day;
        document.getElementById('services_hidden').value = selectedItemInfo[0].id;
    })

    let serviceInfo = document.querySelectorAll('#serviceInfo');
    serviceInfo.forEach(item => {
        serviceInfoArray.push({
            id: item.children[0].value,
            services_id_custom: item.children[1].value,
            name: item.children[2].value,
            from: item.children[3].value,
            to: item.children[4].value,
            rule: item.children[5].value,
            reset_by_day: item.children[6].value,
        });
    })
    console.log(serviceInfoArray);
</script>
<script type="text/javascript">
    if (document.getElementById('queuings')) {
        $(window).on('load', function() {
            $('#exampleModal').modal('show');
        });

        let orderDisplay = document.getElementById('order').innerHTML;

        let a = parseInt(orderDisplay);
        let b = 4;
        if (a > 1000) b = 0;
        else b = 4;


        orderDisplay = 202;
        let toDisplayOrder = '';
        const displayRule = JSON.parse(selectedItemToShow.value);
        if (displayRule.rule == 1) {
            // prefix
            toDisplayOrder = `${displayRule.services_id_custom}${a.toString().padStart(b,'0')}`
        } else {
            // surfix
            toDisplayOrder = `${a.toString().padStart(b,'0')}${displayRule.services_id_custom}`
        }
        console.log(displayRule);

        let toDisplayServiceName = displayRule.name;

        document.getElementById('service-chosen').innerHTML = toDisplayServiceName;

        document.getElementById('order').innerHTML = toDisplayOrder;
    }
</script>
@endsection