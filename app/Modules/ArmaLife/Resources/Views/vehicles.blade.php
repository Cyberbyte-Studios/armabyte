@extends('templates.base')

@section('title')
    Players
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Table With Full Features</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <table id="vehicles" class="table table-bordered table-striped dataTable" role="grid" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>{{ trans('life.general.id') }}</th>
                                <th>{{ trans('life.general.name') }}</th>
                                <th>{{ trans('life.general.pid') }}</th>
                                <th>{{ trans('life.vehicle.class') }}</th>
                                <th>{{ trans('life.vehicle.side') }}</th>
                                <th>{{ trans('life.vehicle.plate') }}</th>
                                <th>{{ trans('life.vehicle.active') }}</th>
                                <th>{{ trans('life.vehicle.alive') }}</th>
                            </tr>
                            </thead>

                            <tfoot>
                            <tr>
                                <th>{{ trans('life.general.id') }}</th>
                                <th>{{ trans('life.general.name') }}</th>
                                <th>{{ trans('life.general.pid') }}</th>
                                <th>{{ trans('life.vehicle.class') }}</th>
                                <th>{{ trans('life.vehicle.side') }}</th>
                                <th>{{ trans('life.vehicle.plate') }}</th>
                                <th>{{ trans('life.vehicle.active') }}</th>
                                <th>{{ trans('life.vehicle.alive') }}</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(function() {
        $('#vehicles').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ url('/api/armalife/datatable/vehicles') }}',
                type: 'GET',
                data: {
                    _token: '{{ csrf_token() }}'
                }

            }
        });
    });
</script>
@endpush