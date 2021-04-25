@extends("layouts.app")
@section("main_content")
<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">Dua</h3>
        <div class="block-options">
            <div class="block-options-item">
                <a class="btn btn-success" href="/dua/create">Add</a>
            </div>
        </div>
    </div>
    <div class="block-content">
        <table class="table table-sm table-vcenter">
            <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th class="text-center">Category</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Details Bangla</th>
                    <th class="text-center">Details English</th>
                    <th class="text-center">Details Arabic</th>
                    <th class="text-center d-none d-sm-table-cell" style="width: 15%;">Status</th>
                    <th class="text-center" style="width: 100px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($duahs as $key=>$value)
                <tr>
                    <th class="text-center" scope="row">{{++$key}}</th>
                    <td>{{$value->category->name}}</td>
                    <td>{{$value->title}}</td>
                    <td>{!! $value->details_bn!!}</td>
                    <td>{!! $value->details_en!!}</td>
                    <td>{!! $value->details_ar!!}</td>
                    <td class="d-none d-sm-table-cell text-center">
                        <span class="badge {{$value->status==1 ? 'badge-success' : 'badge-danger'}}">{{$value->status==1 ? "On" : "Off"}}</span>
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="/dua/status/{{$value->id}}" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Status">
                                <i class="fa fa-refresh"></i>
                            </a>
                            <a href="/dua/{{$value->id}}/edit" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-secondary" onclick="deleteDuah({{$value->id}})" data-toggle="tooltip" title="Delete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$duahs->links()}}
    </div>
    <form id="delete_form" method="post">
        @method("delete")
        @csrf
    </form>
</div>
@stop
@section("script")
<script>
function deleteDuah(id){
    var id=id;
    iziToast.question({
        timeout: 20000,
        close: true,
        overlay: true,
        displayMode: 'once',
        id: 'question',
        zindex: 999,
        title: 'Wait!',
        message: 'Are you sure? Once Deleted Can\'t be undone!',
        position: 'center',
        buttons: [
            ['<button><b>YES</b></button>', function () {
                var $form = $("#delete_form").closest('form');
                $form.attr('action','/dua/'+id);
                $form.submit()
            }, true],
            ['<button>NO</button>', function (instance, toast) {
                instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
            }],
        ],
    });
}
</script>
@stop
