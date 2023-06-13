<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xuất báo cáo</title>
    <style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #fff2e7;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #ff7506;
  color: white;
}
</style>
</head>

<body>
    <h1>Xuất bảng báo cáo Cấp số</h1>

<table id="customers">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên dịch vụ</th>
            <th>Thời gian cấp</th>
            <th>Trạng thái</th>
            <th>Nguồn cấp</th>
        </tr>
    </thead>
    <tbody>
        @if (count($queuings) > 0)
            @foreach ($queuings as $item)
                <tr>
                    <td>
                        @if ($item->rule == 1)
                            @php
                                echo $item->services_id_custom;
                                echo str_pad($item->order, 4, '0', STR_PAD_LEFT);
                            @endphp
                        @else
                            @php
                                echo str_pad($item->order, 4, '0', STR_PAD_LEFT);
                                echo $item->services_id_custom;
                            @endphp
                        @endif
                    </td>
                    <td>{{ $item->sn }}</td>

                    <td>{{ $item->start_date }}</td>
                    <td>
                        @if ($item->status == 'Đang chờ')
                            <i class="bi bi-circle-fill text-info"></i>
                            {{ $item->status }}
                        @elseif($item->status == 'Đã sử dụng')
                            <i class="bi bi-circle-fill text-secondary"></i>
                            {{ $item->status }}
                        @else
                            <i class="bi bi-circle-fill text-danger"></i>
                            {{ $item->status }}
                        @endif
                    </td>
                    <td>{{ $item->en }}</td>

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">Bảng rỗng</td>
            </tr>
        @endif
    </tbody>

</table>
</body>

</html>
