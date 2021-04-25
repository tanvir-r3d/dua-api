@extends("layouts.app")
@section("main_content")
<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">{{ isset($duah) ? 'Edit' : 'Add'}} Dua</h3>
        <div class="block-options">
            <!-- <button class="btn-block-option" type="button">
                <i class="si si-wrench"></i>
            </button>-->
        </div>
    </div>
    <form method="post" action="/dua{{isset($duah) ? '/'.$duah->id : ""}}">
        @csrf
        @if(isset($duah))
            @method("put")
        @endif
        <div class="block-content">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="category_id">
                        Category
                        <span style="color:red">*</span>
                    </label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option selected hidden disabled>--Select Category--</option>
                        @foreach ($categories as $value)
                            <option value="{{$value->id}}" {{isset($duah) && $duah->category_id==$value->id? "selected" : "" }}>{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="title">
                        Title
                        <span style="color:red">*</span>
                    </label>
                    <input class="form-control" id="title" name="title" placeholder="Enter dua title" type="text" value="{{isset($duah)? $duah->title :""}}"/>
                </div>
                <div class="form-group col-md-6">
                    <label for="details_ar">
                        Details Arabic
                    </label>
                    <textarea  id="js-ckeditor" placeholder="Enter dua details" name="details_ar">{{isset($duah)? $duah->details_ar :""}}</textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="details_bn">
                        Details Bangla
                    </label>
                    <textarea  id="js-ckeditor2" placeholder="Enter dua details" name="details_bn">{{isset($duah)? $duah->details_bn :""}}</textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="details_en">
                        Details English
                    </label>
                    <textarea  id="js-ckeditor3" placeholder="Enter dua details" name="details_en">{{isset($duah)? $duah->details_en :""}}</textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="reference">
                        Reference
                        {{-- <span style="color:red">*</span> --}}
                    </label>
                    <input class="form-control" id="reference" name="reference" placeholder="Enter reference" type="text" value="{{isset($duah)? $duah->reference :""}}"/>
                </div>
            </div>
        </div>
        <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
            <button class="btn btn-success" type="submit">Submit</button>
            <a href="/dua">
                <button class="btn btn-secondary" type="button">Close</button>
            </a>
        </div>
    </form>
</div>
@stop
@section('script')
<script>
    jQuery(function(){ Codebase.helpers(['summernote', 'ckeditor', 'simplemde']); });
    CKEDITOR.replace('js-ckeditor2');
    CKEDITOR.replace('js-ckeditor3');
</script>
@stop
