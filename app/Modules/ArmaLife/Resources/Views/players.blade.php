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
                        <table id="players" class="table table-bordered table-striped dataTable" role="grid" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>{{ trans('life.player.uid') }}</th>
                                    <th>{{ trans('life.general.name') }}</th>
                                    <th>{{ trans('life.general.pid') }}</th>
                                    <th>{{ trans('life.player.cash') }}</th>
                                    <th>{{ trans('life.player.bank') }}</th>
                                    <th>{{ trans('life.player.rank.cop') }}</th>
                                    <th>{{ trans('life.player.rank.medic') }}</th>
                                    <th>{{ trans('life.player.rank.donator') }}</th>
                                    <th>{{ trans('life.player.rank.admin') }}</th>
                                </tr>
                            </thead>

                            <tfoot>
                                <tr>
                                    <th>{{ trans('life.player.uid') }}</th>
                                    <th>{{ trans('life.general.name') }}</th>
                                    <th>{{ trans('life.general.pid') }}</th>
                                    <th>{{ trans('life.player.cash') }}</th>
                                    <th>{{ trans('life.player.bank') }}</th>
                                    <th>{{ trans('life.player.rank.cop') }}</th>
                                    <th>{{ trans('life.player.rank.medic') }}</th>
                                    <th>{{ trans('life.player.rank.donator') }}</th>
                                    <th>{{ trans('life.player.rank.admin') }}</th>
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
        $('#players').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ url('/api/armalife/datatable/players') }}',
                type: 'GET',
                data: {
                    _token: '{{ csrf_token() }}'
                }
            }
        });
    });
</script>
@endpush