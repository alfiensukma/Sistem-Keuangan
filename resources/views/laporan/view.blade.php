@extends('main')
@section('konten')
<h4 class="container">{{$akun2->kd_akun}} | {{ucwords($akun2->nama_akun)}} </h4>
<br>
<div class="container">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent">
        <li class="breadcrumb-item text-black"><a href="/main">Home</a></li>
        <li class="breadcrumb-item text-black"><a href="/main/laporan-akun">Pilih-akun</a></li>
        <li class="breadcrumb-item active" aria-current="page">View</li>
    </ol>
    </nav>
    <div class="card shadow mt-2">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-hover display nowrap" cellspacing="0" width="100%">
                    <thead class="table-control text-left">
                        <tr>
                            <th>No</th>
                            <th data-priority="1">Tanggal</th>
                            <th data-priority="2">Keterangan</th> 
                            <th>Debit</th>
                            <th>Kredit</th>
                            <th>Saldo</th>
                        </tr>
                    </thead>
                    <tbody class=" text-left">
                    <?php $id = 1 ?>
                        @forelse($data as $d)
                        <tr>
                            <td>{{$id++}}</td>
                            <td>{{date('d F Y', strtotime($d->tanggal))}}</td>
                            <td>JU</td>
                            @if ($d->debit==0)
                                <td></td>
                            @else
                                <td>Rp. {{number_format((float)$d->debit)}}</td>
                            @endif
                            @if ($d->kredit==0)
                                <td></td>  
                            @else
                                <td>Rp. {{number_format((float)$d->kredit)}}</td> 
                            @endif
                            <td>
                                @foreach ($saldo as $s)
                                    @if ($s->id == $d->id)
                                    Rp. {{number_format((float)$s->saldo)}}
                                    @endif
                            @endforeach
                            </td>
                        </tr>
                        @empty
	                    <tr class="text-center">
	            	        <td colspan="10">
	            		        <div class="content m-5">
		            		        <div class="icon"><i class="far fa-sad-tear"></i></div>
	                		        <div class="text2 ml-4">Data Kosong.</div>
                		        </div>
            		        </td>
	                    </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#example').DataTable( {
                "paging":   false,
                "ordering": false,
                responsive: true,
                columnDefs: [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: -1 }
                ],
                "order": [[ 0, "asc" ]],
                buttons: [
                    {
                        text: '<i class="far fa-file-excel"></i> Excel',
                        extend: 'excel',
                        title: 'Rekap Akun {{$akun2->kd_akun}}',
                        messageTop: 'Nama Akun : {{ucwords($akun2->nama_akun)}}          Kode Akun : {{$akun2->kd_akun}}',
                    },
                    {
                        text: '<i class="far fa-file-pdf"></i> PDF',
                        extend: 'pdf',
                        title: 'Rekap Akun {{$akun2->kd_akun}}',
                        messageTop: 'Nama Akun : {{ucwords($akun2->nama_akun)}}          Kode Akun : {{$akun2->kd_akun}}',
                    },
                ],
                dom: 
                "<'row'<'col-md-12 text-right'B>>" +
                "<'row'<'col-sm-12'tr>>"+
                "<'row'<'col-sm-12'i>>",
            } );
            
            table.buttons().container()
            .appendTo( '#table_wrapper .col-md-5:eq(0)' );
        } );
    </script>
@endsection	