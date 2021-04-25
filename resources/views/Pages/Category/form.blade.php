@extends("layouts.app")
@section("main_content")
<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">Add Category</h3>
        <div class="block-options">
            <!-- <button class="btn-block-option" type="button">
                <i class="si si-wrench"></i>
            </button>-->
        </div>
    </div>
    <form method="post" action="/category{{isset($category) ? '/'.$category->id : ""}}">
        @csrf
        @if(isset($category))
            @method("put")
        @endif
        <div class="block-content">
            <div class="form-group">
                <label for="name">
                    Name
                    <span style="color:red">*</span>
                </label>
                <input class="form-control" id="name" name="name" placeholder="Enter category name" type="text" value="{{isset($category)? $category->name :""}}"/>
            </div>
        </div>
        <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
            <button class="btn btn-success" type="submit">Submit</button>
            <a href="/category">
                <button class="btn btn-secondary" type="button">Close</button>
            </a>
        </div>
    </form>
</div>
@stop
