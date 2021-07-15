@extends("layouts.app")
@section("main_content")
<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">Add Subcategory</h3>
        <div class="block-options">
            <!-- <button class="btn-block-option" type="button">
                <i class="si si-wrench"></i>
            </button>-->
        </div>
    </div>
    <form method="post" action="/subcategory{{isset($subcategory) ? '/'.$subcategory->id : ""}}">
        @csrf
        @if(isset($subcategory))
            @method("put")
        @endif
        <div class="block-content">
            <div class="form-group">
                <label for="category_id">
                    Category
                    <span style="color:red">*</span>
                </label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach ($categories as $key=>$category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">
                    Name
                    <span style="color:red">*</span>
                </label>
                <input class="form-control" id="name" name="name" placeholder="Enter subcategory name" type="text" value="{{isset($subcategory)? $subcategory->name :""}}"/>
            </div>
        </div>
        <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
            <button class="btn btn-success" type="submit">Submit</button>
            <a href="/subcategory">
                <button class="btn btn-secondary" type="button">Close</button>
            </a>
        </div>
    </form>
</div>
@stop
