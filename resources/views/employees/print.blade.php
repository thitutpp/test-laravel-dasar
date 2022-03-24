<html>

<head>
    <title>Print Laporan</title>

</head>

<style>

    .attendance-table table{
  width: 100%;
  border-collapse: collapse;
  border: 1px solid #000;
}

.blank-cell{

  min-width: 50px;


}

.attendance-cell{

  padding: 8px;


}

.attendance-table table th.attendance-cell, .attendance-table table td.attendance-cell {
    border: 1px solid #000;
}

.image{
    width: 20px;
    height: 20px;
}

.table td {

vertical-align: middle;

}
</style>
<body>
    <h2 style="text-align: center">List Data Employees</a></h2>
    <div class="attendance-table">

        <table class="table-bordered">

            <tr>
                <th class="attendance-cell">No</th>
                <th class="attendance-cell">Name</th>
                <th class="attendance-cell">Email</th>
                <th class="attendance-cell">Company</th>
                <th class="attendance-cell">Created At</th>
            </tr>

            @foreach($employees as $index => $data)
                <tr>
                    
                    <td class="attendance-cell">{{ ($index+1) }}</td>
                    <td class="attendance-cell">{{$data->nama}}</td>
                    <td class="attendance-cell">{{$data->email}}</td>
                    <td class="attendance-cell">
                        <img style="vertical-align: middle" class="image" src="{{ url('storage/company/'.$data->get_company->logo) }}">
                        {{ $data->get_company->nama }}
                    </td>
                    <td class="attendance-cell">{{ date('Y-m-d', strtotime($data->created_at)) }}</td>
                </tr>
            @endforeach

        </table>

    </div>
    
</body>
</html>

