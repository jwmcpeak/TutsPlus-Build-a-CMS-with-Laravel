{!! csrf_field() !!}

@if (!$errors->isEmpty())

<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $message)
    
        <li>{{$message}}</li>

        @endforeach
    </ul>

</div>

@endif

<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" 
        name="title" value="{{$model->title}}" />
</div>

<div class="form-group">
    <label for="url">URL</label>
    <input type="text" class="form-control" id="url" 
        name="url" value="{{$model->url}}" />
</div>

<div class="form-group row">
    <div class="col-md-12">
        <label>Order</label>
    </div>
    <div class="col-md-2">
        <select name="order" id="order" class="form-control">
            <option value=""></option>
            <option value="before">Before</option>
            <option value="after">After</option>
            <option value="child">Child Of</option>
        </select>
    </div>
    <div class="col-md-5">
        <select name="orderPage" id="orderPage" class="form-control">
            <option value=""></option>

            @foreach ($orderPages as $page)
            <option value="{{$page->id}}">{{$page->present()->paddedTitle}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label for="content">Content</label>
    <textarea class="form-control" name="content" id="content">{{$model->content}}</textarea>
</div>

<div class="form-group">
    <input type="submit" class="btn btn-default" value="Submit" />
</div>