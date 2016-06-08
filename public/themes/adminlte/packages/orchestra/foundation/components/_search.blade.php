@if (get_meta('search-title'))
  #{{  $placeholder = get_meta('search-title') }}
@else
  #{{ $placeholder = 'Search:' }}
@endif

<div class="datatable-top">
    <div class="search-box">
        {!! Form::open(['class'=>'search-form', 'method'=>'GET']) !!}
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-search search"></i></span>
            {!! Form::input('search',null, Input::get('q'), ['id'=>'searchBox','class'=>'form-control', 'placeholder'=>$placeholder]) !!}
        </div>
        </form>
    </div>
    {{--<div class="action-box">--}}

        {{--<div class="btn-group table-btn">--}}
            {{--<button type="button" class="btn btn-default"></button>--}}
            {{--<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">--}}
                {{--Export--}}
                {{--<span class="fa fa-angle-down"></span>--}}
                {{--<span class="sr-only">Toggle Dropdown</span>--}}
            {{--</button>--}}
            {{--<ul class="dropdown-menu" role="menu">--}}
                {{--<li><a href="#">Action</a></li>--}}
                {{--<li><a href="#">Another action</a></li>--}}
                {{--<li><a href="#">Something else here</a></li>--}}
                {{--<li class="divider"></li>--}}
                {{--<li><a href="#">Separated link</a></li>--}}
            {{--</ul>--}}
        {{--</div>--}}

        {{--<div class="btn-group table-btn">--}}
            {{--<button type="button" class="btn btn-default"></button>--}}
            {{--<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">--}}
                {{--Filter--}}
                {{--<span class="fa fa-angle-down"></span>--}}
                {{--<span class="sr-only">Toggle Dropdown</span>--}}
            {{--</button>--}}
            {{--<ul class="dropdown-menu" role="menu">--}}
                {{--<li><a href="#">Action</a></li>--}}
                {{--<li><a href="#">Another action</a></li>--}}
                {{--<li><a href="#">Something else here</a></li>--}}
                {{--<li class="divider"></li>--}}
                {{--<li><a href="#">Separated link</a></li>--}}
            {{--</ul>--}}
        {{--</div>--}}
        {{--<div class="btn-group table-btn">--}}
            {{--<button type="button" class="btn btn-default"></button>--}}
            {{--<a href="#"><i class="fa fa-th-large"></i></a>--}}
            {{--<a href="#" class="active"><i class="fa fa-th-list"></i> </a>--}}

        {{--</div>--}}
    {{--</div>--}}


    {{--<button type="submit" class="btn btn-primary margin-left15">Status</button>--}}
    {{--<button type="submit" class="btn btn-primary margin-left15">Export</button>--}}
    {{--<button type="submit" class="btn btn-primary margin-left15">Delete</button>--}}
</div>

@push('orchestra.footer')
        <!-- DataTables -->
<script src="/backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/backend/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="/backend/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/backend/plugins/fastclick/fastclick.js"></script>
<!-- page script -->
<script>
    $(function () {

        $.fn.dataTableExt.sErrMode = "throw";

        var table = $('#dataTable').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true
        });

        // #myInput is a <input type="text"> element
        $('#searchBox').on( 'keyup', function () {
            table.search( this.value ).draw();
        } );
    });
</script>
@endpush

@push('orchestra.header')
        <!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="/backend/plugins/datatables/dataTables.bootstrap.css">
@endpush